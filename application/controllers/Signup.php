<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function index()
	{	
		$data['script'] = 'assets/js/custom/authentication/sign-up/general.js';
		$this->load->view('signup', $data);
	}

	function doSignUp($data=false)
	{
		$post = $this->input->post();
		//echo "<pre>"; print_r($post); echo "</pre>";

		$status = true;

		$insert = array(
			'username'  => $post['username'],
			'password' 	=> md5($post['password']),
			'email' 	=> $post['email'],
			'create_dt' => current_dt(),
			'role'      => '1',
			'fullname'  => $post['fullname']
		);

		$do_insert = insert_any_table($insert, 'users');

		if ($do_insert == false) {
			$status = false;
		}

		$response = array('status' => $status );
		echo encode($response);
	}

	function isUsername($data=false)
	{
		$username  = $this->input->post('username');
		$is_exist  = get_any_table_row(array('username' => $username), 'users');

		if ($is_exist == true) {
			$response = array('status' => true ); 	
		} else {
			$response = array('status' => false );
		}

		echo encode($response);
	}
}
