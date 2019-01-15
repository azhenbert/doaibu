<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lap_pembelian_model extends CI_Model {

  function get_all_lap_pembelian()
  {
    $sql = "select p.id_pembelian, s.nama_supplier, p.total, p.tanggal, u.nama_lengkap
            from pembelian p, supplier s, users u
            where s.id_supplier = p.id_supplier and u.nik = p.buyer";
    return $this->db->query($sql)->result_array();
  }

  function detail_supplier($id_pembelian)
  {
    $sql = "select s.id_supplier, s.nama_supplier, s.alamat, s.no_telepon
            from pembelian p, supplier s
            where s.id_supplier = p.id_supplier and p.id_pembelian = '".$id_pembelian."'";
    return $this->db->query($sql)->row_array();
  }

  function detail_pembelian($id_pembelian)
  {
    $this->db->join('users', 'users.nik = pembelian.buyer');
    $this->db->where('id_pembelian', $id_pembelian);
    return $this->db->get('pembelian')->row_array();
  }

  function detail_item_pembelian($id_pembelian)
  {
    $this->db->select('pembelian_detail.id_barang, nama_barang, pembelian_detail.harga,
                       satuan, pembelian_detail.qty, pembelian_detail.subtotal');
    $this->db->join('barang', 'barang.id_barang = pembelian_detail.id_barang');
    $this->db->where('id_pembelian', $id_pembelian);
    return $this->db->get('pembelian_detail')->result_array();
  }

}
