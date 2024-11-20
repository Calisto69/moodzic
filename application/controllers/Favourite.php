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
		// print_r($data['favs']); exit;
		$this->load->view('app/home', $data);	
		
	}

	function removeFromFav($data=false)
	{
		$id = $this->input->post('id');

		$update = array('fav' => '0');
		$where = array('id' => $id);

		$update = update_any_table($update, $where, 'musics');

		if ($update == true) {
			echo encode(array('status' => 'success', 'msg' => 'Removed from favourites'));
		} else {
			echo encode(array('status' => 'failed', 'msg' => 'Failed to remove from favourites'));
		}

	}



	
}
