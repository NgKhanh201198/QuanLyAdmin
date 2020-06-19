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
                    <div class="alert alert-success text-center"><h4>Danh sách sinh viên</h4></div>
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
                            <?php foreach ($sinhvien as $value): ?>
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
                <?php foreach ($sinhvien as $value): ?>   
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
                                            <label> Tên sinh viên: </label>
                                            <input name="TenSV" type="text" value="<?= $value['TenSV'] ?>" class="TenSV andi" readonly>
                                            <input name="IdUser" type="hidden" value="<?= $value['IdUser'] ?>" class="IdUser" readonly>
                                        </div>
                                        <div class="ngaysinh input-form">
                                            <label> Ngày sinh: </label>
                                            <input name="NamSinh" type="text" value="<?= date_format(date_create($value['NamSinh']),"d/m/Y") ?>" class="NamSinh andi" readonly>
                                        </div>
                                        <div class="msv input-form">
                                            <label> Mã sinh viên: </label>
                                            <input name="Username" type="text" value="<?= $value['Username'] ?>" class="Username anmai" readonly>
                                        </div>
                                        <div class="tenkhoa input-form">
                                            <label> Khoa: </label>
                                            <div class="append1">
                                                <input name="TenKhoa" type="text" value="<?= $value['TenK'] ?>" class="TenKhoa andi" readonly>
                                            </div>
                                            <select class="option-tenkhoa d-none" id="option-tenkhoa">
                                                <option value="" selected>--Chọn khoa--</option>
                                                <?php foreach ($tbl_khoa as $value1): ?>
                                                    <?php if ($value['MaK'] == $value1['MaK']): ?>
                                                    <option value="<?= $value1['MaK'] ?>"><?= $value1['TenK'] ?></option>
                                                    <?php else: ?>
                                                    <option value="<?= $value1['MaK'] ?>"><?= $value1['TenK'] ?></option>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </select>  
                                        </div>  
                                        <div class="tencn input-form">
                                            <label> Chuyên nghành: </label>
                                            <div class="append2">
                                                <input name="MaCN" type="text" value="<?= $value['TenCN'] ?>" class="TenCN andi" readonly>
                                            </div>
                                            <select class="option-tencn d-none">
                                                <option value="<?= $value['MaCN'] ?>"selected><?= $value['TenCN'] ?></option>
                                            </select>  
                                        </div>
                                        <div class="lop input-form">
                                            <label> Lớp: </label>
                                            <div class="append3">
                                                <input name="MaL" type="text" value="<?= $value['MaL'] ?>" class="MaL andi" readonly>
                                            </div>
                                            <select class="option-tenlop d-none">
                                                <option value="<?= $value['MaL'] ?>"selected><?= $value['MaL'] ?></option>
                                            </select>  
                                        </div>
                                        <div class="nienkhoa input-form">
                                            <label> Khóa: </label>
                                            <input name="MaNienKhoa" type="text" value="<?= $value['MaNienKhoa'] ?>" class="MaNienKhoa andi" readonly>
                                        </div>
                                        <div class="dtb input-form">
                                            <label> Điểm trung bình: </label>
                                            <input name="DiemTB" type="text" value="<?= $value['DiemTB'] ?>" class="DiemTB andi" readonly>
                                        </div>
                                        <div class="email input-form">
                                            <label> Email </label>
                                            <input name="Email" type="text" value="<?= $value['Email'] ?>" class="Email andi" readonly>
                                        </div>
                                    </div>
                                    <div class="mt-2 multi-nut">
                                        <a href="#" class="btn-sua btn btn-outline-info mr-2">Sửa <i class="nav-icon fas fa-edit"></i></a>
                                        <a href="#" class="btn-luu btn btn-outline-success mr-2 d-none">Lưu <i class="fas fa-check"></i></a>
                                        <a href="<?= base_url() ?>admin/xoasinhvien/<?= $value['IdUser'] ?>" class="btn-xoa btn btn-outline-danger mr-2" onclick="return deleteUser()"> Xóa <i class="nav-icon fas fa-times"></i></a>
                                        <a href="<?= base_url() ?>admin/quanlysinhvien" class="btn btn-outline-primary btn-quaylai">Quay lại <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
            <!-- /. select-option -->
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
        // thông báo xóa tài khoản
        function deleteUser() {
          if (confirm("Bạn có chắc muốn xóa sinh viên này?")) {return true;} else {return false;}
        }

        $(document).ready(function() {

            var duongdan = '<?php echo base_url(); ?>';

            // xử lý khi chọn khoa sẽ hiện ra chuyên nghành tương ứng
            $('.option-tenkhoa').change(function(event) {
                var MaK = $(this).val();

                $.ajax({
                    url: duongdan + 'admin/locChuyenNganh',
                    type: 'POST',
                    dataType: 'html',
                    data: {MaK: MaK},
                    success:function(data){
                        $('.option-tencn').html(data);
                    }
                });
            });

            // xử lý khi chọn chuyên nghành sẽ hiện ra lớp tương ứng
            $('.option-tencn').change(function(event) {
                var MaCN = $(this).val();

                $.ajax({
                    url: duongdan + 'admin/locLop',
                    type: 'POST',
                    dataType: 'html',
                    data: {MaCN: MaCN},
                    success:function(data){
                        $('.option-tenlop').html(data);
                    }
                });
            });

            // xứ lý ẩn hiện nội dung khi click
            $('.table tbody tr').click(function(event) {
                $(this).parent().parent().addClass('d-none');
                $('.form-tk').addClass('d-none');

                var number = $(this).index();

                $('.select-option div:nth-child(' + (number + 3) + ')').removeClass('d-none');

                $('.danhsach h4').text("Thông tin sinh viên");
            });

            //xử lý khi click vào nút sửa
            $('html,body').on('click', '.btn-sua', function(event) {
                event.preventDefault();
                $('input.andi').removeAttr('readonly');
                $('.btn-luu').removeClass('d-none');
                $('input.andi').addClass('show');
                $(this).addClass('d-none');
                $('.TenKhoa, .TenCN, .MaL').addClass('d-none');
                $('.option-tenkhoa, .option-tencn, .option-tenlop').removeClass('d-none');
                $('.NamSinh').attr('type', 'date');
            });

            // xử lý khi click vào nút Lưu
            $('.btn-luu').click(function(event) {
            // $('html,body').on('click', '.btn-luu', function(event) {
                event.preventDefault();
                var IdUser = $(this).parent().prev().children('.tensv').children('.IdUser').val();
                var TenSV = $(this).parent().prev().children('.tensv').children('.TenSV').val();
                var NamSinh = $(this).parent().prev().children('.ngaysinh').children('.NamSinh').val();
                var Username = $(this).parent().prev().children('.msv').children('.Username').val();
                var TenKhoa = $(this).parent().prev().children('.tenkhoa').children('.option-tenkhoa').find(':selected').text();
                var TenCN = $(this).parent().prev().children('.tencn').children('.option-tencn').find(':selected').text();
                var Khoa = $(this).parent().prev().children().children('.MaNienKhoa').val();
                var MaL = $(this).parent().prev().children('.lop').children('.option-tenlop').val();
                var DiemTB = $(this).parent().prev().children('.dtb').children('.DiemTB').val();
                var Email = $(this).parent().prev().children().children('.Email').val();

                let current_datetime = new Date(NamSinh);
                let formatted_date = current_datetime.getDate() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getFullYear();

                // console.log(IdUser);
                // console.log(TenSV);
                // console.log(NamSinh);
                // console.log(Username);
                // console.log(TenKhoa);
                // console.log(TenCN);
                // console.log(MaL);
                // console.log(Khoa);
                // console.log(DiemTB);
                // console.log(Gmail);

                

                if (IdUser=="" || TenSV=="" || NamSinh=="" || Username=="" || Khoa=="" || MaL==null || Email=="") {
                    alert('Bạn chưa nhập đầy đủ thông tin!');
                } 
                else {

                    
                    if (TenKhoa == '--Chọn khoa--') {
                        alert('Bạn chưa chọn khoa!');
                    }
                    else if (TenCN == '--Chuyên nghành--') {
                        alert('Bạn chưa chọn chuyên nghành!');
                    } else {


                        $('input.andi').attr('readonly', '');
                        $(this).addClass('d-none');
                        $('input.andi').removeClass('show');
                        $('.btn-sua').removeClass('d-none');
                        $('.TenKhoa, .TenCN, .MaL').removeClass('d-none');
                        $('.option-tenkhoa, .option-tencn, .option-tenlop').addClass('d-none');
                        $('.NamSinh').attr('type', 'text');

                        
                        //Gán giá trị nội dung sau khi lưu
                        $(this).parent().prev().children('.tenkhoa').children('.append1').children().val(TenKhoa);
                        $(this).parent().prev().children('.tencn').children('.append2').children().val(TenCN);
                        $(this).parent().prev().children('.lop').children('.append3').children().val(MaL);
                        $(this).parent().prev().children('.ngaysinh').children('.NamSinh').val(formatted_date);

                        // console.log(IdUser);
                        // console.log(TenSV);
                        // console.log(NamSinh);
                        // console.log(Username);
                        // console.log(TenKhoa);
                        // console.log(TenCN);
                        // console.log(MaL);
                        // console.log(Khoa);
                        // console.log(DiemTB);
                        // console.log(Email);

                        $.ajax({
                            url: duongdan + 'admin/updateSV',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                IdUser: IdUser,
                                TenSV: TenSV,
                                NamSinh: NamSinh,
                                // Username: Username,
                                // TenKhoa: TenKhoa,
                                // TenCN: TenCN,
                                // Khoa: Khoa,
                                MaL: MaL,
                                DiemTB: DiemTB,
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

                        $('.thongbao').removeClass('d-none');

                        var tudong = setInterval(function() {
                            $('.thongbao').addClass('d-none');
                            clearInterval(tudong); //Dừng lặp lại sau tg cho trc
                        }, 2500);
                    }
                    
                    
                }
            });

            // xử lý màu menu
            $('.qlsv').addClass('addbackgroud');

        });
    </script>
</body>

</html>