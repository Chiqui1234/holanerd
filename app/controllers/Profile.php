<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this -> load -> helper('url_helper');
    $this -> load -> model('Profile_model');
    $this->load->library('session');
    //$this->load->library('encrypt');
}

public function view() {
    $data['title'] = "Perfil";

    $this->load->view('templates/header', $data, FALSE);
    $this->load->view('templates/footer');

    /*  IMPORTO EL TEMPLATE DEL PERFIL SEGUN CORRESPONDA */
    if( $this->Profile_model->isConfirmed() ) { // Si la cuenta está confirmada
        // Importo el perfil
        $this->load->view('templates/profile');
    } else { // Sino... te notifico :D
        $data['error'] = true;
        $data['text'] = "<p>Tu cuenta no existe o todavía no fue activada. Si acabás de crearla, revisá tu email.</p>

        <p>Buscá el correo en tu casilla de <strong>No deseados</strong>.</p>";
        $this->load->view('templates/header', $data, FALSE);
        $this->load->view('templates/sidebar');
        $this -> load -> view('pages/status', $data);
    }
    
}

}