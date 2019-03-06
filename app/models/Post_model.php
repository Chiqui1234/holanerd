<?php
class Post_model extends CI_Model {

public function __construct() {
        $this->load->database();
}

public function addComment($infoRequested) {

    if( V_FORM_ASSOC($infoRequested) ) {
        $commentTable = 'comments_'.$infoRequested['forum'];
        $postTable = 'posts_'.$infoRequested['forum'];

        $info = array( 'username' => $infoRequested['username'], 'comment' => $infoRequested['comment'], 'post' => $infoRequested['post'] );
        $this->db->insert($commentTable, $info); // Agrego el comentario
    
        $this->db->select('comments');
        $aux1 = array('slug' => $info['post']);
        $query = $this->db->get_where($postTable, $aux1);
        $result = $query->result_array();  

        if( isset($result[0]) ){
            $aux2 = array('comments' => $result[0]['comments']+1);
            DB_UPDATE($postTable, $aux2); // Le agrego +1 al contador de comentarios de dicho post
            return $result; // Por se necesita acceder a la cantidad de comentarios del post
        } else {
            return false;
        }
    }
}

/*  LO QUE VIENE A PARTIR DE ACÁ ES VIEJO, A REVISAR! */
function getUserToDonate($dbData) {
    // Obtiene el usuario a donar puntos a partir del slug del post
    $this->db->where('slug', $dbData['slug']);
    $this->db->select('author');
    $query = $this->db->get('users');
    $result = $query->result_array();
    return $result[0]['author'];
}

function getClientPoints($dbData) {
    $this->db->where('username', $dbData['username']);
    $this->db->select('points');
    $query = $this->db->get('users');
    $result = $query->result_array();
    return $result[0]['points'];
}

function donatePoints($dbData) { // Main() para donar puntos a un post :D Las fx de arriba son auxiliares
    // $dbData = array($slug, $username, $pointsToDonate);
    $userToDonate = $this->getUserToDonate($dbData);
    $clientPoints = $this->getClientPoints($dbData); // Los puntos del usuario que desea donar
    if( $clientPoints >= $dbData['pointsToDonate'] ) {
        // Ejecuto la SQL para donarle puntos a $userToDonate
    } else {
        // Imprimo error
    }
}

} // Cierre clase