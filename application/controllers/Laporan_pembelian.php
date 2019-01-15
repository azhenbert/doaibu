<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pembelian extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('lap_pembelian_model');
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
    $data['lap_pembelian'] = $this->lap_pembelian_model->get_all_lap_pembelian();
    $data['content'] = 'lap_pembelian/index';
		$this->load->view('layout/main',$data);
	}

  public function detail($id_pembelian)
  {
    $data['supplier'] = $this->lap_pembelian_model->detail_supplier($id_pembelian);
    $data['pembelian'] = $this->lap_pembelian_model->detail_pembelian($id_pembelian);
    $data['pembelian_detail'] = $this->lap_pembelian_model->detail_item_pembelian($id_pembelian);
		$this->load->view('lap_pembelian/detail',$data);
  }

}
