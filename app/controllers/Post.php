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

public function donatePoints() { // Sabiendo la tabla del post, el post y el usuario, quién acceda a éste script podrá donar puntos al usuario y post pasado por variables. Los puntos salen de la comunidad, no del usuario puntuador.
    $info = array(
        'post' => $_REQUEST['post'],
        'forum' => $_REQUEST['forum'],
        'username' => $_REQUEST['username'],
        'author' => $_REQUEST['author'], 
        'points' => $_REQUEST['points']
        /*'post' => 'la-bd-de-facebook-parece-haberse-filtrado',
        'forum' => 'computacion',
        'username' => 'dummie',
        'author' => 'chiqui1234', 
        'points' => 3*/
    );
    $pointsDonated = false; // Valor por defecto. Será true si la donación resulta exitosa
    //$info = array( 'post' => 'primeros-pasos-en-gnu-linux', 'forum' => 'universidades', 'username' => 'jdespo', 'author' => 'chiqui1234', 'points' => 5);
    if( V_FORM_ASSOC($info) && !V_LEGIT($_SESSION['username'], $info['author']) && V_LEGIT($info['username'], $_SESSION['username']) ) { // Si el envío de datos no fue manipulado para saltarse la restricción de auto-puntuarse
        $pointsToPost_v = $this->Post_model->pointsToPost($info); // Será 'true' si la donación resulta exitosa
        $pointsToAuthor_v = $this->Post_model->pointsToAuthor($info); // Será 'true' si la donación resulta exitosa
        return true;
    }
    echo 'PointsToPost: '.$pointsToPost_v.'<br />'; // Debug
    echo 'PointsToAuthor: '.$pointsToAuthor_v.'<br />'; // Debug
    return false; // Si no sale con 'true' es porque faltó una verificación
}


public function postComment() { // Sabiendo la tabla del post, el post y el usuario, quién acceda a éste script podrá donar puntos al usuario y post que se pasa por variables (mediante ajax). Los puntos salen de la comunidad, no del usuario puntuador.
    $info = array( 'username' => purify($_REQUEST['username']), 'comment' => purify($_REQUEST['comment']), 'forum' => purify($_REQUEST['forum']),'post' => purify($_REQUEST['post']) );

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