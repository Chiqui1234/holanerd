<?php
// MODEL
class PostCreator_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this -> load -> helper('url_helper');
    }

    public function isExists($table, $slug) {
        // Comprueba que un post de nombre idéntico exista
        $prepSlug = array(
            'slug' => $slug
        );
        $result = DB_GET($table, $prepSlug);
        if( isset($result[0]['slug']) && $result[0]['slug'] === $slug ) { // Si existe, devuelve true
            return true;
        } else {
            return false;
        }
    }

    public function checkPositionData($forum, $subforum) {
        $forums = DB_GET_SIMPLE('forums');
        $elements = count($forums);
        $forumExists = false;
        $subforumExists = false;
        $subforumIndex = 1; // Para formar $subforumName
        $subforumName = 'subForum'.$subforumIndex; // subForum1, subForum2, etc...
        $i = 0;

            while(!$forumExists && $i < $elements) { // Mientras el foro buscado no se encuentre, hago $i++
                if( $forums[$i]['slug']  === $forum ) {
                    $forumExists = true;
                } else{
                    $i++;
                }
            }
            if( $forumExists ) { // Ahora que encontramos el foro, falta identificar el subforo
                while(!$subforumExists && $subforumIndex <= 4) {
                    $subforumName = 'subForum'.$subforumIndex;
                    if( $forums[$i][$subforumName] === $subforum ) {
                        $subforumExists = true;
                    } else {
                        $subforumIndex++;
                    }
                    echo $subforumName.'<br/>';
                    echo 'entré en while(!subforumExists)';
                }
            }

            if( $forumExists && $subforumExists ) {
                return true;
            }
            return false;
    }

    public function updateTopicCounter($forumSlug) {
        $whereTopicCounter = array('slug' => $forumSlug);
        $query = $this->db->get_where('forums', $whereTopicCounter);
        $result = $query->result_array();
        $info = array(
            'topicCounter' => $result[0]['topicCounter']+1
        );
        DB_UPDATE('forums', $info, $whereTopicCounter);
    }
}