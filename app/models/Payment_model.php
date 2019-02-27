<?php
// MODEL
class Payment_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this -> load -> helper('url_helper');
        $this -> load -> helper('purify_helper');
    }

    function sellerProductCheck($sellerUsername) {
        // Devuelve el vendedor del producto en cuestión para futura verificación
        $this->db->select('sellerUsername');
        $this->db->where('sellerUsername', $sellerUsername);
        $query = $this->db->get('store_products');
        $result = $query->result_array();
        return $result;
    }

    function sellerIs_deleted($sellerUsername) {
        // Devuelve el campo del usuario que indica si fue borrado (por lo que se le congelan los fondos) o no
        $this->db->select('is_deleted');
        $this->db->where('username', $sellerUsername);
        $query = $this->db->get('users');
        $result = $query->result_array();
        return $result;
    }

    function priceProductCheck($slug, $sellerUsername, $points) {
        $this->db->select('points');
        $this->db->where('slug', $slug); // Si no coinciden estos datos, spoiler: no va a encontrar el producto :v
        $query = $this->db->get('store_products');
        return $query->result_array();
    }

    function checkLegitBuyer($buyerUsername, $sellerUsername) {
        // Compruebo que el que ingresa al pago es el comprador, y que la cuenta de $comprador !== $vendedor
        if( isset($_SESSION['username']) && $_SESSION['username'] === $buyerUsername && $sellerUsername !== $buyerUsername ) {
            return true;
        } else {
            return false;
        }
    }

    function checkLegitSeller($buyerUsername, $sellerUsername) {
        // Si bien esta función se ejecuta junto con checkLegitBuyer() y se comprueba que $comprador !== $vendedor,
        // en esta función se realiza la comprobación en caso de que se utilice esta función por separado, en otra página.

            // Busco al vendedor en la BD, si existe, ¡todo bien!
            $realSeller = $this->sellerProductCheck($sellerUsername);
            $is_deleted = $this->sellerIs_deleted($sellerUsername);

            if( isset($is_deleted[0]['is_deleted']) && (!$is_deleted[0]['is_deleted']) && $sellerUsername !== $buyerUsername ) { // Compruebo que $comprador !== $vendedor, ni el vendedor tenga cuenta borrada
                if( isset($realSeller[0]['sellerUsername']) && $realSeller[0]['sellerUsername'] === $sellerUsername ) { // Compruebo que el vendedor del link exista y sea igual al que publicó el producto
                    return true;
                }
            } else {
                return false;
            }
    }

    function createToken($bytes) {
        $generatedToken = base64_encode(random_bytes($bytes)); // Token generado

        $find = array(
            'á',        'é',        'í',        'ó',        'ú',
            'ä',        'ë',        'ï',        'ö',        'ü',
            'Á',        'É',        'Í',        'Ó',        'Ú',
            'Ä',        'Ë',        'Ï',        'Ö',        'Ü',
            '!',        '"',        "'",        '#',        '$',
            '%',        '&',        '/',        '(',        ')',
            '=',        '?',        '¿',        '¡',        '<', 
            '>',        '[',        ']',        '{',        '}',
            '+',        '=',        ' '
        );

        $generatedToken = str_replace($find, '-', $generatedToken); // Edito el token para hacerlo URL-Friendly
        return $generatedToken;
    }

    function checkExistingTransaction($token) { // Esta función devuelve la búsqueda de un token
            $this->db->select('token');
            $this->db->where('token', $token);
            $query = $this->db->get('store_transactions');
            $result = $query->result_array();
            return $result;
    }

    function createTransaction(array $transactionData) {
            // Primero reviso que ese token de transacción no exista
            $result = $this->checkExistingTransaction($transactionData['token']);
            if( isset($result[0]['token']) && $result[0]['token'] !== NULL ) { // Si ya existe
                return false;
            } else {
                // Crea una transacción para que sea validada por Payment/process
                $this->db->insert('store_transactions', $transactionData);
                return true;
            }
        
    }

    function getProductNameBySlug($slug) {
        $this->db->where('slug', $slug); // Si no coinciden estos datos, spoiler: no va a encontrar el producto :v
        $this->db->select('product');
        $query = $this->db->get('store_products');
        return $query->result_array();
    }

    function getActualBalance($buyer) {
        // Sirve para obtener el balance actual del comprador
        $this->db->where('username', $buyer);
        $this->db->select('points');
        $query = $this->db->get('users');
        $result = $query->result_array();
        return $result;
    }


    // PROCESS
    function searchTransactionByToken($token) {
        // Busca una transacción por token
        // Extrae el comprador de ese token, junto a lo que tiene que pagar y el producto que adquiere
        $this->db->where('token', $token);
        $this->db->select('sellerUsername, buyerUsername, productSlug, points, token');
        $query = $this->db->get('store_transactions');
        $result = $query->result_array();
    }

} // Cierre Payment_model class