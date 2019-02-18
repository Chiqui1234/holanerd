<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class PostCreator extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this -> load -> helper('url_helper');
    $this -> load -> model('postCreator_model');
    $this->load->library('session');
    //$this->load->library('encrypt');
}

public function view() {
    $data['title'] = 'Crear post';
    $data['headerExtraCode'] = '<link rel="stylesheet" type="text/css" href="'.base_url().'plug-ins/get-content-tools/content-tools.min.css" /><link rel="stylesheet" type="text/css" href="'.base_url().'plug-ins/get-content-tools/content.css" />';

    $this->load->view('templates/header', $data, FALSE);
    $this->load->view('pages/postCreator', $data, FALSE); // Cargo la vista del creador de posts
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');
}

public function create() {
    // Pido el nombre del post, una sinopsis y la portada
    $this->load->helper('form'); // Cargo el creador de formularios

    $data['title'] = 'Un paso más...';
    $this->load->view('templates/header', $data, FALSE);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');

    date_default_timezone_set('UTC'); // Zona horaria predeterminada
    $now = date('m/d/Y h:i:s a'); // Obtengo la fecha

    $postData = array (
        'image' => 'https://wallpaperaccess.com/full/234164.jpg', // Portada por defecto, ¡al menos de momento!
        'time' => $now,
        'author' => $_SESSION['email'],
        'forum' => $this->input->post('forum'),
        'subforum' => $this->input->post('subforum'),
        'points' => 0,
        'title' => $this->input->post('title'),
        'post' => $this->input->post('post')  
    );

    if( (!empty($postData['post'])) || (!empty($postData['title'])) || (!empty($postData['image'])) ){ // Si esos campos contienen información (osea, no están vacíos)
        $this -> postCreator_model -> addPost($postData); // Agrega el post
        $data['error'] = false;
        $data['text'] = "<p>¡Bien! Ya subiste tu aporte.</p>";
        $data['title'] = 'Crear Post / Un paso más...'; // En caso de error o éxito, se pone un título más específico, sino "Un paso más" como nombre de pestaña queda medio colgado
        $this->load->view('pages/status', $data); // Imprimo el éxito :v
    } else {
        $data['error'] = true;
        $data['text'] = "<p>El título o el post están vacíos.</p>";
        $data['title'] = 'Crear Post / Un paso más...'; // En caso de error o éxito, se pone un título más específico, sino "Un paso más" como nombre de pestaña queda medio colgado
        $this->load->view('pages/status', $data);
        
    }

    
}

}