<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản lý đồ án sinh viên</title>
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 221px;">
            <div class="container-fluid">
                <div class="danhsach">
                    <div class="alert alert-success text-center"><h4>Danh sách đồ án sinh viên</h4></div>
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
                                    <input class="form-control form-control-navbar tk-input" type="search" placeholder="Tên sinh viên" aria-label="Search">
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
                                <th scope="col" width="20%" >Tên đồ án</th>
                                <th scope="col" width="25%" >Sinh viên thực hiện</th>
                                <th scope="col" width="10%" >Lớp</th>
                                <th scope="col" width="20%" >Khoa</th>
                                <th scope="col" width="15%" >Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1; ?>
                            <?php foreach ($doan as $value): ?>
                                <tr>
                                    <th style="padding-left: 30px"><?= $stt++ ?></th>
                                    <td><?= $value['DeTai'] ?></td>
                                    <th scope="row"><?= $value['TenSV'] ?></th>
                                    <td><?= $value['MaL'] ?></td>
                                    <td><?= $value['TenK'] ?></td>
                                    <td class="trangthai"><?= $value['TrangThaiYeuCau'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>  
                <?php foreach ($doan as $value): ?>
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
                                        <div class="tendoan input-form">
                                            <label> Tên đồ án: </label>
                                            <input name="DeTai" type="text" value="<?= $value['DeTai'] ?>" class="DeTai andi" readonly>
                                        </div>
                                        <div class="gvhd input-form">
                                            <label> Giảng viên hướng dẫn: </label>
                                            <input name="TenGV" type="text" value="<?= $value['TenGV'] ?>" class="TenGV andi" readonly>
                                        </div>
                                        <div class="svth input-form">
                                            <label> Sinh viên thực hiện: </label>
                                            <input name="TenSV" type="text" value="<?= $value['TenSV'] ?>" class="TenSV andi" readonly>
                                        </div>
                                        <div class="lop input-form">
                                            <label> Lớp: </label>
                                            <input name="MaL" type="text" value="<?= $value['MaL'] ?>" class="MaL andi" readonly>
                                        </div>
                                        <div class="khoa input-form">
                                            <label> Khoa: </label>
                                            <input name="TenK" type="text" value="<?= $value['TenK'] ?>" class="TenK andi" readonly>
                                        </div> 
                                        <div class="nbd input-form">
                                            <label> Ngày bắt đầu: </label>
                                            <input name="ThoiGianBatDau" type="text" value="<?= date_format(date_create($value['ThoiGianBatDau']),"d/m/Y") ?>" class="ThoiGianBatDau andi" readonly>
                                        </div>
                                        <div class="nkt input-form">
                                            <label> Ngày kết thúc: </label>
                                            <input name="ThoiGianKetThuc" type="text" value="<?= date_format(date_create($value['ThoiGianKetThuc']),"d/m/Y") ?>" class="ThoiGianKetThuc andi" readonly>
                                        </div>
                                        <div class="trangthai input-form">
                                            <label> Trạng thái: </label>
                                            <input name="TrangThaiYeuCau" type="text" value="<?= $value['TrangThaiYeuCau'] ?>" class="TrangThaiYeuCau andi" readonly>
                                        </div>
                                    </div>
                                    <div class="mt-2 multi-nut">
                                        <!-- <a href="#" class="btn-sua btn btn-outline-info mr-2">Sửa <i class="nav-icon fas fa-edit"></i></a> -->
                                        <!-- <a href="#" class="btn-luu btn btn-outline-success mr-2 d-none">Lưu <i class="fas fa-check"></i></a> -->
                                        <!-- <a href="#" class="btn-xoa btn btn-outline-danger mr-2"> Xóa <i class="nav-icon fas fa-times"></i></a> -->
                                        <a href="<?= base_url() ?>admin/quanlydoan" class="btn btn-outline-primary btn-quaylai">Quay lại <i class="fas fa-arrow-right"></i></i></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
        $(document).ready(function() {
            if ($('.table tbody tr td.trangthai').val() == '1') {console.log('co 1 cái');}

            var duongdan = '<?php echo base_url(); ?>';

            // xứ lý ẩn hiện nội dung khi click
            $('.table tbody tr').click(function(event) {
                $(this).parent().parent().addClass('d-none');
                $('.form-tk').addClass('d-none');

                var number = $(this).index();

                $('.select-option div:nth-child(' + (number + 3) + ')').removeClass('d-none');

                $('.danhsach h4').text("Thông tin đồ án sinh viên");
            });

            // xử lý màu menu
            $('.qlda').addClass('addbackgroud');
            $('.qlda').addClass('menu-open');
            $('.doan').addClass('addbackgroudCon');            
            $('.tttt').addClass('removebackgroud');

        });
    </script>
</body>

</html>