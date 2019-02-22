<?php
class Email_model extends CI_Model {

    public function __construct() {
        //$this->load->database();
        $this->load->library('email');
    }

    function sendEmail(array $emailData) {
        $this->email->from($emailData['from'], 'Identification');
        $this->email->to($emailData['to']);
        $this->email->subject($emailData['subject']);
        $this->email->message($emailData['message']);
        return $this->email->send(); // Envía el email y arroja VERDADERO si puede enviar el correo
    }

    public function activationPage(array $emailData) {
        // Creo la página de activación de la cuenta
        // zzz...
    }
}