<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Fakultas extends RestController
{

	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->load->model("fakultas_model");
	}

	public function fakultas_get()
	{
		$list_fakultas = $this->fakultas_model->get_fakultas_all();

		if ($list_fakultas->num_rows() > 0) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => $list_fakultas->result(),
				'message' => 'data has been loaded'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'No Fakultas were found'
			], 404);
		}
	}

	public function fakultas_one_get($kode_fakultas)
	{
		$list_fakultas = $this->fakultas_model->get_fakultas_one($kode_fakultas);

		if ($list_fakultas->num_rows() > 0) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => $list_fakultas->row(),
				'message' => 'data has been loaded'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'No Fakultas were found'
			], 404);
		}
	}

	public function fakultas_post()
	{
		$data = array(
			'kode_fakultas' => $this->input->post('kode_fakultas'),
			'nama_fakultas' => $this->input->post('nama_fakultas')

		);

		if ($this->fakultas_model->post($data)) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => $data,
				'message' => 'data has been inserted'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'Fakultas has not been inserted'
			], 404);
		}
	}

	public function fakultas_delete($kode_fakultas)
	{
		if ($this->fakultas_model->delete($kode_fakultas)) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => $kode_fakultas,
				'message' => 'data has been deleted'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'Fakultas has not been deleted'
			], 404);
		}
	}

	public function fakultas_all_delete()
	{
		if ($this->fakultas_model->delete_all()) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => "All fakultas",
				'message' => 'data has been deleted'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'Fakultas has not been deleted'
			], 404);
		}
	}

	public function fakultas_update_post($kode_fakultas)
	{
		$data = array(
			'nama_fakultas' => $this->input->post('nama_fakultas'),

		);

		if ($this->fakultas_model->put($data, $kode_fakultas)) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => $data,
				'message' => 'data has been updated'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'Fakultas has not been updated'
			], 404);
		}
	}
}
