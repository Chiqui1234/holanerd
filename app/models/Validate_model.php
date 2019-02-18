<?php
// MODEL
class Register_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function validator($email) {
        // Get user
        $this->db->select('is_confirmed');
        $this->db->where('email', $_SESSION['email']);
        $query = $this->db->get('users', $dbData);
        return $query->result_array();
        // No hay que usar get, hay que usar set, para cambiar is_confirmed a TRUE!
    }
}