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
                    <div class="alert alert-success text-center"><h4>Thêm tài khoản sinh viên</h4></div>
                </div>
            </div>
            <div class="container-fluid select-option">
                <form action="<?= base_url(); ?>admin/addUserSV" method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()"><!-- để form ở đây -->
                    <div class="select-option row">
                        <div class="col-sm-6"><a href="#" class="btn btn-dark btn-block btn-lg creOneUser">Tạo từng tài khoản</a></div>
                        <div class="col-sm-6"><a href="#" class="btn btn-dark  btn-block btn-lg creMultiUser">Tạo nhiều tài khoản</a></div>
                    </div>
                    <div class="type-addbox mb-5">
                        <h2 class="title">Tạo từng tài khoản</h2>
                        <!-- <div class="radio-button">
                            <div class="radio-button--option optionSV">
                                <input type="radio" name="user-type" id="sv" value="0" checked>
                                <label for="sv"> Sinh viên</label>
                            </div>
                            <div class="radio-button--option optionGV">
                                <input type="radio" name="user-type" id="gv" value="1">
                                <label for="gv">Giảng Viên</label>
                            </div>
                        </div> -->

                        <!-- Tạo từng tài khoản------------------------------------------------------------------------------------------- -->
                        <div class="user--one">
                            <!-- Form sinh ----------------------------------------------------------------------------------------------- -->
                            <div class="form-data form-sv">
                                <div class="MSV input-form">
                                    <label> Username/Mã sinh viên: </label>
                                    <input name="msv" type="text" value="" class="msv show" required>
                                </div>
                                <div class="PASS_SV input-form">
                                    <label> Password (Mặc định): </label>
                                    <input name="pass_sv" type="text" value="daihocthuyloi" class="pass_sv show" readonly>
                                </div>
                                <div class="TENSV input-form">
                                    <label> Tên sinh viên: </label>
                                    <input name="tensv" type="text" value="" class="tensv show" required>
                                </div>
                                <div class="NAMSINH input-form">
                                    <label> Ngày sinh: </label>
                                    <input name="namsinh" type="text" value="" class="namsinh show" placeholder="dd/mm/YYYY" required>
                                </div>
                                <div class="TENKHOA input-form">
                                    <label> Khoa: </label>
                                    <select class="option-tenkhoa" name="option-tenkhoa" required>
                                        <option value="" selected >--Chọn Khoa--</option>
                                        <?php foreach ($tenkhoa as $value): ?>
                                            <option value="<?= $value['MaK'] ?>"><?= $value['TenK'] ?></option>
                                        <?php endforeach ?>
                                    </select>  
                                </div>  
                                <div class="TENLOP input-form">
                                    <label> Lớp: </label>
                                    <select class="option-tenlop" name="option-tenlop">
                                    </select>  
                                </div>
                                <div class="KHOA input-form">
                                    <label> Khóa: </label>
                                    <input name="khoa" type="text" value="" class="khoa show" required>
                                </div>
                                <div class="DTB input-form">
                                    <label> Điểm trung bình: </label>
                                    <input name="dtb" type="text" value="" class="dtb show" required>
                                </div>
                                <div class="GMAIL_SV input-form">
                                    <label> Email: </label>
                                    <input name="gmail_sv" type="email" value="" class="gmail_sv show" required>
                                </div>
                                <div class="ANH_SV input-form">
                                    <label> Ảnh: </label>
                                    <input name="anh_sv" type="file" value="" class="anh_sv show">
                                </div>
                            </div>
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
        // function isDate(inputDate) {
        //     var regex = /^(0?[1-9]|[12][0-9]|3[01])[/](0?[1-9]|1[012])[/](19|20)?[0-9]{2}$/;
        //     return regex.test(inputDate);
        // }

        // function validateForm() {
        //     var date = $('.namsinh').val();
        //     if (!isDate(date)) {
        //         alert("Bạn chưa nhập đúng định dạng ngày tháng năm sinh!");
        //         return false;
        //     }
        // }

        $(document).ready(function() {
            var duongdan = '<?php echo base_url(); ?>';

            // xử lý khi chọn khoa sẽ hiện ra lớp tương ứng
            $('.option-tenkhoa').change(function(event) {
                var MaK = $(this).val();

                $.ajax({
                    url: duongdan + 'admin/locLop',
                    type: 'POST',
                    dataType: 'html',
                    data: {MaK: MaK},
                    success:function(data){
                        $('.option-tenlop').html(data);
                    }
                });
            });

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