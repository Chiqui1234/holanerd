<?php
// MODEL
class Payment_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this -> load -> helper('url_helper');
        $this -> load -> helper('purify_helper');
    }

    function getProductNameBySlug($slug) {
        $this->db->where('slug', $slug); // Si no coinciden estos datos, spoiler: no va a encontrar el producto :v
        $this->db->select('product');
        $query = $this->db->get('store_products');
        return $query->result_array();
    }

    function productCheck($slug, $sellerUsername, $points) {
        $this->db->where('slug', $slug); // Si no coinciden estos datos, spoiler: no va a encontrar el producto :v
        $this->db->select('points');
        $query = $this->db->get('store_products');
        return $query->result_array();
    }

    function getActualBalance($buyer) {
        // Sirve para obtener el balance actual del comprador
        $this->db->where('username', $buyer);
        $this->db->select('points');
        $query = $this->db->get('users');
        return $query->result_array();
    }

} // Cierre Payment_model class