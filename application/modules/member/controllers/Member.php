<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {
	
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('m_member');
		if ($this->session->userdata('level') != 'member') {
			redirect('member/login');
		}
		
	}

	public function index()
	{
		$data['title'] = "Profil Member";
		$data['content'] = 'member/index';
		$id = $this->session->userdata('id');
		$data['user'] = $this->m_member->profil($id);
		$this->template->member_template($data);
	}

	public function edit($id)
    {
        $data = $this->m_member->get_user_by_id($id); 
        echo json_encode($data);
    }

   

     public function proses_edit()
    {
        $this->_validate_profil();
        $data = array(
                'nama' => $this->security->xss_clean($this->input->post('nama',true)),
                'alamat' => $this->security->xss_clean($this->input->post('alamat',true)),
                'email' => $this->security->xss_clean($this->input->post('email',true)),
                'no_hp' => $this->security->xss_clean($this->input->post('no_hp',true)),

            );
        $this->m_member->update_profil(array('id' => $this->input->post('id')), $data);
         $this->session->set_flashdata('item', array('message' => '<strong>Berhasil</strong> mengubah data profil','class' => 'alert alert-info'));
        redirect('member');
    }

    private function _validate_profil()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama') == '')
        {
            $data['inputerror'][] = 'nama';
            $data['error_string'][] = 'nama is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('alamat') == '')
        {
            $data['inputerror'][] = 'alamat';
            $data['error_string'][] = 'alamat is required';
            $data['status'] = FALSE;
        }

         if($this->input->post('no_hp') == '')
        {
            $data['inputerror'][] = 'no_hp';
            $data['error_string'][] = 'no_hp is required';
            $data['status'] = FALSE;
        }

         if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'email is required';
            $data['status'] = FALSE;
        }

      
 
     
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


}
