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

            /*  START INDEX FORUM LISTING */
            $result = $this -> forum_model -> returnForums(); // Obtengo todos los foros y subforos
            echo $result;
            /* END FORUM LISTING */

        echo '</div>';
        
    }

    public function forum($forumToSearch, $subforumToSearch) {

        $data['title'] = '$forumToSearch';
        
        // Abrir un foro mediante un link
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer');

        //$data['subForumResult'] = $this -> forum_model -> printSubForums($forumToSearch, $subforumToSearch);
        //$data['threadsResult'] = $this -> forum_model -> printThreadList($forumToSearch, $subforumToSearch);

        //$this->load->view('forum/openedForum', $data); // Tengo que hacer una búsqueda dentro del foro solicitado :D
        echo '<div id="root">';
        echo '<h3>subforums()</h3>';
        print_r($this->forum_model->getSubforums($forumToSearch, $subforumToSearch));
        echo '<h3>threads()</h3>';
        print_r($this->forum_model->getThreads($forumToSearch, $subforumToSearch));
        echo '</div>';
    }

    public function thread() {
        // Abrir un hilo mediante un link
    }

}
?>