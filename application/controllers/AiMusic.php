<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AiMusic extends CI_Controller {

    public function index() {
        // Add Flask server URL to the view data
        $data['flask_url'] = 'http://127.0.0.1:5000';
        $data['content'] = 'app/pages/ai-music';
        $this->load->view('app/home', $data);
    }
}
?>
