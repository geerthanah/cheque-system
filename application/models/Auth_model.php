<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

        public function register_user($data)
        {
            return $this->db->insert('users', $data); 
        }

        public function login($email, $password)
        {
            $this->db->where('email', $email);
            $this->db->where('password', $password);


            
            $query = $this->db->get('users');

            if ($query->num_rows() > 0) {
                return $query->row_array();
            }
            return false;
        }

                // Get user by ID
    public function get_user_by_id($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('users');
        return $query->row_array();
    }

    // Update user details
    public function update_user($user_id, $data)
    {
        if (isset($data['password']) && !$data['password']) {
            unset($data['password']); // Skip updating password if not provided
        }
        $this->db->where('user_id', $user_id);
        return $this->db->update('users', $data);
    }

    // public function update_profile($user_id, $data)
    // {
      
    //     $this->db->where('user_id', $user_id);
    //     return $this->db->update('users', $data);
    // }

    }
?>