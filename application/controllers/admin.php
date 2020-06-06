<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('admin_model');

	}

	// List all your items
	public function index( $offset = 0 )
	{
		
	}

	// Add a new item
	public function add()
	{

	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}

	public function quanlysinhvien()
	{
		$data = $this->admin_model->getSinhVien();
		$data = [
		    'sinhvien' => $data
		];
		$this->load->view('quanlysinhvien_view', $data, FALSE);
	}

	public function quanlygiangvien()
	{
		$this->load->view('quanlygiangvien_view');
	}

	public function quanlydoan()
	{
		$this->load->view('quanlydoan_view');
	}

	public function quanlytaikhoan()
	{
		$this->load->view('quanlytaikhoan_view');
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
