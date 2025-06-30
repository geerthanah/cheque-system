<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BankController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
        $this->load->model('BankModel'); 
        $this->load->model('ChequeModel');
        $this->load->model('CustomerModel');

        $this->load->library('form_validation');

        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('post/index');
        }
    }

    // Show all banks
    public function index() {
        $data['banks'] = $this->BankModel->getBanks();
        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/banks_list', $data);
        $this->load->view('includes/footer');
    }

    // Show Add Bank Form
    public function create() {
        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/bank_add');
        $this->load->view('includes/footer');
    }

    // Store Bank to Database
    public function store() {
        $this->load->model('BankModel');

        $data = array(
            'bank_name' => $this->input->post('bank_name'),
            'balance'   => $this->input->post('balance'), // Store the initial balance
            'user_id' => $this->session->userdata('user_id')
        );

        $this->BankModel->insertBank($data);

        $this->session->set_flashdata('success', 'Bank added successfully!');
        redirect('ChequeController/add');
    }

    public function getBalance($bank_id) {
        $this->load->model('BankModel');
        $balance = $this->BankModel->getBankBalance($bank_id);
        echo json_encode(['balance' => $balance]);
    }

    // Show edit form
    public function edit($id) {
        $user_id = $this->session->userdata('user_id');
        $data['bank'] = $this->BankModel->getBankById($id);
        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/bank_edit', $data);
        $this->load->view('includes/footer');
    }

    // Update bank details
    public function update($id) {
        $this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
        $this->form_validation->set_rules('balance', 'Balance', 'required|numeric');

        
            $data = array(
                'bank_name' => $this->input->post('bank_name'),
                'balance' => $this->input->post('balance')
            );

            $this->BankModel->updateBank($id, $data);
            redirect('BankController/index'); // Redirect after update
        
    }


  

    // Delete a bank
    public function delete($bank_id) {
        $this->BankModel->deleteBank($bank_id);
        redirect('BankController/index');
    }
}
