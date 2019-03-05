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
        //$this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer');

        $data['forums'] = $this->Forum_model->getForums();
        $this->load->view('forum/forums', $data);
    }

    public function computacion($slug = 'home') { // Abre el foro 'computacion'
        $data['post'] = $this->Forum_model->openThread('computacion', $slug); // Abrir un hilo mediante un slug
        $data['title'] = $data['post'][0]['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer');

        $this->load->view('templates/post', $data);
    }

}
?>