<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	// Sinh viên
	public function getSinhVien()
	{	
		$this->db->select('sinhvien.*, user.Username,khoa.TenK,doan.DeTai');
		$this->db->join('user', 'user.IdUser = sinhvien.IdUser', 'left');
		$this->db->join('khoa', 'khoa.MaK = sinhvien.MaK', 'left');
		$this->db->join('doan', 'doan.IdUser_SV = sinhvien.IdUser', 'left');
		$data  = $this->db->get('sinhvien');
		$data = $data->result_array();
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		return $data;
	}
	// Giảng Viên

	// Đồ án
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */