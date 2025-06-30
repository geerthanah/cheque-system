<?php
class ChequeModel extends CI_Model {

    public function getCheques() {
        $this->db->select('cheques.*, customers.customer_name as customer_name, banks.bank_name');
        $this->db->from('cheques');
        $this->db->join('customers', 'cheques.customer_id = customers.customer_id');
        $this->db->join('banks', 'cheques.bank_id = banks.bank_id');
        return $this->db->get()->result_array();
    }

    public function addCheque($data) {
        return $this->db->insert('cheques', $data);
    }

    public function getChequeById($id) {
        $this->db->select('cheques.*, customers.customer_name as customer_name, banks.bank_name');
        $this->db->from('cheques');
        $this->db->join('customers', 'cheques.customer_id = customers.customer_id');
        $this->db->join('banks', 'cheques.bank_id = banks.bank_id');
        $this->db->where('cheques.cheques_id', $id);
        return $this->db->get()->row_array();
    }

    public function updateChequeStatus($id, $status) {
        $this->db->where('cheques_id', $id);
        return $this->db->update('cheques', ['status' => $status]);
    }

  
    
    public function getChequesByMonth($year = '', $month = '')
    {
        $this->db->select('cheques.*, customers.customer_name, banks.bank_name');
        $this->db->from('cheques');
        $this->db->join('customers', 'cheques.customer_id = customers.customer_id');
        $this->db->join('banks', 'cheques.bank_id = banks.bank_id');
        
        // Apply filters only if they are set
        if (!empty($month)) {
            $this->db->where('MONTH(issue_date)', $month);
        }
        if (!empty($year)) {
            $this->db->where('YEAR(issue_date)', $year);
        }
        
        // Order by issue date
        $this->db->order_by('issue_date', 'DESC');
        
        return $this->db->get()->result_array();
    }
}
