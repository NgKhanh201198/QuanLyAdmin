<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản lý giảng viên</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap4/css/all.min.css">
    <!-- Theme style navbar-->
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap4/css/adminlte.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap4/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> -->
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
                    <div class="alert alert-success text-center"><h4>Danh sách cán bộ giảng viên</h4></div>
                </div>
            </div>
            <div class="container-fluid select-option">
                <div class="form-tk">
                    <form action="">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="select-group">
                                    <select class="selectpicker">
                                        <option value="" selected>Chọn khoa</option>
                                        <option value="CNTT">Công nghệ thông tin</option>
                                        <option value="CT">Công trình</option>
                                        <option value="ND">Nào đó</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
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
                                <th scope="col" width="18%">Mã giảng viên</th>
                                <th scope="col" width="25%">Họ và tên</th>
                                <th scope="col" width="22%">Khoa</th>
                                <th scope="col" width="25%">Chuyên môn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1; ?>
                            <?php foreach ($giangvien as $value): ?>
                            <tr>
                                <th style="padding-left: 30px"><?= $stt++ ?></th>
                                <th><?= $value['Username'] ?></th>
                                <td><?= $value['TenGV'] ?></td>
                                <td><?= $value['TenK'] ?></td>
                                <td><?= $value['Chuyenmon'] ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>  
                <?php foreach ($giangvien as $value): ?>
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
                                    <div class="tengv from-data">
                                        <div class="tengv input-form">
                                            <label> Tên giảng viên: </label>
                                            <input type="text" class="TenGV andi" value="<?= $value['TenGV'] ?>" readonly>
                                            <input type="hidden" class="IdUser" value="<?= $value['IdUser'] ?>" readonly>
                                        </div>
                                        <div class="magv class input-form">
                                            <label> Mã giảng viên: </label>
                                            <input type="text" class="Username anmai" value="<?= $value['Username'] ?>" readonly>
                                        </div>
                                        <div class="tenkhoa input-form">
                                            <label> Khoa: </label>
                                            <input type="text" class="TenK andi" value="<?= $value['TenK'] ?>" readonly>
                                            <select class="option-tenkhoa d-none" id="option-tenkhoa">
                                                <?php foreach ($khoa as $value1): ?>
                                                    <?php if ($value['MaK'] == $value1['MaK']): ?>
                                                        <option value="<?= $value1['MaK'] ?>" selected><?= $value1['TenK'] ?></option>
                                                    <?php else: ?>
                                                        <option value="<?= $value1['MaK'] ?>"><?= $value1['TenK'] ?></option>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </select> 
                                        </div>
                                        <div class="chuyenmon input-form">
                                            <label> Chuyên môn </label>
                                            <input type="text" class="Chuyenmon andi" value="<?= $value['Chuyenmon'] ?>" readonly>
                                        </div>
                                        <div class="sdt input-form">
                                            <label> Số điện thoại: </label>
                                            <input type="text" class="SDT andi" value="<?= $value['SDT'] ?>" readonly>
                                        </div>
                                        <div class="gmail input-form">
                                            <label> Email: </label>
                                            <input type="email" class="Gmail andi" value="<?= $value['Gmail'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="mt-2 multi-nut">
                                        <a href="#" id="repairBtn" class="btn-sua btn btn-outline-info mr-2">Sửa <i class="nav-icon fas fa-edit"></i></a>
                                        <a href="#" id="repairBtn" class="btn-luu btn btn-outline-success mr-2 d-none">Lưu <i class="fas fa-check"></i></a>

                                        <a href="<?= base_url() ?>admin/xoagiangvien/<?= $value['IdUser'] ?>" id="deleteBtn" class="btn-xoa btn btn-outline-danger mr-2" onclick="return deleteUser()"> Xóa <i class="nav-icon fas fa-times"></i></a>
                                        <a href="<?= base_url() ?>admin/quanlygiangvien" class="btn btn-outline-primary btn-quaylai">Quay lại <i class="fas fa-arrow-right"></i></a>
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
    <script>
        // thông báo xóa tài khoản
        function deleteUser() {
          if (confirm("Bạn có chắc muốn xóa giảng viên này?")) {return true;} else {return false;}
        }

        $(document).ready(function() {
            var duongdan = '<?php echo base_url(); ?>';

            // xứ lý ẩn hiện nội dung khi click
            $('.table tbody tr').click(function(event) {
                $(this).parent().parent().parent().addClass('d-none');
                $('.form-tk').addClass('d-none');

                var number = $(this).index();

                $('.select-option div:nth-child(' + (number + 3) + ')').removeClass('d-none');

                $('.danhsach h4').text("Thông tin giảng viên");
            });

            //xử lý khi click vào nút sửa
            $('html,body').on('click', '.btn-sua', function(event) {
                event.preventDefault();
                $('input.andi').removeAttr('readonly');
                $('.btn-luu').removeClass('d-none');
                $('input.andi').addClass('show');
                $(this).addClass('d-none');
                $('.TenK').addClass('d-none');
                $('.option-tenkhoa, .option-tenlop').removeClass('d-none');
            });

            // xử lý khi click vào nút Lưu
            $('.btn-luu').click(function(event) {
            // $('html,body').on('click', '.btn-luu', function(event) {
                event.preventDefault();
                var IdUser = $(this).parent().prev().children('.tengv').children('.IdUser').val();
                var TenGV = $(this).parent().prev().children('.tengv').children('.TenGV').val();
                var Username = $(this).parent().prev().children('.magv').children('.Username').val();
                var TenK = $(this).parent().prev().children('.tenkhoa').children('.option-tenkhoa').find(':selected').text();
                var MaK = $(this).parent().prev().children('.tenkhoa').children('.option-tenkhoa').val();
                var Chuyenmon = $(this).parent().prev().children('.chuyenmon').children('.Chuyenmon').val();
                var SDT = $(this).parent().prev().children('.sdt').children('.SDT').val();
                var Gmail = $(this).parent().prev().children('.gmail').children('.Gmail').val();

                // console.log(IdUser);
                // console.log(TenGV);
                // console.log(Username);
                // console.log(TenK);
                // console.log(MaK);
                // console.log(Chuyenmon);
                // console.log(SDT);
                // console.log(Gmail);

                if (IdUser=="" || TenGV=="" || Username=="" || TenK=="" || Chuyenmon=="" || SDT=="" || Gmail=="") {
                    alert('thiếu rồi bạn ê');
                } else {
                    //Gán giá trị nội dung sau khi lưu
                    $(this).parent().prev().children('.tenkhoa').children('.TenK').val(TenK);

                    $('input.andi').removeAttr('readonly');
                    $(this).addClass('d-none');
                    $('input.andi').removeClass('show');
                    $('.btn-sua').removeClass('d-none');
                    $('.TenK').removeClass('d-none');
                    $('.option-tenkhoa').addClass('d-none');

                    $.ajax({
                        url: duongdan + 'admin/updateGV',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            IdUser: IdUser,
                            TenGV: TenGV,
                            // Username: Username,
                            MaK: MaK,
                            Chuyenmon: Chuyenmon,
                            SDT: SDT,
                            Gmail: Gmail
                        },
                    })
                    .done(function() {
                        console.log("success");
                    })
                    .fail(function() {
                        // console.log("error");
                    })
                    .always(function() {
                    });

                    // Xứ lý thông báo
                    $('.thongbao').removeClass('d-none');
                    var tudong = setInterval(function() {
                        $('.thongbao').addClass('d-none');
                        clearInterval(tudong); //Dừng lặp lại sau tg cho rc
                    }, 2500);
                }

                

            });

            // xử lý màu menu
            $('.qlgv').addClass('addbackgroud');

        });
    </script>
</body>

</html>