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

    $userData = $this->Login_model->getUser($dbData); // Obtengo el usuario

    $sessionData = array( // Preparo el array para crear las cookies después
        'email' => $dbData['email'],
        'username' => purify($userData[0]['username']),
        'avatar' => purify($userData[0]['avatar']),
        'background' => purify($userData[0]['background']),
        'less' => purify($userData[0]['less'])
    );

    if( !V_SESSION() && V_LEGIT($dbData['email'], $userData[0]['email']) ) { // Si no tiene sesión activa y V_LEGIT comprueba que el email digitado por el usuario es igual al de la BD, le damos para adelante
        
        
        
        $this->session->set_userdata($sessionData); // Guardo una sesión

        $data['successText'] = "Tus credenciales son correctas.";
        $this->load->view("status/success", $data);
    } else {
        $data['errorText'] = "Tus credenciales son incorrectas.";
        $this->load->view("status/error", $data);
    }

}

public function logout() {
    $data['title'] = "Salir";
    
    $this->load->view('templates/header', $data, FALSE);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');

        $this -> Login_model -> unsetUser('email');
        $data['successText'] = "Podés seguir navegando, pero tu sesión se cerró como querías.";
        $this->load->view("status/success", $data);
}

}