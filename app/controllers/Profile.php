<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this -> load -> helper('url_helper');
    $this -> load -> model('Profile_model');
    $this -> load -> model('Validate_model');
    $this->load->library('session');
    //$this->load->library('encrypt');
}

public function view() {
    $data['title'] = "Perfil";

    $this->load->view('templates/header', $data, FALSE);
    $this->load->view('templates/footer');

    /*  IMPORTO EL TEMPLATE DEL PERFIL SEGUN CORRESPONDA */
    if( V_SESSION() && V_CONFUSER() ) { // Si la cuenta está confirmada y hay sesión
        $this->load->view('templates/profile'); // Importo el perfil
    } else { // Sino... te notifico :D
        $this->load->view('templates/header', $data, FALSE);
        $this->load->view('templates/sidebar');
        
        $data['errorText'] = 'Tu cuenta no existe o todavía no fue activada. Si acabás de crearla, revisá tu email.';
        $this->load->view('status/error', $data);
    }
    
}

public function search($userToSearch) {
    echo $userToSearch;
}

}