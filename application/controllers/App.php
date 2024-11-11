<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        $this->load->model('App_model', 'DbApp'); 
	}

	public function index()
	{	
		$data['content'] = 'app/main-content';

		$data['sads'] = $this->DbApp->playlist('1');
		$data['happys'] = $this->DbApp->playlist('2');
		$data['playlists'] = $this->DbApp->playlist('3');


		$this->load->view('app/home', $data);
	}

	
}
