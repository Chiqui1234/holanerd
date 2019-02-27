<?php
// CONTROLLER
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this -> load -> helper('url_helper');
    $this -> load -> model('Payment_model');
    $this->load->library('session');
    //$this->load->library('encrypt');
}

/* TENGO QUE HACER:
    - Una página para recibir información cifrada y procesar el pago
    - Chequear que ambos usuarios existan
    - Sólo el comprador puede ver este método de pago
*/

public function view($productSlug, $sellerUsername, $buyerUsername, $points) {

    $data['title'] = 'Pagar a '.$sellerUsername;
    
        $this->load->view('templates/header', $data, FALSE);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    
        /*      */

    $buyerBalance = $this->Payment_model->getActualBalance($buyerUsername); // Obtengo los puntos del comprador
    $realPoints = $this->Payment_model->priceProductCheck($productSlug, $sellerUsername, $points); // Obtengo el valor del producto, según la BD

    $statusBuyer = $this->Payment_model->checkLegitBuyer($buyerUsername, $sellerUsername); // TRUE o FALSE (¿el comprador existe y el link del pago es para él?)
    $statusSeller = $this->Payment_model->checkLegitSeller($buyerUsername, $sellerUsername); // TRUE o FALSE (¿el vendedor existe y es el que realmente vende el producto?)

    

    if( $statusBuyer && $statusSeller ) { 
        if( isset($buyerBalance[0]['points']) && ($buyerBalance >= $realPoints) ) { // Si el comprador tiene plata para pagarlo...
            $productName = $this->Payment_model->getProductNameBySlug($productSlug);

            if( $realPoints[0]['points'] === $points ) { // Si los puntos pasados por URL y los de la BD son iguales, es compra legítima
                $transactionData = array(
                    'sellerUsername' => purify($sellerUsername),
                    'buyerUsername' => purify($buyerUsername),
                    'product' => purify($productName[0]['product']), // Obtiene el nombre real del producto
                    'productSlug' => purify($productSlug),
                    'points' => purify($points),
                    'token' => $this->Payment_model->createToken(64)
                );

                    echo $transactionData['token'];
                    // Creo un token a partir del productSlug, para procesar el pago. Ese token lo creo y todo el $transactionData va a la tabla "store_transactions"
                    if( $this->Payment_model->createTransaction($transactionData) ) {
                        $this->load->view('templates/payment.php', $transactionData);
                    } else {
                        $data['error'] = true;
                        $data['text'] = "El ID de tu pago debe ser único, y parece que el sistema creó uno repetido.
                        ¡Refrescá la página en unos instantes y probá de nuevo!";
                        $this->load->view('pages/status', $data);
                    }

                
            } else {
                $data['error'] = true;
                $data['text'] = "Este producto no existe o tiene un precio distinto al real.";
                $this->load->view('pages/status', $data);
            }

        } else {
                $data['error'] = true;
                $data['text'] = "<p>Que lástima, no tenés minutos para pagar el producto. ¡No te preocupes! Si seguís aportando a la comunidad,
                todos te vamos a premiar y vas a poder comprar lo que quieras. ¡Esperamos tu brainstorm!</p>
                <p>Si creés que tenés minutos para realizar esta transacción, ¿puede ser que no hayas iniciado sesión?</p>";
                $this->load->view('pages/status', $data);
        }
    } else {
        $data['error'] = true;
        $data['text'] = "<p>Sólo el comprador puede ingresar a este link de pago. Tampoco te dejamos auto-transferirte puntos ni crear links de pago
        con un usuario que no existe, ¿por qué quisieras hacer eso?</p>";
        $this->load->view('pages/status', $data);
    }
    
    
    
}

public function process($token) {
    echo $token;
}

} // Cierre Payment class