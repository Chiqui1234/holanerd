<?php
// MODEL
class Profile_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this -> load -> helper('url_helper');
        $this -> load -> helper('purify_helper'); // Evita XSS
        $this -> load -> helper('valify_helper'); // Valida relleno de formularios y usuarios
        $this -> load -> helper('db_helper'); // Uso simplificado para el manejo con BDs
        //$this->load->library('encrypt');
    }

    // getUserInfo en Login_model.php

    function getUserPosts() {
        //$this->db->select('author');
        $this->db->where('author', $_SESSION['username']); // WHERE email = '$_SESSION'
        $query = $this->db->get('posts');
        $result = $query->result_array();
        return $result;
    }

    function getUserStats() {
        // Obtener rango, puntos, Git, linkedIn, etc
        $this->db->where('username', $_SESSION['username']); // WHERE email '$_SESSION'
        $this->db->select('points, git, linkedin, web');
        $query = $this->db->get('users');
        $result = $query->result_array();
        return $result;
    }

    // getUserColors() y getUserBackground() en Login_model

    function printAvatar() {
        if( isset($_SESSION['avatar']) && $_SESSION['avatar'] == '' ) { // Si el avatar no existe en sesión o no tiene datos
            $this->db->where('email', purify($_SESSION['email']));
            $this->db->select('avatar');
            $query = $this->db->get('users');
            $result = $query->result_array();
            if( isset($result[0]) ) { // Si el usuario tiene avatar en la bd
                return $result[0]['avatar'];
            } else { // Si no tiene, ponemos uno por defecto
                return 'https://i.imgur.com/jfrFsXA.png';
            }
        } else { // Si tiene el avatar en sesión, lo ponemos
            return $_SESSION['avatar'];
        }
    }

    function printBg() {
        if( isset($_SESSION['background']) && $_SESSION['background'] == '' ) { // Si el fondo no existe en sesión o no tiene datos
            $this->db->where('email', purify($_SESSION['email']));
            $this->db->select('background');
            $query = $this->db->get('users');
            $result = $query->result_array();
            if( isset($result[0]) ) { // Si el usuario tiene fondo en la bd
                return $result[0]['background'];
            } else { // Si no tiene, ponemos uno por defecto
                return 'https://static.vecteezy.com/system/resources/previews/000/094/491/non_2x/polygonal-texture-background-vector.jpg';
            }
        } else { // Si tiene el fondo en sesión, lo ponemos
            return $_SESSION['background'];
        }
    }

    function printUserPosts() {
        $posts = $this->getUserPosts();
        $i = 0;
        while( isset($posts[$i]) ) {
            echo '<li>
                    <a href="Forum/post/'.$posts[$i]['slug'].'"><h1>'.$posts[$i]['title'].'</h1>
                    <p>'.$posts[$i]['post'].'</p></a>
                    </li>';
            $i++;
        }
    }

    function printUserStats() {
        $stats = $this->getUserStats();

            echo '<li>Puntos:'.$stats[0]['points'].'</li>';
            echo '<li>Git:'.$stats[0]['git'].'</li>';
            echo '<li>LinkedIn:'.$stats[0]['linkedin'].'</li>';
            echo '<li>Sitio web:'.$stats[0]['web'].'</li>';

    }

    function setColors(array $data) { // Función que reemplaza los colores del usuario, desde el perfil
        // $data array
        /* $data = array(
            'background' => $_VALUE,
            'color1' => $_VALUE,
            'color2' => $_VALUE
        ); */
        // $this->db->set($data); Esta línea no debería ser necesaria, el segundo parámetro de update() es para eso
        $this->db->where('email', $_SESSION['email']);
        $this->db->update('users', $data);
    }

    function setBackground(array $data) { // Función que reemplaza el fondo del usuario, desde el perfil
        $this->db->where('email', $_SESSION['email']);
        $this->db->update('users', $data);
    }
}