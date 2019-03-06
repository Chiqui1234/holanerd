<?php
// CONTROLLER
class Forum extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Forum_model');
        $this->load->helper('url_helper');
    }

    

    public function index() { // Listado de todos los foros
        
        $data['title'] = "Foro";
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer');

        $data['forums'] = $this->Forum_model->getForums();
        $this->load->view('forum/forums', $data);
    }

    public function open($forumSlug, $subForumSlug = 'Inicio', $queryOffset = 0) { // Abre el foro deseado con sus posts dentro
        // $queryOffset Indica desde que ID se inicia la búsqueda

        $data['title'] = 'Foro de '.$forumSlug;
        $queryLimit = 10; // Límite para buscar en la BD
        $table = 'posts_'.$forumSlug; // La tabla dónde se busca

        if( $subForumSlug == 'Inicio' ) {
            $data['postsOfTheForum'] = DB_GET_SIMPLE($table, $queryLimit, $queryOffset); // Obtengo todos los datos de los posts
        } else { // Busca los posts dónde coincida el nombre del foro y el subforo
            // $forumSlug indica el nombre del foro
            // $subForumSlug indica el nombre del subforo
            $info = array( // Información para la búsqueda
                'subForum' => $subForumSlug
            );
            
            $data['postsOfTheForum'] = DB_GET($table, $info, $queryLimit, $queryOffset); // Almaceno los posts en ese array() para pasarle a la vista
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer');

        $data['forumSlug'] = $forumSlug;
        $this->load->view('forum/open', $data);
    }
    // $this->load->view('templates/post', $data); -> esto estará en otro controlador llamado "Post"
}
?>