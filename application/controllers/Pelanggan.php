<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('pelanggan_model');
		if($this->session->userdata('isLogin') == FALSE)
		{
			redirect('login');
		}
    else if(!in_array($this->session->userdata('jabatan'), array('ADMIN','PENJUALAN')))
    {
      $data['content'] = 'layout/403';
      echo $this->load->view('layout/main',$data, TRUE);
      die();
    }
  }

  public function index()
	{
    $data['pelanggan'] = $this->pelanggan_model->get_all_pelanggan();
    $data['content'] = 'pelanggan/index';
		$this->load->view('layout/main',$data);
	}

  public function tambah()
	{
    if (isset($_POST['submit']))
    {
      $params = array(
        'id_pelanggan' => $this->input->post('id_pelanggan'),
        'nama_lengkap' => strtoupper($this->input->post('nama_lengkap')),
        'alamat' => strtoupper($this->input->post('alamat')),
        'no_telepon' => $this->input->post('no_telepon'),
        'ubah_terakhir' => $this->session->userdata('nik')
      );
      $this->pelanggan_model->tambah_pelanggan($params);
      $this->session->set_flashdata('msg', 'Pelanggan berhasil di-tambahkan!');
    }
    $data['pelanggan'] = $this->pelanggan_model->get_last_id_pelanggan();
    $data['content'] = 'pelanggan/tambah';
		$this->load->view('layout/main',$data);
	}

  public function edit($id_pelanggan)
  {
    if (isset($_POST['submit']))
    {
      $params = array(
        'id_pelanggan' => $this->input->post('id_pelanggan'),
        'nama_lengkap' => strtoupper($this->input->post('nama_lengkap')),
        'alamat' => strtoupper($this->input->post('alamat')),
        'no_telepon' => $this->input->post('no_telepon'),
        'ubah_terakhir' => $this->session->userdata('nik')
      );
      $this->pelanggan_model->update_pelanggan($params);
      $this->session->set_flashdata('msg', 'Pelanggan berhasil di-edit!');
    }
    $data['pelanggan'] = $this->pelanggan_model->get_pelanggan($id_pelanggan);
    $data['content'] = 'pelanggan/edit';
		$this->load->view('layout/main',$data);
  }

  public function hapus($id_pelanggan)
	{
    $this->pelanggan_model->hapus_pelanggan($id_pelanggan);
    redirect('pelanggan/index');
	}

}
