<?php
// CONTROLLER
class Forum extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('forum_model');
        $this->load->helper('url_helper');
    }

    

    public function view() {
        $data['title'] = "Foro";
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer');

        echo '<div id="root">';

            
            /*  START FORUM LISTING */
            $result = $this -> forum_model -> returnForums(); // Obtengo todos los foros y subforos
            echo $result;
            /* END FORUM LISTING */
        

        echo '</div>';
        

        
    }

    public function forum($forumToSearch, $subforumToSearch) {

        $data['title'] = $forumToSearch;
        
        // Abrir un foro mediante un link
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer');

        

        echo '<div id="root">';
        $subForumSearch = $this -> forum_model -> printSubForums($forumToSearch, $subforumToSearch);
        $threadsSearch = $this -> forum_model -> printThreadList($forumToSearch, $subforumToSearch);
        print_r($this -> forum_model -> getSubForums($forumToSearch, $subForumSearch));
        echo '</div>';
        //$this->load->view('forum/forum', $subForumSearch); // Tengo que hacer una búsqueda dentro del foro solicitado :D

    }

    public function thread() {
        // Abrir un hilo mediante un link
    }

}
?>