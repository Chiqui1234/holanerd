<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this -> load -> helper('url_helper');
    $this -> load -> model('Profile_model');
    //$this->load->library('encrypt');
}

public function index() {
    $data['title'] = "Perfil";
    $this->load->view('templates/header', $data, FALSE);
    $this->load->view('templates/footer');
    /*  IMPORTO EL TEMPLATE DEL PERFIL SEGUN CORRESPONDA */
    if( V_SESSION() && V_CONFUSER() ) { // Si la cuenta está confirmada y hay sesión
        $data['computacion'] = $this->Profile_model->getPosts('computacion', $_SESSION['username']);       /* Ahora hago un getPost() por cada foro existente, */
        $data['programacion'] = $this->Profile_model->getPosts('programacion', $_SESSION['username']);     /* pero próximamente tengo que usar una columna     */
        $data['disenoGrafico'] = $this->Profile_model->getPosts('disenoGrafico', $_SESSION['username']);   /* del perfil dónde almacene, separado por comas,   */
        $data['emprenderismo'] = $this->Profile_model->getPosts('emprenderismo', $_SESSION['username']);   /* los foros en los que el usuario creó posts.      */
        $data['universidades'] = $this->Profile_model->getPosts('universidades', $_SESSION['username']);   /* Porque por ejemplo, si un usuario sólo crea      */
        $data['retro'] = $this->Profile_model->getPosts('retro', $_SESSION['username']);                   /* posts en 'computacion' y yo le pido a MySQL los  */
        $data['off_topic'] = $this->Profile_model->getPosts('off_topic', $_SESSION['username']);           /* posts de todos los foros... es al dope           */
        $data['profile'] = $this->Profile_model->getInfo($_SESSION['username']);
        
        $this->load->view('templates/profile', $data); // Importo el perfil
    } else { // Sino... te notifico :D
        $data['errorText'] = 'Tu cuenta no existe o todavía no fue activada. Si acabás de crearla, revisá tu email.';
        $this->load->view('status/error', $data);
    }
    
}

public function search($userToSearch) {
    echo $userToSearch;
}

}