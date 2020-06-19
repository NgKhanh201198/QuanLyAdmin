<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}
	// general function----------------------------------------------------------------------------------------------------------------
	public function deleteDoAn($id_SV)
	{
		$this->db->where('IdUser_SV', $id_SV);
		return $this->db->delete('doan');
	}
	public function deleteThucTap($id_SV)
	{
		$this->db->where('IdUser_SV', $id_SV);
		return $this->db->delete('thuctap');
	}
	public function getUserAdmin()
	{
		$this->db->select('*');
		$this->db->where('Quyen', 2);
		$data = $this->db->get('user');
		$data = $data->result_array();
		return $data;
	}

	// Quản lý Sinh viên---------------------------------------------------------------------------------------------------------------
	public function getSinhVien_User_Lop_Khoa()
	{	
		$this->db->select('sinhvien.*, user.*,lop.*, chuyennganh.*, khoa.*');
		$this->db->join('user', 'user.IdUser = sinhvien.IdUser', 'left');
		$this->db->join('lop', 'lop.MaL = sinhvien.MaL', 'left');
		$this->db->join('chuyennganh', 'chuyennganh.MaCN = lop.MaCN', 'left');
		$this->db->join('khoa', 'khoa.MaK = chuyennganh.MaK', 'left');
		// $data  = $this->db->get('sinhvien');
		$data = $this->db->get('sinhvien');
		$data = $data->result_array();
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		return $data;
	}
	public function updateSvByID($IdUser,$TenSV,$NamSinh,$DiemTB,$MaL,$Email)
	{
		$data = [
		    'TenSV' => $TenSV,
		    'NamSinh' => $NamSinh,
		    // 'Username' => $Username,
		    'DiemTB' => $DiemTB,
		    'MaL' => $MaL,
		    'Email' => $Email
		];
		$this->db->where('IdUser', $IdUser);
		return $this->db->update('sinhvien', $data);
	}
	public function getAllKhoa()
	{	
		$this->db->select('*');
		$data = $this->db->get('Khoa');
		$data = $data->result_array();
		return $data;
	}
	public function getAllLop()
	{	
		$this->db->select('*');
		// $this->db->where('MaK', 'MK002');
		$data = $this->db->get('Lop');
		$data = $data->result_array();
		// echo "<pre>";
		// var_dump($data);
		// var_dump($MaKhoa);
		// echo "</pre>";
		return $data;
	}
	public function getAllLopByTenCN($MaCN)
	{	
		$this->db->select('*');
		$this->db->where('MaCN', $MaCN);
		$data = $this->db->get('Lop');
		$data = $data->result_array();
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		return $data;
	}
	public function getAllChuyenNghanhByTenK($MaK)
	{	
		$this->db->select('*');
		$this->db->where('MaK', $MaK);
		$data = $this->db->get('chuyennganh');
		$data = $data->result_array();
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		return $data;
	}
	public function getAllBoMonByTenK($MaK)
	{	
		$this->db->select('*');
		$this->db->where('MaK', $MaK);
		$data = $this->db->get('bomon');
		$data = $data->result_array();
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		return $data;
	}
	public function deleteSvByID($id)
	{
		$this->db->where('IdUser', $id);
		return $this->db->delete('sinhvien');
	}

	// Quản lý Giảng Viên--------------------------------------------------------------------------------------------------------------
	public function getGiangVien_User_Khoa()
	{
		$this->db->select('*');
		$this->db->join('user', 'user.IdUser = giangvien.IdUser', 'left');
		$this->db->join('bomon', 'bomon.MaBoMon = giangvien.MaBoMon', 'left');
		$this->db->join('khoa', 'khoa.MaK = bomon.MaK', 'left');
		$data = $this->db->get('giangvien',10,0);
		$data = $data->result_array();
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		return $data;
	}
	public function updateGvByID($IdUser,$TenGV,$MaBoMon,$Trinhdohocvan,$SDT,$Email, $HuongNghienCuu)
	{
		$data = [
		    'TenGV' => $TenGV,
		    'MaBoMon' => $MaBoMon,
		    'Trinhdohocvan' => $Trinhdohocvan,
		    'HuongNghienCuu' => $HuongNghienCuu,
		    'SDT' => $SDT,
		    'Email' => $Email
		];
		$this->db->where('IdUser', $IdUser);
		return $this->db->update('giangvien', $data);
	}
	public function deleteGvByID($id)
	{
		$this->db->where('IdUser', $id);
		return $this->db->delete('giangvien');
	}

	// Quản lý Đồ án-------------------------------------------------------------------------------------------------------------------
	public function getDoAn_SV_GV_Khoa()
	{
		$this->db->select('*');
		$this->db->join('sinhvien', 'sinhvien.IdUser = doan.IdUser_SV', 'left');
		$this->db->join('lop', 'lop.MaL = sinhvien.MaL', 'left');
		$this->db->join('chuyennganh', 'chuyennganh.MaCN = lop.MaCN', 'left');
		$this->db->join('khoa', 'khoa.MaK = chuyennganh.MaK', 'left');
		$this->db->join('giangvien', 'giangvien.IdUser = doan.IdUser_GV', 'left');
		// $this->db->join('thuctap', 'thuctap.IdUser_SV = sinhvien.IdUser', 'left');
		$data = $this->db->get('doan');
		$data = $data->result_array();
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		return $data;
	}

	// Quản lý Thực tập----------------------------------------------------------------------------------------------------------------
	public function getThucTap_SV_User_Lop_Khoa()
	{
		$this->db->select('*');
		$this->db->join('sinhvien', 'sinhvien.IdUser = thuctap.IdUser_SV', 'left');
		$this->db->join('lop', 'lop.MaL = sinhvien.MaL', 'left');
		$this->db->join('chuyennganh', 'chuyennganh.MaCN = lop.MaCN', 'left');
		$this->db->join('khoa', 'khoa.MaK = chuyennganh.MaK', 'left');
		$this->db->join('user', 'user.IdUser = sinhvien.IdUser', 'left');
		$data = $this->db->get('thuctap');
		$data = $data->result_array();
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		return $data;
	}
	public function updateThucTapByID($IdUser_SV, $CongTy, $ThoiGianBatDau, $ThoiGianKetThuc, $DanhGia)
	{
		$this->db->where('IdUser_SV', $IdUser_SV);
		$data = [
		    'IdUser_SV' => $IdUser_SV, 
		    'CongTy' => $CongTy, 
		    'ThoiGianBatDau' => $ThoiGianBatDau, 
		    'ThoiGianKetThuc' => $ThoiGianKetThuc, 
		    'DanhGia' => $DanhGia
		];
		return $this->db->update('thuctap', $data);
	}
	public function deleteTTByID($id)
	{
		$this->db->where('IdUser_SV', $id);
		return $this->db->delete('thuctap');
	}

	// Quản lý tài khoản---------------------------------------------------------------------------------------------------------------
	public function getUser($id, $code)
	{
		$this->db->where('IdUser', $id);
		$this->db->where('Username', $code);
		$this->db->select('field1, field2');
	}
	public function getUser_SV()
	{
		$this->db->select('*');
		$this->db->where('Quyen', '0');
		$this->db->join('sinhvien', 'sinhvien.IdUser = user.IdUser', 'left');
		$this->db->join('lop', 'lop.MaL = sinhvien.MaL', 'left');
		$this->db->join('chuyennganh', 'chuyennganh.MaCN = lop.MaCN', 'left');
		$this->db->join('khoa', 'khoa.MaK = chuyennganh.MaK', 'left');
		$data = $this->db->get('user');
		$data = $data->result_array();
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		return $data;
	}
	public function getUser_GV()
	{
		$this->db->select('*');
		$this->db->where('Quyen', '1');
		$this->db->join('giangvien', 'giangvien.IdUser = user.IdUser', 'left');
		$this->db->join('bomon', 'bomon.MaBoMon = giangvien.MaBoMon', 'left');
		$this->db->join('khoa', 'khoa.MaK = bomon.MaK', 'left');
		$data = $this->db->get('user');
		$data = $data->result_array();
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		return $data;
	}
	public function deleteUserByID($id)
	{	
		$this->db->where('IdUser', $id);
		return $this->db->delete('user');
	}
	public function refreshPassword($id)
	{
		$this->db->where('IdUser', $id);
		$this->db->select('Username');
		$data = $this->db->get('user');
		$data = $data->result_array();

		$newpass = [
		    'Password' => $data[0]['Username']
		];
		// var_dump($newpass);
		$this->db->where('IdUser', $id);
		return $this->db->update('user', $newpass);
	}

	// Thêm tài khoản--------------------------------------------------------------------------
	public function insertUser($Username,$Password,$Role)
	{
		$data = [
		    'Username' => $Username,
		    'Password' => $Password,
		    'Quyen' => $Role		
		];
		return $this->db->insert('user', $data);
	}
	public function getMaxIdUser()
	{
		$this->db->select_max('IdUser');
		$data = $this->db->get('user');
		$data = $data->result_array();
		return $data;
	}
	public function insertGV($TenGV,$IdUser,$MaBoMon,$Trinhdohocvan,$SDT,$Email,$HuongNghienCuu)
	{
		$data = [
		    'TenGV' => $TenGV,
		    'IdUser' => $IdUser,
		    'MaBoMon' => $MaBoMon,
		    'Trinhdohocvan' => $Trinhdohocvan,
		    'SDT' => $SDT,
		    'Email' => $Email,
		    'HuongNghienCuu' => $HuongNghienCuu
		];
		return $this->db->insert('giangvien', $data);
	}
	public function insertSV($TenSV,$IdUser,$MaL,$DiemTB,$NamSinh,$Email)
	{
		$data = [
		    'TenSV' => $TenSV,
		    'IdUser' => $IdUser,
		    'MaL' => $MaL,
		    'DiemTB' => $DiemTB,
		    'DiemTB' => $DiemTB,
		    'NamSinh' => $NamSinh,
		    'Email' => $Email
		];
		return $this->db->insert('sinhvien', $data);
	}
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */