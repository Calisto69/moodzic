<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        $this->load->model('Admin_model', 'DbAdmin'); 
        $this->user_id = $this->session->userdata('user_id');
	}

	public function index()
	{	
		$data['content'] = 'admin/main-content';

		// $data['sads']     = $this->DbApp->playlist('1');
		// $data['happys']   = $this->DbApp->playlist('2');
		// $data['playlists'] = $this->DbApp->playlist('3');

		// $data['music_player'] = get_any_table_array(array('user_id' => $this->user_id), 'musics');


		$this->load->view('admin/home', $data);
	}

	function allUsers($data=false)
	{
		$data['users']  = $this->DbAdmin->get_all_user();
		$data['content'] = 'admin/pages/all-user'; 
		$this->load->view('admin/home', $data);
	}

	public function userAccount($id)
	{
		// code...
		$data['profile'] = get_any_table_row(array('id'=>$id), 'users');
		$data['musics'] = get_any_table_array(array('user_id' => $id), 'musics');

		$data['content'] = 'admin/pages/user-profile'; 
		$this->load->view('admin/home', $data);	
	}

	function updateUserProfile($data=false)
	{	
		$post = $this->input->post();
		// echo "<pre>"; print_r($post); echo "</pre>"; exit;




			$update = array(
				'fullname' => $post['fullname'],
				'email'    => $post['email'],
			);
			

			// print_r($update); exit;
			$data_where = array('id' => $post['id']);

			update_any_table($update, $data_where, 'users');

			$response = array('status' => true , 'msg' => 'Successfully update profile');
		

		echo encode($response);
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

	public function deleteAcc($data=false)
	{
		// code...
		$id = $this->input->post('id');

		$where = array('id' => $id);
		$whereMsc = array('user_id' => $id);

		$delete_user = delete_any_table($where, 'users');

		$delete_music = delete_any_table($whereMsc, 'musics');

		if ($delete_user == true && $delete_music == true) {
			// code...
			echo encode(array('status' => 'success', 'msg' => 'Account successfuly deleted !'));

		} else {
			echo encode(array('status' => 'success', 'msg' => 'Failed to delete.'));
		}
	}

	function allMusics($data=false)
	{
		$data['musics']  = $this->DbAdmin->get_all_music();
		$data['content'] = 'admin/pages/all-musics'; 
		$this->load->view('admin/home', $data);	
	}


	public function profile($data=false)
	{
		// code...
		$data['profile'] = get_any_table_row(array('id'=>$this->user_id), 'users');

		$data['content'] = 'admin/pages/profile'; 
		$this->load->view('admin/home', $data);	
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


	public function searchResults()
	{	
		$query = $this->input->post('query');
		$data['musics']  = $this->DbAdmin->get_all_music_search_item($query);
		$this->load->view('admin/pages/search-music', $data);
	}







	
}
