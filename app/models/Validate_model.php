<?php
// MODEL
class Validate_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function validateSession() {
    // Comprueba que exista una sesión y luego, si la cuenta fue validada
        if( isset($_SESSION['email']) ) {
            // Get user
            $this->db->where('email', $_SESSION['email']);
            $this->db->select('is_confirmed');
            $query = $this->db->get('users');
            $result = $query->result_array();
            if( $result[0]['is_confirmed'] == 1 ) {
                return true;
            } else {
                return false;
            }
        } else { // Si no hay sesión... ¿cómo compruebo que está confirmada? Entonces FALSE
            return false;
        }
    }

    function validateNow($email) {
        // Con esta función valido la cuenta en cuestión
        $dataToReplace = array(
            'is_confirmed' => 1
        );

        $this->db->where('email', $email); // WHERE 'email' = $email
        $this->db->select('is_confirmed'); // SELECT 'is_confirmed'
        $this->db->replace('users', $dataToReplace); // REPLACE INTO 'users' $dataToReplace WHERE [...] AND SELECT [...]
    }
}