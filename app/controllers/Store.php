<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class Store extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this -> load -> helper('url_helper');
}

public function index() {
    $data['title'] = "Tienda";
    
    $this->load->view('templates/header', $data, FALSE);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');

    $this->load->view('templates/store', $data);
}

}