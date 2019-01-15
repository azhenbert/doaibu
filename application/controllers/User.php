<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
		if($this->session->userdata('isLogin') == FALSE)
		{
			redirect('login');
		}
    else if(!in_array($this->session->userdata('jabatan'), array('ADMIN')))
    {
      $data['content'] = 'layout/403';
      echo $this->load->view('layout/main',$data, TRUE);
      die();
    }
  }

	public function index()
	{
    $data['users'] = $this->user_model->get_all_user();
    $data['content'] = 'user/index';
		$this->load->view('layout/main',$data);
	}

  public function tambah()
	{
    if (isset($_POST['submit']))
    {
      $params = array(
        'nik' => $this->input->post('nik'),
        'nama_lengkap' => strtoupper($this->input->post('nama_lengkap')),
        'jabatan' => $this->input->post('jabatan'),
        'password' => md5($this->input->post('nik'))
      );
      $this->user_model->tambah_user($params);
      $this->session->set_flashdata('msg', 'User berhasil di-tambahkan!');
    }
    $data['users'] = $this->user_model->get_last_nik();
    $data['content'] = 'user/tambah';
		$this->load->view('layout/main',$data);
	}

  public function edit($nik)
  {
    if (isset($_POST['submit']))
    {
      $params = array(
        'nik' => $this->input->post('nik'),
        'nama_lengkap' => strtoupper($this->input->post('nama_lengkap')),
        'jabatan' => $this->input->post('jabatan')
      );
      $this->user_model->update_user($params);
      $this->session->set_flashdata('msg', 'User berhasil di-edit!');
    }
    $data['users'] = $this->user_model->get_user($nik);
    $data['content'] = 'user/edit';
		$this->load->view('layout/main',$data);
  }

  public function hapus($nik)
	{
    $this->user_model->hapus_user($nik);
    redirect('user/index');
	}

}
