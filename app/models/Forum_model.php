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
    $this->db->where('slug', $forumToSearch); // Capto subforos del foro deseado. WHERE 'forumName' = $forumToSearch
    $query = $this->db->get('forums'); // $array[0]['subforum1']
    return $query->result_array();
}

function getThreads($forumToSearch, $subforumToSearch) {
    // Primero, evalúo si estoy dentro de un foro o subforo
    if( $subforumToSearch === 'home' ) { // Si esa variable = 'home', no estamos dentro de un subforo. Por eso debo obtener absolutamente todos los posts
        $this->db->where('forum', $forumToSearch);
        $this->db->select('id, title, subforum');
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

function openThread($forum, $slug) {
    /* Puedo crear un modelo (o usar forum_model) para crear una función que en base al 'slug' encuentre el post
    solicitado. Osea, por URL le paso el slug y luego en el controlador obtengo de MySQL el título, texto, etc +
    pido los comentarios de la tabla 'comentarios' :D */
    $table = 'posts_'.$forum;
    $_slug = array(
        'slug' => $slug
    );
    $this->db->select('image, author, title, date, content');
    $query = $this->db->get_where($table, $_slug);
    return $query->result_array();
} 

function returnForums() {
    /*  Devuelve un listado de los foros que existen, la cantidad de posts de cada uno,
        quién y en dónde está la última respuesta y los subforos :D */

    $forums = $this->getForums();
    $n = 8; // LA COMUNIDAD TIENE 8 FOROS
    $m = array( // CANTIDAD DE SUBFOROS DE CADA FORO
        /*'computacion' =>*/ 2,
        /*'programacion' =>*/ 2,
        /*'disenoGrafico' =>*/ 2,
        /*'audio' =>*/ 2,
        /*'video' =>*/ 2,
        /*'emprenderismo' =>*/ 3,
        /*'universidades' =>*/ 3,
        /*'offtopic' =>*/ 2
    );
    $subforumName = 'subforum1'; // Así empieza
    $subforumCount = 0;
    $i = 0;
    while( isset($forums[$i]) ) { // Este while() recorre los foros
        echo '<li><div class="forumName">
                    <a href="'.base_url().'Forum/forum/'.$forums[$i]['slug'].'/home">'.$forums[$i]['forumName'].'</a>
                  </div>';

        echo '<div class="topicCounter">'.$forums[$i]['topicCounter'].'</div>';
                                
        echo '<div class="lastAnswer">
                                <div class="title"><a href="'.base_url().'Forum/post/'.$forums[$i]['lastAnswerTopicSlug'].'">'.$forums[$i]['lastAnswerTopic'].'</a></div>
                                <div class="user"><a href="'.base_url().'Profile/search/'.$forums[$i]['lastAnswerUser'].'">'.$forums[$i]['lastAnswerUser'].'</a></div>
                                </div>';
        echo '<div id="subForum"><ul>';
        for($q = 0;$q < $m[$i];$q++) { // Este for() recorre los subforos
            echo '<li>
                    <div class="img"></div>
                    <div class="title">
                    <a href="Forum/forum/'.$forums[$i]['slug'].'/'.$forums[$i][$subforumName].'">'.$forums[$i][$subforumName].'</a>
                    </div>
                   </li>';
            $subforumCount = strval($q+1);
            $subforumName = 'subforum'.$subforumCount;
        } // Cierre for()
        echo '</ul></div>'; // #subForum
        echo '</li>'; // #forumName
        $i++;
    } // Cierre while()
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