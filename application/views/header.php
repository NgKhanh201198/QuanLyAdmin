<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form> -->
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url() ?>/bootstrap4/img/nhansu.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; background-color: white;">
        <span class="brand-text font-weight-light">Administrators</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url(); ?>bootstrap4/img/logo-small.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="http://www.tlu.edu.vn/" class="d-block">Đại học Thủy Lợi</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item qlgv">
                    <a href="<?= base_url(); ?>admin/quanlygiangvien" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            Quản lý giảng viên
                        </p>
                    </a>
                </li>
                <li class="nav-item qlsv">
                    <a href="<?= base_url(); ?>admin/quanlysinhvien" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Quản lý sinh viên
                        </p>
                    </a>
                </li>
                <li class="nav-item qlda">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            Quản lý đồ án
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item nav-con doan">
                            <a href="<?= base_url(); ?>admin/quanlydoan" class="nav-link">
                                <p>Đồ án</p>
                            </a>
                        </li>
                        <li class="nav-item nav-con tttt">
                            <a href="<?= base_url(); ?>admin/quanlythuctap" class="nav-link">
                                <p>Thông tin thực tập</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item qltk">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Quản lý tài khoản<i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item nav-con giangvien">
                            <a href="<?= base_url(); ?>admin/quanlytaikhoanGV" class="nav-link">
                                <p>Giảng viên</p>
                            </a>
                        </li>
                        <li class="nav-item nav-con sinhvien">
                            <a href="<?= base_url(); ?>admin/quanlytaikhoanSV" class="nav-link">
                                <p>Sinh viên</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item themtk">
                    <a href="$" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Thêm tài khoản<i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item nav-con addgv">
                            <a href="<?= base_url(); ?>admin/themtaikhoanGV" class="nav-link">
                                <p>Giảng viên</p>
                            </a>
                        </li>
                        <li class="nav-item nav-con addsv">
                            <a href="<?= base_url(); ?>admin/themtaikhoanSV" class="nav-link">
                                <p>Sinh viên</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <div class="thongbao alert alert-success d-none"><i class="fas fa-check"></i> Cập nhật thành công!</div>
</aside>