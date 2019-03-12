<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->database();
}

public function index() {
    $data['title'] = "Inicio";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/home');
    $this->load->view('templates/footer');
}

} // Cierre de la clase