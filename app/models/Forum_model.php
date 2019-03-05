<?php
class Forum_model extends CI_Model {

public function __construct() {
        $this->load->database();
}

public function getForums() { // Obtiene todos los foros disponibles
    return $this->db->get('forums')->result_array();
}

/**/

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

}