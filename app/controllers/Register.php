<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this -> load -> helper('url_helper');
    $this -> load -> model('Register_model');
    $this -> load -> model('Email_model');
    //$this->load->library('encrypt');
}

function encrypt(array $data) {
    return $this->encrypt->encode($data);
}

function decrypt(array $data) {
    return $this->encrypt->decode($data);
}

public function view() {
    $data['title'] = 'Registro';
    $this->load->view('templates/header', $data, FALSE);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');
    $this -> load -> view('pages/register', $data);
}

public function user() {
    $data['title'] = 'Registrar usuario';

    $this->load->view('templates/header', $data, FALSE);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');
    
    date_default_timezone_set('UTC'); // Zona horaria predeterminada
    $now = purify(date('d/m/Y')); // Obtengo la fecha

    // Capto variables del formulario. Este array va a comprobación
    $catch_data = array(
        'username' => purify($this->input->post('username')),
        'email' => purify($this->input->post('email')),
        'password' => purify($this->input->post('passwd')),
        'passwdConfirm' => purify($this->input->post('passwdConfirm')),
        'dni' => purify($this->input->post('dni'))
    );
    
    // Array preparado para la BD
    $validate_data = array (
        'username' => $catch_data['username'],
        'email' => $catch_data['email'],
        'password' => $catch_data['password'],
        'dni' => $catch_data['dni'],
        'avatar' => '',
        'points' => 60,
        'created_at' => $now,
        'is_admin' => false,
        'is_confirmed' => true,
        'is_public' => false,
        'is_deleted' => false
    );

    if( $this->Register_model->checkUser($catch_data) ) {

        $this->session->set_userdata('email', $validate_data['email']); // Guardo una sesión

        // DATOS PARA ENVIO DE EMAIL
        $emailData = array(
            'from' => 'santiagogimenez@outlook.com.ar',
            'to' => $this->input->post('email'),
            'subject' => 'Activá tu cuenta en #holanerd',
            'message' => '<p>¡Hola! Bienvenido '.$validate_data['email'].', estamos orgullosos de nuestra
            comunidad y siempre trabajamos para mejorarla. ¡Estás a sólo un paso de unirte!</p>
            <p><a href="#">Link aquí</a>.</p>'
        );

        /*if( !$this->Email_model->sendEmail($emailData) ) { // Envía el email para solicitar activación
            $data['error'] = true;
            $data['text'] = '<p>No pudimos enviarte un email, no podrás activar tu cuenta.</p>';
            $this->load->view('pages/status', $data);
        }*/

        //$this->Email_model->activationPage($emailData); // Crea el archivo para activar tu cuenta

        $this->Register_model->createUser($validate_data); // Creo el usuario
        //$this->Email_model->sendEmail($emailData); // Envío el email
        $data['successText'] = '<p>¡Usuario creado! Revisá tu email para validar tu cuenta.</p>';
        $this->load->view('status/success', $data);
} else {
    $data['errorText'] = '<p>Existe otra cuenta con tu nombre de usuario, email o dni; O bien, olvidaste <strong>rellenar todo el formulario</strong>.</p>';
    $this->load->view('status/error', $data);
}

} // Cierro función user()


public function group() {
    echo '<div id="page">Registro > Grupo</div>';
}

}