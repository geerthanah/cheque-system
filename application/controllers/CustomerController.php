<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
        $this->load->model('CustomerModel'); 
    }

    // Show Add Customer Form
    public function create() {
        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/customer_add');
        $this->load->view('includes/footer');
    }

    // Store Customer to Database
    public function store() {
        $customer_name = $this->input->post('customer_name');

        if (!empty($customer_name)) {
            $data = ['customer_name' => $customer_name];
            $this->db->insert('customers', $data);
            // $this->session->userdata('user_id');
            $this->session->set_flashdata('success', 'Customer added successfully!');
        } else {
            $this->session->set_flashdata('error', 'Customer name cannot be empty.');
        }

        redirect('ChequeController/add');
    }
}
