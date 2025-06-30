<?php
class CustomerModel extends CI_Model {
    public function getCustomers() {
        return $this->db->get('customers')->result_array();
    }
}
