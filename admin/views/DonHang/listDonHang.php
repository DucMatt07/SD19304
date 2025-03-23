<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


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



          <div class="row">
            <div class="col">

              <div class="h-100">
                <div class="card">
                  <div class="card-header align-items-center d-flex justify-content-between">



                    <!-- Search Form -->
                    <form class="d-flex me-3" action="index.php?act=searchDonHang" method="POST" role="search">
                      <input type="search" class="form-control me-2" placeholder="Tìm mã đơn hàng..." aria-label="Search" name="search" />
                      <select class="form-control me-2" name="status">
                        <option value="">Tất cả trạng thái</option>
                        <option value="Chờ xác nhận">Chờ xác nhận</option>
                        <option value="Đã xác nhận">Đã xác nhận</option>
                        <option value="Đang vận chuyển">Đang vận chuyển</option>
                        <option value="Đã giao hàng">Đã giao hàng</option>
                        <option value="Đã hoàn thành">Đã hoàn thành</option>
                        <option value="Đã thất bại">Đã thất bại</option>
                        <option value="Đã hủy">Đã hủy</option>
                      </select>
                      <input class="btn btn-outline-primary" type="submit" value="Tìm kiếm" />
                    </form>

                  </div><!-- end card header -->

                  <div class="card-body">
                    <div class="live-preview">
                      <div class="table-responsive">
                        <table class="table table-striped table-nowrap align-middle mb-0">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Mã đơn hàng</th>
                              <th scope="col">Ngày đặt</th>
                              <th scope="col">Trạng thái đơn hàng</th>
                              <th scope="col">Phương Thức Thanh Toán</th>
                              <th scope="col">Thao tác</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if (!empty($donHang)): ?>
                              <?php foreach ($donHang as $index => $donHangItem): ?>
                                <tr>
                                  <td class="fw-medium"><?= $index + 1 ?></td>
                                  <td><?= ($donHangItem['ma_don_hang']) ?></td>
                                  <td><?= ($donHangItem['ngay_dat_hang']) ?></td>
                                  <td><?= ($donHangItem['trang_thai']) ?></td>
                                  <td><?= ($pTTT[$donHangItem['phuong_thuc_thanh_toan_id']]) ?></td>
                                  <td>
                                    <div class="hstack gap-3 flex-wrap">


                                      <a href="?act=chi-tiet-don-hang&id=<?= $donHangItem['id'] ?>" class="link-success fs-15"><i class="bi bi-eye"></i></a>

                                      <a href="?act=form-sua-don-hang&id_don_hang=<?= $donHangItem['id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>

                                      <?php if ($donHangItem['trang_thai'] === 'Đã hủy'): ?>
                                        <form action="?act=delete-don-hang" method="POST" onsubmit="return confirm('Bạn có đồng ý xóa không?')">
                                          <input type="hidden" name="id_don_hang" value="<?= $donHangItem['id'] ?>">
                                          <button class="link-danger fs-15" style="border: none; background: none;">
                                            <i class="ri-delete-bin-line"></i>
                                          </button>
                                        </form>
                                      <?php endif; ?>
                                    </div>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            <?php else: ?>
                              <tr>
                                <td colspan="7" class="text-center">Không tìm thấy kết quả.</td>
                              </tr>
                            <?php endif; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>



                  <div class="d-none code-view">
                    <pre class="language-markup" style="height: 275px;"><code>&lt;table class=&quot;table table-nowrap&quot;&gt;
    &lt;thead&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;col&quot;&gt;ID&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Customer&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Date&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Invoice&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Action&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/thead&gt;
    &lt;tbody&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;fw-semibold&quot;&gt;#VZ2110&lt;/a&gt;&lt;/th&gt;
            &lt;td&gt;Bobby Davis&lt;/td&gt;
            &lt;td&gt;October 15, 2021&lt;/td&gt;
            &lt;td&gt;$2,300&lt;/td&gt;
            &lt;td&gt;&lt;a href=&quot;javascript:void(0);&quot; class=&quot;link-success&quot;&gt;View More &lt;i class=&quot;ri-arrow-right-line align-middle&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;fw-semibold&quot;&gt;#VZ2109&lt;/a&gt;&lt;/th&gt;
            &lt;td&gt;Christopher Neal&lt;/td&gt;
            &lt;td&gt;October 7, 2021&lt;/td&gt;
            &lt;td&gt;$5,500&lt;/td&gt;
            &lt;td&gt;&lt;a href=&quot;javascript:void(0);&quot; class=&quot;link-success&quot;&gt;View More &lt;i class=&quot;ri-arrow-right-line align-middle&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;fw-semibold&quot;&gt;#VZ2108&lt;/a&gt;&lt;/th&gt;
            &lt;td&gt;Monkey Karry&lt;/td&gt;
            &lt;td&gt;October 5, 2021&lt;/td&gt;
            &lt;td&gt;$2,420&lt;/td&gt;
            &lt;td&gt;&lt;a href=&quot;javascript:void(0);&quot; class=&quot;link-success&quot;&gt;View More &lt;i class=&quot;ri-arrow-right-line align-middle&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;fw-semibold&quot;&gt;#VZ2107&lt;/a&gt;&lt;/th&gt;
            &lt;td&gt;James White&lt;/td&gt;
            &lt;td&gt;October 2, 2021&lt;/td&gt;
            &lt;td&gt;$7,452&lt;/td&gt;
            &lt;td&gt;&lt;a href=&quot;javascript:void(0);&quot; class=&quot;link-success&quot;&gt;View More &lt;i class=&quot;ri-arrow-right-line align-middle&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/td&gt;
        &lt;/tr&gt;
    &lt;/tbody&gt;
&lt;/table&gt;</code></pre>
                  </div>
                </div><!-- end card-body -->
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
