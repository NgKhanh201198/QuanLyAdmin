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
                    <div class="alert alert-success text-center"><h4>Danh sách cán bộ giảng viên</h4></div>
                    <!-- <div class="alert alert-success text-center"><strong>Hello <?= $this->session->userdata('Username') ?>!</strong> Bạn đã đăng nhập thành công!</div> -->
                    
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
                                <th scope="col" width="25%">Bộ môn</th>
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
                                <td><?= $value['TenBoMon'] ?></td>
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
                                            <div class="append1">
                                                <input type="text" class="TenK andi" value="<?= $value['TenK'] ?>" readonly>
                                            </div>
                                            <select class="option-tenkhoa d-none" id="option-tenkhoa">
                                                <option value="" selected>--Chọn khoa--</option>
                                                <?php foreach ($khoa as $value1): ?>
                                                    <?php if ($value['MaK'] == $value1['MaK']): ?>
                                                        <option value="<?= $value1['MaK'] ?>"><?= $value1['TenK'] ?></option>
                                                    <?php else: ?>
                                                        <option value="<?= $value1['MaK'] ?>"><?= $value1['TenK'] ?></option>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </select> 
                                        </div>
                                        <div class="tenbomon input-form">
                                            <label> Bộ môn </label>
                                            <div class="append2">
                                                <input type="text" class="TenBoMon andi" value="<?= $value['TenBoMon'] ?>" readonly>
                                            </div>
                                            <select class="option-tenbomon d-none">
                                                <option value="<?= $value['MaBoMon'] ?>"selected><?= $value['TenBoMon'] ?></option>
                                            </select> 
                                        </div>
                                        <div class="trinhdohocvan input-form">
                                            <label> Trình độ học vấn: </label>
                                            <input type="text" class="Trinhdohocvan andi" value="<?= $value['Trinhdohocvan'] ?>" readonly>
                                        </div>
                                        <div class="huongnc input-form">
                                            <label> Hướng nghiên cứu: </label>
                                            <input type="text" class="HuongNghienCuu andi" value="<?= $value['HuongNghienCuu'] ?>" readonly>
                                        </div>
                                        
                                        <div class="sdt input-form">
                                            <label> Số điện thoại: </label>
                                            <input type="text" class="SDT andi" value="<?= $value['SDT'] ?>" readonly>
                                        </div>
                                        <div class="email input-form">
                                            <label> Email: </label>
                                            <input type="email" class="Email andi" value="<?= $value['Email'] ?>" readonly>
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

            // xử lý khi chọn khoa sẽ hiện ra bộ môn tương ứng
            $('.option-tenkhoa').change(function(event) {
                var MaK = $(this).val();

                $.ajax({
                    url: duongdan + 'admin/locBoMon',
                    type: 'POST',
                    dataType: 'html',
                    data: {MaK: MaK},
                    success:function(data){
                        $('.option-tenbomon').html(data);
                    }
                });
            });

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
                $('.TenK, .TenBoMon').addClass('d-none');
                $('.option-tenkhoa, .option-tenbomon').removeClass('d-none');
            });

            
            // xử lý khi click vào nút Lưu
            $('.btn-luu').click(function(event) {
                event.preventDefault();
                var IdUser = $(this).parent().prev().children('.tengv').children('.IdUser').val();
                var TenGV = $(this).parent().prev().children('.tengv').children('.TenGV').val();
                var Username = $(this).parent().prev().children('.magv').children('.Username').val();
                var TenKhoa = $(this).parent().prev().children('.tenkhoa').children('.option-tenkhoa').find(':selected').text();
                var MaK = $(this).parent().prev().children('.tenkhoa').children('.option-tenkhoa').val();
                var TenBoMon = $(this).parent().prev().children('.tenbomon').children('.option-tenbomon').find(':selected').text();
                var MaBoMon = $(this).parent().prev().children('.tenbomon').children('.option-tenbomon').val();
                var Trinhdohocvan = $(this).parent().prev().children('.trinhdohocvan').children('.Trinhdohocvan').val();
                var HuongNghienCuu = $(this).parent().prev().children('.huongnc').children('.HuongNghienCuu').val();
                var SDT = $(this).parent().prev().children('.sdt').children('.SDT').val();
                var Email = $(this).parent().prev().children('.email').children('.Email').val();

                // console.log(IdUser);
                // console.log(TenGV);
                // console.log(Username);
                // console.log(TenKhoa);
                // console.log(MaK);
                // console.log(TenBoMon);
                // console.log(Trinhdohocvan);
                // console.log(HuongNghienCuu);
                // console.log(SDT);
                // console.log(Email);

                if (IdUser=="" || TenGV=="" || Username=="" || Trinhdohocvan=="" || HuongNghienCuu=="" || SDT=="" || Email=="") {
                    alert('Bạn chưa nhập đầy đủ thông tin!');
                } 
                else 
                {
                    if (TenKhoa == '--Chọn khoa--') {
                        alert('Bạn chưa chọn khoa!');
                    }
                    else {
                        //Gán giá trị nội dung sau khi lưu
                        $(this).parent().prev().children('.tenkhoa').children('.append1').children().val(TenKhoa);
                        $(this).parent().prev().children('.tenbomon').children('.append2').children().val(TenBoMon);

                        $('input.andi').attr('readonly', '');
                        $(this).addClass('d-none');
                        $('input.andi').removeClass('show');
                        $('.btn-sua').removeClass('d-none');
                        $('.TenK, .TenBoMon').removeClass('d-none');
                        $('.option-tenkhoa, .option-tenbomon').addClass('d-none');

                        $.ajax({
                            url: duongdan + 'admin/updateGV',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                IdUser: IdUser,
                                TenGV: TenGV,
                                Username: Username,
                                TenKhoa: TenKhoa,
                                MaK: MaK,
                                TenBoMon: TenBoMon,
                                MaBoMon: MaBoMon,
                                Trinhdohocvan: Trinhdohocvan,
                                HuongNghienCuu: HuongNghienCuu,
                                SDT: SDT,
                                Email: Email
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
                }
            });

            // xử lý màu menu
            $('.qlgv').addClass('addbackgroud');

        });
    </script>
</body>

</html>