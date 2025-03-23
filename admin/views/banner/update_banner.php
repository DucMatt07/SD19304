<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->



<head>

    <meta charset="utf-8" />
    <title>Cập nhật danh mục sản phẩm | Adadis Shop</title>
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

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý Danh Mục banner</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Cập nhật Danh Mục banner</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">

                            <div class="h-100">


                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Cập nhật Danh Mục banner</h4>

                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <!-- <p class="text-muted">Use <code>form-floating</code> class to enable floating labels with Bootstrap’s textual form fields.</p> -->
                                        <div class="live-preview">
                                            <form action="?act=sua-banner" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?= $banNerw['id'] ?>">
                                                <div class="row g-3">


                                                    <div class="col-lg-4">
                                                        <div class="mb-3">

                                                            <label for="citynameInput" class="form-label">Tên danh mục banner</label>
                                                            <input type="text" class="form-control" placeholder="Slide" name='ten_danh_muc_banner' value="<?=$banNerw['ten_danh_muc_banner'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION["error"]['ten_danh_muc_banner']) ? $_SESSION["error"]['ten_danh_muc_banner'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="citynameInput" class="form-label">Ngày nhập</label>
                                                            <input type="date" class="form-control" placeholder="Image" value="<?= $banNerw['ngay_tao'] ?>" name="ngay_tao">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION["error"]['ngay_tao']) ? $_SESSION["error"]['ngay_tao'] : '' ?>
                                                            </span>

                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Trạng thái</label>
                                                            <select name="trang_thai" id="ForminputState" class="form-select" value="<?= $banNerw['trang_thai'] ?>">
                                                                <option selected disabled>Chọn trạng thái</option>
                                                                <option value="1" <?= $banNerw['trang_thai'] == 1 ? 'selected' : '' ?>>Đăng</option>
                                                                <option value="2" <?= $banNerw['trang_thai'] == 2 ? 'selected' : '' ?>>Không đăng</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="hinh_anh">Hình ảnh</label><br>
                                                            <img src="<?= isset($banNerw['link_hinh_anh']) ? $banNerw['link_hinh_anh'] : ''; ?>" width="100" alt="Ảnh tin tức">
                                                            <input type="hidden" name="hinh_anh_cu" value="<?= isset($banNerw['link_hinh_anh']) ? $banNerw['link_hinh_anh'] : ''; ?>">
                                                            <label for="hinh_anh">Hình ảnh mới (nếu có)</label>
                                                            <input type="file" class="form-control-file" name="link_hinh_anh">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="text-end">
                                                            <button name="save" type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>




                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>



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
