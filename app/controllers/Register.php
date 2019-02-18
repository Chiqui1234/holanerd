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
    
if( $this->input->post('passwd') === $this->input->post('passwdConfirm') && (!empty($this->input->post('passwd'))) ) {
    if( (!empty($this->input->post('email'))) && (!empty($this->input->post('dni'))) ){

        date_default_timezone_set('UTC'); // Zona horaria predeterminada
        $now = date('m/d/Y h:i:s a', time()); // Obtengo la fecha

        $validate_data = array (
            'username' => '',
            'email' => $this->input->post('email'),
            'password' => $this->input->post('passwd'),
            'dni' => $this->input->post('dni'),
            'avatar' => '',
            'points' => 60,
            'created_at' => $now,
            'updated_at' => $now,
            'is_admin' => false,
            'is_confirmed' => false,
            'is_public' => false,
            'is_deleted' => false
        );

        $this->session->set_userdata($sessionData); // Guardo una sesión

        // Tengo que corroborar que ya no exista ese email en la DB, y en vez de pedir el DNI: solicitar una foto
        //$validate_data = encrypt($validate_data);
            // Creo el archivo que validará la cuenta del usuario

            $codeBase = '';

            $validatePage = fopen(base_url().$this->input->post('email').'.php', 'a');
            fwrite($validatePage, $codeBase);
            fclose($validatePage);

            // DATOS PARA ENVIO DE EMAIL
            $emailMessage = '<p>¡Hola! Bienvenido '.$this->input->post('email').', estamos orgullosos de nuestra
            comunidad y siempre trabajamos para mejorarla. ¡Estás a sólo un paso de unirte!</p>
            <p><a href="#">Link aquí</a>.</p>';
            $emailData = array(
                'from' => 'santiagogimenez@outlook.com.ar',
                'to' => $this->input->post('email'),
                'subject' => 'Activá tu cuenta en #holanerd',
                'message' => $emailMessage
            );

        $this->Register_model->createUser($validate_data); // Creo el usuario
        $this->Email_model->sendEmail($emailData); // Envío el email
        $data['error'] = false;
        $data['text'] = '<p>¡Usuario creado! Revisá tu email para validar tu cuenta.</p>';
        $this->load->view('pages/status', $data);

    } else {
        $data['error'] = true;
        $data['text'] = 'Escribí tu email y DNI';
        $this->load->view('pages/status', $data);
    }
} else {
    $data['error'] = true;
    $data['text'] = 'Tus contraseñas no coinciden y/o están vacías';
    $this->load->view('pages/status', $data);
}

} // Cierro función user()


public function group() {
    echo '<div id="page">Registro > Grupo</div>';
}

}