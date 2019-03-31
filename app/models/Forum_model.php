<?php
class Forum_model extends CI_Model {

public function __construct() {
        $this->load->database();
}

public function getForums() { // Obtiene todos los foros disponibles
    return DB_GET_SIMPLE('forums');
}

}