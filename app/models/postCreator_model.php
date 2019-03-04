<?php
// MODEL
class PostCreator_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this -> load -> helper('url_helper');
        $this -> load -> helper('seoFriendly_helper'); // Evita XSS
        $this -> load -> helper('purify_helper'); // Evita XSS
        $this -> load -> helper('valify_helper'); // Valida relleno de formularios y usuarios
        $this -> load -> helper('db_helper'); // Uso simplificado para el manejo con BDs
        //$this->load->library('encrypt');
    }

    public function isExists($table, $slug) {
        // Comprueba que un post de nombre idéntico exista
        $this->db->where('slug', $slug);
        $this->db->select('slug');
        $query = $this->db->get($table);
        $result = $query->result_array();
        
        if( isset($result[0]['slug']) && $result[0]['slug'] === $slug ) {
            return true; // Existe
        } else {
            return false;
        }
    }

}