<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ganti_password extends CI_Controller {

	function __construct()
  {
    parent::__construct();
    $this->load->model('password_model');
		if($this->session->userdata('isLogin') == FALSE)
		{
			redirect('login');
		}
  }

	public function index()
	{
		if (isset($_POST['submit']))
    {
      $params = array(
        'nik' => $this->session->userdata('nik'),
				'password_lama' => md5($this->input->post('password_lama')),
				'password_baru' => md5($this->input->post('password_baru')),
				'password_baru2' => md5($this->input->post('password_baru2'))
      );
      $cek_pass_lama = $this->password_model->cek_password_lama($params);
			if($cek_pass_lama)
			{
				if($params['password_baru'] == $params['password_baru2'])
				{
					$this->password_model->update_password($params);
					$this->session->set_flashdata('msg_ok', 'Password berhasil di-ganti!');
				}
				else
				{
					$this->session->set_flashdata('msg_error', 'Konfirmasi Password Baru tidak sesuai!');
				}
			}
			else
			{
				$this->session->set_flashdata('msg_error', 'Password Lama salah!');
			}
    }
    $data['content'] = 'ganti_password/index';
		$this->load->view('layout/main',$data);
	}

}
