<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('admin_model');
	}
	public function index()
	{
		$this->load->view('dangnhap');
		// echo "<pre>";
		// var_dump($this->admin_model->getUserAdmin());
		// echo "</pre>";
	}

	// Chức năng đăng nhập---------------------------------------------------------------------------------------------------
	public function login()
	{
		$query = $this->admin_model->getUserAdmin();
		$data = [
		    'user' => $query
		];
		$this->load->view('dangnhap', $data, false);
	}

	public function checkLogin()
	{
		$Username = $this->input->post('user-name');
		$Password = $this->input->post('password');

		$query = $this->admin_model->getUserAdmin();

		foreach($query as $row)
        {
        	if ($row['Username'] == $Username && $row['Password'] == $Password) {
    			 $newdata = array(
	                'Username' => $row['Username'],
	                'Password'   => $row['Password'],
            	);
			 	$this->session->set_userdata($newdata);
        		redirect(base_url('admin/quanlygiangvien'));
        	} else {
        		redirect(base_url('admin/login'));
        	}
           
        }
	}
	public function logout()
	{
		$array_items = array('Username', 'Password');
    	$this->session->unset_userdata($array_items);
    	redirect(base_url('admin/login'));
	}

	// Quản lý Sinh viên-----------------------------------------------------------------------------------------------------
	public function quanlysinhvien()
	{
		$tbl_khoa = $this->admin_model->getAllKhoa();
		// $tbl_lop = $this->admin_model->getAllLop();
		$sinhvien = $this->admin_model->getSinhVien_User_Lop_Khoa();
		$data = [
		    'sinhvien' => $sinhvien,
		    // 'tbl_lop' => $tbl_lop,
		    'tbl_khoa' => $tbl_khoa
		];
		// echo "<pre>";
		// var_dump($MaKhoa);
		// var_dump($tbl_lop);
		// echo "</pre>";
		$this->load->view('quanlysinhvien_view', $data, FALSE);
	}
	public function updateSV()
	{
		$IdUser = $this->input->post('IdUser');
		$TenSV = $this->input->post('TenSV');
		$NamSinh = $this->input->post('NamSinh');
		// $Username = $this->input->post('Username');
		// $TenKhoa = $this->input->post('TenKhoa');
		// $TenCN = $this->input->post('TenCN');
		// $Khoa = $this->input->post('Khoa');
		$MaL = $this->input->post('MaL');
		$DiemTB = $this->input->post('DiemTB');
		$Email = $this->input->post('Email');

		if ($this->admin_model->updateSvByID($IdUser,$TenSV,$NamSinh,$DiemTB,$MaL,$Email)) {
			echo 'Thành công';
		}
	}
	public function xoasinhvien($id)
	{
		if ($this->admin_model->deleteSvByID($id)) {
			$this->load->view('xoaSV');
		}

	}
	public function locLop()
	{		
		// echo 'da chay den day';
		$MaCN = $this->input->post('MaCN');
		$tbl_lop = $this->admin_model->getAllLopByTenCN($MaCN);
		
		foreach ($tbl_lop as $value) {
			echo '<option value="'.$value['MaL'] .'"selected>'.$value['MaL'] .'</option>';
		}
	}
	public function locChuyenNganh()
	{		
		// echo 'da chay den day';
		$MaK = $this->input->post('MaK');
		$chuyennghanh = $this->admin_model->getAllChuyenNghanhByTenK($MaK);
		
		echo '<option value="" selected>--Chuyên nghành--</option>';
		foreach ($chuyennghanh as $value) {
			echo '<option value="'.$value['MaCN'] .'"selected>'.$value['TenCN'] .'</option>';
		}
	}
	public function locBoMon()
	{		
		// echo 'da chay den day';
		$MaK = $this->input->post('MaK');
		$bomon = $this->admin_model->getAllBoMonByTenK($MaK);

		foreach ($bomon as $value) {
			echo '<option value="'.$value['MaBoMon'] .'"selected>'.$value['TenBoMon'] .'</option>';
		}
	}

	// Quản lý Giảng viên----------------------------------------------------------------------------------------------------
	public function quanlygiangvien()
	{
		$giangvien = $this->admin_model->getGiangVien_User_Khoa();
		$khoa = $this->admin_model->getAllKhoa();
		$data = [
		    'giangvien' => $giangvien,
		    'khoa' => $khoa
		];
		$this->load->view('quanlygiangvien_view', $data, FALSE);
	}
	public function updateGV()
	{

		$IdUser = $this->input->post('IdUser');
        $TenGV = $this->input->post('TenGV');
        $Username = $this->input->post('Username');
        $TenKhoa = $this->input->post('TenKhoa');
        $MaK = $this->input->post('MaK');
        $TenBoMon = $this->input->post('TenBoMon');
        $MaBoMon = $this->input->post('MaBoMon');
        $Trinhdohocvan = $this->input->post('Trinhdohocvan');
        $HuongNghienCuu = $this->input->post('HuongNghienCuu');
        $SDT = $this->input->post('SDT');
        $Email = $this->input->post('Email');

        // echo "<pre>";
        // var_dump($IdUser);
        // var_dump($TenGV);
        // var_dump($Username);
        // var_dump($TenKhoa);
        // var_dump($MaK);
        // var_dump($TenBoMon);
        // var_dump($MaBoMon);
        // var_dump($Trinhdohocvan);
        // var_dump($HuongNghienCuu);
        // var_dump($SDT);
        // var_dump($Email);
        // echo "</pre>";

		if ($this->admin_model->updateGvByID($IdUser,$TenGV,$MaBoMon,$Trinhdohocvan,$SDT,$Email, $HuongNghienCuu)) {
			echo 'Thành công';
		}
	}
	public function xoagiangvien($id)
	{
		if ($this->admin_model->deleteGvByID($id)) {
			$this->load->view('xoaGV');
		}
	}

	// Quản lý Đồ án---------------------------------------------------------------------------------------------------------
	public function quanlydoan()
	{
		$data = $this->admin_model->getDoAn_SV_GV_Khoa();
		$doan = [
		    'doan' => $data
		];
		$this->load->view('quanlydoan_view', $doan, FALSE);
	}
	// Quản lý thực tập------------------------------------------------------------------------------------------------------
	public function quanlythuctap()
	{
		$data = $this->admin_model->getThucTap_SV_User_Lop_Khoa();
		$thuctap = [
		    'thuctap' => $data
		];
		$this->load->view('quanlythuctap_view', $thuctap, FALSE);
	}
	public function updateThucTap()
	{
		$IdUser_SV = $this->input->post('IdUser_SV');
		$CongTy = $this->input->post('CongTy');
        $ThoiGianBatDau = $this->input->post('ThoiGianBatDau');
        $ThoiGianKetThuc = $this->input->post('ThoiGianKetThuc');
        $DanhGia = $this->input->post('DanhGia');

       	if ( $this->admin_model->updateThucTapByID($IdUser_SV, $CongTy, $ThoiGianBatDau, $ThoiGianKetThuc, $DanhGia)) {
       		echo 'Thành công rồi nhé!';
       	}
	}
	public function xoaThucTap($id)
	{
		if ($this->admin_model->deleteTTByID($id)) {
			$this->load->view('xoaThucTap');
		}
	}

	// Quản lý Tài khoản-----------------------------------------------------------------------------------------------------
	public function quanlytaikhoanGV()
	{
		$data = $this->admin_model->getUser_GV();
		$tkgv = [
		    'tkgv' => $data
		];
		$this->load->view('quanlytaikhoanGV_view', $tkgv, FALSE);
	}
	public function quanlytaikhoanSV()
	{
		$data = $this->admin_model->getUser_SV();
		$tksv = [
		    'tksv' => $data
		];
		$this->load->view('quanlytaikhoanSV_view', $tksv, FALSE);
	}
	public function deleteUserGV($id)
	{
		if ($this->admin_model->deleteUserByID($id)) {
			$this->load->view('xoaTK_GV');
		}

	}
	public function deleteUserSV($id)
	{
		if ($this->admin_model->deleteUserByID($id)) {
			$this->load->view('xoaTK_SV');
		}

	}
	public function datLaiMatKhau_GV($id)
	{
		if ($this->admin_model->refreshPassword($id)) {
			$this->load->view('datlaimatkhau_GV');
		}
	}
	public function datLaiMatKhau_SV($id)
		{
			if ($this->admin_model->refreshPassword($id)) {
				$this->load->view('datlaimatkhau_SV');
			}
		}

	//Thêm tài khoản
	public function adduserGV()
	{
		$Username = $this->input->post('mgv');
		$Password = $this->input->post('mgv');
		$Role = '1';
		$TenGV = $this->input->post('tengv');
		$MaBoMon = $this->input->post('option-tenbomon');
		$Trinhdohocvan = $this->input->post('trinhdohocvan');
		$HuongNghienCuu = $this->input->post('huongnghiencuu');
		$SDT = $this->input->post('sdt');
		$Email = $this->input->post('email_gv');

		$this->admin_model->insertUser($Username,$Password,$Role);
		$data = $this->admin_model->getMaxIdUser();
		$IdUser = $data[0]['IdUser'];
		if ($this->admin_model->insertGV($TenGV,$IdUser,$MaBoMon,$Trinhdohocvan,$SDT,$Email,$HuongNghienCuu)) {
			$this->load->view('themGV');
		}

		// echo "<pre>";
		// var_dump($Username);
		// var_dump($Password);
		// var_dump($Role);
		// var_dump($TenGV);
		// var_dump($MaBoMon);
		// var_dump($Trinhdohocvan);
		// var_dump($HuongNghienCuu);
		// var_dump($SDT);
		// var_dump($Email);
		// // var_dump($IdUser);
		// echo "</pre>";

	}
	public function adduserSV()
	{
		$Username = $this->input->post('msv');
		$Password = $this->input->post('msv');
		$Role = '0';
		$TenSV = $this->input->post('tensv');
		$NamSinh = $this->input->post('namsinh');
		$MaL = $this->input->post('option-tenlop');
		// $MaK = $this->input->post('option-tenkhoa');
		// $Khoa = $this->input->post('khoa');
		$DiemTB = $this->input->post('dtb');
		$Email = $this->input->post('gmail_sv');

		// echo "<pre>";
		// var_dump($Username);
		// var_dump($Password);
		// var_dump($Role);
		// var_dump($TenSV);
		// var_dump($NamSinh);
		// var_dump($MaL);
		// // var_dump($Khoa);
		// var_dump($DiemTB);
		// var_dump($Email);
		// echo "</pre>";

		$this->admin_model->insertUser($Username,$Password,$Role);
		$data = $this->admin_model->getMaxIdUser();
		$IdUser = $data[0]['IdUser'];
		if ($this->admin_model->insertSV($TenSV,$IdUser,$MaL,$DiemTB,$NamSinh,$Email)) {
			$this->load->view('themSV');
		}
	}
	public function themtaikhoanGV()
	{
		$tenkhoa = $this->admin_model->getAllKhoa();
		$data = [
		    'tenkhoa' => $tenkhoa
		];
		$this->load->view('themtaikhoanGV_view', $data, false);
	}
	public function themtaikhoanSV()
	{
		$tenkhoa = $this->admin_model->getAllKhoa();
		$data = [
		    'tenkhoa' => $tenkhoa
		];
		$this->load->view('themtaikhoanSV_view', $data, false);
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
