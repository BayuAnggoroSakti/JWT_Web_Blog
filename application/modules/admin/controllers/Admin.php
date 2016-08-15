<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
	
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('m_admin');
		
	}

	public function index()
	{
		$data['title'] = "Admin | Post Artikel";
		$data['content'] = 'admin/index';
		$data['get_data'] = $this->m_admin->get_data();
		$this->template->admin_template($data);
	}

	public function edit($id)
	{
		$data['title'] = "Admin | Post Artikel";
		$data['content'] = 'admin/edit';
		$data['get_data'] = $this->m_admin->get_data_byId($id);
		$data['kategori'] = $this->m_admin->get_data_kategori();
		return $this->load->view('edit',$data);
	}

	public function back()
	{
		$data['title'] = "Admin | Post Artikel";
		$data['content'] = 'admin/index';
		$data['get_data'] = $this->m_admin->get_data();
		return $this->load->view('back',$data);
	}

	public function tambah()
	{
		$data['title'] = "Admin | Tambah Post";
		$data['content'] = 'admin/tambah';
		$data['kategori'] = $this->m_admin->get_data_kategori();
		return $this->load->view('tambah',$data);
	}

	public function hapus($id)
	{
		$data_update = array('deleted' =>'1' , );
		$this->db->where('id',$id);
		$this->db->update('post',$data_update);
		$this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> menghapus data post','class' => 'alert alert-info'));
	    redirect(base_url().'admin');
	}

	public function proses_edit()
	{
    	if ($this->security->xss_clean($this->input->post('submit',true))) {
    		     $judul = $this->security->xss_clean($this->input->post('judul',true));
    		     $id = $this->security->xss_clean($this->input->post('id',true));
    		     $isi = $this->security->xss_clean($this->input->post('isi',true));
    		     $kategori = $this->security->xss_clean($this->input->post('kategori',true));

    		     $list_kat = $this->m_admin->get_data_kategori();
    		     foreach ($list_kat->result() as $listdata) {
    		     	$listid[] = $listdata->id;
    		     }

    		     if (in_array($kategori, $listid)) {
				     $config['upload_path']    = "./assets/img/";
					 $config['allowed_types']  = 'gif|jpg|png|jpeg';
					 $config['max_size']       = '5000';
					 $config['max_width']      = '5000';
					 $config['max_height']     = '5000';
					 $config['file_name']      = $judul;
					 $this->load->library('upload', $config);
						
					if (!$this->upload->do_upload('gambar')) {
						$data = array(
								'judul' => $judul,
					            'isi' => $isi,
					            'id_kategori' => $kategori,
						);
			        $this->db->where('id', $id);
			        $this->db->update('post', $data);
			        $this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> mengubah data post','class' => 'alert alert-info'));
					redirect(base_url().'admin');
					}
					 else{
						$post = $this->m_admin->edit($id);
		    			$base_url = './assets/img';
						unlink($base_url.'/'.$post->row('gambar'));
						$data = array(
								'judul' => $judul,
					            'isi' => $isi,
					            'id_kategori' => $kategori,
					            'gambar' => $this->upload->file_name,
						);
			        $this->db->where('id', $id);
			        $this->db->update('post', $data);
			        $this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> mengubah data post','class' => 'alert alert-info'));
					redirect(base_url().'admin');
					 }
				}
				else{
					echo "error";
				}    
		}
		else
		{
			echo "error";
		}
	}

	public function proses_tambah()
	{
		 if ($this->security->xss_clean($this->input->post('submit',true))) {

		    	 $list_kat = $this->m_admin->get_data_kategori();
    		     foreach ($list_kat->result() as $listdata) {
    		     	$listid[] = $listdata->id;
    		     }
    		     $id_kategori = $this->security->xss_clean($this->input->post('kategori',true));
    		     if (in_array($id_kategori, $listid)) 
    		     {
    		     		 $config['upload_path']    = "./assets/img/";
						 $config['allowed_types']  = 'gif|jpg|png|jpeg';
						 $config['max_size']       = '5000';
						 $config['max_width']      = '5000';
						 $config['max_height']     = '5000';
						 $config['file_name']      = 'gambar-'.trim(str_replace(" ","",date('dmYHis')));
						 $this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('gambar')) {
							$base_ulang = base_url('admin');
							$base_kembali = base_url('admin/tambah');
							echo "<script language=\"Javascript\">\n";
							//Ada kesalahan dalam upload gambar, Ingin diulangi kembali atau tidak?'
							echo "confirmed = window.confirm('Ada kesalahan dalam upload gambar, Ingin diulangi kembali atau tidak?');";
							echo "if (confirmed)";
							echo "{";
							echo "window.location = '".$base_ulang."';";
							echo "}";
							echo "else ";
							echo "{";
							echo "window.location = '".$base_kembali."';";
							echo "}";
							echo "</script>";
						} else{
							 $judul = $this->security->xss_clean($this->input->post('judul',true));
			    		     $id = $this->security->xss_clean($this->input->post('id',true));
			    		     $isi = $this->security->xss_clean($this->input->post('isi',true));
			    		    
							
							$file = $this->upload->file_name;
							$user = 1;
							$data = array(
									'judul' => $judul,
									'isi' => $isi,
									'id_kategori' => $id_kategori,
									'gambar' => $this->upload->file_name,
									'id_admin' => $user,
							);
							$this->m_admin->insert($data); 
							$this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> menambahkan postingan','class' => 'alert alert-info'));
							redirect(base_url().'admin');
						}    
    		     }
    		     else
    		     {
    		     	echo "Something went wrong";
    		     }
		}
		else
		{
			echo "error";
		}
	}



}
