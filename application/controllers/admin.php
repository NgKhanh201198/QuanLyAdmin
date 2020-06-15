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
		$data = $this->admin_model->getMaxIdUser();
		$data = [
		    'max' => $data
		];
		echo "<pre>";
		var_dump($data['max']);
		echo "</pre>";
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
		// $TenKhoa = $this->input->post('TenK');
		$Khoa = $this->input->post('Khoa');
		$MaL = $this->input->post('MaL');
		$Gmail = $this->input->post('Gmail');

		if ($this->admin_model->updateSvByID($IdUser,$TenSV,$NamSinh,$Khoa,$MaL,$Gmail)) {
			$this->load->view('quanlysinhvien_view');
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
		$MaK = $this->input->post('MaK');
		$tbl_lop = $this->admin_model->getAllLopByTenK($MaK);
		
		foreach ($tbl_lop as $value) {
			echo '<option value="'.$value['MaL'] .'"selected>'.$value['MaL'] .'</option>';
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
        // $Username = $this->input->post('Username');
        $MaK = $this->input->post('MaK');
        $Chuyenmon = $this->input->post('Chuyenmon');
        $SDT = $this->input->post('SDT');
        $Gmail = $this->input->post('Gmail');

        // echo "<pre>";
        // var_dump($IdUser);
        // var_dump($TenGV);
        // var_dump($Username);
        // var_dump($MaK);
        // var_dump($Chuyenmon);
        // var_dump($SDT);
        // var_dump($Gmail);
        // echo "</pre>";

		if ($this->admin_model->updateGvByID($IdUser,$TenGV,$MaK,$Chuyenmon,$SDT,$Gmail)) {
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
		$Password = $this->input->post('pass_gv');
		$Role = '1';
		$TenGV = $this->input->post('tengv');
		$MaK = $this->input->post('option-tenkhoa');
		$Chuyenmon = $this->input->post('chuyenmon');
		$SDT = $this->input->post('sdt');
		$Gmail = $this->input->post('gmail_gv');
		// $Anh = $this->input->post('anh_gv');
		$Anh = 'chua co';




		// if ($this->admin_model->insertUser($Username,$Password,$Role)) {
		// 	echo 'thanh cong';	
		// }
		// else {
		// 	echo 'that bai';
		// }

		$this->admin_model->insertUser($Username,$Password,$Role);
		$data = $this->admin_model->getMaxIdUser();
		$IdUser = $data[0]['IdUser'];
		if ($this->admin_model->insertGV($TenGV,$IdUser,$Anh,$MaK,$SDT,$Gmail,$Chuyenmon)) {
			$this->load->view('themGV');
		}


		// echo "<pre>";
		// var_dump($Username);
		// var_dump($Password);
		// var_dump($Role);
		// var_dump($TenGV);
		// var_dump($MaK);
		// var_dump($Chuyenmon);
		// var_dump($SDT);
		// var_dump($Gmail);
		// var_dump($Anh);
		// var_dump($IdUser);
		// echo "</pre>";

	}
	public function adduserSV()
	{
		// $this->load->view('themtaikhoanSV_view');
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
		$this->load->view('themtaikhoanSV_view');
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
