<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản lý sinh viên</title>
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
                    <div class="alert alert-success text-center"><h4>Danh sách tài khoản sinh viên</h4></div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="select-option">
                    <table class="table table-hover table-sm table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Mã sinh viên</th>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Lớp</th>
                                <th scope="col">Ngày tháng năm sinh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sinhvien as $value): ?>
                            <tr>
                                <th scope="col"><?= $value['Username'] ?></th>
                                <td><?= $value['TenSV'] ?></td>
                                <td><?= $value['Lop'] ?></td>
                                <td><?= $value['NamSinh'] ?></td>
                            </tr>  
                            <div class="object-details d-none">
                                <div class=" container">
                                    <h2 class="title">Thông tin sinh viên</h2>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="user-profile__image">
                                                <img src="<?= base_url() ?>/bootstrap4/img/nhansu.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <form class="form__content" name="form__information">
                                                <!-- <div class="from__content--input">

                                                </div> -->
                                                <div class="name input--form">
                                                    <label> Tên sinh viên: </label>
                                                    <input name="Name" type="text" value="<?= $value['TenSV'] ?>" readonly>
                                                </div>
                                                <div class="class input--form">
                                                    <label> Lớp: </label>
                                                    <input name="Class" type="text" value="<?= $value['Lop'] ?>" readonly>
                                                </div>
                                                <div class="khoa input--form">
                                                    <label> Khoa: </label>
                                                    <input name="Khoa" type="text" value="<?= $value['TenK'] ?>" readonly>
                                                </div>
                                                <!-- <div class="name input--form">
                                                    <label> Giản viên hướng dẫn: </label>
                                                    <input type="text" value="Trần Tuấn A" readonly>
                                                </div> -->
                                                <div class="ten-do-an input--form">
                                                    <label> Tên Dồ ấn: </label>
                                                    <input type="text" value="<?= $value['DeTai'] ?>">
                                                </div>
                                               <!--  <div class="name input--form">
                                                    <label> Tên sinh viên: </label>
                                                    <input name="Name" type="text" value="Nguyễn Thị C" readonly>
                                                </div>
                                                <div class="class input--form">
                                                    <label> Lớp: </label>
                                                    <input name="Class" type="text" value="57TH1" readonly>
                                                </div>
                                                <div class="khoa input--form">
                                                    <label> Khoa: </label>
                                                    <input name="Khoa" type="text" value="Công Nghệ Thông Tin" readonly>
                                                </div> -->
                                              <!--   <div class="name input--form">
                                                    <label> Giản viên hướng dẫn: </label>
                                                    <input type="text" value="Trần Tuấn A" readonly>
                                                </div>
                                                <div class="ten-do-an input--form">
                                                    <label> Tên Dồ ấn: </label>
                                                    <input type="text" placeholder="Nhập tên đò án">
                                                </div>
                                                <div class="name input--form">
                                                    <label> Tên sinh viên: </label>
                                                    <input name="Name" type="text" value="Nguyễn Thị C" readonly>
                                                </div>
                                                <div class="class input--form">
                                                    <label> Lớp: </label>
                                                    <input name="Class" type="text" value="57TH1" readonly>
                                                </div>
                                                <div class="khoa input--form">
                                                    <label> Khoa: </label>
                                                    <input name="Khoa" type="text" value="Công Nghệ Thông Tin" readonly>
                                                </div>
                                                <div class="name input--form">
                                                    <label> Giản viên hướng dẫn: </label>
                                                    <input type="text" value="Trần Tuấn A" readonly>
                                                </div>
                                                <div class="ten-do-an input--form">
                                                    <label> Tên Dồ ấn: </label>
                                                    <input type="text" placeholder="Nhập tên đò án">
                                                </div> -->

                                                <div class="form__btn">
                                                    <button id="repairBtn" class="form__btn--submi primary-btn">Sửa</button>
                                                    <button id="deleteBtn" class="primary-btn"> Xóa </button>
                                                    <button class="primary-btn"> Hoàn thành</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    

                </div>
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
            $('.qlsv').addClass('addbackgroud');

            $('.table tbody tr').click(function(event) {
                $('.object-details').removeClass('d-none');
                $('.table thead,.table tbody').addClass('d-none');
            });
        });
    </script>
</body>

</html>