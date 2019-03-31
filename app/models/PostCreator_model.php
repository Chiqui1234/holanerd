<?php
// MODEL
class PostCreator_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this -> load -> helper('url_helper');
    }

    public function isExists($table, $slug) {
        // Comprueba que un post de nombre idéntico exista
        $prepSlug = array(
            'slug' => $slug
        );
        $result = DB_GET($table, $prepSlug);
        if( isset($result[0]['slug']) && $result[0]['slug'] === $slug ) { // Si existe, devuelve true
            return true;
        } else {
            return false;
        }
    }

    public function updateTopicCounter($forumSlug) {
        $whereTopicCounter = array('slug' => $forumSlug);
        $query = $this->db->get_where('forums', $whereTopicCounter);
        $result = $query->result_array();
        $info = array(
            'topicCounter' => $result[0]['topicCounter']+1
        );
        DB_UPDATE('forums', $info, $whereTopicCounter);
    }

}