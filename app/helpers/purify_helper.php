<?php
/*
-----------------------------------------------------------
*   
    HELPER: VALIFY
    DESIGNED BY: SANTIAGO GIMENEZ
    Evita XSS
                                                          *
-----------------------------------------------------------
*/

if( !function_exists('purify') ) {

    function purify($info) {
        if( is_array($info) ) {
          
            $n = count($info); // Cuento posiciones del array
            $purifiedArray[$n]; // Creo un nuevo array con $n posiciones
  
            for($i = 0;$i < $n;$i++) {
              $purifiedArray[$i] = strip_tags($info[$posicion]);
            }
            return $info; // Si es array, al salir del bucle devuelvo todos los datos
        } else {
            return strip_tags($info); // Si no era array, devuelvo ese único valor
        }
    }
  
}
?>