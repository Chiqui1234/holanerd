<?php
// MODEL
class postCreator_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this -> load -> helper('url_helper');
    }

    public function uploadImage($postImage) {
        $config['upload_path']          = base_url().'uploads';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 350;
        $config['max_width']            = 2560;
        $config['max_height']           = 1440;

            $this->load->library('upload', $config);

            if ( !$this->upload->do_upload($postImage)) {
                $data['error'] = true;
                $data['text'] = $this->upload->display_errors();

                $this->load->view('pages/status', $data);
            } else {
                $data['error'] = false;
                $data['text'] = 'La imágen se subió correctamente.';
                
                $this->load->view('pages/status', $data);
            }
    }

    public function addPost($postData) {
        $this->db->insert('posts', $postData);
    }

    public function isExists($slug) {
        // Comprueba que un post de nombre idéntico exista
        $this->db->where('slug', $slug);
        $this->db->select('slug');
        $query = $this->db->get('posts');
        $result = $query->result_array();
        
        if( $result[0]['slug'] === $slug ) {
            return true; // Existe
        } else {
            return false;
        }
    }
}