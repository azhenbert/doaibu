<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

  function get_all_pelanggan()
  {
    return $this->db->get('pelanggan')->result_array();
  }

  function get_pelanggan($id_pelanggan)
  {
    $this->db->where('id_pelanggan', $id_pelanggan);
    return $this->db->get('pelanggan')->row_array();
  }

  function get_last_id_pelanggan()
  {
    $this->db->order_by('id_pelanggan', 'DESC');
    return $this->db->get('pelanggan')->row_array();
  }

  function tambah_pelanggan($params)
  {
    $this->db->insert('pelanggan',$params);
  }

  function update_pelanggan($params)
  {
    $this->db->where('id_pelanggan', $params['id_pelanggan']);
    return $this->db->update('pelanggan',$params);
  }

  function hapus_pelanggan($id_pelanggan)
  {
    $this->db->delete('pelanggan', array('id_pelanggan' => $id_pelanggan));
  }

}
