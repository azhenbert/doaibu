<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password_model extends CI_Model {

	public function cek_password_lama($params)
	{
    $this->db->where('nik', $params['nik']);
    $this->db->where('password', $params['password_lama']);
    return $this->db->get('users')->row();
	}

  public function update_password($params)
  {
    $this->db->set('password', $params['password_baru']);
    $this->db->where('nik', $params['nik']);
    $this->db->update('users');
  }

}
