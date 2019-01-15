<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	function __construct()
  {
    parent::__construct();
		date_default_timezone_set("Asia/Makassar");
    $this->load->model('penjualan_model');
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
		$this->penjualan_model->reset_keranjang();
		$this->penjualan_model->reset_tmp_stok();
		$data['penjualan'] = $this->penjualan_model->get_last_id_penjualan();
		$data['script'] = 'script_penjualan.js';
    $data['content'] = 'penjualan/index';
		$this->load->view('layout/main',$data);
	}

	public function data_keranjang()
	{
		$data = $this->penjualan_model->get_all_keranjang();
		echo json_encode($data);
	}

	public function tambah_keranjang()
	{
		$params = array(
			'id_penjualan' => $this->input->post('id_penjualan'),
			'id_barang' => substr($this->input->post('barang'),0,8),
			'nama_barang' => substr($this->input->post('barang'),11),
			'satuan' => $this->input->post('satuan'),
			'harga' => $this->input->post('harga'),
			'stok' => $this->input->post('stok'),
			'qty' => $this->input->post('qty'),
			'subtotal' => $this->input->post('harga') * $this->input->post('qty')
		);
		$cek = $this->penjualan_model->cek_keranjang($params['id_barang']);
		if($cek)
		{
			$data = $this->penjualan_model->tambah_qty_keranjang($params);
			$this->penjualan_model->update_tmp_stok($params);
		}
		else
		{
			$data = $this->penjualan_model->tambah_keranjang($params);
			$this->penjualan_model->tambah_tmp_stok($params);
		}
		echo json_encode($data);
	}

	public function hapus_keranjang()
	{
		$id_barang = $this->input->post('id_barang');
    $data = $this->penjualan_model->hapus_keranjang($id_barang);
		$this->penjualan_model->hapus_tmp_stok($id_barang);
    echo json_encode($data);
	}

	public function total_harga()
	{
		$data = $this->penjualan_model->total_harga();
		echo json_encode($data);
	}

	public function simpan_penjualan()
	{
    $params = array(
      'id_penjualan' => $this->input->post('id_penjualan'),
      'id_pelanggan' => substr($this->input->post('id_pelanggan'),0,8),
      'total' => $this->input->post('total'),
      'bayar' => $this->input->post('bayar'),
      'kembali' => $this->input->post('kembali'),
			'tanggal' => date("Y-m-d H:i:s"),
      'kasir' => $this->session->userdata('nik')
    );
		$this->penjualan_model->update_stok_barang();
		$this->penjualan_model->simpan_penjualan_detail();
    $data = $this->penjualan_model->simpan_penjualan($params);
    echo json_encode($data);
	}

	public function get_pelanggan_autocomplete()
	{
		if (isset($_GET['term']))
		{
      $result = $this->penjualan_model->search_pelanggan($_GET['term']);
      if (count($result) > 0)
			{
        foreach ($result as $row)
          $arr_result[] = array(
            'label' => $row->id_pelanggan." - ".$row->nama_lengkap,
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
      $result = $this->penjualan_model->search_barang($_GET['term']);
      if (count($result) > 0)
			{
        foreach ($result as $row)
					if ($row->tmp_stok)
					{
						$arr_result[] = array(
	            'label' => $row->id_barang." - ".$row->nama_barang,
	            'satuan' => $row->satuan,
							'harga' => $row->harga,
							'stok' => $row->tmp_stok
						);
					}
					else
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
