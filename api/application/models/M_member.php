<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_member extends CI_Model {

	public function login($username, $password)
	{
		$query = $this->db->query("SELECT * from member where username ='$username' ");
		if ($query->num_rows() == 1) 
		{
			foreach ($query->result() as $data) {
			$password_db = $data->password;
			if ($password_db == md5($password)) {
				return true;
			} else {
				return false;
			}
			
		}
		} 
		else 
		{
			return false;
		}	
	}

	public function get_list()
	{
		return $this->db->get('post');
	}
    
    public function get_list_byID($id)
	{
		$query = $this->db->query("SELECT * from post where id = '$id'");
		return $query;
	}
}

/* End of file users.php */
/* Location: ./application/models/users.php */