<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản lý thông tin thực tập</title>
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
                    <div class="alert alert-success text-center"><h4>Danh sách sinh viên thực tập</h4></div>
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
                                <th scope="col" width="20%">Mã sinh viên</th>
                                <th scope="col" width="25%">Họ và tên</th>
                                <th scope="col" width="15%">Lớp</th>
                                <th scope="col" width="30%">Khoa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1; ?>
                            <?php foreach ($thuctap as $value): ?>
                                <tr>
                                    <th style="padding-left: 30px"><?= $stt++ ?></th>
                                    <th><?= $value['Username'] ?></th>
                                    <td><?= $value['TenSV'] ?></td>
                                    <td><?= $value['MaL'] ?></td>
                                    <td><?= $value['TenK'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>  
                <?php foreach ($thuctap as $value): ?>
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
                                        <div class="tensv input-form">
                                            <label> Họ và tên: </label>
                                            <input name="IdUser_SV" type="hidden" value="<?= $value['IdUser_SV'] ?>" class="IdUser_SV anmai" readonly>
                                            <input name="TenSV" type="text" value="<?= $value['TenSV'] ?>" class="TenSV anmai" readonly>
                                        </div>
                                        <div class="lop input-form">
                                            <label> Lớp: </label>
                                            <input name="MaL" type="text" value="<?= $value['MaL'] ?>" class="MaL anmai" readonly>
                                        </div>
                                        <div class="khoa input-form">
                                            <label> Khoa: </label>
                                            <input name="TenK" type="text" value="<?= $value['TenK'] ?>" class="TenK anmai" readonly>
                                        </div>
                                        <div class="congty input-form">
                                            <label> Công ty thực tập: </label>
                                            <input name="CongTy" type="text" value="<?= $value['CongTy'] ?>" class="CongTy andi" readonly>
                                        </div> 
                                        <div class="nbd input-form">
                                            <label> Ngày bắt đầu: </label>
                                            <input name="ThoiGianBatDau" type="text" value="<?= $value['ThoiGianBatDau'] ?>" class="ThoiGianBatDau andi" readonly>
                                        </div>
                                        <div class="nkt input-form">
                                            <label> Ngày kết thúc: </label>
                                            <input name="ThoiGianKetThuc" type="text" value="<?= $value['ThoiGianKetThuc'] ?>" class="ThoiGianKetThuc andi" readonly>
                                        </div>
                                        <div class="danhgia input-form">
                                            <label> Đánh giá: </label>
                                            <input name="DanhGia" type="text" value="<?= $value['DanhGia'] ?>" class="DanhGia andi" readonly>
                                        </div>
                                    </div>
                                    <div class="mt-2 multi-nut">
                                        <a href="#" class="btn-sua btn btn-outline-info mr-2">Sửa <i class="nav-icon fas fa-edit"></i></a>
                                        <a href="#" class="btn-luu btn btn-outline-success mr-2 d-none">Lưu <i class="fas fa-check"></i></a>
                                        <a href="<?= base_url() ?>admin/xoaThucTap/<?= $value['IdUser_SV'] ?>" class="btn-xoa btn btn-outline-danger mr-2"> Xóa <i class="nav-icon fas fa-times"></i></a>
                                        <a href="<?= base_url() ?>admin/quanlythuctap" class="btn btn-outline-primary btn-quaylai">Quay lại <i class="fas fa-arrow-right"></i></a>
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
            var duongdan = '<?php echo base_url(); ?>';

            // xứ lý ẩn hiện nội dung khi click
            $('.table tbody tr').click(function(event) {
                $(this).parent().parent().addClass('d-none');
                $('.form-tk').addClass('d-none');
                var number = $(this).index();
                $('.select-option div:nth-child(' + (number + 3) + ')').removeClass('d-none');
                $('.danhsach h4').text("Thông tin sinh viên thực tập");
            });

            //xử lý khi click vào nút sửa
            $('html,body').on('click', '.btn-sua', function(event) {
                event.preventDefault();
                $('input.andi').removeAttr('readonly');
                $('.btn-luu').removeClass('d-none');
                $('input.andi').addClass('show');
                $(this).addClass('d-none');
                $('.ThoiGianBatDau, .ThoiGianKetThuc').attr('type', 'date');
            });

            // xử lý khi click vào nút Lưu
            $('.btn-luu').click(function(event) {
            // $('html,body').on('click', '.btn-luu', function(event) {
                event.preventDefault();

                var IdUser_SV = $(this).parent().prev().children('.tensv').children('.IdUser_SV').val();
                var CongTy = $(this).parent().prev().children('.congty').children('.CongTy').val();
                var ThoiGianBatDau = $(this).parent().prev().children('.nbd').children('.ThoiGianBatDau').val();
                var ThoiGianKetThuc = $(this).parent().prev().children('.nkt').children('.ThoiGianKetThuc').val();
                var DanhGia = $(this).parent().prev().children('.danhgia').children('.DanhGia').val();

                console.log(CongTy);
                console.log(ThoiGianBatDau);
                console.log(ThoiGianKetThuc);
                console.log(DanhGia);

                if (CongTy=="" || ThoiGianBatDau=="" || ThoiGianKetThuc=="" || DanhGia=="") {
                    alert('Bạn chưa nhập đầy đủ thông tin. Vui lòng kiểm tra lại!');
                } 
                else {

                    //Gán giá trị nội dung sau khi lưu
                    $(this).parent().prev().children('.nbd').children('.ThoiGianBatDau').val(ThoiGianBatDau);
                    $(this).parent().prev().children('.nkt').children('.ThoiGianKetThuc').val(ThoiGianKetThuc);

                    $('input.andi').removeAttr('readonly');
                    $(this).addClass('d-none');
                    $('input.andi').removeClass('show');
                    $('.btn-sua').removeClass('d-none');
                    $('.ThoiGianBatDau, .ThoiGianKetThuc').attr('type', 'text');

                    $.ajax({
                        url: duongdan + 'admin/updateThucTap',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            IdUser_SV: IdUser_SV,
                            CongTy: CongTy,
                            ThoiGianBatDau: ThoiGianBatDau,
                            ThoiGianKetThuc: ThoiGianKetThuc,
                            DanhGia: DanhGia
                        },
                    })
                    .done(function() {
                        console.log("success");
                    })
                    .fail(function() {
                        // console.log("error");
                    })
                    // .always(function() {
                    // });

                    $('.thongbao').removeClass('d-none');

                    var tudong = setInterval(function() {
                        $('.thongbao').addClass('d-none');
                        clearInterval(tudong); //Dừng lặp lại sau tg cho trc
                    }, 2500);
                }
            });

            // xử lý màu menu
            $('.qlda').addClass('addbackgroud');
            $('.qlda').addClass('menu-open');
            $('.tttt').addClass('addbackgroudCon');            
            $('.doan').addClass('removebackgroud');

        });
    </script>
</body>

</html>