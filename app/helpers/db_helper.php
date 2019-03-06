<?php

/*
-----------------------------------------------------------
*   
    HELPER: DATABASE
    DESIGNED BY: SANTIAGO GIMENEZ
    El manejo de la BD, pero más simple
                                                          *
-----------------------------------------------------------
*/

if( !function_exists('DB_GET_SIMPLE') ) { // Útil para obtener varios registros
    function DB_GET_SIMPLE($table, $limit = 10, $offset = 0) {
        $ci=& get_instance(); // Creo $ci en los helpers, ya que no se puede acceder a la super variable $this desde fuera de las clases
        $ci->load->database(); // Creo $ci en los helpers, ya que no se puede acceder a la super variable $this desde fuera de las clases
        $query = $ci->db->get($table, $limit, $offset);
        $result = $query->result_array();
        if( isset($result) ) {
            return $result;
        } else {
            return false;
        }
    }
}

if( !function_exists('DB_GET') ) { // Obtiene registro específico
    function DB_GET($table, $info, $limit = 10, $offset = 0) {
        $ci=& get_instance(); // Creo $ci en los helpers, ya que no se puede acceder a la super variable $this desde fuera de las clases
        $ci->load->database(); // Creo $ci en los helpers, ya que no se puede acceder a la super variable $this desde fuera de las clases
        $query = $ci->db->get_where($table, $info);
        $result = $query->result_array();
        if( isset($result) ) {
            return $result;
        } else {
            return false;
        }
    }
}

/*if( !function_exists('DB_GET') ) { // Obtiene registro
    function DB_GET_WHERE($table, array $info) { // Obtiene registro mediante filtros
        $ci=& get_instance(); // Creo $ci en los helpers, ya que no se puede acceder a la super variable $this desde fuera de las clases
        $ci->load->database(); // Creo $ci en los helpers, ya que no se puede acceder a la super variable $this desde fuera de las clases
        $query = $ci->db->get_where($table, $info);
        $result = $query->result_array();
        return $result;
    }
}*/

if( !function_exists('DB_POST') ) { // Inserta registro
    function DB_POST($table, array $info) {
        $ci=& get_instance(); // Creo $ci en los helpers, ya que no se puede acceder a la super variable $this desde fuera de las clases
        $ci->load->database(); // Creo $ci en los helpers, ya que no se puede acceder a la super variable $this desde fuera de las clases
        $query = $ci->db->insert($table, $info);
        $error = $ci->db->error(); // Genera un array en caso de error
        if( isset($error[0]) ) { // Si existe el array, hay error
            return false;
        } else {
            return true;
        }
    }
}

if( !function_exists('DB_UPDATE') ) { // Actualiza registro
    function DB_UPDATE($table, array $info) {
        $numberOfSets = count($info);
        $arrayIndexado = array();
        $ci=& get_instance(); // Creo $ci en los helpers, ya que no se puede acceder a la super variable $this desde fuera de las clases
        $ci->load->database(); // Creo $ci en los helpers, ya que no se puede acceder a la super variable $this desde fuera de las clases
        $i = 0;
        foreach ($info as $key => $value) { // Primero me hago un array nuevo indexado con números
            $ci->db->set($key, $value);
            echo '<br/>Key: '.$key.' | Value: '.$value;
            $i++;
        }
        //$this->db->insert($table);  // Produces: INSERT INTO mytable (`name`) VALUES ('{$name}')
    }
}

?>