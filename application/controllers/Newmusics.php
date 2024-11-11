<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newmusics extends CI_Controller {

	public function index()
	{	
		$data['content'] = 'app/pages/new-music'; 
		$this->load->view('app/home', $data);	
	}

	
}
