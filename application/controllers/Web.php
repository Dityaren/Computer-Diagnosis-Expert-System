<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	public function index()
	{
		$this->load->view('startup');
	}
	public function diagnosa()
	{
		$data['username'] = $this->session->userdata('nama');
		$this->load->view('website', $data);
	}

	public function start()
	{
		$data = $this->input->post('data');

		$this->session->set_userdata('nama', $data['userName']);
		$response = array('message' => 'Berhasil', 'status' => true);
		if ($data['userName'] == '') {
			$response = array('message' => 'Nama kosong', 'status' => false);
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	public function logout()
	{
		session_destroy();
		redirect('/', 'location', 301);
	}
}
