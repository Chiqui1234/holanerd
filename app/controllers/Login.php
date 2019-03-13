<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this -> load -> helper('url_helper');
    $this -> load -> model('Login_model');
    $this->load->database();
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
                'color1' => $userData[0]['color1'],
                'color2' => $userData[0]['color2'],
                'created_at' => $userData[0]['created_at'],
                'is_public' => $userData[0]['is_public'],
                'git' => $userData[0]['git'],
                'linkedin' => $userData[0]['linkedin'],
                'web' => $userData[0]['web'],
                'less' => $userData[0]['less']
            );
            $this->session->set_userdata($sessionData); // Guardo una sesión

            $data['successText'] = "Tus credenciales son correctas.";
            $this->load->view("status/success", $data);
    } else {
            $data['errorText'] = "Tus credenciales son incorrectas <strong>o tu cuenta no está confirmada</strong>. ¿Revisaste tu email? Tendría que llegarte un enlace para activar tu cuenta.";
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