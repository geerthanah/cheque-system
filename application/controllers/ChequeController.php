<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChequeController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ChequeModel');
        $this->load->model('CustomerModel');
        $this->load->model('BankModel');
        $this->load->library('form_validation');


        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('post/index');
        }
        
    }

    

    public function index() {
        $data['cheques'] = $this->ChequeModel->getCheques();
        $data['customers'] = $this->CustomerModel->getCustomers();
        $data['banks'] = $this->BankModel->getBanks();
        
        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/dashboard', $data);
        $this->load->view('includes/footer');
      
        
        
    }

    public function home() {

        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/home');
        $this->load->view('includes/footer');
       
    }

    public function add() {
        $data['customers'] = $this->db->get('customers')->result();
        $data['banks'] = $this->db->get('banks')->result();
         
        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/add', $data);
        $this->load->view('includes/footer');
    }

    public function addCheque() {
        
        $this->form_validation->set_rules('cheque_no', 'Cheque Number', 'required');
        $this->form_validation->set_rules('customer_id', 'Customer', 'required');
        $this->form_validation->set_rules('bank_id', 'Bank', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = [
                'cheque_no' => $this->input->post('cheque_no'),
                'customer_id' => $this->input->post('customer_id'),
                'bank_id' => $this->input->post('bank_id'),
                'amount' => $this->input->post('amount'),
                'issue_date' => $this->input->post('issue_date'),
                'status' => 'Not Presented',
                'user_id' => $this->session->userdata('user_id')
            ];
            $this->ChequeModel->addCheque($data);

            // Deduct bank balance
        $this->BankModel->deductBalance($data['bank_id'], $data['amount']);

            
            redirect('ChequeController');
        }
    }


    

    public function printCheque($id) {
        $data['cheque'] = $this->ChequeModel->getChequeById($id);
        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/print_cheque', $data);
        $this->load->view('includes/footer');
    }

    public function updateStatus($id) {
        $status = $this->input->post('status');
        $this->ChequeModel->updateChequeStatus($id, $status);
        redirect('ChequeController');
    }



    public function filterByMonth()
    {
        // Get filter values
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        
        // Get filtered cheques
        $data['cheques'] = $this->ChequeModel->getChequesByMonth($year, $month);
        
        // Load the view with data
        $this->load->view('includes/header');
        $this->load->view('includes/side_menu');
        $this->load->view('homes/cheques_list', $data);
        $this->load->view('includes/footer');

    }
    
}