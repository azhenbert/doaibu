<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  function get_all_user()
  {
    return $this->db->get('users')->result_array();
  }

  function get_user($nik)
  {
    $this->db->where('nik', $nik);
    return $this->db->get('users')->row_array();
  }

  function get_last_nik()
  {
    $this->db->like('nik', date("Y"));
    $this->db->order_by('nik', 'DESC');
    return $this->db->get('users')->row_array();
  }

  function tambah_user($params)
  {
    $this->db->insert('users',$params);
  }

  function update_user($params)
  {
    $this->db->where('nik', $params['nik']);
    return $this->db->update('users',$params);
  }

  function hapus_user($nik)
  {
    $this->db->delete('users', array('nik' => $nik));
  }

}
