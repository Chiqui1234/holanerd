<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this -> load -> helper('url_helper');
    $this -> load -> model('Validate_model');
    //$this->load->library('encrypt');
}

public function view() {
    $data['title'] = "Validar cuenta";
    $data['email'] = $email = $_SESSION['email'];

    $this->load->view('templates/header', $data, FALSE);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');

    $validationStatus = $this -> Validate_model -> validator($email);

    if($validationStatus) {
        $this -> load -> view(base_url().'user/validate', $data);
    } else {
        $this -> load -> view(base_url().'pages/status', $data);
    }
}