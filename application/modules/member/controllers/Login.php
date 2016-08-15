<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
	
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('m_member');
	}

	public function index()
	{
		$data['title'] = "Halaman Login Member";
		$data['content'] = 'member/v_login';
		if ($this->session->userdata('level')=="member") {
			redirect('member');
		}
		else
		{
				$this->load->library('form_validation');
				$this->load->helper('security');
				$data['captcha_return'] ='';
				$data['cap_img'] = $this->m_member->make_captcha();
				if ($this->security->xss_clean($this->input->post('submit',true))) {
					$this->form_validation->set_rules('username','Username','trim|required|xss_clean');
					$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
					$this->form_validation->set_rules('captcha', 'Captcha', 'required');
					$this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
					if ($this->form_validation->run() == FALSE) {
						$this->load->view('v_login',$data);
					}
					else
					{	
						if($this->m_member->check_captcha()==TRUE) {
							$username = $this->input->post('username', TRUE);
							$password = md5($this->input->post('password', TRUE));
							$hasil = $this->m_member->cek_user($username, $password);
							if ($hasil->num_rows() == 1) {
								foreach ($hasil->result() as $sess) {
									$sess_data['logged_in'] = 'true';
									$sess_data['id'] = $sess->id;
									$sess_data['username'] = $sess->username;
									$sess_data['nama'] = $sess->nama;
									$sess_data['level'] = "member";
									$this->session->set_userdata($sess_data);
								}
									redirect('member');	
							}
							else {
								$back = site_url('member/login');
								echo '<script type="text/javascript">'; 
								echo 'alert("Gagal login, Silahkan cek kembali username dan password anda");'; 
								echo 'window.location.href = "'.$back.'";';
								echo '</script>';
							}
								}
						else
						{
							$data['captcha_return'] = '<div class="alert alert-danger alert-dismissable">
						                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						                    <h4><i class="icon fa fa-info"></i> Peringatan!</h4>
						                    Captcha tidak sesuai, Silahkan coba lagi !
						                 </div>';
							$data['body'] = $this->load->view('v_login', $data);
						}
						
					}
				}
				else
				{
					$this->load->view('v_login',$data);
				}	
		}
	
	}

	 public function daftar()
    {
    	$this->load->helper('security');
		$this->load->library('form_validation');	
		$data['title'] = "Daftar Member";
		$data['captcha_return'] ='';
		$data['cap_img'] = $this->m_member->make_captcha();
		
		if ($this->security->xss_clean($this->input->post('submit',true))) {
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');
			$this->form_validation->set_rules('username', 'Username', 'trim|min_length[3]|max_length[20]|required|alpha_dash|min_length[3]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[35]|matches[passconf] |xss_clean');
			$this->form_validation->set_rules('passconf', 'Confirm Password', 'trim|required|min_length[5]|max_length[35]|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[35]|valid_email');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|xss_clean');
			$this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required|xss_clean');
			$this->form_validation->set_rules('captcha', 'Captcha', 'required');
			$this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');

			if ($this->form_validation->run() == FALSE) {
			$this->load->view('member/daftar',$data);
			}else {
				if($this->m_member->check_captcha()==TRUE) {

					$nama = $this->input->post('nama');
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$email = $this->input->post('email');
					$alamat = $this->input->post('alamat');
					$no_hp = $this->input->post('no_hp');
					//$level = $this->input->get('level');
					$cek = $this->m_member->check_query('member', $username);
					if ($cek == false) {
						$input_data = array(
							'nama' => $nama,
							'username' => $username,
							'email' => $email,
							'password' => md5($password),
							'alamat' => $alamat,
							'no_hp' => $no_hp,
							);
						if($this->db->insert('member', $input_data)){
							//redirect(base_url().'home/login');
								echo '<script type="text/javascript">'; 
								echo 'alert("Selamat anda telah berhasil mendaftar sebagai member, Mohon menunggu untuk di konfirmasi oleh admin kami, info lebih lanjut silahkan hubungi kami");'; 
								echo 'window.location.href = "index";';
								echo '</script>';
						} else {
							$data['body'] = "error on query";
						}
					} else {
						$data['captcha_return'] = '<div class="alert alert-danger alert-dismissable">
			                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                    <h4><i class="icon fa fa-info"></i> Peringatan!</h4>
			                    Username atau email anda sudah ada, Silahkan ubah !
			                 </div>';
						$data['body'] = $this->load->view('daftar',$data);
						}
					} else {
						$data['captcha_return'] = '<div class="alert alert-danger alert-dismissable">
			                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                    <h4><i class="icon fa fa-info"></i> Peringatan!</h4>
			                    Captcha tidak sesuai, Silahkan coba lagi !
			                 </div>';
						$data['body'] = $this->load->view('daftar',$data);
					}
				}
			}
				else {
				$this->load->view('daftar',$data);
			}
    }

	public function logout()
	{
		$this->session->unset_userdata();
		session_destroy();
		redirect('member');
	
	}

}
