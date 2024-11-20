<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        $this->load->model('Music_model', 'DbMusic'); 
        $this->user_id = $this->session->userdata('user_id');
	}

	public function searchResults()
	{	
		$query = $this->input->post('query');
		$data['musics']  = $this->DbMusic->get_all_music_search_item($query, $this->user_id);
		$this->load->view('app/pages/search-music', $data);
	}

	
}
