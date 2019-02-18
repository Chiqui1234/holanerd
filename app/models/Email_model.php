<?php
class Email_model extends CI_Model {

    public function __construct() {
        //$this->load->database();
    }

    function sendEmail(array $emailData) {
        $this->email->from($emailData['from'], 'Identification');
        $this->email->to($emailData['to']);
        $this->email->subject($emailData['subject']);
        $this->email->message($emailData['message']);
        return $this->email->send(); // Envía el email y arroja VERDADERO si puede enviar el correo
    }
}