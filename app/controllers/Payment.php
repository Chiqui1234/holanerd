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
*/

public function view($productSlug, $sellerUsername, $buyerUsername, $points) {

    $data['title'] = 'Pagar a '.$sellerUsername;
    
        $this->load->view('templates/header', $data, FALSE);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    
        /*      */

    $buyerBalance = $this->Payment_model->getActualBalance($buyerUsername); // Obtengo los puntos del comprador

    if($buyerBalance > $points) { // Si el comprador tiene plata para pagarlo...
        $productName = $this->Payment_model->getProductNameBySlug($productSlug);

        $transactionData = array(
        'sellerUsername' => purify($sellerUsername),
        'buyerUsername' => purify($buyerUsername),
        'product' => purify($productName[0]['product']), // Obtiene el nombre real del producto
        'productSlug' => purify($productSlug),
        'points' => purify($points)
        );
        
        $realPoints = $this->Payment_model->productCheck($productSlug, $sellerUsername, $points); // Obtengo el valor del producto, según la BD

        if( $realPoints[0]['points'] === $points ) { // Si los puntos pasados por URL y los de la BD son iguales, es compra legítima
            $this->load->view('templates/payment.php', $transactionData);
        } else {
            $data['error'] = true;
            $data['text'] = "Este producto no existe o tiene un precio distinto del indicado.";
            $this->load->view('pages/status', $data);
        }
    } else {
            $data['error'] = true;
            $data['text'] = "Que lástima, no tenés minutos para pagar el producto. ¡No te preocupes! Si seguís aportando a la comunidad,
            todos te vamos a premiar y vas a poder comprar lo que quieras. ¡Esperamos tu brainstorm!";
            $this->load->view('pages/status', $data);
    }
    
    
}

} // Cierre Payment class