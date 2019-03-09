<?php
// MODEL
class Profile_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this -> load -> helper('url_helper');
        $this -> load -> helper('purify_helper'); // Evita XSS
        $this -> load -> helper('valify_helper'); // Valida relleno de formularios y usuarios
        $this -> load -> helper('db_helper'); // Uso simplificado para el manejo con BDs
        //$this->load->library('encrypt');
    }

    // getUserInfo en Login_model.php
    function getPosts($table, $user) {
        $where = array(
            'author' => $user
        );
        return DB_GET('posts_'.$table, $where);
    }

    public function getInfo($user) {
        $this->db->select('points, color1, color2, background, avatar, git, linkedin, web, created_at, is_admin');
        $where = array('username' => $user);
        $query = $this->db->get_where('users');
        $result = $query->result_array();
    }
} // Cierre de la clase