<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_Fakultas_all()
	{
		$query = $this->db->query("SELECT * FROM fakultas");
		return $query;
	}

	public function get_Fakultas_one($kode_fakultas)
	{
		$query = $this->db->query("SELECT * FROM fakultas WHERE kode_fakultas='$kode_fakultas'");
		return $query;
	}

	public function post($data)
	{
		return ($this->db->insert('fakultas', $data)) ? TRUE : FALSE;
	}

	public function put($data, $id)
	{
		return ($this->db->update('fakultas', $data, "kode_fakultas = '$id'")) ? TRUE : FALSE;
	}

	public function delete($id)
	{
		return ($this->db->delete('fakultas', array('kode_fakultas' => $id))) ? TRUE : FALSE;
	}

	public function delete_all()
	{
		return ($this->db->delete('fakultas', array('0' => 0))) ? TRUE : FALSE;
	}
}
