<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABQ4I2R9aArKpP18tM4z6EZuZyK1BZHhnzB6tAkJ4ZjmIH6cckqvLox" crossorigin="anonymous">

<!-- Bootstrap JS (Optional, for interactive components like modals, tooltips, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0RU6F2LbQOV+K8jZRSjfa17Pfm7CfiJpmAnQhZtYfU0U2XlA" crossorigin="anonymous"></script>


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

  <meta charset="utf-8" />
  <title>Quản lý đơn hàng | Adadis Shop</title>
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
                    <li class="breadcrumb-item active">Quản lý đơn hàng</li>
                  </ol>
                </div>

              </div>
            </div>
          </div>



          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-12">
                    <h1>Chi tiết đơn hàng - Đơn hàng: <?= $donHang['ma_don_hang'] ?></h1>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                      Đơn hàng: <?= $donHang['trang_thai'] ?>
                    </div>

                    <!-- Main content -->
                    <div class="invoice p-3 mb-3 border border-gray rounded">
                      <!-- Info row -->
                      <div class="row invoice-info">
                        <!-- Format Date row -->
                        <div class="row">
                          <div class="col-12 text-end">
                            <strong>Ngày đặt hàng: <?= $donHang['ngay_dat_hang'] ?> </strong>
                          </div>
                        </div>
                        <div class="col-sm-3 invoice-col">
                          <h5>Thông tin người đặt</h5>
                          <address>
                            <strong>Họ tên: <?= $donHang['ten_nguoi_dung'] ?></strong><br>
                            Email: <?= $donHang['email'] ?><br>
                            Số điện thoại: <?= $donHang['sdt'] ?><br>
                          </address>
                        </div>
                        <div class="col-sm-3 invoice-col">
                          <h5>Thông tin người nhận</h5>
                          <address>
                            <strong>Họ tên: <?= $donHang['ten_nguoi_nhan'] ?></strong><br>
                            Email: <?= $donHang['email_nguoi_nhan'] ?><br>
                            Số điện thoại: <?= $donHang['sdt_nguoi_nhan'] ?><br>
                            Địa chỉ nhận hàng: <?= $donHang['dia_chi_giao_hang'] ?><br>
                          </address>
                        </div>
                        <div class="col-sm-3 invoice-col">
                          <h5>Mã đơn hàng: <?= $donHang['ma_don_hang'] ?></h5>
                          Ghi chú: <?= $donHang['ghi_chu'] ?><br>
                          Phương thức thanh toán: <?= $pTTT[$donHang['phuong_thuc_thanh_toan_id']] ?><br>
                        </div>
                      </div>
                      <!-- /.row -->


                    </div>

                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>STT</th>
                              <th>Hình ảnh</th>
                              <th>Tên sản phẩm</th>
                              <th>Đơn giá </th>
                              <th>Số lượng</th>
                              <th>Thành tiền</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $tong_tien = 0; ?>
                            <?php
                            foreach ($sanPhamDonHang as $key => $sanPham) {
                              $sanPham['thanh_tien'] = $sanPham['don_gia'] * $sanPham['so_luong'];
                            ?>
                              <tr>
                                <td><?= $key + 1 ?></td>
                                <td><img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" width="150px"></td>
                                <td><?= $sanPham['ten_san_pham'] ?></td>
                                <td><?= number_format($sanPham['don_gia'], 0, ',', '.') ?>đ</td>
                                <td><?= $sanPham['so_luong'] ?></td>
                                <td><?= number_format($sanPham['thanh_tien'], 0, ',', '.') ?>đ</td>
                              </tr>
                              <?php $tong_tien += $sanPham['thanh_tien'] ?>
                            <?php  } ?>

                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <br>
                    <hr style="border: 1px solid #CCCCCC; width: 100%; margin: 20px auto;">
                    <br>
                    <div class="col-6">
                      <p class="lead"><b> Ngày đặt hàng:</b> <?= $donHang['ngay_dat_hang'] ?></p>

                      <div class="table-responsive">
                        <!-- Bảng thanh toán sử dụng Bootstrap -->
                        <table class="table table-bordered table-hover table-striped">
                          <thead class="thead-light">
                            <tr>
                              <th style="width:50%">Mô tả</th>
                              <th style="width:50%" class="text-right">Số tiền</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Thành tiền:</td>
                              <td class="text-right"><?= number_format($tong_tien, 0, ',', '.') ?> đ</td>
                            </tr>
                            <tr>
                              <td>Vận chuyển:</td>
                              <td class="text-right">50.000 đ</td>
                            </tr>
                            <tr class="font-weight-bold bg-secondary text-white">
                              <td>Tổng tiền:</td>
                              <td class="text-right"><?= number_format($tong_tien + 50000, 0, ',', '.') ?> đ</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>


                    <!-- /.row -->

                    <!-- this row will not appear when printing -->

                  </div>
                  <!-- /.invoice -->
                </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
          </section>

          <!-- /.content -->
        </div>
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
