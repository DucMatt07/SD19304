<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

  <meta charset="utf-8" />
  <title>Thêm liên hệ</title>
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
                <h4 class="mb-sm-0">Quản lý liên hệ</h4>

                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                    <li class="breadcrumb-item active">Liên hệ</li>
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
                    <h4 class="card-title mb-0 flex-grow-1">Thêm liên hệ</h4>

                  </div><!-- end card header -->

                  <div class="card-body">
                    <div class="live-preview">
                      <form action="?act=them-lien-he" method="POST">
                        <div class="row">
                          <!--end col-->
                          <div class="col-md-12">
                            <div class="mb-3">
                              <label for="compnayNameinput" class="form-label">Tên liên hệ</label>
                              <input type="text" class="form-control" placeholder="Nhập tên liên hệ" name="ten">
                              <span class="text-danger">
                                <?= !empty($_SESSION['errors']['ten']) ? $_SESSION['errors']['ten'] : '' ?>
                              </span>
                            </div>
                          </div>
                          <!--end col-->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="phonenumberInput" class="form-label">Số điện thoại</label>
                              <input type="tel" class="form-control" placeholder="+(245) 451 45123" name="so_dien_thoai">
                              <span class="text-danger">
                                <?= !empty($_SESSION['errors']['so_dien_thoai']) ? $_SESSION['errors']['so_dien_thoai'] : '' ?>
                              </span>
                            </div>
                          </div>
                          <!--end col-->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="emailidInput" class="form-label">Email </label>
                              <input type="email" class="form-control" placeholder="example@gamil.com" name="email">
                              <span class="text-danger">
                                <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>
                              </span>
                            </div>
                          </div>
                          <!--end col-->
                          <div class="col-md-12">
                            <div>
                              <label for="exampleInputdate" class="form-label">Ngày tạo</label>
                              <input type="datetime-local" class="form-control" name="ngay_tao">
                              <span class="text-danger">
                                <?= !empty($_SESSION['errors']['ngay_tao']) ? $_SESSION['errors']['ngay_tao'] : '' ?>
                              </span>
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
                                <?= !empty($_SESSION["errors"]['trang_thai']) ? $_SESSION["errors"]['trang_thai'] : '' ?>
                              </span>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="mb-3">
                              <label for="" class="form-label">Nội dung</label>
                              <textarea name="noi_dung" id="editor" class="ckeditor-classic"></textarea>
                              <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
                              <script>
                                // Khởi tạo CKEditor cho textarea
                                ClassicEditor
                                  .create(document.querySelector('#editor'))
                                  .catch(error => {
                                    console.error(error);
                                  });
                              </script>
                              <span class="text-danger">
                                <?= !empty($_SESSION['errors']['noi_dung']) ? $_SESSION['errors']['noi_dung'] : '' ?>
                              </span>
                            </div>
                          </div>
                          <!--end col-->

                        </div> <br>
                        <!--end col-->
                        <div class="col-lg-12">
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Thêm liên hệ</button>
                          </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
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
