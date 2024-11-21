<?php

class Admin_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->users = "users";
        $this->musics = "musics";
    }

    function playlist($category)
	{
		$this->db->select('*');
        if ($category <> 'ALL') {
            $this->db->where('category', $category);
        }
        $query = $this->db->get($this->musics);

        // echo $this->db->last_query(); exit();

        if($query->num_rows() > 0){
        	return $query->result_array();
        } else {
            return false;
        }

	}

    public function get_all_user()
    {
        // code...
        $this->db->select('*');
        $this->db->where('role', '1');
        $query = $this->db->get($this->users);

        // echo $this->db->last_query(); exit();

        if($query->num_rows() > 0){
            return $query->result_array();
        } else {
            return false;
        }
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

    public function get_all_music_search_item($query)
    {
        // code...
        $this->db->select('*');
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
