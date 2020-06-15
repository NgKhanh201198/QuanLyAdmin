<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thêm tài khoản sinh viên</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap4/css/all.min.css">
    <!-- Theme style navbar-->
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap4/css/adminlte.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap4/css/style.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include('header.php'); ?>

        <!-- Main Content -->
        <div class="content-wrapper" style="min-height: 221px;">
            <div class="container-fluid">
                <div class="danhsach">
                    <div class="alert alert-success text-center"><h4>Thêm tài khoản</h4></div>
                </div>
            </div>
            <div class="container-fluid select-option">
                <form action="<?= base_url(); ?>admin/addUserSV" method="post" enctype="multipart/form-data"><!-- để form ở đây -->
                    <div class="select-option row">
                        <div class="col-sm-6"><a href="#" class="btn btn-dark btn-block btn-lg creOneUser">Tạo từng tài khoản</a></div>
                        <div class="col-sm-6"><a href="#" class="btn btn-dark  btn-block btn-lg creMultiUser">Tạo nhiều tài khoản</a></div>
                    </div>
                    <div class="type-addbox mb-5">
                        <h2 class="title">Tạo từng tài khoản</h2>
                        <div class="radio-button">
                            <div class="radio-button--option optionSV">
                                <input type="radio" name="user-type" id="sv" value="0" checked>
                                <label for="sv"> Sinh viên</label>
                            </div>
                            <div class="radio-button--option optionGV">
                                <input type="radio" name="user-type" id="gv" value="1">
                                <label for="gv">Giảng Viên</label>
                            </div>
                        </div>

                        <!-- Tạo từng tài khoản------------------------------------------------------------------------------------------- -->
                        <div class="user--one">
                            <!-- Form sinh ----------------------------------------------------------------------------------------------- -->
                            <div class="form-data form-sv">
                                <div class="MSV input-form">
                                    <label> Username/Mã sinh viên: </label>
                                    <input name="msv" type="text" value="" class="msv show">
                                </div>
                                <div class="PASS_SV input-form">
                                    <label> Password (Mặc định): </label>
                                    <input name="pass_sv" type="text" value="daihocthuyloi" class="pass_sv show" readonly>
                                </div>
                                <div class="TENSV input-form">
                                    <label> Tên sinh viên: </label>
                                    <input name="tensv" type="text" value="" class="tensv show">
                                </div>
                                <div class="NAMSINH input-form">
                                    <label> Ngày sinh: </label>
                                    <input name="namsinh" type="text" value="" class="namsinh show" placeholder="dd/mm/YYYY">
                                </div>
                                <div class="TENKHOA1 input-form">
                                    <label> Khoa: </label>
                                    <select class="option-tenkhoa" id="option-tenkhoa">
                                        <option value="" selected>--Chọn Khoa--</option>
                                        <option value="" selected>--Chọn Khoa--</option>
                                        <option value="" selected>--Chọn Khoa--</option>
                                        <option value="" selected>--Chọn Khoa--</option>
                                    </select>  
                                </div>  
                                <div class="TENLOP input-form">
                                    <label> Lớp: </label>
                                    <select class="option-tenlop">
                                        <option value="" selected>58th4</option>
                                        <option value="" selected>58th4</option>
                                        <option value="" selected>58th4</option>
                                        <option value="" selected>58th4</option>
                                    </select>  
                                </div>
                                <div class="KHOA input-form">
                                    <label> Khóa: </label>
                                    <input name="khoa" type="text" value="" class="khoa show">
                                </div>
                                <div class="DTB input-form">
                                    <label> Điểm trung bình: </label>
                                    <input name="dtb" type="text" value="" class="dtb show">
                                </div>
                                <div class="GMAIL_SV input-form">
                                    <label> Email: </label>
                                    <input name="gmail_sv" type="email" value="" class="gmail_sv show">
                                </div>
                                <div class="ANH_SV input-form">
                                    <label> Ảnh: </label>
                                    <input name="anh_sv" type="file" value="" class="anh_sv show">
                                </div>
                            </div>

                            <!-- Form giảng viên------------------------------------------------------------------------------------------ -->
                            <!-- <div class="form-data form-gv d-none">
                                <div class="MGV input-form">
                                    <label> Username/Mã giảng viên: </label>
                                    <input name="mgv" type="text" value="" class="mgv show">
                                </div>
                                <div class="PASS_GV input-form">
                                    <label> Password (Mặc định): </label>
                                    <input name="pass_gv" type="text" value="daihocthuyloi" class="pass_gv show" readonly>
                                </div>
                                <div class="TENGV input-form">
                                    <label> Tên giảng viên: </label>
                                    <input name="tengv" type="text" value="" class="tengv show">
                                </div>
                                <div class="TENKHOA2 input-form">
                                    <label> Khoa: </label>
                                    <select class="option-tenkhoa" id="option-tenkhoa">
                                        <option value="" selected>--Chọn Khoa--</option>
                                        <option value="" selected>--Chọn Khoa--</option>
                                        <option value="" selected>--Chọn Khoa--</option>
                                        <option value="" selected>--Chọn Khoa--</option>
                                    </select>  
                                </div>
                                <div class="CHUYENMON input-form">
                                    <label> Chuyên môn: </label>
                                    <input name="chuyenmon" type="text" value="" class="chuyenmon show">
                                </div>
                                <div class="SDT input-form">
                                    <label> Số điện thoại: </label>
                                    <input name="sdt" type="text" value="" class="sdt show">
                                </div>
                                <div class="GMAIL_GV input-form">
                                    <label> Email: </label>
                                    <input name="gmail_gv" type="email" value="" class="gmail_gv show">
                                </div>
                                <div class="ANH_GV input-form">
                                    <label> Ảnh: </label>
                                    <input name="anh_gv" type="file" value="" class="anh_gv show">
                                </div>
                            </div> -->
                        </div>


                        <!-- Tạo nhiều tài khoản------------------------------------------------------------------------------------------ -->
                        <div class="user--multi d-none">
                            <div class="multiple-user">
                                <p class="huong-dan">Hướng dẫn : Nhập tài khoản bằn file excel gồm các cột: <br> Mã sinh vên/ Mã giảng viên; Khoa; Lớp/Bộ môn; Ngày tháng năm sinh; Email </p>

                                <label> Chọn file tài khoản: </label>
                                <input name="Gmail" type="file" value="" class="Gmail show">
                            </div>
                        </div>
                        
                        <!-- Nút thêm mới -------------------------------------------------------------------------------------------- -->
                        <div class="text-center form__btn p-3">
                            <button type="submit" class="btn btn-outline-success themmoi1" style="padding: 6px 20px">Thêm mới <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </form><!-- End form -->
            </div>
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>bootstrap4/js/jquery-3.4.1.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>bootstrap4/js/adminlte.js"></script>
    <!-- bootstrap js -->
    <script src="<?php echo base_url(); ?>bootstrap4/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>bootstrap4/js/script.js"></script>
    <script>
        $(document).ready(function() {

            // Lựa chọn tài khoản sv và gv
            $('.optionSV').click(function(event) {
                /* Act on the event */
                $('.form-sv').removeClass('d-none');
                $('.form-gv').addClass('d-none');

            });

            $('.optionGV').click(function(event) {
                /* Act on the event */
                $('.form-sv').addClass('d-none');
                $('.form-gv').removeClass('d-none');
            });

            // Lựa chọn cách thêm mới tài khoản
            $('.creOneUser').click(function(event) {
                /* Act on the event */
                $('.user--one').removeClass('d-none');
                $('.user--multi').addClass('d-none');
                $('h2.title').text("Tạo từng tài khoản");
            });

            $('.creMultiUser').click(function(event) {
                /* Act on the event */
                $('.user--one').addClass('d-none');
                $('.user--multi').removeClass('d-none');
                $('h2.title').text("Tạo nhiều tài khoản");
            });

            $('.themtk').addClass('addbackgroud');
            $('.themtk').addClass('menu-open');
            $('.addsv').addClass('addbackgroudCon');            
            $('.addgv').addClass('removebackgroud');
        });
    </script>
</body>

</html>