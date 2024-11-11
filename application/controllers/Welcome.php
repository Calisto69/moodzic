<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        if ( $this->session->userdata('user_id') ) {

        	$role = $this->session->userdata('role');

        	if ($role == 1) {
        		redirect ('app');
        	} else {
        		redirect ('admin');
        	}
        }
        
	}

	public function index()
	{
		$this->load->view('login');
	}
}
