<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class PostCreator extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this -> load -> helper('url_helper');
    $this -> load -> helper('purify_helper');
    $this -> load -> model('postCreator_model');
    $this -> load -> model('Validate_model');
    $this->load->library('session');
    //$this->load->library('encrypt');
}

public function view() {
    $data['title'] = 'Crear post';
    $data['headerExtraCode'] = '<link rel="stylesheet" type="text/css" href="'.base_url().'plug-ins/get-content-tools/content-tools.min.css" /><link rel="stylesheet" type="text/css" href="'.base_url().'plug-ins/get-content-tools/content.css" />';
    $this->load->view('templates/header', $data, FALSE);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');

    if( $this->Validate_model->validateSession() ) { // Si la cuenta es válida y existe
        $this->load->view('templates/postCreator', $data, FALSE); // Cargo la vista del creador de posts
    } else {
        $data['error'] = true;
        $data['text'] = "<p>Para crear un post, iniciá sesión.</p>";
        $this -> load -> view('pages/status', $data);
    }
    
}

public function create() {
    // Pido el nombre del post, una sinopsis y la portada
    $this->load->helper('form'); // Cargo el creador de formularios

    $data['title'] = 'Un paso más...';
    $this->load->view('templates/header', $data, FALSE);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');

    

    $title = $this->input->post('title');
    $slug = $this->postCreator_model->slugish($title);

    $postData = array (
        'image' => 'https://wallpaperaccess.com/full/234164.jpg', // Portada por defecto, ¡al menos de momento!
        'time' => purify($now),
        'author' => purify($_SESSION['username']),
        'forum' => purify($this->input->post('forum')),
        'subforum' => purify($this->input->post('subforum')),
        'points' => 0,
        'title' => purify($title),
        'slug' => purify($slug),
        'post' => removeScripting($this->input->post('post'))  
    );

    if( (!empty($postData['post'])) || (!empty($postData['title'])) || (!empty($postData['image'])) ){ // Si esos campos contienen información (osea, no están vacíos)
        if( !$this->postCreator_model->isExists($slug) ) { // Si el nombre del post no existe
            $this->postCreator_model->addPost($postData); // Agrega el post
            
            
            $forumToRefresh = $this->postCreator_model->getForumToRefresh($postData['forum']); // Obtengo el foro a actualizar y su contador
            $this->postCreator_model->refreshForumInfo($postData, $forumToRefresh); // Actualiza la información del foro
            
            $data['error'] = false;
            $data['text'] = "<p>¡Bien! Ya subiste tu aporte.</p>";
            $data['title'] = 'Post creado'; // En caso de error o éxito, se pone un título más específico, sino "Un paso más" como nombre de pestaña queda medio colgado
            $this->load->view('pages/status', $data); // Imprimo el éxito :v
        } else { // Si el nombre del post ya existía
            $data['error'] = true;
            $data['text'] = "<p>Cambiá el nombre de tu post, porque ya existe uno con el mismo título</p>";
            $data['title'] = 'Crear Post / Un paso más...';
            $this->load->view('pages/status', $data); // Imprimo el error
        }
    } else {
        $data['error'] = true;
        $data['text'] = "<p>El título o el post están vacíos.</p>";
        $data['title'] = 'Crear Post, Error'; // En caso de error o éxito, se pone un título más específico, sino "Un paso más" como nombre de pestaña queda medio colgado
        $this->load->view('pages/status', $data);
        
    }

    
}

}