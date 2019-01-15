<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

  function get_all_supplier()
  {
    return $this->db->get('supplier')->result_array();
  }

  function get_supplier($id_supplier)
  {
    $this->db->where('id_supplier', $id_supplier);
    return $this->db->get('supplier')->row_array();
  }

  function get_last_id_supplier()
  {
    $this->db->order_by('id_supplier', 'DESC');
    return $this->db->get('supplier')->row_array();
  }

  function tambah_supplier($params)
  {
    $this->db->insert('supplier',$params);
  }

  function update_supplier($params)
  {
    $this->db->where('id_supplier', $params['id_supplier']);
    return $this->db->update('supplier',$params);
  }

  function hapus_supplier($id_supplier)
  {
    $this->db->delete('supplier', array('id_supplier' => $id_supplier));
  }

}
