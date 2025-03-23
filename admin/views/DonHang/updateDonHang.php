<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->



<head>

  <meta charset="utf-8" />
  <title>Cập nhật đơn hàng | Adadis Shop</title>
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
                <h4 class="mb-sm-0">Quản lý đơn hàng</h4>

                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                    <li class="breadcrumb-item active">Cập nhật đơn hàng</li>
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
                    <h4 class="card-title mb-0 flex-grow-1">Cập nhật đơn hàng</h4>
                    <div class="flex-shrink-0">
                      <!-- <div class="form-check form-switch form-switch-right form-switch-md">
                                            <label for="floating-form-showcode" class="form-label text-muted">Show Code</label>
                                            <input class="form-check-input code-switcher" type="checkbox" id="floating-form-showcode">
                                        </div> -->
                    </div>
                  </div><!-- end card header -->
                  <div class="card-body">
                    <!-- <p class="text-muted">Use <code>form-floating</code> class to enable floating labels with Bootstrap’s textual form fields.</p> -->
                    <div class="container my-5">
                    <form action="?act=sua-don-hang" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $donHangShow['id'] ?>">

    <!-- Thẻ card cho thông tin đơn hàng -->
    <div class="card shadow-sm mb-4">
        <div class="card-header  text-white">
            <h5 class="mb-0">Thông tin đơn hàng</h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <!-- Mã đơn hàng -->
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control form-control-lg" name="id_don_hang" value="<?= $donHangShow['ma_don_hang'] ?>" disabled>
                        <label for="id_don_hang">Mã đơn hàng</label>
                    </div>
                </div>

                <!-- Ngày đặt hàng -->
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control form-control-lg" name="mo_ta" value="<?= $donHangShow['ngay_dat_hang'] ?>" disabled>
                        <label for="mo_ta">Ngày đặt hàng</label>
                    </div>
                </div>

                <!-- Phương thức thanh toán -->
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control form-control-lg" name="phuong_thuc_thanh_toan" value="<?= $pTTT[$donHangShow['phuong_thuc_thanh_toan_id']] ?>" disabled>
                        <label for="phuong_thuc_thanh_toan">Phương thức thanh toán</label>
                    </div>
                </div>

                <!-- Trạng thái thanh toán -->

            </div>
        </div>
    </div>

    <!-- Thẻ card cho trạng thái đơn hàng -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Trạng thái đơn hàng</h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <!-- Trạng thái đơn hàng -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ForminputState" class="form-label">Trạng thái đơn hàng</label>
                        <select name="trang_thai" id="ForminputState" class="form-select form-select-lg">
                            <option value="14" <?= $donHangShow['trang_thai'] == 'Chờ xác nhận' ? 'selected' : '' ?>>Chờ xác nhận</option>
                            <option value="15" <?= $donHangShow['trang_thai'] == 'Đã xác nhận' ? 'selected' : '' ?>>Đã xác nhận</option>
                            <option value="16" <?= $donHangShow['trang_thai'] == 'Đang vận chuyển' ? 'selected' : '' ?>>Đang vận chuyển</option>
                            <option value="17" <?= $donHangShow['trang_thai'] == 'Đã giao hàng' ? 'selected' : '' ?>>Đã giao hàng</option>
                            <option value="18" <?= $donHangShow['trang_thai'] == 'Đã hoàn thành' ? 'selected' : '' ?>>Đã hoàn thành</option>
                            <option value="19" <?= $donHangShow['trang_thai'] == 'Đã thất bại' ? 'selected' : '' ?>>Đã thất bại</option>
                            <option value="20" <?= $donHangShow['trang_thai'] == 'Đã hủy' ? 'selected' : '' ?>>Đã hủy</option>
                        </select>
                        <?php if (!empty($_SESSION["errors"]['trang_thai'])): ?>
                            <span class="text-danger"><?= $_SESSION["errors"]['trang_thai'] ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Nút Submit -->
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg w-100">Cập nhật đơn hàng</button>
    </div>
</form>

</div>


                  </div>
                  <div class="d-none code-view">
                    <pre class="language-markup" style="height: 275px">
<code>&lt;form action=&quot;#&quot;&gt;
    &lt;div class=&quot;row g-3&quot;&gt;
        &lt;div class=&quot;col-lg-6&quot;&gt;
            &lt;div class=&quot;form-floating&quot;&gt;
                &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;firstnamefloatingInput&quot; placeholder=&quot;Enter your firstname&quot;&gt;
                &lt;label for=&quot;firstnamefloatingInput&quot;&gt;First Name&lt;/label&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-lg-6&quot;&gt;
            &lt;div class=&quot;form-floating&quot;&gt;
                &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;lastnamefloatingInput&quot; placeholder=&quot;Enter your Lastname&quot;&gt;
                &lt;label for=&quot;lastnamefloatingInput&quot;&gt;Last Name&lt;/label&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-lg-4&quot;&gt;
            &lt;div class=&quot;form-floating&quot;&gt;
                &lt;input type=&quot;email&quot; class=&quot;form-control&quot; id=&quot;emailfloatingInput&quot; placeholder=&quot;Enter your email&quot;&gt;
                &lt;label for=&quot;emailfloatingInput&quot;&gt;Email Address&lt;/label&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-lg-4&quot;&gt;
            &lt;div class=&quot;form-floating&quot;&gt;
                &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;passwordfloatingInput&quot; placeholder=&quot;Enter your password&quot;&gt;
                &lt;label for=&quot;passwordfloatingInput&quot;&gt;Password&lt;/label&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-lg-4&quot;&gt;
            &lt;div class=&quot;form-floating&quot;&gt;
                &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;passwordfloatingInput1&quot; placeholder=&quot;Confirm password&quot;&gt;
                &lt;label for=&quot;passwordfloatingInput1&quot;&gt;Confirm Password&lt;/label&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-lg-4&quot;&gt;
            &lt;div class=&quot;form-floating&quot;&gt;
                &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;cityfloatingInput&quot; placeholder=&quot;Enter your city&quot;&gt;
                &lt;label for=&quot;cityfloatingInput&quot;&gt;City&lt;/label&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-lg-4&quot;&gt;
            &lt;div class=&quot;form-floating&quot;&gt;
                &lt;select class=&quot;form-select&quot; id=&quot;floatingSelect&quot; aria-label=&quot;Floating label select example&quot;&gt;
                  &lt;option selected&gt;USA&lt;/option&gt;
                  &lt;option value=&quot;1&quot;&gt;Brazil&lt;/option&gt;
                  &lt;option value=&quot;2&quot;&gt;France&lt;/option&gt;
                  &lt;option value=&quot;3&quot;&gt;Germany&lt;/option&gt;
                &lt;/select&gt;
                &lt;label for=&quot;floatingSelect&quot;&gt;Country&lt;/label&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-lg-4&quot;&gt;
            &lt;div class=&quot;form-floating&quot;&gt;
                &lt;input type=&quot;number&quot; class=&quot;form-control&quot; id=&quot;zipfloatingInput&quot; placeholder=&quot;Enter your zipcode&quot;&gt;
                &lt;label for=&quot;zipfloatingInput&quot;&gt;Zipcode&lt;/label&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;col-lg-12&quot;&gt;
            &lt;div class=&quot;text-end&quot;&gt;
                &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary&quot;&gt;Submit&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/form&gt;</code></pre>
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
