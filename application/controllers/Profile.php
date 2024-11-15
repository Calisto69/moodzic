<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        $this->load->model('App_model', 'DbApp'); 
        $this->user_id = $this->session->userdata('user_id');
	}

	public function index()
	{	

		$data['profile'] = get_any_table_row(array('id'=>$this->user_id), 'users');

		$data['content'] = 'app/pages/profile'; 
		$this->load->view('app/home', $data);	
	}

	function update($data=false)
	{	
		$post = $this->input->post();
		// echo "<pre>"; print_r($post); echo "</pre>"; exit;


		$check_username = get_any_table_row(array('username' => $post['username'], 'id !=' => $this->user_id), 'users');



		if ($check_username == true) {
			$response = array('status' => false , 'msg' => 'This username is already exist.');
		} else {
			$update = array(
				'fullname' => $post['fullname'],
				'username' => $post['username'],
				'email'    => $post['email'],
			);
			

			// print_r($update); exit;
			$data_where = array('id' => $this->user_id);

			update_any_table($update, $data_where, 'users');

			$response = array('status' => true , 'msg' => 'Your profile has been updated.');
		}

		echo encode($response);
	}

	
}
