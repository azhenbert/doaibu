<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

  function get_all_barang()
  {
    return $this->db->get('barang')->result_array();
  }

  function get_barang($id_barang)
  {
    $this->db->where('id_barang', $id_barang);
    return $this->db->get('barang')->row_array();
  }

  function get_last_id_barang()
  {
    $this->db->order_by('id_barang', 'DESC');
    return $this->db->get('barang')->row_array();
  }

  function tambah_barang($params)
  {
    $this->db->insert('barang',$params);
  }

  function update_barang($params)
  {
    $this->db->where('id_barang', $params['id_barang']);
    return $this->db->update('barang',$params);
  }

  function hapus_barang($id_barang)
  {
    $this->db->delete('barang', array('id_barang' => $id_barang));
  }

}
