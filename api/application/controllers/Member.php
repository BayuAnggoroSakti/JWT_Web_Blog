<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends REST_Controller {

	public function index()
	{
		$this->load->view('json');
	}
	public function login()
	{
		$this->form_validation->set_rules('username', 'username', 'required|max_length[256]');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[2]|max_length[256]');
		return Validation::validate($this, '', '', function($token, $output)
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$id = $this->M_member->login($username, $password);
			if ($id != false) {
				$token = array();
				$token['id'] = $id;
				$output['status'] = true;
				$output['username'] = $username;
				$output['token'] = JWT::encode($token, $this->config->item('jwt_key'));
			}
			else
			{
				$output['errors'] = '{"type": "invalid"}';
			}
			return $output;
		});
	}

	public function list_artikel()
	{
		return Validation::validate($this, '', '', function($token, $output)
		{
			$list = $this->M_member->get_list();
			foreach($list->result() as $data) {
				$output['id'] = $data->id;
				$output['judul'] = $data->judul;
				$output['isi'] = $data->isi;
			}
			return $output;
		});
	}

	public function detail_artikel()
	{
		return Validation::validate($this, '', '', function($token, $output)
		{
			$id = $this->form_validation->set_rules('id', 'id', 'required');
			$detail = $this->M_member->get_list_byID($id);
			foreach($detail->result() as $data) {
				$output['id'] = $data->id;
				$output['judul'] = $data->judul;
				$output['isi'] = $data->isi;
			}
			return $output;
		});
	}

	

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */