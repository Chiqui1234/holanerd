<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class Testing extends CI_Controller {

    public function Passwd() {
        $pass1 = 'test';
        $pass2 = 'una avestrúz';
        $email1 = 'santiagogimenez@outlook.com.ar';
        $hash1 = PASSWORD_HASH($pass1, PASSWORD_DEFAULT);
        $hash2 = PASSWORD_HASH($pass2, PASSWORD_DEFAULT);
        $verify2 = PASSWORD_VERIFY($pass2, $hash2);
        $encrypt1 = $this->encryption->encrypt('testea2');
        $decrypt1 = $this->encryption->decrypt($encrypt1);
        echo '<h1>Verify $pass2 vs $hash2</h1><p>Resultado: '.$verify2.'</p>';
        echo '<h1>Encrypt("testea2")</h1><p>Resultado: '.$encrypt1.'</p>';
        echo '<h1>Decrypt($encrypt1)</h1><p>Resultado: '.$decrypt1.'</p>';
        $mypasswd = 'Lilolilo10';
        $mypasswdHash = '$2y$10$VB82YTem84FUAZlmB8eme..qxbHnD2wPbtjmTf/E/Bl';
        echo 'Verify ($mypasswd): '.PASSWORD_VERIFY($mypasswd, $mypasswdHash).' ;D';
    }

}