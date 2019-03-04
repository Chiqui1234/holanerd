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

    function getUser($dbData) {
        // Busca el usuario/email/contraseña y chequea si coincide con el formulario
        $result = DB_GET('users', $dbData);
        return $result;
        // Executes: SELECT username, email, password FROM users
    }

    function unsetUser($userData) {
        $this->session->unset_userdata($userData);
    }
}