<?php if (! defined('BASEPATH')) EXIT ('No direct script access allowed');

class M_admin extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function get_data()
	{
		$query = $this->db->query('SELECT p.id as id, judul, isi, gambar, deleted, kategori from post p, kategori k where p.id_kategori = k.id');
		return $query;
	}

	function get_data_kategori()
	{
		$query = $this->db->get('kategori');
		return $query;
	}

	function insert($data) {
	 	$this->db->insert('post', $data);
	}

	function get_data_byID($id)
	{
		$query = $this->db->query("SELECT * FROM post where id = '$id'");
		return $query;
	}

	function get_data_kategori_byID($id)
	{
		$query = $this->db->query("SELECT * FROM kategori where id = '$id'");
		return $query;
	}

	function edit($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('post');
        return $query;
    }


}
