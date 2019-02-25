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

public function view($email) {
    // Para validar la cuenta. Recibirá por parámetro el usuario a validar
    $data['title'] = "Validar cuenta";
    //$data['email'] = $email = $_SESSION['email'];

    $this->load->view('templates/header', $data, FALSE);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');

    $validationStatus = $this -> Validate_model -> validateSession(); // Comprueba que exista una sesión y luego, si la cuenta fue validada

    if($validationStatus) { // Si la cuenta fue validada
        $data['error'] = false;
        $data['text'] = '<p>Tu cuenta ya había sido validada, ¡sólo resta disfrutar de la comunidad!';
        $this -> load -> view('pages/status', $data);
    } else {
        $data['error'] = false;
        $data['text'] = '<p>Acabamos de validar tu cuenta, ¡sólo resta disfrutar de la comunidad!';
        $this->Validate_model->validateNow($email);
        $this -> load -> view('pages/status', $data);
    }
}