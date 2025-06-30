<?php
class BankModel extends CI_Model {
    public function getBanks() {
        $query = $this->db->get('banks'); // Fetch all banks from DB
        return $query->result();
    }

    public function insertBank($data) {
        $this->db->insert('banks', $data);
    }


    public function getBankBalance($bank_id) {
        $this->db->select('balance');
        $this->db->where('bank_id', $bank_id);
        $query = $this->db->get('banks');
        return $query->row()->balance ?? 0;
    }

    public function deductBalance($bank_id, $amount) {
        $this->db->set('balance', 'balance - ' . $amount, FALSE);
        $this->db->where('bank_id', $bank_id);
        $this->db->update('banks');
    }

    // Update bank details
    // public function updateBank($bank_id, $data) {
    //     $this->db->where('bank_id', $bank_id);
    //     return $this->db->update('banks', $data);
    // }

    // Delete bank
    public function deleteBank($bank_id) {
        $this->db->where('bank_id', $bank_id);
        return $this->db->delete('banks');
    }

   

    public function getBankById($id) {
        return $this->db->get_where('banks', ['bank_id' => $id])->row();
    }

    public function updateBank($id, $data) {
        $this->db->where('bank_id', $id);
        return $this->db->update('banks', $data);
    }

  
}
