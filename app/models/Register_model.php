<?php
// MODEL
class Register_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function createUser($dbData) {
        // Create user
        $this->load->helper('url');
        return $this->db->insert('users', $dbData);
    }
}