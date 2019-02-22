<?php
if( !function_exists('purify') ) {

    function purify($info) {
        if( is_array($info) ) {
          
            $n = count($info); // Cuento posiciones del array
            $purifiedArray[$n]; // Creo un nuevo array con $n posiciones
  
            for($i = 0;$i < $n;$i++) {
              $purifiedArray[$i] = strip_tags(htmlspecialchars($info[$posicion]));
            }

        } else {
            return strip_tags(htmlspecialchars($info)); // Si no era array, devuelvo ese único valor
        }
        return $info; // Si es array, al salir del bucle devuelvo todos los datos
    }
  
}
?>