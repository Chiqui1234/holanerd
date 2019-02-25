<?php
class Forum_model extends CI_Model {

public function __construct() {
        $this->load->database();
}

function getForums() {
    // Obtiene toda la lista de foros
    $query = $this->db->get('forums');
    return $query->result_array();
}

function getSubforums($forumToSearch, $subforumToSearch) {
    // Obtiene la lista de sub-foros del foro actual
    $this->db->select('subforum1, subforum2, subforum3'); // Selecciono los 3 subforos para próximamente imprimirlos por pantalla
    $this->db->where('forumName', $forumToSearch); // Capto subforos del foro deseado. WHERE 'forumName' = $forumToSearch
    $query = $this->db->get('forums'); // $array[0]['subforum1']
    return $query->result_array();
}

function getThreads($forumToSearch, $subforumToSearch) {
    // Primero, evalúo si estoy dentro de un foro o subforo
    if( $subforumToSearch === 'home' ) { // Si esa variable = 'home', no estamos dentro de un subforo. Por eso debo obtener absolutamente todos los posts
        $this->db->where('forum', $forumToSearch);
        $query = $this->db->get('posts');
    } else { // Si estamos dentro de un subforo...
        $filter = array(
            'forum' => $forumToSearch,
            'subforum' => $subforumToSearch
        );
        $this->db->where($filter); // WHERE 'forum' = $forumToSearch AND 'subforum' = $subforumToSearch
        $query = $this->db->get('posts');
    }
    return $query->result_array();
}

function openThread($slug) {
    /* Puedo crear un modelo (o usar forum_model) para crear una función que en base al 'slug' encuentre el post
    solicitado. Osea, por URL le paso el slug y luego en el controlador obtengo de MySQL el título, texto, etc +
    pido los comentarios de la tabla 'comentarios' :D */
    $this->db->where('slug', $slug);
    $query = $this->db->get('posts');
    return $query->result_array();
} 

function returnForums() {
    /*  Devuelve un listado de los foros que existen, la cantidad de posts de cada uno,
        quién y en dónde está la última respuesta y los subforos :D */

    $data['forum_item'] = $this->getForums();
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
    for($i = 0;$i < $n;$i++) { // NAVEGAR ENTRE LOS FOROS PARA OBTENERLOS

        echo '<li><div class="forumName">
        <a href="Forum/forum/'.$data['forum_item'][$i]['slug'].'/home">'.$data['forum_item'][$i]['forumName'].'</a>
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
                <div class="user">-</div>
              </div>';
        }

        echo '<div id="subForum"><ul>';
        // SE IMPRIMEN DOS SUBFOROS DE CADA FORO (EL MÍNIMO)
            echo '<li>
                    <div class="img"></div>
                    <div class="title">
                    <a href="Forum/forum/'.$data['forum_item'][$i]['slug'].'/'.$data['forum_item'][$i]['subforum1'].'">'.$data['forum_item'][$i]['subforum1'].'</a>
                    </div>
                   </li>';  
            echo '<li>
                   <div class="img"></div>
                   <div class="title">
                   <a href="Forum/forum/'.$data['forum_item'][$i]['slug'].'/'.$data['forum_item'][$i]['subforum2'].'">'.$data['forum_item'][$i]['subforum2'].'</a>
                   </div>
                  </li>'; 
            if(!empty($data['forum_item'][$i]['subforum3'])){ // SI EXISTE UN TERCER SUBFORO
                echo '<li>
                   <div class="img"></div>
                   <div class="title">
                   <a href="Forum/forum/'.$data['forum_item'][$i]['slug'].'/'.$data['forum_item'][$i]['subforum3'].'">'.$data['forum_item'][$i]['subforum3'].'</a>
                   </div>
                  </li>';
            }
        echo '</div>';
    }
    echo '</ul></div>';
}

    function getUserToDonate($dbData) {
        // Obtiene el usuario a donar puntos a partir del slug del post
        $this->db->where('slug', $dbData['slug']);
        $this->db->select('author');
        $query = $this->db->get('users');
        $result = $query->result_array();
        return $result[0]['author'];
    }

    function getClientPoints($dbData) {
        $this->db->where('username', $dbData['username']);
        $this->db->select('points');
        $query = $this->db->get('users');
        $result = $query->result_array();
        return $result[0]['points'];
    }

    function donatePoints($dbData) { // Main() para donar puntos a un post :D Las fx de arriba son auxiliares
        // $dbData = array($slug, $username, $pointsToDonate);
        $userToDonate = $this->getUserToDonate($dbData);
        $clientPoints = $this->getClientPoints($dbData); // Los puntos del usuario que desea donar
        if( $clientPoints >= $dbData['pointsToDonate'] ) {
            // Ejecuto la SQL para donarle puntos a $userToDonate
        } else {
            // Imprimo error
        }
    }

}