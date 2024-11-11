<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favourite extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        $this->load->model('Music_model', 'DbMusic'); 

        $this->user_id = $this->session->userdata('user_id');
	}

	public function index()
	{			
		$data['favs']  = $this->DbMusic->get_all_fav_music($this->user_id);
		$data['content'] = 'app/pages/fav'; 
		$this->load->view('app/home', $data);	
		
	}

	
}
