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
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password')
    );

    $userData = $this->Login_model->getUser($dbData); // Recopilo en un array() la información del usuario, si existe

    if( (!empty($userData)) && $userData !== NULL && (!isset($_SESSION['email'])) ) { // Si no tiene cookies, lo logueamos (y creamos cookies)
        $sessionData = array(
            'email' => $this->input->post('email'), // Lo hago array porque es posible que agregue más cosas a la sesión
            'username' => $userData[0]['username']
        );
        
        //if( (!isset($_SESSION['email'])) || $_SESSION['email'] === NULL ) {
            $this->session->set_userdata($sessionData); // Guardo una sesión
        //}

        $data['error'] = false;
        $data['text'] = "Tus credenciales son correctas.";
        //print_r($this->Login_model->getUser($dbData));
        $this->load->view("pages/status", $data);
    } else{
        $data['error'] = true;
        $data['text'] = "Tus credenciales son incorrectas.";
        //echo $data['text'];
        //print_r($this->Login_model->getUser($dbData));
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