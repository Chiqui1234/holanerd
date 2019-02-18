<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class About extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this -> load -> helper('url_helper');
}

public function view() {
    $data['title'] = "#holanerd | Acerca de";
    
    $this->load->view('templates/header', $data, FALSE);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');

    $this->load->view('pages/about', $data);
}

}