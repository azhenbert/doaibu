<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_penjualan extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('lap_penjualan_model');
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
    $data['lap_penjualan'] = $this->lap_penjualan_model->get_all_lap_penjualan();
    $data['content'] = 'lap_penjualan/index';
		$this->load->view('layout/main',$data);
	}

  public function detail($id_penjualan)
  {
    $data['pelanggan'] = $this->lap_penjualan_model->detail_pelanggan($id_penjualan);
    $data['penjualan'] = $this->lap_penjualan_model->detail_penjualan($id_penjualan);
    $data['penjualan_detail'] = $this->lap_penjualan_model->detail_item_penjualan($id_penjualan);
		$this->load->view('lap_penjualan/detail',$data);
  }

}
