<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends MY_Controller {
	
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('m_admin');
		
	}

	public function index()
	{
		$data['title'] = "Admin | Kategori Artikel";
		$data['content'] = 'admin/kategori';
		$data['get_data'] = $this->m_admin->get_data_kategori();
		$this->template->admin_template($data);
	}

	public function tambah()
	{
		return $this->load->view('tambah_kategori');
	}

	public function edit($id)
	{
		$data['get_data'] = $this->m_admin->get_data_kategori_byId($id);
		return $this->load->view('edit_kategori',$data);
	}

	public function proses_edit()
	{
		if ($this->security->xss_clean($this->input->post('submit',true))) {
			$kategori = $this->security->xss_clean($this->input->post('kategori',true));
			$id = $this->security->xss_clean($this->input->post('id',true));
			$insert = array('kategori' => $kategori);
			$this->db->where('id',$id);
			$this->db->update('kategori',$insert);
			$this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> menmabah kategori','class' => 'alert alert-info'));
	        redirect(base_url().'admin/kategori');
		} else {
			# code...
		}
	}

	public function proses_tambah()
	{
		if ($this->security->xss_clean($this->input->post('submit',true))) {
			$kategori = $this->input->post("kategori",true);
			$insert = array('kategori' => $kategori);
			$this->db->insert('kategori',$insert);
			$this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> menmabah kategori','class' => 'alert alert-info'));
	        redirect(base_url().'admin/kategori');
		} else {
			# code...
		}
		
	}

}
