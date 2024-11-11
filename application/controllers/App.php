<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        $this->load->model('Login_model', 'DbLogin'); 
	}

	public function index()
	{	
		$data['content'] = 'app/main-content'; 
		$this->load->view('app/home', $data);
	}

	
}
