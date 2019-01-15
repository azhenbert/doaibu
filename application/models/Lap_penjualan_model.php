<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lap_penjualan_model extends CI_Model {

  function get_all_lap_penjualan()
  {
    $sql = "select p.id_penjualan, pel.nama_lengkap as nama_pelanggan, p.total, p.tanggal, u.nama_lengkap as nama_kasir
            from penjualan p, pelanggan pel, users u
            where pel.id_pelanggan = p.id_pelanggan and u.nik = p.kasir";
    return $this->db->query($sql)->result_array();
  }

  function detail_pelanggan($id_penjualan)
  {
    $sql = "select pel.id_pelanggan, pel.nama_lengkap, pel.alamat, pel.no_telepon
            from penjualan p, pelanggan pel
            where pel.id_pelanggan = p.id_pelanggan and p.id_penjualan = '".$id_penjualan."'";
    return $this->db->query($sql)->row_array();
  }

  function detail_penjualan($id_penjualan)
  {
    $this->db->join('users', 'users.nik = penjualan.kasir');
    $this->db->where('id_penjualan', $id_penjualan);
    return $this->db->get('penjualan')->row_array();
  }

  function detail_item_penjualan($id_penjualan)
  {
    $this->db->select('penjualan_detail.id_barang, nama_barang, penjualan_detail.harga,
                       satuan, penjualan_detail.qty, penjualan_detail.subtotal');
    $this->db->join('barang', 'barang.id_barang = penjualan_detail.id_barang');
    $this->db->where('id_penjualan', $id_penjualan);
    return $this->db->get('penjualan_detail')->result_array();
  }

}
