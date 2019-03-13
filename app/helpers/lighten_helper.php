<?php
/*
-----------------------------------------------------------
*   
    HELPER: LIGHTEN
    DESIGNED BY: SANTIAGO GIMENEZ
    Este helper está diseñado para evitar sobrecargas en
    la BD. Esto se logra creando cookies para evitar
    consultas innecesarias a la base de datos.
                                                          *
-----------------------------------------------------------
*/

if( !function_exists('makeCookie') ) {
    function makeCookie($data) { // Crea cookies según se lo indique. Ideal para almacenar información insensible

    }
}

if( !function_exists('checkCookie') ) {
    function checkCookie($name) { // Chequea si la cookie $name existe
        if( isset($_SESSION[$name]) ) {
            return true;
        } return false;
    }
}

?>