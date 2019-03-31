<?php
// MODEL
class Login_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this->load->helper('url'); // Estaba en getUser() y lo mudé acá   
        $this -> load -> helper('purify_helper'); // Evita XSS
        $this -> load -> helper('valify_helper'); // Valida relleno de formularios y usuarios
        $this -> load -> helper('db_helper'); // Uso simplificado para el manejo con BDs
    }

    function unsetUser() {
        $userData = array(
            '__ci_last_regenerate',
            'email', 'username', 'password', 'avatar',
            'color1', 'color2',
            'dni', 'created_at', 'is_public', 'is_admin',
            'is_confirmed', 'is_deleted',
            'points', 'git', 'linkedin', 'web',
            'less'
        );
        $this->session->unset_userdata($userData);
    }
}