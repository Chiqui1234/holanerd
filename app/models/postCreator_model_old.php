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

    public function slugish($title) {
        // Partiendo de un título amigable con el user, hacemos un slug (amigable con navegadores)
        $find = array(
            'á',        'é',        'í',        'ó',        'ú',
            'ä',        'ë',        'ï',        'ö',        'ü',
            'Á',        'É',        'Í',        'Ó',        'Ú',
            'Ä',        'Ë',        'Ï',        'Ö',        'Ü',
            '!',        '"',        "'",        '#',        '$',
            '%',        '&',        '/',        '(',        ')',
            '=',        '?',        '¿',        '¡',        '<', 
            '>',        '[',        ']',        '{',        '}',
            ':',        ' '
        );
    
        $replace = array(
            'a',        'e',        'i',        'o',        'u',
            'A',        'E',        'I',        'O',        'U',
            'a',        'e',        'i',        'o',        'u',
            'A',        'E',        'I',        'O',        'U',
            '-',        '-',        "-",        '-',        '-',
            '-',        '-',        '-',        '-',        '-',
            '-',        '-',        '-',        '-',        '-',
            '-',        '-',        '-',        '-',        '-',
            '-',        '-'
        );
        return $title;
        //return str_replace($find, $replace, $title); // str_ireplace() hace cochinadas, por eso no lo uso
    }

    public function addPost(array $postData) {
        $this->db->insert('posts', $postData);
    }

    public function getForumToRefresh($forum) {
        // Obtiene el 'slug' y 'topicCounter' del foro al que se le debe 'updatear' su info 
        // Con refreshForumInfo() se actualiza: topicCounter, lastAnswerTopic, lastAnswerUser
        $this->db->select('slug, topicCounter');
        $this->db->where('slug', $forum); // Por ej: WHERE slug = 'computacion'
        
        $query = $this->db->get('forums');
        $result = $query->result_array();

        return $result;
    }

    public function refreshForumInfo(array $postData, array $forumDataToRefresh) {
        // Actualiza 'topicCounter', 'lastAnswerTopic' & 'lastAnswerUser' del foro deseado
        // Nótese que esta función se ejecuta cuándo se responde un post, pero también cuándo se crea uno
        $data = array(
            'slug' => $forumDataToRefresh[0]['slug'],
            'topicCounter' => $forumDataToRefresh[0]['topicCounter']+1,
            'lastAnswerTopicSlug' => $postData['slug'],
            'lastAnswerTopic' => $postData['title'],
            'lastAnswerUser' => $postData['author']
        );
    $this->db->where('slug', $forumDataToRefresh[0]['slug']);
    $this->db->update('forums', $data);// Me crea otro registro 'programacion'... chequear!
    }

    public function isExists($slug) {
        // Comprueba que un post de nombre idéntico exista
        $this->db->where('slug', $slug);
        $this->db->select('slug');
        $query = $this->db->get('posts');
        $result = $query->result_array();
        
        if( isset($result[0]['slug']) && $result[0]['slug'] === $slug ) {
            return true; // Existe
        } else {
            return false;
        }
    }
}