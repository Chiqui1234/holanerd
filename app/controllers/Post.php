<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class Post extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this -> load -> helper('url_helper');
    $this -> load -> model('Post_model');
}

public function index($forumSlug, $subForumSlug, $postSlug) {
    $table = 'posts_'.$forumSlug;
    $info = array(
        'subForum' => $subForumSlug,
        'slug' => $postSlug
    );
    
    $data['forumSlug'] = $forumSlug;
    $data['postSlug'] = $postSlug;

    $data['post'] = DB_GET($table, $info); // Obtengo el post solicitado
    $data['title'] = $data['post'][0]['title'];
    
    $data['forums'] = base_url().'Forum';                           /* GENERO LAS RUTAS DE FOROS, */
    $data['actualForum'] = $data['forums'].'/open/'.$forumSlug;     /* FOROS+FORO ABIERTO */
    $data['actualPost'] = base_url().'Post/index/'.$data['forumSlug'].'/'.$info['subForum'].'/'.$postSlug;    /* Y FOROS+FORO ABIERTO+POST */

    $data['authorData'] = $this->Post_model->getAuthor($data['post'][0]['author']); // Capto la info del autor del post

    /*if( $data['authorData'][0]['is_admin'] ) {
        $data['rank'] = 'Este usuario es administrador';
    } else {
        $data['rank'] = 'Este usuario es autor';
    }*/
    $data['rank'] = 'Este usuario es autor';

    $this->load->view('templates/header', $data);
    $this->load->view('forum/authorData', $data);
    $this->load->view('templates/footer');
    $this->load->view('forum/post', $data); // Abro la vista del post y le paso sus datos
    $where1 = array('post' => $postSlug);
    $data['comments'] = DB_GET('comments_'.$forumSlug, $where1); // Obtengo los comentarios del post
    $this->load->view('forum/comments', $data);
    if( V_SESSION() && V_CONFUSER() ) { // Si estás logueado, podés puntuar
        $post = $data['post'][0]['slug'];
        $this->load->view('forum/points', $data); // Bajo $post tengo el índice 'points'. Esta vista imprime los puntos acumulados e invita al usuario a donar más
    } else {
        echo '</div>';
    }
}

public function transferPoints() { // Para darle puntos al autor del post :D
    $info = array(
        'post' => $_REQUEST['post'], // El post al que se le dan puntos
        'forum' => $_REQUEST['forum'], // El foro al que pertenece el post
        'username' => $_REQUEST['username'], // El usuario que da puntos
        'author' => $_REQUEST['author'], // El usuario que escribió el post y debe recibir los puntos
        'points' => $_REQUEST['points'] // La cantidad de puntos que van al post y su autor
    );
    if( V_FORM_ASSOC($info) ) { // Si todos los campos se rellenaron, podemos puntuar
        $transferToPost = $this->Post_model->toPost($info);
        $transferToAuthor = $this->Post_model->toAuthor($info);
        return $transferToAuthor;
    }
    return false; // Si no entró al if, devolvemos falso
}

public function postComment() { // Sabiendo la tabla del post, el post y el usuario, quién acceda a éste script podrá comentar el post deseado
    $info = array( 'username' => $_REQUEST['username'], 'comment' => $_REQUEST['comment'], 'forum' => $_REQUEST['forum'],'post' => $_REQUEST['post'] );

    $commentAdded = $this->Post_model->addComment($info);
    $commentCounter = $this->Post_model->updateCommentCounter($info);
    // Falta chequear que el usuario que comenta y el post, EXISTAN

    if( $commentAdded && $commentCounter  ) { // Si $process es false, todo mal
        return true;
    } else {
        return false;
    }  
}

protected function updateCommentCounter() {
    $info = array(
        'username' => 'chiqui1234',
        'comment' => 'comentario creado desde VSCode, mediante el Lote de prueba',
        'forum' => 'computacion',
        'post' => 'prueba-con-request'
    );
    $postTable = 'posts_'.$info['forum']; // agregué esta linea
    $this->db->select('comments');                      /* ACÁ LO QUE HAGO ES */
    $aux1 = array('slug' => $info['post']);             /* SELECCIONAR EL POST */
    $query = $this->db->get_where($postTable, $aux1);   /* PARA, DESPUÉS EN CASO */
    $result = $query->result_array();                   /* DE EXISTIR, HAGO +1 A */
                                                        /* SU CONTADOR DE COMMENT */

    if( isset($result[0]['comments']) ){ // Si se encontró el post
        $aux2 = array('comments' => $result[0]['comments']+1);
        $where = array('slug' => $info['post']); // cambié esta linea
        DB_UPDATE($postTable, $aux2, $where); // Le agrego +1 al contador de comentarios de dicho post
        return true; // Por si se necesita acceder a la cantidad de comentarios del post
    } else {
        return false;
    }

}

} // Cierre de la clase