<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function login($nik,$password)
	{
		$this->db->where('nik', $nik);
    $this->db->where('password', $password);
    return $this->db->get('users')->row();
	}

}
