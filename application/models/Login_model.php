<?php

class Login_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->users = "users";
    }

    function check_user_login($data)
	{
		$this->db->select('*');
        $this->db->where(array(
            'username'   => $data['username'], 
            'password'   => md5($data['password']),
        ));
        $query = $this->db->get($this->users);

        // echo $this->db->last_query(); exit();

        if($query->num_rows() > 0){
        	return $query->row_array();
        } else {
            return false;
        }

	}
}
