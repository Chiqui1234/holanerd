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

        $subforumsResult = $this->forum_model->getSubforums($forumToSearch, $subforumToSearch);
        $threadsResult = $this->forum_model->getThreads($forumToSearch, $subforumToSearch);
        print_r($subforumsResult);

        echo '<div id="root">';
        echo '<h3>subforums()</h3>';
        //print_r($this->forum_model->getSubforums($forumToSearch, $subforumToSearch));
        echo '<ul>';
        echo '<li><a href="'.$subforumsResult[0]['subforum1'].'">'.$subforumsResult[0]['subforum1'].'</a></li>';
        echo '<li><a href="'.$subforumsResult[0]['subforum2'].'">'.$subforumsResult[0]['subforum2'].'</a></li>';
         if( !empty($subforumsResult[0]['subforum3']) ) {
            echo '<li><a href="'.$subforumsResult[0]['subforum3'].'">'.$subforumsResult[0]['subforum3'].'</a></li>';
         }
        echo '</ul>';
        

        echo '<h3>threads()</h3>';

        $i = 0;
        while( isset($threadsResult[$i]) && !empty($threadsResult[$i]) ){
            echo '<p><a href="'.base_url().'Forum/post/'.$threadsResult[$i]['slug'].'" title="'.$threadsResult[0]['title'].'">'
            .$threadsResult[$i]['title'].' | '.$threadsResult[$i]['subforum'].'
            </a></p>';
            $i++;
        }
        

        //print_r($this->forum_model->getThreads($forumToSearch, $subforumToSearch));
        echo '</div>';
    }

    public function post($slug) {
        // Abrir un hilo mediante un link
        $thread = $this->forum_model->openThread($slug);
        echo '<div id="root">';
        //print_r($thread);
        echo '<h1>'.$thread[0]['title'].'</h1>';
        echo '<h3>De @<a href="'.base_url().'Profile/search/'.$thread[0]['author'].'">'.$thread[0]['author'].'</a></h3>';
        echo '<img src="'.$thread[0]['image'].'" width="100%" id="postImage" />';
        echo '<p>'.$thread[0]['post'].'</p>';
        echo '</div>';

        $data['title'] = $thread[0]['title'];
        
        // Abrir un foro mediante un link
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer');

        
    }

}
?>