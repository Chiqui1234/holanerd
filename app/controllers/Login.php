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

    $dbData = array( // Capto la entrada del usuario
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password')
    );

    $userData = $this->Login_model->getUser($dbData); // Obtengo el usuario

    $v_session = V_SESSION();
    if( !$v_session && isset($userData[0]) ) { // Si no tiene sesión activa y si $userData está seteado es porque encontró el usuario
            $sessionData = array( // Preparo el array para crear las cookies después
                'email' => $dbData['email'],
                'username' => $userData[0]['username'],
                'avatar' => $userData[0]['avatar'],
                'background' => $userData[0]['background'],
                'less' => $userData[0]['less']
            );
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