<?php

/*
-----------------------------------------------------------
*   
    HELPER: VALIFY
    DESIGNED BY: SANTIAGO GIMENEZ
    Valida relleno de formularios y usuarios
                                                          *
-----------------------------------------------------------
*/

$GLOBALS['adm_email'] = 'santiagogimenez@outlook.com.ar'; // En caso de que valify devuelva false, la plataforma de errores puede tomar esta variable para que se notifique el error al administrador

if( !function_exists('V_TIME') ) {

    function V_TIME() {
        // Obtiene la hora
        date_default_timezone_set('UTC'); // Zona horaria predeterminada
        return date('d/m/Y h:i:s a'); // Devuelvo la fecha
    }

} // Cierre function_exists


if( !function_exists('V_SESSION') ) {

    function V_SESSION() {
        // Comprueba que exista una sesión válida
        if( isset($_SESSION['email']) && 
            isset($_SESSION['username']) &&
            isset($_SESSION['avatar']) ) { // ¿Las variables de sesión están seteadas y contienen información? (Nótese que empty() no arroja error si la variable no existe, simplemente false)
                return true;
        } else {
                return false;
        }
    }
  
} // Cierre function_exists


if( !function_exists('V_CONFUSER') ) {

    function V_CONFUSER() {
        // Chequea que el usuario esté confirmado, para así mostrar su perfil, darle la capacidad de responder posts, etc
        if( isset($_SESSION['username']) ) { // Si existe la sesión y el valor 'username'
            $ci=& get_instance(); // Remplazo $this en los helpers, ya que no se puede acceder a la super variable $this desde fuera de las clases
            $ci->load->database(); // Remplazo $this en los helpers, ya que no se puede acceder a la super variable $this desde fuera de las clases
            $where = array('username' => $_SESSION['username']);
            $query = $ci->db->get_where('users', $where); // Obtengo el usuario
            $result = $query->result_array();
            if( $result[0]['is_confirmed'] == 1 ) { // Verifico que el usuario esté confirmado
                return true;
            } else {
                return false;
            }
        } else { // Si la sesión no está seteada...
            return false; // No se puede ver si la cuenta está confirmada, porque el cliente no inició sesión
        }
    }

} // Cierre function_exists

if( !function_exists('V_LEGIT') ) {

    function V_LEGIT($a, $b) {
        // Chequea que $a === $b
        if( $a === $b ) {
            return true;
        } else {
            return false;
        }
    }

} // Cierre function_exists

if( !function_exists('V_FORM_ASSOC') ) {

    function V_FORM_ASSOC(array $formData) {
        // Recibe un array y comprueba que los campos estén rellenados
        // El filtrado de scripting y XSS ya lo hace CodeIgniter con otra clase
        $arrayIndexado = array();
        $i = 0;
        $flag = true; // Si es FALSE, al menos un campo está vacío
        foreach ($formData as $key => $value) { // Primero me hago un array nuevo indexado con números
            $arrayIndexado[$i] = $value;
            $i++;
        }
        
        for($z = 0;$z < $i;$z++) { // Recorro el array en búsqueda de algún campo vacío
            if( empty($arrayIndexado[$z]) ) {
                $flag = false;
            }
        }
        return $flag;
    }

} // Cierra function_exists
?>