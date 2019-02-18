<?php
class Forum_model extends CI_Model {

public function __construct() {
        $this->load->database();
}

function listForums() {
    // Obtiene toda la lista de foros
    $query = $this->db->get('forums');
    return $query->result_array();
}

function returnForums() {
    /*  Devuelve un listado de los foros que existen, la cantidad de posts de cada uno,
        quién y en dónde está la última respuesta y los subforos :D */

    $data['forum_item'] = $this->listForums();
    $n = 8; // LA COMUNIDAD TIENE 8 FOROS
    $m = array( // CANTIDAD DE SUBFOROS DE CADA FORO
        /*'computacion' =>*/ 3,
        /*'programacion' =>*/ 3,
        /*'disenoGrafico' =>*/ 2,
        /*'audio' =>*/ 2,
        /*'video' =>*/ 2,
        /*'emprenderismo' =>*/ 3,
        /*'universidades' =>*/ 3,
        /*'offtopic' =>*/ 2
    );

    echo '<div id="forums"><ul>';
    for($i = 0;$i < $n;$i++) { // FOR NAVIGATE THROUGHT FORUMS

        echo '<li><div class="forumName">
        <a href="forum/'.$data['forum_item'][$i]['slug'].'/home">'.$data['forum_item'][$i]['forumName'].'</a>
        </div>';

        echo '<div class="topicCounter">'.$data['forum_item'][$i]['topicCounter'].'</div>';

        if(!empty($data['forum_item'][$i]['lastAnswerTopic'])) {
            echo '<div class="lastAnswer">
                <div class="title">'.$data['forum_item'][$i]['lastAnswerTopic'].'</div>
                <div class="user">'.$data['forum_item'][$i]['lastAnswerUser'].'</div>
              </div>';
        } else {
            echo '<div class="lastAnswer">
                <div class="title">Sin posts</div>
                <div class="user">@none</div>
              </div>';
        }

        echo '<div id="subForum"><ul>';
        // SE IMPRIMEN DOS SUBFOROS DE CADA FORO (EL MÍNIMO)
            echo '<li>
                    <div class="img"></div>
                    <div class="title">
                    <a href="forum/'.$data['forum_item'][$i]['slug'].'/'.$data['forum_item'][$i]['subforum1'].'">'.$data['forum_item'][$i]['subforum1'].'</a>
                    </div>
                   </li>';  
            echo '<li>
                   <div class="img"></div>
                   <div class="title">
                   <a href="forum/'.$data['forum_item'][$i]['slug'].'/'.$data['forum_item'][$i]['subforum2'].'">'.$data['forum_item'][$i]['subforum2'].'</a>
                   </div>
                  </li>'; 
            if(!empty($data['forum_item'][$i]['subforum3'])){ // SI EXISTE UN TERCER SUBFORO
                echo '<li>
                   <div class="img"></div>
                   <div class="title">
                   <a href="forum/'.$data['forum_item'][$i]['slug'].'/'.$data['forum_item'][$i]['subforum3'].'">'.$data['forum_item'][$i]['subforum3'].'</a>
                   </div>
                  </li>';
            }
        echo '</div>';
    }
    echo '</ul></div>';
}

function getSubForums($forumToSearch, $subForumToSearch) {
    // Devuelve los subforos del foro al que se entró
    
    if($subForumToSearch !== 'home') {
        /* Si NO estoy en 'home', quiere decir que estoy ya en un subforo
        y no se necesita buscar más subforos (porque subforo de un subforo
        padre NO existe) */
        $filtro = array(
            $forumToSearch,
            $subForumToSearch        
        );

        $this->db->select('subForum1, subForum2, subForum3');
        $this->db->where($filtro);
        $subforums = $this->db->get('forums', $filtro);
        $result = $subforums->result_array();
        return $result;
    } else {
        // Si ya estoy en un subforo, no hago nada :)
    }
    
}

function getThreads($forumToSearch, $subForumToSearch) {

    // Devuelve los posts del foro al que se entró
    $this->db->select('id, title, post'); // 'title' para mostrar el nombre en pantalla y 'post' dentro del parámetro TITLE del link

    $filtro = array(
        $forumToSearch,
        $subForumToSearch        
    );
    
    if($subForumToSearch !== 'home') {
        /* Si NO estoy en 'home', quiere decir que estoy ya en un subforo
        y preciso obtener una lista de ese subforo en específico */ 
        $this->db->where('subforum', $subForumToSearch);
        $subforums = $this->db->get('posts', $filtro);
    } else{
        // where = *
        $subforums = $this->db->get('posts');
    }
    
    
    $result = $subforums->result_array();
    return $result;
}

function printSubForums($forumToSearch, $subForumToSearch) {
    $result = $this->getSubForums($forumToSearch, $subForumToSearch);
    /*echo '<p>'.$result['forum_item'][0]['subforum1'].'</p>';
    echo '<p>'.$result['forum_item'][1]['subforum2'].'</p>';*/
}

function printThreadList($forumToSearch, $subForumToSearch) {
    // Imprimo en pantalla los posts que se buscan
    $result = $this->getThreads($forumToSearch, $subForumToSearch);

    $i = 0;
    while( isset($result[$i]['id']) ) {
        echo '<p>'.$result[$i]['title'].'</p>';
        $i++;
    }
}

}