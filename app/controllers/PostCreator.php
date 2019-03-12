<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class PostCreator extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this -> load -> helper('url_helper');
    $this -> load -> model('PostCreator_model');
}

function index() {
    $sessionExists = V_SESSION();
    $sessionConfirmed = V_CONFUSER();

        $data['title'] = 'Crear post';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');

    if( V_SESSION() && V_CONFUSER() ) { // Si existe una sesión y el usuario está confirmado
        $this->load->view('templates/postCreator.php'); // Importo la vista del creador de posts
    } else {
        $data['errorStatus'] = true;
        $data['errorText'] = '<p>Tu cuenta no existe o no está confirmada, ¿revisaste tu email?</p>';
        $this->load->view('status/error', $data);
    }
    
}

function create() {
    $data['title'] = 'Crear post';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');

    // Tomo los datos del post que me sirven para ubicarme en la tabla correcta de la BD
    $positionData = array(
        'forum' => $this->input->post('forum'),
    );

    // Tomo los datos del post que irán a la BD
    $postData = array(
        // id se auto-genera en la Query SQL
        'slug' =>  slugify($this->input->post('title')),
        'author' => purify($_SESSION['username']), // Se obtiene el usuario que creó el post
        'date' => V_TIME(),
        // Los puntos son cero por defecto
        'image' => $this->input->post('image'),
        'title' => $this->input->post('title'),
        'content' => $this->input->post('post'),
        'subforum' => $this->input->post('subforum'),
        // Los comentarios son cero por defecto
        'is_approved' => 1 // Por ahora, no vamos a coartar la libertad de nadie (se aprueba por defecto) :P
    );

    $table = 'posts_'.$positionData['forum']; // Establezco a que tabla va el post (el nombre de la tabla tiene el prefijo "posts_")

    $is_valid = V_FORM_ASSOC($postData); // Paso el array asociativo a la función y, si todos los índices tienen contenido...

    if( $is_valid ) { // ... le damos para adelante
        
        if( !$this->PostCreator_model->isExists($table, $postData['slug']) && DB_POST($table, $postData) ) {
            $data['successText'] = 'Ya podés ver tu post <a href="'.base_url().'Post/index/'.$positionData['forum'].'/'.$postData['subforum'].'/'.$postData['slug'].'">acá</a>.';
            $data['title'] = 'Post publicado';
            $this->load->view('status/success', $data);
        } else{
            $data['errorText'] = 'No pudimos crear tu post. ¡Probá en unos minutos! Quizá exista un post con el mismo nombre que el tuyo. Eso no está permitido en Holanerd.';
            $data['title'] = 'Error';
            $this->load->view('status/error', $data);
        }
        
    } else {
        $data['errorText'] = '¡Hey! Volvé atrás y rellená todos los campos para crear el post.';
        $data['title'] = 'Error';
        $this->load->view('status/error', $data);
    }

}

}