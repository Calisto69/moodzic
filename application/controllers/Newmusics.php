<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newmusics extends CI_Controller {

	public function index()
	{	
		$data['content'] = 'app/pages/new-music'; 
		$this->load->view('app/home', $data);	
	}

	function upload($data=false)
	{

		$post = $this->input->post();
		// print_r($post); exit;

		if (!empty($_FILES)) {

		    $getFile     = $_FILES['musicFile'];

		    $file = $getFile['name'];


		    $ext                            = pathinfo($file, PATHINFO_EXTENSION);
            $hashfilename                   = getRandomString('20') . "." . $ext;

		    // Load the upload library and set preferences
	        $config['upload_path']   = './uploads/musics';  // Define where to store files
	        $config['allowed_types'] = 'mp3|wav|m4a';  // Specify allowed audio formats
	        $config['max_size']      = 20000; // Set max file size (10MB)
	        $config['file_name']     = $hashfilename;

	        $this->load->library('upload', $config);

	        if (!$this->upload->do_upload('musicFile')) {

	            // Upload failed
	            $data['error'] = $this->upload->display_errors();
	            // $this->load->view('music_upload_form', $data);
	            print_r($data['error']); exit;

	        } else {

	        	$fileData = $this->upload->data();
            	$filePath = $fileData['full_path'];

	        	require 'vendor/autoload.php';
            	$getID3 = new getID3();

            	$fileInfo = $getID3->analyze($filePath);

            	if (isset($fileInfo['playtime_seconds'])) {
	                $durationInSeconds = $fileInfo['playtime_seconds'];
	                // Convert duration to a readable format (H:i:s)
	                // echo "Duration in seconds: " . $durationInSeconds;
	                $formatDuration = gmdate("H:i:s", $durationInSeconds);
	            } else {
	                // echo "Could not determine the duration.";
	                $formatDuration = "Dutaion Could Not Determine";
	            }

	        	$data_insert = array(
                        'name' => $post['name'],
                        'singer' => $post['singer'],
                        'category' => $post['category'],
                        'create_dt' => current_dt(),
                        'filename' => $hashfilename,
                        'original_filename' => $file,
                        'path' => $config['upload_path'],
                        'duration' => $formatDuration,
                );

                $insert = insert_any_table($data_insert, 'musics');

                echo "success"; exit;

	            // Upload success
	            // $data = array('upload_data' => $this->upload->data());
	            // $this->load->view('success', $data);
			}



		}
	}

}
