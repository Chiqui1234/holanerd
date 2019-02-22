<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this -> load -> helper('url_helper');
    $this -> load -> model('Login_model');
    $this->load->library('session');
    //$this->load->library('encrypt');
}

public function user() {
    $data['title'] = "Entrar";
    
    $this->load->view('templates/header', $data, FALSE);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');

    $dbData = array(
        'email' => purify($this->input->post('email')),
        'password' => purify($this->input->post('password'))
    );

    $userData = $this->Login_model->getUser($dbData); // Si existe cuenta con ese email y contraseña, devuelve sus datos
    $userInfo = $this->Login_model->getUserInfo($dbData); // Para almacenar nombre de usuario, avatar y otras preferencias

    if( (!empty($userData)) && $userData !== NULL && (!isset($_SESSION['email'])) ) { // Si no tiene cookies, lo logueamos (y creamos cookies)
        
        $sessionData = array(
            'email' => purify($this->input->post('email')), // Lo hago array porque es posible que agregue más cosas a la sesión
            'username' => purify($userInfo[0]['username']),
            'avatar' => purify($userInfo[0]['avatar'])
        );
        
        $this->session->set_userdata($sessionData); // Guardo una sesión

        $data['error'] = false;
        $data['text'] = "Tus credenciales son correctas.";
        $this->load->view("pages/status", $data);
    } else {
        $data['error'] = true;
        $data['text'] = "Tus credenciales son incorrectas.";
        $this->load->view("pages/status", $data);
    }
}

public function logout() {
    $data['title'] = "Salir";
    
    $this->load->view('templates/header', $data, FALSE);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');

        $this -> Login_model -> unsetUser('email');
        $data['error'] = false;
        $data['text'] = "Podés seguir navegando, pero tu sesión se cerró como querías.";
        $this->load->view("pages/status", $data);
}

}