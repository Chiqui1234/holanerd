<?php
// CONTROLLER
class Email extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Email_model');
    }

    public function view() {
        // Por si queremos enviar un email desde el servidor
        // ...
    }

    function caller(array $emailData) {
        /*  'emailData' may contain "from", "to", "subject" and "message" values.
            'emailData' is an Array()   */
        
        $finish = $this -> Email_model -> sendEmail($emailData);

        if($finish) {
            //$this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
            $data['error'] = false;
            $data['text'] = "Email enviado.";
            $this->load->view("pages/status", $data);
        } else {
            $data['error'] = true;
            $data['text'] = "El email no pudo enviarse, intenta en otro momento.";
            $this->load->view("pages/status", $data);
        }
    }

}