<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

  function __construct()
  {
    parent::__construct();
		date_default_timezone_set("Asia/Makassar");
    $this->load->model('pembelian_model');
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
    $this->pembelian_model->reset_keranjang();
    $this->pembelian_model->reset_tmp_stok();
    $data['pembelian'] = $this->pembelian_model->get_last_id_pembelian();
    $data['script'] = 'script_pembelian.js';
    $data['content'] = 'pembelian/index';
		$this->load->view('layout/main',$data);
	}

  public function data_keranjang()
	{
		$data = $this->pembelian_model->get_all_keranjang();
		echo json_encode($data);
	}

  public function tambah_keranjang()
	{
		$params = array(
			'id_pembelian' => $this->input->post('id_pembelian'),
			'id_barang' => substr($this->input->post('barang'),0,8),
			'nama_barang' => substr($this->input->post('barang'),11),
			'satuan' => $this->input->post('satuan'),
			'harga' => $this->input->post('harga'),
			'stok' => $this->input->post('stok'),
			'qty' => $this->input->post('qty'),
			'subtotal' => $this->input->post('harga') * $this->input->post('qty')
		);
		$cek = $this->pembelian_model->cek_keranjang($params['id_barang']);
		if($cek)
		{
			$data = $this->pembelian_model->tambah_qty_keranjang($params);
			$this->pembelian_model->update_tmp_stok($params);
		}
		else
		{
			$data = $this->pembelian_model->tambah_keranjang($params);
			$this->pembelian_model->tambah_tmp_stok($params);
		}
		echo json_encode($data);
	}

  public function hapus_keranjang()
	{
		$id_barang = $this->input->post('id_barang');
    $data = $this->pembelian_model->hapus_keranjang($id_barang);
		$this->pembelian_model->hapus_tmp_stok($id_barang);
    echo json_encode($data);
	}

	public function total_harga()
	{
		$data = $this->pembelian_model->total_harga();
		echo json_encode($data);
	}

	public function simpan_pembelian()
	{
    $params = array(
      'id_pembelian' => $this->input->post('id_pembelian'),
      'id_supplier' => substr($this->input->post('id_supplier'),0,8),
      'total' => $this->input->post('total'),
			'tanggal' => date("Y-m-d H:i:s"),
      'buyer' => $this->session->userdata('nik')
    );
		$this->pembelian_model->update_stok_barang();
		$this->pembelian_model->simpan_pembelian_detail();
    $data = $this->pembelian_model->simpan_pembelian($params);
    echo json_encode($data);
	}

  public function get_supplier_autocomplete()
	{
		if (isset($_GET['term']))
		{
      $result = $this->pembelian_model->search_supplier($_GET['term']);
      if (count($result) > 0)
			{
        foreach ($result as $row)
          $arr_result[] = array(
            'label' => $row->id_supplier." - ".$row->nama_supplier,
            'alamat' => $row->alamat,
						'no_telepon' => $row->no_telepon
					);
        echo json_encode($arr_result);
      }
    }
	}

  public function get_barang_autocomplete()
	{
		if (isset($_GET['term']))
		{
      $result = $this->pembelian_model->search_barang($_GET['term']);
      if (count($result) > 0)
			{
        foreach ($result as $row)
          {
						$arr_result[] = array(
	            'label' => $row->id_barang." - ".$row->nama_barang,
	            'satuan' => $row->satuan,
							'harga' => $row->harga,
							'stok' => $row->stok
						);
					}
        echo json_encode($arr_result);
      }
    }
	}

}
