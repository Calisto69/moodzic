<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allmusic extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        $this->load->model('Music_model', 'DbMusic'); 
	}

	public function index()
	{			
		$data['musics']  = $this->DbMusic->get_all_music();
		$data['content'] = 'app/pages/all-music'; 
		$this->load->view('app/home', $data);	
		
	}

	public function addToFav($data=false)
	{
		// code...
		$id = $this->input->post('id');

		$get_fav = get_any_table_row(array('id' => $id), 'musics');

		if ($get_fav['fav'] == '1') {
			echo encode(array('status' => 'info', 'msg' => 'Already added to favourites'));
		} else {
			$update = array('fav' => '1');
			$where = array('id' => $id);

			$update = update_any_table($update, $where, 'musics');

			if ($update == true) {
				echo encode(array('status' => 'success', 'msg' => 'Added to favourites'));
			} else {
				echo encode(array('status' => 'failed', 'msg' => 'Failed to add to favourites'));
			}
		}
	}

	function addToCategory($data=false)
	{
		$id = $this->input->post('id');
		$category = $this->input->post('category');

		$update = array('category' => $category);
		$where = array('id' => $id);

		$update = update_any_table($update, $where, 'musics');
		echo encode(array('status' => 'success', 'msg' => 'Successfuly added !'));
		
	}

	function deleteMusic($data=false)
	{
		$id = $this->input->post('id');

		$where = array('id' => $id);

		$delete = delete_any_table($where, 'musics');

		if($delete == true)
		{
			echo encode(array('status' => 'success', 'msg' => 'Successfuly deleted !'));
		} else {
			echo encode(array('status' => 'fail', 'msg' => 'Failed to delete !'));
		}
	}

	
}
