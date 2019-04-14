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
        'forum' => $this->input->post('forumNameInput'),
    );

    // Tomo los datos del post que irán a la BD
    $postData = array(
        // id se auto-genera en la Query SQL
        'slug' =>  slugify($this->input->post('title')),
        'author' => $_SESSION['username'], // Se obtiene el usuario que creó el post
        'date' => V_TIME(),
        // Los puntos son cero por defecto
        'image' => $this->input->post('image'),
        'title' => $this->input->post('title'),
        'content' => $this->input->post('post'),
        'subforum' => $this->input->post('subforumNameInput'),
        // Los comentarios son cero por defecto
        'is_approved' => 1 // Por ahora, no vamos a coartar la libertad de nadie (se aprueba por defecto) :P
    );

    /*if( !empty($postData['image']) ) {
        $postData['image'] = 'https://adrianalonso.es/wp-content/uploads/2017/05/code.jpg'; // Imágen dummie :P
    }*/
    $table = 'posts_'.$positionData['forum']; // Establezco a que tabla va el post (el nombre de la tabla tiene el prefijo "posts_")

    $is_valid = V_FORM_ASSOC($postData); // Paso el array asociativo a la función y, si todos los índices tienen contenido...
    $is_legit = $this->PostCreator_model->checkPositionData($positionData['forum'], $postData['subforum']); // Comprueba que el foro y subforo existan
    if( $is_valid && $is_legit ) { // ... le damos para adelante
        
        if( !$this->PostCreator_model->isExists($table, $postData['slug']) && DB_POST($table, $postData) ) {
            $this->PostCreator_model->updateTopicCounter($positionData['forum']); // Agrego +1 a topicCounter
            $data['successText'] = 'Ya podés ver tu post <a href="'.base_url().'Post/index/'.$positionData['forum'].'/'.$postData['subforum'].'/'.$postData['slug'].'">acá</a>.';
            $data['title'] = 'Post publicado';
            $this->load->view('status/success', $data);
        } else{
            if(!$is_legit) {
                $data['errorText'] = 'El foro y subforo que indicaste no existen.';
                $data['title'] = 'Error';
                $this->load->view('status/error', $data);
            } else{
                $data['errorText'] = 'No pudimos crear tu post. ¡Probá en unos minutos! Quizá exista un post con el mismo nombre que el tuyo.';
                $data['title'] = 'Error';
                $this->load->view('status/error', $data);
            }
        }
        
    } else {
        $data['errorText'] = '¡Hey! Volvé atrás y rellená todos los campos para crear el post. $Válido: '.$is_valid.'<br/>Legítimo: '.$is_legit.'<br/>Foro: '.$positionData['forum'].'<br />Sub foro: '.$postData['subforum'].'<br />Título: '.$postData['title'];
        $data['title'] = 'Error';
        $this->load->view('status/error', $data);
    }

}

}