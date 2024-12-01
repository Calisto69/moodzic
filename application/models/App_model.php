<?php

class App_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->musics = "musics";
    }

    function playlist($category, $user_id)
	{
		$this->db->select('*');
        $this->db->where('user_id', $user_id);
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

}
