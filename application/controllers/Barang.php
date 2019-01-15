<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('barang_model');
		if($this->session->userdata('isLogin') == FALSE)
		{
			redirect('login');
		}
    else if(!in_array($this->session->userdata('jabatan'), array('ADMIN','PEMBELIAN','PENJUALAN')))
    {
      $data['content'] = 'layout/403';
      echo $this->load->view('layout/main',$data, TRUE);
      die();
    }
  }

	public function index()
	{
    $data['barang'] = $this->barang_model->get_all_barang();
    $data['content'] = 'barang/index';
		$this->load->view('layout/main',$data);
	}

  public function tambah()
	{
    if (isset($_POST['submit']))
    {
      $params = array(
        'id_barang' => $this->input->post('id_barang'),
        'nama_barang' => strtoupper($this->input->post('nama_barang')),
        'stok' => $this->input->post('stok'),
        'harga' => $this->input->post('harga'),
        'satuan' => $this->input->post('satuan'),
        'ubah_terakhir' => $this->session->userdata('nik')
      );
      $this->barang_model->tambah_barang($params);
      $this->session->set_flashdata('msg', 'Barang berhasil di-tambahkan!');
    }
    $data['barang'] = $this->barang_model->get_last_id_barang();
    $data['content'] = 'barang/tambah';
		$this->load->view('layout/main',$data);
	}

  public function edit($id_barang)
  {
    if (isset($_POST['submit']))
    {
      $params = array(
        'id_barang' => $this->input->post('id_barang'),
        'nama_barang' => strtoupper($this->input->post('nama_barang')),
        'harga' => $this->input->post('harga'),
        'satuan' => $this->input->post('satuan'),
        'ubah_terakhir' => $this->session->userdata('nik')
      );
      $this->barang_model->update_barang($params);
      $this->session->set_flashdata('msg', 'Barang berhasil di-edit!');
    }
    $data['barang'] = $this->barang_model->get_barang($id_barang);
    $data['content'] = 'barang/edit';
		$this->load->view('layout/main',$data);
  }

  public function hapus($id_barang)
	{
    $this->barang_model->hapus_barang($id_barang);
    redirect('barang/index');
	}

}
