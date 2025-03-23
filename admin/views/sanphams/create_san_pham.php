<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Thêm Sản phẩm | NN Shop</title>
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
                                <h4 class="mb-sm-0">Quản lý Sản phẩm</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Quản lý Sản phẩm</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <div class="card">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Thêm sản phẩm</h4>

                                        </div><!-- end card header -->

                                        <div class="card-body">

                                            <div class="live-preview">
                                                <form action='?act=them-san-pham' method="POST" enctype="multipart/form-data">
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="citynameInput" class="form-label">Tên sản phẩm</label>
                                                                <input type="text" class="form-control" name='ten_san_pham'>
                                                                <span class="text-danger">
                                                                    <?= !empty($_SESSION["error"]['ten_san_pham']) ? $_SESSION["error"]['ten_san_pham'] : '' ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="citynameInput" class="form-label">Mô tả dài</label>
                                                                <textarea type="text" class="form-control" name='mo_ta_dai'></textarea>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="citynameInput" class="form-label">Mô tả ngắn</label>
                                                                <textarea type="text" class="form-control" name='mo_ta_ngan'></textarea>

                                                            </div>
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
                                                                    <?= !empty($_SESSION["error"]['trang_thai']) ? $_SESSION["error"]['trang_thai'] : '' ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="citynameInput" class="form-label">Giá bán</label>
                                                                <input type="number" class="form-control" name='gia_ban'>
                                                                <span class="text-danger">
                                                                    <?= !empty($_SESSION["error"]['gia_ban']) ? $_SESSION["error"]['gia_ban'] : '' ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="citynameInput" class="form-label">Giá nhập</label>
                                                                <input type="number" class="form-control" name='gia_nhap'>
                                                                <span class="text-danger">
                                                                    <?= !empty($_SESSION["error"]['gia_nhap']) ? $_SESSION["error"]['gia_nhap'] : '' ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="citynameInput" class="form-label">Giá khuyến mãi</label>
                                                                <input type="number" class="form-control" name='gia_khuyen_mai'>
                                                                <span class="text-danger">
                                                                    <?= !empty($_SESSION["error"]['gia_khuyen_mai']) ? $_SESSION["error"]['gia_khuyen_mai'] : '' ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="citynameInput" class="form-label">Số lượng</label>
                                                                <input type="number" class="form-control" name='so_luong'>
                                                                <span class="text-danger">
                                                                    <?= !empty($_SESSION["error"]['so_luong']) ? $_SESSION["error"]['so_luong'] : '' ?>
                                                                </span>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <label class="form-label">Danh mục</label>
                                                            <select class="form-control" name="danh_muc_id" id="exampleFormControlSelect1">
                                                                <option selected disabled>Chọn mục sản phẩm</option>
                                                                <?php foreach ($danhMucs as $danhMuc): ?>
                                                                    <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>

                                                        </div>
                                                        <div class=" col-md-6">
                                                            <div class="mb-3">
                                                                <label for="citynameInput" class="form-label">Ảnh</label>
                                                                <input type="file" class="form-control" placeholder="Image" name='hinh_anh' id="citynameInput">
                                                                <span class="text-danger">
                                                                    <?= !empty($_SESSION["error"]['hinh_anh']) ? $_SESSION["error"]['hinh_anh'] : '' ?>
                                                                </span>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label>Ablum ảnh</label>
                                                                <input type="file" class="form-control" name="img_array[]" multiple>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="citynameInput" class="form-label">Ngày nhập</label>
                                                                <input type="date" class="form-control" id="citynameInput" name="ngay_nhap">
                                                                <span class="text-danger">
                                                                    <?= !empty($_SESSION["error"]['ngay_nhap']) ? $_SESSION["error"]['ngay_nhap'] : '' ?>
                                                                </span>

                                                            </div>
                                                        </div>
                                                        <!--end col-->


                                                        <!--end col-->
                                                        <div class="col-lg-12">
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </form>
                                            </div>

                                        </div>
                                    </div>


                                </div><!-- end card -->

                            </div> <!-- end .h-100-->

                        </div> <!-- end col -->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



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