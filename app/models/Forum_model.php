<?php
class Forum_model extends CI_Model {

public function __construct() {
        $this->load->database();
}

public function getForums() { // Obtiene todos los foros disponibles
    return $this->db->get('forums')->result_array();
}

}