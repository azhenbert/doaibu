<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('login_model');
  }

	public function index()
	{
		$nik = $this->input->post('nik');
    $password = md5($this->input->post('password'));
    if (isset($_POST['login']))
    {
      $login = $this->login_model->login($nik,$password);
      if($login)
      {
        $session = array (
          'isLogin' => TRUE,
          'nik' => $login->nik,
          'nama_lengkap' => $login->nama_lengkap,
          'jabatan' => $login->jabatan
        );
        $this->session->set_userdata($session);
        redirect('dashboard');
      }
      else
      {
        $this->session->set_flashdata('login', 'Username / Password salah!');
        $this->load->view('login/index');
      }
    }
    else
    {
      $session = $this->session->userdata('isLogin');
      if($session == FALSE)
      {
        $this->load->view('login/index');
      }
      else
      {
        redirect('dashboard');
      }
    }
	}

}
