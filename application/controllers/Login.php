<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        $this->load->model('Login_model', 'DbLogin'); 
	}

	public function index()
	{	
		$data = $this->input->post();
		// echo "<pre>"; print_r($data); echo "</pre>"; exit;
		
		$user_login = $this->DbLogin->check_user_login($data);
		// print_r($user_login); exit;

		if ($user_login == false) {

			$this->session->set_flashdata('error', 'Sorry, its look like your username or password is incorrect.');
			redirect();

		} else {

			$sess_data = array(
				'username' 	=> $user_login['username'],
				// 'name' 	  	=> $user_login['name'],
				'user_id' 	=> $user_login['id'],
				'email' 	=> $user_login['email']
			);

			$this->session->set_userdata($sess_data);
			// print_r($sess_data); exit;

			redirect('app');
		}

	}

	
}
