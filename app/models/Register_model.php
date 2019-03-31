<?php
// MODEL
class Register_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this -> load -> helper('purify_helper');
    }

    public function userAvailable($username) {
        $dbData = array(
            'username' => $username,
        );
        $this->db->where($dbData); // Obtené todos los registros con idéntico usuario, email y dni
        $result = $this->db->get('users');
        $result = $result->result_array();
        if( isset($result[0]) ) {
            return false; // Este usuario NO está disponible, porque el usuario ya está en uso
        } else {
            return true;
        }
    }

    public function checkUser(array $catch_data) { // Algo así como la función "main"
        // Verifica que el usuario que se está por crear es válido
        
        if( $catch_data['password'] === $catch_data['passwdConfirm'] && $catch_data['password'] !== NULL ) { // Hace comprobaciones de completado y ortografía
            // Si 'passwd' es igual a su confirmación y a su vez 'passwd' contiene dato, seguir
            if( $this->userAvailable($catch_data) ) { // Si el usuario, email y dni no existen en la BD, ¡está disponible! Devuelvo TRUE
                return true;
            } else {
                // Si el usuario no está disponible, devuelvo false
                return false;
            }
        } else {
            return false;
        }
    }

    public function createUser($dbData) {
        // Create user
        $this->load->helper('url');
        return $this->db->insert('users', $dbData);
    }

}