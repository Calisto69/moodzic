<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        $this->load->model('App_model', 'DbApp');
        $this->user_id = $this->session->userdata('user_id');
	}

	public function index()
	{
		$data['content'] = 'app/main-content';

		$data['sads'] = $this->DbApp->playlist('1', $this->user_id);
		$data['happys'] = $this->DbApp->playlist('2', $this->user_id);
		$data['playlists'] = $this->DbApp->playlist('3', $this->user_id);

		$data['music_player'] = get_any_table_array(array('user_id' => $this->user_id), 'musics');


		$this->load->view('app/home', $data);
	}
}
