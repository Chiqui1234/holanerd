<?php
// MODEL
class Profile_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    function isConfirmed() {
        // Chequea si el usuario tiene la cuenta confirmada
        if( !isset($_SESSION['email']) ) {
            return false;
        } else {
        //$search = array('email', $_SESSION['email']);
        $this->db->where('email', $_SESSION['email']); // WHERE email = '$_SESSION'
        $this->db->select('is_confirmed');
        $query = $this->db->get('users');
        $result = $query->result_array();
        return true;
        // Executes: SELECT title, content, date FROM mytable
        }
    }

    function getUserPosts() {
        
        //$this->db->select('author');
        $this->db->where('author', $_SESSION['email']); // WHERE email = '$_SESSION'
        $query = $this->db->get('posts');
        $result = $query->result_array();
        return $result;
    }

}