<?php
// MODEL
class Login_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this->load->helper('url'); // Estaba en getUser() y lo mudé acá   
    }

    function getUser($dbData) {
        // Busca el usuario/email/contraseña y chequea si coincide con el formulario
        $this->db->select('username, email, password');
        $this->db->where($dbData);
        $query = $this->db->get('users', $dbData);
        return $query->result_array();
        // Executes: SELECT username, email, password FROM users
    }

    function unsetUser($userData) {
        $this->session->unset_userdata($userData);
    }
}