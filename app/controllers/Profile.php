<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this -> load -> helper('url_helper');
    $this->load->helper('cookie');
    $this -> load -> model('Profile_model');
    //$this->load->library('encrypt');
}

public function index() {
    $data['title'] = "Perfil";
    $this->load->view('templates/header', $data, FALSE);
    /*  IMPORTO EL TEMPLATE DEL PERFIL SEGUN CORRESPONDA */
    if( V_SESSION() && V_CONFUSER() ) { // Si la cuenta está confirmada y hay sesión
        $data['computacion'] = $this->Profile_model->getPosts('computacion', $_SESSION['username']);        /* Ahora hago un getPost() por cada foro existente, */
        $data['programacion'] = $this->Profile_model->getPosts('programacion', $_SESSION['username']);      /* pero próximamente tengo que usar una columna     */
        $data['disenografico'] = $this->Profile_model->getPosts('disenoGrafico', $_SESSION['username']);    /* del perfil dónde almacene, separado por comas,   */
        $data['audio'] = $this->Profile_model->getPosts('audio', $_SESSION['username']);                    /* los foros en los que el usuario creó posts.      */
        $data['video'] = $this->Profile_model->getPosts('video', $_SESSION['username']);                    /* Porque por ejemplo, si un usuario sólo crea      */
        $data['emprenderismo'] = $this->Profile_model->getPosts('emprenderismo', $_SESSION['username']);    /* posts en 'computacion' y yo le pido a MySQL los  */
        $data['universidades'] = $this->Profile_model->getPosts('universidades', $_SESSION['username']);    /* posts de todos los foros... es al dope           */
        $data['retro'] = $this->Profile_model->getPosts('retro', $_SESSION['username']);                   
        $data['off_topic'] = $this->Profile_model->getPosts('off_topic', $_SESSION['username']);           
        $data['profile'] = $this->Profile_model->getInfo($_SESSION['username']);

        $this->load->view('templates/profile', $data); // Importo el perfil
        $this->load->view('templates/sidebarForProfile', $data); // Importo la sidebar con su bio
    } else { // Sino... te notifico :D
        $data['errorText'] = 'Tu cuenta no existe o todavía no fue activada. Si acabás de crearla, revisá tu email.';
        $this->load->view('status/error', $data);
    }
    $this->load->view('templates/footer');
}

public function visual() {
    // Edita la estética del perfil
    $info = array(
        'avatar' => $_REQUEST['a'],
        'color1' => $_REQUEST['b'],
        'color2' => $_REQUEST['c']
    );
    
    $sessionData = array( // Preparo el array para crear las cookies después
        'email' => $_SESSION['email'],
        'username' => $_SESSION['username'],
        'avatar' => $info['avatar'],
        'color1' => $info['color1'],
        'color2' => $info['color2'],
        'created_at' => $_SESSION['created_at'],
        'is_public' => $_SESSION['is_public'],
        'git' => $_SESSION['git'],
        'linkedin' => $_SESSION['linkedin'],
        'web' => $_SESSION['web'],
        'less' => $_SESSION['less']
    );
    $this->session->set_userdata($sessionData); // Guardo una sesión
    $this->Profile_model->updateInfo($info);
    return true;
}

public function redes() {
    // Edita las redes del perfil
    $info = array(
        'git' => $_REQUEST['a'],
        'linkedin' => $_REQUEST['b'],
        'web' => $_REQUEST['c']
    );
    
    $sessionData = array( // Preparo el array para crear las cookies después
        'email' => $_SESSION['email'],
        'username' => $_SESSION['username'],
        'avatar' => $_SESSION['avatar'],
        'color1' => $_SESSION['color1'],
        'color2' => $_SESSION['color2'],
        'created_at' => $_SESSION['created_at'],
        'is_public' => $_SESSION['is_public'],
        'git' => $info['git'],
        'linkedin' => $info['linkedin'],
        'web' => $info['web'],
        'less' => $_SESSION['less']
    );
    $this->session->set_userdata($sessionData); // Guardo una sesión
    $this->Profile_model->updateInfo($info);
    return true;
}

public function privacidad() {
    // Edita la privacidad del perfil
    $info = array(
        'is_public' => $_REQUEST['b'],
        'less' => $_REQUEST['a']
    );
    
    $sessionData = array( // Preparo el array para crear las cookies después
        'email' => $_SESSION['email'],
        'username' => $_SESSION['username'],
        'avatar' => $_SESSION['avatar'],
        'color1' => $_SESSION['color1'],
        'color2' => $_SESSION['color2'],
        'created_at' => $_SESSION['created_at'],
        'is_public' => $info['is_public'],
        'git' => $_SESSION['git'],
        'linkedin' => $info['linkedin'],
        'web' => $info['web'],
        'less' => $info['less']
    );
    $this->session->set_userdata($sessionData); // Guardo una sesión
    $this->Profile_model->updateInfo($info);
    return true;
}

public function search($userToSearch) {
    echo $userToSearch;
}

}

/*public function visual() {
    // Edita la estética del perfil
    $info = array(
        'avatar' => $_REQUEST['avatar'],
        'color1' => $_REQUEST['color1'],
        'color2' => $_REQUEST['color2']
    );
    updateInfo($info);
    set_cookie('avatar', $_REQUEST['avatar']);
    set_cookie('color1', $_REQUEST['color1']);
    set_cookie('color2', $_REQUEST['color2']);
    return true;
}

public function redes() {
    // Edita las redes del perfil
    $info = array(
        'git' => $_REQUEST['git'],
        'linkedin' => $_REQUEST['linkedin'],
        'web' => $_REQUEST['web']
    );
    updateInfo($info);
    set_cookie('git', $_REQUEST['git']);
    set_cookie('linkedin', $_REQUEST['linkedin']);
    set_cookie('web', $_REQUEST['web']);
    return true;
}

public function privacidad() {
    // Edita la privacidad del perfil
    $info = array(
        'is_public' => $_REQUEST['public']
    );
    updateInfo($info);
    set_cookie('is_public', $_REQUEST['public']);
    return true;
}
*/