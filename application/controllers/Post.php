<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
       
      
    }

    public function index(){
            $this->load->view('homes/login');
    }


    // Register function
    public function register() {
        $this->load->view('homes/register');
        if ($this->input->post()) {
            $data = [
                'full_name'    => $this->input->post('full_name'),
                'phone'        => $this->input->post('phone'),
                'email'        => $this->input->post('email'),
                'password'     => md5($this->input->post('password')),
            ];

            if ($this->Auth_model->register_user($data)) {
                $this->session->set_flashdata('success', 'Registration successful. Please login.');
                redirect('post/index');
            } else {
                $this->session->set_flashdata('error', 'Registration failed. Email might already exist.');
                redirect('post/index');
            }
        }
    }

    // Login function
    public function login() {
    
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
      
            $data = $this->Auth_model->login($email, $password);

            if ($data) {
                
                $this->session->set_userdata('user_id', $data['user_id']);
                $this->session->set_userdata('username', $data['full_name']);
                $this->session->userdata('user_id');
                $this->session->userdata('username');
                redirect('ChequeController/index');
            } else {
                
                $this->session->set_flashdata('error', 'Invalid email or password.');
                redirect('post/index');
            }
    }


    
    
   // Logout user
   public function logout()
   {
            $this->session->sess_destroy();
            $this->session->set_flashdata('success', 'Logged out successfully.');
            redirect('post/index');
   }
}



