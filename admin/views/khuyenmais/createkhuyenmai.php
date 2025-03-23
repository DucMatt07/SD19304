<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Thêm khuyến mãi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";

        require_once "views/layouts/siderbar.php";
        ?>

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý khuyến mãi</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Khuyến mãi</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <!-- Striped Rows -->
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Thêm khuyến mãi</h4>

                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=them-khuyen-mai" method="POST">
                                                <div class="row mb-3">
                                                <div class="col-lg-3">
                                                        <label for="nameInput" class="form-label">Tên khuyến mãi</label>
                                                        <input type="text" class="form-control" placeholder="Nhập tên khuyến mãi" name="ten_khuyen_mai">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['ten_khuyen_mai']) ? $_SESSION['errors']['ten_khuyen_mai'] : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="nameInput" class="form-label">Mã khuyến mãi</label>
                                                        <input type="text" class="form-control" placeholder="Nhập mã khuyến mãi" name="ma_khuyen_mai">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['ma_khuyen_mai']) ? $_SESSION['errors']['ma_khuyen_mai'] : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="nameInput" class="form-label">Giá trị</label>
                                                        <input type="text" class="form-control" placeholder="Nhập mã khuyến mãi" name="gia_tri">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['gia_tri']) ? $_SESSION['errors']['gia_tri'] : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="meassageInput" class="form-label">Mô tả</label>
                                                        <input type="text" class="form-control" placeholder="Nhập mô tả" name="mo_ta">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['mo_ta']) ? $_SESSION['errors']['mo_ta'] : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                
                                        
                                                <div class="row mb-3">
                                                    <div class="col-lg-3">
                                                        <label for="dateInput" class="form-label">Ngày bắt đầu</label>
                                                        <input type="datetime-local" class="form-control" placeholder="Chọn ngày bắt đầu" name="ngay_bat_dau">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['ngay_bat_dau']) ? $_SESSION['errors']['ngay_bat_dau'] : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="dateInput" class="form-label">Ngày kết thúc</label>
                                                        <input type="datetime-local" class="form-control" placeholder="Chọn ngày kết thúc" name="ngay_ket_thuc" >
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['ngay_ket_thuc']) ? $_SESSION['errors']['ngay_ket_thuc'] : '' ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="ForminputState" class="form-label">Trạng thái</label>
                                                                <select name="trang_thai" id="ForminputState" class="form-select">
                                                                    <option selected disabled>Chọn trạng thái</option>
                                                                    <option value="1">Đăng </option>
                                                                    <option value="2">Không đăng</option>
                                                                </select>
                                                                <span class="text-danger">
                                                                    <?= !empty($_SESSION["errors"]['trang_thai']) ? $_SESSION["errors"]['trang_thai'] : '' ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                </div>
                                                
                                             
                                               
                                               
                                               
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Thêm khuyến mãi</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <!-- container-fluid -->
                            </div>
                            <!-- End Page-content -->


                        </div>
                        <!-- end main content-->


                    </div>
                    <!-- END layout-wrapper -->

                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> © Adadis.
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-end d-none d-sm-block">
                                        Giày thể thao chất lượng cao

                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>

                    <!--start back-to-top-->
                    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
                        <i class="ri-arrow-up-line"></i>
                    </button>
                    <!--end back-to-top-->

                    <!--preloader-->
                    <div id="preloader">
                        <div id="status">
                            <div class="spinner-border text-primary avatar-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>

                    <div class="customizer-setting d-none d-md-block">
                        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
                        </div>
                    </div>

                    <!-- JAVASCRIPT -->
                    <?php
                    require_once "views/layouts/libs_js.php";
                    ?>

</body>

</html>