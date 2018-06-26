<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctr_user extends CI_Controller{

	public function __construct()
 	{
 		parent::__construct();

 		$this->load->library('form_validation');
 		// $this->load->helper('MY');
 		$this->load->model('model_user');
 	}

 	public function register(){
 		
 		$this->form_validation->set_rules('nama', 'Nama', 'required');
 		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
 		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
 		$this->form_validation->set_rules('password', 'Password', 'required');
 		$this->form_validation->set_rules('password2', 'Konfirmasi Password','matches[password]');

 		if($this->form_validation->run() === FALSE){
 			$this->load->view("template/header");
		// Passing data ke view
		$this->load->view('register');
		$this->load->view("template/footer");
 		} else {

 		$enc_password = md5($this->input->post('password'));

		$this->model_user->register($enc_password);

		// Set message
		$this->session->set_flashdata('user_registered', 'Anda telah teregistrasi.');

		redirect('web');
 		}
 	}

 	public function login(){

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view("template/header");
		// Passing data ke view
		$this->load->view('login');
		$this->load->view("template/footer");
		} else {
			
	// Get username
	$username = $this->input->post('username');
	// Get & encrypt password
	$password = md5($this->input->post('password'));

	// Login user
	$user_id = $this->model_user->login($username, $password);

	if($user_id){
		// Buat session
		$user_data = array(
			'user_id' => $user_id,
			'username' => $username,
			'logged_in' => true,
			'level' => $this->model_user->get_user_level($user_id),
		);

		$this->session->set_userdata($user_data);

		// Set message
		$this->session->set_flashdata('user_loggedin', 'Anda sudah login');
		redirect('dashboard');

		//redirect('web');
	} else {
		// Set message
		$this->session->set_flashdata('login_failed', 'username atau password salah');

		redirect('web');
	}		
		}
	}

	// Log user out
	public function logout(){
		// Unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		// Set message
		$this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

		redirect('web');
	}

	 // Dashboard
    public function dashboard(){

        if(!$this->session->userdata('logged_in')){
            redirect('user/login');
        }

        $username = $this->session->userdata('username');

        // Dapatkan detail user
        $data['user'] = $this->user_model->get_user_details( $username );

        // Load dashboard
        $this->load->view('templates/header');
        $this->load->view('users/dashboard', $data);
        $this->load->view('templates/footer');
    }


 }