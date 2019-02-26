<?php
// MODEL
class Profile_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this -> load -> helper('purify_helper');
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
        if( $_SESSION['avatar'] === NULL ) { // Si el avatar no existe
            return 'https://cdn3.vectorstock.com/i/1000x1000/38/42/hacker-character-avatar-icon-vector-11573842.jpg'; // Ponemos uno por defecto
        } else {
            return $_SESSION['avatar']; // Si existe, se lo ponemos! 
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