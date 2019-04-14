<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this -> load -> helper('url_helper');
        $this -> load -> model('PostCreator_model');
    }
    public function index() {
        // Tomo los datos del post que me sirven para ubicarme en la tabla correcta de la BD
        $positionData = array(
        'forum' => 'programacion',
        );

        // Tomo los datos del post que irán a la BD
        $postData = array(
        // id se auto-genera en la Query SQL
        'slug' =>  'test',
        'author' => $_SESSION['username'], // Se obtiene el usuario que creó el post
        'date' => V_TIME(),
        // Los puntos son cero por defecto
        'image' => 'https://google.com.ar/img.jpg',
        'title' => 'Test',
        'content' => '<p>hola mamá!</p>',
        'subforum' => 'Python',
        // Los comentarios son cero por defecto
        'is_approved' => 1 // Por ahora, no vamos a coartar la libertad de nadie (se aprueba por defecto) :P
        );
        $is_valid = V_FORM_ASSOC($postData); // Paso el array asociativo a la función y, si todos los índices tienen contenido...
        $is_legit = $this->PostCreator_model->checkPositionData($positionData['forum'], $postData['subforum']); // Comprueba que el foro y subforo existan
        echo '<p>$is_valid: '.$is_valid.'</p>';
        echo '<p>$is_legit: '.$is_legit.'</p>';
    }
}