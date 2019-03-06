<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class Post extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this -> load -> helper('url_helper');
    $this -> load -> model('Post_model');
}

public function index($forumSlug, $subForumSlug, $postSlug) {
    $table = 'posts_'.$forumSlug;
    $info = array(
        'subForum' => $subForumSlug,
        'slug' => $postSlug
    );
    
    $data['forumSlug'] = $forumSlug;
    $data['postSlug'] = $postSlug;

    $data['post'] = DB_GET($table, $info); // Obtengo el post solicitado
    $data['title'] = $data['post'][0]['title'];
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');
    $this->load->view('forum/post', $data); // Abro la vista del post y le paso sus datos
    if( V_SESSION() && V_CONFUSER() ) {
        $this->load->view('forum/comments', $data);
    } else {
        echo '</div>';
    }
}

public function donatePoints(/*$table, $forum, $post, $user*/) { // Sabiendo la tabla del post, el post y el usuario, quién acceda a éste script podrá donar puntos al usuario y post pasado por variables. Los puntos salen de la comunidad, no del usuario puntuador.

}

public function commentPost(/*$table, $forum, $post, $user*/) { // Sabiendo la tabla del post, el post y el usuario, quién acceda a éste script podrá donar puntos al usuario y post pasado por variables. Los puntos salen de la comunidad, no del usuario puntuador.
    
    $info = array(
        'username' => purify($_REQUEST['username']),
        'comment' => purify($_REQUEST['comment']),
        'forum' => purify($_REQUEST['forum']),
        'post' => purify($_REQUEST['post'])
    );
    echo $info['username'];
    /*$process = $this->Post_model->addComment($info);
    return $process;*/
}

} // Cierre de la clase