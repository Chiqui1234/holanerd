<?php
// MODEL
class Login_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this->load->helper('url'); // Estaba en getUser() y lo mudé acá   
        $this -> load -> helper('purify_helper');
    }

    function getUser($dbData) {
        // Busca el usuario/email/contraseña y chequea si coincide con el formulario
        $this->db->select('email, password');
        $this->db->where($dbData);
        $query = $this->db->get('users', $dbData);
        return $query->result_array();
        // Executes: SELECT username, email, password FROM users
    }

    function getUserInfo($dbData) {
        // Esta función toma información del usuario. La idea es que se use sólo cuándo no hay info en las cookies
        $this->db->where('email', $dbData['email']); // WHERE email '$_SESSION'
        $this->db->select('username, email, avatar');
        $query = $this->db->get('users');
        $result = $query->result_array();
        return $result;
    }

    function getUserColors($data) {
        // Tomará los colores del usuario
        $this->db->where('email', $data['email']);
        $this->db->select('color1, color2');
        $query = $this->db->get('users');
        return $query->result_array();
    }

    function getUserBackground($data) {
        // Tomará el fondo del usuario
        $this->db->where('email', $data['email']);
        $this->db->select('background');
        $query = $this->db->get('users');
        return $query->result_array();
    }

    function unsetUser($userData) {
        $this->session->unset_userdata($userData);
    }
}