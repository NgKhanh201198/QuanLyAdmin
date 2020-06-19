<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản lý tài khoản giảng viên</title>
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

    <?php if ($this->session->has_userdata('Username') && $this->session->has_userdata('Password')): ?>
    <?php else: ?>
        <?php redirect(base_url('admin/login')); ?>
    <?php endif ?>

    <div class="wrapper">
        <!-- Navbar -->
        <?php include('header.php'); ?>

        <!-- Main Content -->
        <div class="content-wrapper" style="min-height: 221px;">
            <div class="container-fluid">
                <div class="danhsach">
                    <div class="alert alert-success text-center"><h4>Danh sách tài khoản giảng viên</h4></div>
                </div>
            </div>
            <div class="container-fluid select-option">
                <div class="form-tk">
                    <form action="">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="select-group">
                                    <select class="selectpicker">
                                        <option value="" selected>Chọn khoa</option>
                                        <option value="CNTT">Công nghệ thông tin</option>
                                        <option value="CT">Công trình</option>
                                        <option value="ND">Nào đó</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="select-group">
                                    <select class="selectpicker">
                                        <option value="" selected>Chọn Lớp</option>
                                        <option value="CNTT">Công nghệ thông tin</option>
                                        <option value="CT">Công trình</option>
                                        <option value="ND">Nào đó</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="input-group input-group-sm tk-group">
                                    <input class="form-control form-control-navbar tk-input" type="search" placeholder="Tên giảng viên" aria-label="Search">
                                    <div class="input-group-append btn-tk">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i> Tìm kiếm
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <table class="table table-hover table-sm table-dark">
                        <thead>
                            <tr>
                                <th scope="col" width="10%" style="padding-left: 30px">STT</th>
                                <th scope="col" width="20%">Mã giảng viên</th>
                                <th scope="col" width="25%">Họ và tên</th>
                                <th scope="col" width="20%">Username</th>
                                <th scope="col" width="30%">Khoa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1; ?>
                            <?php foreach ($tkgv as $value): ?>
                                <?php if ($value['TenGV']==null): ?>
                                <?php else: ?>
                                    <tr>
                                        <td style="padding-left: 30px"><?= $stt++ ?></td>
                                        <td><?= $value['Username'] ?></td>
                                        <td><?= $value['TenGV'] ?></td>
                                        <td><?= $value['Username'] ?></td>
                                        <td><?= $value['TenK'] ?></td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <?php foreach ($tkgv as $value): ?>
                    <?php if ($value['TenGV']==null): ?>
                    <?php else: ?>
                        <div class="object-details d-none">
                            <div class="container ml-5">
                                    <!-- <h2 class="title">Thông tin sinh viên</h2> -->
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="user-profile__image">
                                                <img src="<?php echo base_url(); ?>bootstrap4/img/nhansu.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <form class="form__content" name="">
                                                <div class="form-data">
                                                    <div class="name input-form">
                                                        <label> Tên giảng viên: </label>
                                                        <input name="TenGV" type="text" value="<?= $value['TenGV'] ?>" class="TenGV andi" readonly>
                                                    </div>
                                                    <div class="class input-form">
                                                        <label> Username: </label>
                                                        <input name="Username" type="text" value="<?= $value['Username'] ?>" class="Username andi" readonly>
                                                    </div>
                                                    <div class="khoa input-form">
                                                        <label> Password: </label>
                                                        <input name="Password" type="password" value="<?= $value['Password'] ?>" class="Password andi" readonly>
                                                    </div>
                                                    <div class="show-hide">
                                                        <img class="show" style="width: 25px" src="<?= base_url() ?>/bootstrap4/img/show.png" alt="">
                                                        <img class="hide anpass" style="width: 25px" src="<?= base_url() ?>/bootstrap4/img/hide.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="mt-2 multi-nut">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-12"><a href="<?= base_url() ?>admin/datLaiMatKhau_GV/<?= $value['IdUser'] ?>" class="btn-dlmk btn btn-outline-info mr-2" onclick="return resetPassword()">Đặt lại mật khẩu <i class="nav-icon fas fa-random "></i></a></div>
                                                        <div class="col-sm-6 col-12">
                                                            <div class="row">
                                                                <div class="col-sm-5 p-0"><a href="<?= base_url() ?>admin/deleteUserGV/<?= $value['IdUser'] ?>" class="btn-xoa btn btn-outline-danger mr-2" onclick="return deleteUser()"> Xóa <i class="nav-icon fas fa-times"></i></a></div>
                                                                <div class="col-sm-7 p-0"><a href="<?= base_url() ?>admin/quanlytaikhoanGV" class="btn btn-outline-primary btn-quaylai">Quay lại <i class="fas fa-arrow-right"></i></a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php endif ?>
                <?php endforeach ?>
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
        // thông báo khi đặt lại password
        function resetPassword() {
          if (confirm("Mật khẩu mới sẽ đổi thành <Mã giảng viên> của tài khoản này. Bạn có muốn tiếp tục?")) {return true;} else {return false;}
        }
        // thông báo xóa tài khoản
        function deleteUser() {
          if (confirm("Bạn có chắc muốn xóa tài khoản này?")) {return true;} else {return false;}
        }
        $(document).ready(function() {

            // var duongdan = '<?php //echo base_url(); ?>';

            //xử lý ẩn hiện pass
            $('.hide').click(function(event) {
                $(this).addClass('anpass')
                $('.show').removeClass('anpass');
                $('.Password').attr('type', 'password');
            });
            $('.show').click(function(event) {
                $(this).addClass('anpass')
                $('.hide').removeClass('anpass');

                $('.Password').attr('type', 'text');
            });

            // xứ lý ẩn hiện nội dung khi click
            $('.table tbody tr').click(function(event) {
                $(this).parent().parent().addClass('d-none');
                $('.form-tk').addClass('d-none');

                var number = $(this).index();

                $('.select-option div:nth-child(' + (number + 3) + ')').removeClass('d-none');

                $('.danhsach h4').text("Thông tin tài khoản giảng viên");
            });

            // xử lý màu menu
            $('.qltk').addClass('addbackgroud');
            $('.qltk').addClass('menu-open');
            $('.giangvien').addClass('addbackgroudCon');            
            $('.sinhvien').addClass('removebackgroud');
        });
    </script>
</body>

</html>