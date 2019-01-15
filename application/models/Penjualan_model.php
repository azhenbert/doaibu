<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model {

  function get_last_id_penjualan()
  {
    $this->db->order_by('id_penjualan', 'DESC');
    return $this->db->get('penjualan')->row_array();
  }

  function search_pelanggan($keyword)
  {
    $this->db->group_start();
    $this->db->like('id_pelanggan',$keyword);
    $this->db->or_like('nama_lengkap',$keyword);
    $this->db->group_end();
    return $this->db->get('pelanggan')->result();
  }

  function search_barang($keyword)
  {
    $this->db->group_start();
    $this->db->like('id_barang',$keyword);
    $this->db->or_like('nama_barang',$keyword);
    $this->db->group_end();
    $this->db->from('barang');
    $this->db->join('tmp_stok', 'tmp_stok.tmp_id_barang = barang.id_barang', 'left');
    return $this->db->get()->result();
  }

  function reset_keranjang()
  {
    $this->db->truncate('keranjang');
  }

  function reset_tmp_stok()
  {
    $this->db->truncate('tmp_stok');
  }

  function get_all_keranjang()
  {
    return $this->db->get('keranjang')->result();
  }

  function cek_keranjang($id_barang)
  {
    $this->db->where('id_barang',$id_barang);
    return $this->db->get('keranjang')->row();
  }

  function tambah_keranjang($params)
  {
    $this->db->set('id_transaksi',$params['id_penjualan']);
    $this->db->set('id_barang',$params['id_barang']);
    $this->db->set('nama_barang',$params['nama_barang']);
    $this->db->set('satuan',$params['satuan']);
    $this->db->set('harga',$params['harga']);
    $this->db->set('qty',$params['qty']);
    $this->db->set('subtotal',$params['subtotal']);
    $this->db->insert('keranjang');
  }

  function tambah_qty_keranjang($params)
  {
    $this->db->set('qty','qty+'.$params['qty'],FALSE);
    $this->db->set('subtotal','subtotal+'.$params['subtotal'],FALSE);
    $this->db->where('id_barang',$params['id_barang']);
    $this->db->update('keranjang');
  }

  function hapus_keranjang($id_barang)
  {
    $this->db->delete('keranjang', array('id_barang' => $id_barang));
  }

  function tambah_tmp_stok($params)
  {
    $this->db->set('tmp_id_barang',$params['id_barang']);
    $this->db->set('tmp_stok',$params['stok'] - $params['qty']);
    $this->db->insert('tmp_stok');
  }

  function update_tmp_stok($params)
  {
    $this->db->set('tmp_stok','tmp_stok-'.$params['qty'],FALSE);
    $this->db->where('tmp_id_barang', $params['id_barang']);
    $this->db->update('tmp_stok');
  }

  function hapus_tmp_stok($tmp_id_barang)
  {
    $this->db->delete('tmp_stok', array('tmp_id_barang' => $tmp_id_barang));
  }

  function total_harga()
  {
    $this->db->select_sum('subtotal');
    return $this->db->get('keranjang')->row();
  }

  function update_stok_barang()
  {
    $sql = "UPDATE barang INNER JOIN tmp_stok
            ON barang.id_barang = tmp_stok.tmp_id_barang
            SET barang.stok = tmp_stok.tmp_stok";
    $this->db->query($sql);
  }

  function simpan_penjualan_detail()
  {
    $sql = "INSERT INTO penjualan_detail SELECT id_transaksi, id_barang, qty, harga, subtotal FROM keranjang";
    $this->db->query($sql);
  }

  function simpan_penjualan($params)
  {
    $this->db->set('id_penjualan',$params['id_penjualan']);
    $this->db->set('id_pelanggan',$params['id_pelanggan']);
    $this->db->set('total',$params['total']);
    $this->db->set('bayar',$params['bayar']);
    $this->db->set('kembali',$params['kembali']);
    $this->db->set('tanggal',$params['tanggal']);
    $this->db->set('kasir',$params['kasir']);
    $this->db->insert('penjualan');
  }

}
