<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('supplier_model');
		if($this->session->userdata('isLogin') == FALSE)
		{
			redirect('login');
		}
    else if(!in_array($this->session->userdata('jabatan'), array('ADMIN','PEMBELIAN')))
    {
      $data['content'] = 'layout/403';
      echo $this->load->view('layout/main',$data, TRUE);
      die();
    }
  }

  public function index()
	{
    $data['supplier'] = $this->supplier_model->get_all_supplier();
    $data['content'] = 'supplier/index';
		$this->load->view('layout/main',$data);
	}

  public function tambah()
	{
    if (isset($_POST['submit']))
    {
      $params = array(
        'id_supplier' => $this->input->post('id_supplier'),
        'nama_supplier' => strtoupper($this->input->post('nama_supplier')),
        'alamat' => strtoupper($this->input->post('alamat')),
        'no_telepon' => $this->input->post('no_telepon'),
        'ubah_terakhir' => $this->session->userdata('nik')
      );
      $this->supplier_model->tambah_supplier($params);
      $this->session->set_flashdata('msg', 'Supplier berhasil di-tambahkan!');
    }
    $data['supplier'] = $this->supplier_model->get_last_id_supplier();
    $data['content'] = 'supplier/tambah';
		$this->load->view('layout/main',$data);
	}

  public function edit($id_supplier)
  {
    if (isset($_POST['submit']))
    {
      $params = array(
        'id_supplier' => $this->input->post('id_supplier'),
        'nama_supplier' => strtoupper($this->input->post('nama_supplier')),
        'alamat' => strtoupper($this->input->post('alamat')),
        'no_telepon' => $this->input->post('no_telepon'),
        'ubah_terakhir' => $this->session->userdata('nik')
      );
      $this->supplier_model->update_supplier($params);
      $this->session->set_flashdata('msg', 'Supplier berhasil di-edit!');
    }
    $data['supplier'] = $this->supplier_model->get_supplier($id_supplier);
    $data['content'] = 'supplier/edit';
		$this->load->view('layout/main',$data);
  }

  public function hapus($id_supplier)
	{
    $this->supplier_model->hapus_supplier($id_supplier);
    redirect('supplier/index');
	}

}
