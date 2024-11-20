<?php

class Music_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->musics = "musics";
    }

    function get_all_music()
	{
		$this->db->select('*');
        $query = $this->db->get($this->musics);

        // echo $this->db->last_query(); exit();

        if($query->num_rows() > 0){
        	return $query->result_array();
        } else {
            return false;
        }
	}

    function get_all_fav_music($user_id)
    {
        $this->db->select('*');
        $this->db->where('user_id', $user_id);
        $this->db->where('fav', '1');
        $query = $this->db->get($this->musics);

        // echo $this->db->last_query(); exit();

        if($query->num_rows() > 0){
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_all_music_search_item($query, $user_id)
    {
        // code...
        $this->db->select('*');
        $this->db->where('user_id', $user_id);
        $this->db->group_start();  // Start a group of conditions
        $this->db->like('name', $query);
        $this->db->or_like('singer', $query);
        $this->db->group_end();  // End the group of conditions
        $query = $this->db->get($this->musics);

        // echo $this->db->last_query(); exit();

        if($query->num_rows() > 0){
            return $query->result_array();
        } else {
            return false;
        }
        
    }
}
