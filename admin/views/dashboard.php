<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

  <meta charset="utf-8" />
  <title>Dashboard | NN Shop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  <!-- CSS -->
  <?php
  require_once "layouts/libs_css.php";
  ?>

</head>

<body>

  <!-- Begin page -->
  <div id="layout-wrapper">

    <!-- HEADER -->
    <?php
    require_once "layouts/header.php";

    require_once "layouts/siderbar.php";
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
            <div class="col">

              <div class="h-100">
                <div class="row mb-3 pb-1">
                  <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                      <div class="flex-grow-1">
                        <h4 class="fs-16 mb-1">Good Morning,<?php echo ($_SESSION['user_admin']) ?> !</h4>
                        <p class="text-muted mb-0">Here's what's happening with your store today.</p>
                      </div>
                      <div class="mt-3 mt-lg-0">
                        <form action="javascript:void(0);">
                          <div class="row g-3 mb-0 align-items-center">
                            <div class="col-auto">
                              <button type="button" class="btn btn-soft-success material-shadow-none"><i class="ri-add-circle-line align-middle me-1"></i> Add Product</button>
                            </div>
                            <!--end col-->
                            <div class="col-auto">
                              <button type="button" class="btn btn-soft-info btn-icon waves-effect material-shadow-none waves-light layout-rightside-btn"><i class="ri-pulse-line"></i></button>
                            </div>
                            <!--end col-->
                          </div>
                          <!--end row-->
                        </form>
                      </div>
                    </div><!-- end card header -->
                  </div>
                  <!--end col-->
                </div>
                <!--end row-->

                <div class="row">
                  <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Doanh Thu</p>
                          </div>
                          <div class="flex-shrink-0">
                            <h5 class="text-success fs-14 mb-0">
                              <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                            </h5>
                          </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                          <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo  $revenue['revenue'];  ?>"></span>k </h4>
                            <a href="#" class="text-decoration-underline">Xem chi tiết</a>
                          </div>
                          <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-success-subtle rounded fs-3">
                              <i class="bx bx-dollar-circle text-success"></i>
                            </span>
                          </div>
                        </div>
                      </div><!-- end card body -->
                    </div><!-- end card -->
                  </div><!-- end col -->

                  <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">ĐƠN Hàng</p>
                          </div>
                          <div class="flex-shrink-0">
                            <h5 class="text-danger fs-14 mb-0">
                              <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -3.57 %
                            </h5>
                          </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                          <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo  $totalDH['completed_orders'];  ?>"></span></h4>
                            <a href="#" class="text-decoration-underline">Xem chi tiết</a>
                          </div>
                          <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-info-subtle rounded fs-3">
                              <i class="bx bx-shopping-bag text-info"></i>
                            </span>
                          </div>
                        </div>
                      </div><!-- end card body -->
                    </div><!-- end card -->
                  </div><!-- end col -->

                  <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Người dùng</p>
                          </div>
                          <div class="flex-shrink-0">
                            <h5 class="text-success fs-14 mb-0">
                              <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                            </h5>
                          </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                          <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo  $totalUser['total_users'];  ?>"></span> </h4>
                            <a href="#" class="text-decoration-underline">Xem chi tiết</a>
                          </div>
                          <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-warning-subtle rounded fs-3">
                              <i class="bx bx-user-circle text-warning"></i>
                            </span>
                          </div>
                        </div>
                      </div><!-- end card body -->
                    </div><!-- end card -->
                  </div><!-- end col -->

                  <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Lợi Nhuận</p>
                          </div>
                          <div class="flex-shrink-0">
                            <h5 class="text-muted fs-14 mb-0">
                              <?php // In kết quả phần trăm tăng trưởng
                              // echo number_format($growthPercentage, 2) . '%';
                              ?>
                            </h5>
                          </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                          <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo  $loiNhuan['profit'];  ?>"></span>k </h4>
                            <a href="#" class="text-decoration-underline">Xem chi tiết</a>
                          </div>
                          <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-primary-subtle rounded fs-3">
                              <i class="bx bx-wallet text-primary"></i>
                            </span>
                          </div>
                        </div>
                      </div><!-- end card body -->
                    </div><!-- end card -->
                  </div><!-- end col -->
                </div> <!-- end row-->

                <div class="row">
                  <div class="col-xl-12">
                    <div class="card">
                      <div class="card-header border-0 align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Biểu đồ thống kê</h4>
                        <div>
                          <button type="button" class="btn btn-soft-secondary material-shadow-none btn-sm">
                            ALL
                          </button>
                          <button type="button" class="btn btn-soft-secondary material-shadow-none btn-sm">
                            1M
                          </button>
                          <button type="button" class="btn btn-soft-secondary material-shadow-none btn-sm">
                            6M
                          </button>
                          <button type="button" class="btn btn-soft-primary material-shadow-none btn-sm">
                            1Y
                          </button>
                        </div>
                      </div><!-- end card header -->

                      <div class="card-header p-0 border-0 bg-light-subtle">
                        <div class="row g-0 text-center">
                          <div class="col-6 col-sm-3">
                            <div class="p-3 border border-dashed border-start-0">
                              <h5 class="mb-1"><span class="counter-value" data-target="<?php echo  $totalDH['completed_orders'];  ?>"></span></h5>
                              <p class="text-muted mb-0">Đơn hàng</p>
                            </div>
                          </div>
                          <!--end col-->
                          <div class="col-6 col-sm-3">
                            <div class="p-3 border border-dashed border-start-0">
                              <h5 class="mb-1"><span class="counter-value" data-target="<?php echo  $revenue['revenue'];  ?>"></span>k</h5>
                              <p class="text-muted mb-0">Doanh thu</p>
                            </div>
                          </div>
                          <!--end col-->
                          <div class="col-6 col-sm-3">
                            <div class="p-3 border border-dashed border-start-0">
                              <h5 class="mb-1"><span class="counter-value" data-target="<?php echo  $totalUser['total_users'];  ?>"></span></h5>
                              <p class="text-muted mb-0">Người dùng</p>
                            </div>
                          </div>
                          <!--end col-->
                          <div class="col-6 col-sm-3">
                            <div class="p-3 border border-dashed border-start-0 border-end-0">
                              <h5 class="mb-1 text-success"><span class="counter-value" data-target="<?php echo number_format($growthPercentage, 2); ?>">0</span>%</h5>
                              <p class="text-muted mb-0">Lợi nhuận</p>
                            </div>
                          </div>
                          <!--end col-->
                        </div>
                      </div><!-- end card header -->

                      <div class="card-body p-0 pb-2">
                        <div class="w-100">
                          <div class="d-flex align-items-center p-5">



                          </div>
                          <div id="bieu-do" data-colors='["--vz-primary", "--vz-success", "--vz-danger"]' data-colors-minimal='["--vz-light", "--vz-primary", "--vz-info"]' data-colors-saas='["--vz-success", "--vz-info", "--vz-danger"]' data-colors-modern='["--vz-warning", "--vz-primary", "--vz-success"]' data-colors-interactive='["--vz-info", "--vz-primary", "--vz-danger"]' data-colors-creative='["--vz-warning", "--vz-primary", "--vz-danger"]' data-colors-corporate='["--vz-light", "--vz-primary", "--vz-secondary"]' data-colors-galaxy='["--vz-secondary", "--vz-primary", "--vz-primary-rgb, 0.50"]' data-colors-classic='["--vz-light", "--vz-primary", "--vz-secondary"]' data-colors-vintage='["--vz-success", "--vz-primary", "--vz-secondary"]' class="apex-charts" dir="ltr"></div>
                          <script>
                            var options = {
                              series: [{
                                  name: "Lợi nhuận",
                                  data: <?= $bieudoArray ?>
                                }

                              ],
                              chart: {
                                height: 350,
                                type: 'line',
                                zoom: {
                                  enabled: false
                                },
                              },
                              dataLabels: {
                                enabled: false
                              },
                              stroke: {
                                width: [5, 7, 5],
                                curve: 'straight',
                                dashArray: [0, 8, 5]
                              },
                              title: {
                                text: 'Page Statistics',
                                align: 'left'
                              },
                              legend: {
                                tooltipHoverFormatter: function(val, opts) {
                                  return val + ' - <strong>' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + '</strong>'
                                }
                              },
                              markers: {
                                size: 0,
                                hover: {
                                  sizeOffset: 6
                                }
                              },
                              xaxis: {
                                categories: <?= $bieudoArrayMoth ?>,
                              },
                              tooltip: {
                                y: [{
                                    title: {
                                      formatter: function(val) {
                                        return val + " (mins)"
                                      }
                                    }
                                  },
                                  {
                                    title: {
                                      formatter: function(val) {
                                        return val + " per session"
                                      }
                                    }
                                  },
                                  {
                                    title: {
                                      formatter: function(val) {
                                        return val;
                                      }
                                    }
                                  }
                                ]
                              },
                              grid: {
                                borderColor: '#f1f1f1',
                              }
                            };

                            var chart = new ApexCharts(document.querySelector("#bieu-do"), options);
                            chart.render();
                          </script>
                        </div>
                      </div><!-- end card body -->
                    </div><!-- end card -->
                  </div><!-- end col -->

                  <!-- end col -->
                </div>


                <div class="row">
                  <div class="col-xl-4">
                    <div class="card card-height-100">
                      <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Danh mục sản phẩm</h4>
                        <div class="flex-shrink-0">
                          <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">Download Report</a>
                              <a class="dropdown-item" href="#">Export</a>
                              <a class="dropdown-item" href="#">Import</a>
                            </div>
                          </div>
                        </div>
                      </div><!-- end card header -->

                      <div class="card-body">
                        <div id="bieu-do-tron" data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]' data-colors-minimal='["--vz-primary", "--vz-primary-rgb, 0.85", "--vz-primary-rgb, 0.70", "--vz-primary-rgb, 0.60", "--vz-primary-rgb, 0.45"]' data-colors-interactive='["--vz-primary", "--vz-primary-rgb, 0.85", "--vz-primary-rgb, 0.70", "--vz-primary-rgb, 0.60", "--vz-primary-rgb, 0.45"]' data-colors-galaxy='["--vz-primary", "--vz-primary-rgb, 0.85", "--vz-primary-rgb, 0.70", "--vz-primary-rgb, 0.60", "--vz-primary-rgb, 0.45"]' class="apex-charts" dir="ltr"></div>
                        <script>
                          var options = {
                            series: <?= $Dmsp2 ?>,
                            chart: {
                              width: 380,
                              type: 'pie',
                            },
                            labels: <?= $Dmsp1 ?>,
                            responsive: [{
                              breakpoint: 480,
                              options: {
                                chart: {
                                  width: 200
                                },
                                legend: {
                                  position: 'bottom'
                                }
                              }
                            }]
                          };

                          var chart = new ApexCharts(document.querySelector("#bieu-do-tron"), options);
                          chart.render();
                        </script>
                      </div>
                    </div> <!-- .card-->
                  </div> <!-- .col-->

                  <div class="col-xl-8">
                    <div class="card">
                      <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Sản phẩm bán chạy</h4>
                        <div class="flex-shrink-0">
                          <button type="button" class="btn btn-soft-info btn-sm material-shadow-none">
                            <i class="ri-file-list-3-line align-middle"></i> Generate Report
                          </button>
                        </div>
                      </div><!-- end card header -->

                      <div class="card-body">
                        <div class="table-responsive table-card">
                          <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                            <thead class="text-muted table-light">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Đã bán</th>
                                <!-- <th scope="col">Amount</th>
                                <th scope="col">Vendor</th>
                                <th scope="col">Status</th>
                                <th scope="col">Rating</th> -->
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2112</a>
                                </td>
                                <td>
                                  <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-2">
                                      <img src="https://mevn-public.s3-ap-southeast-1.amazonaws.com/marketenterprise.vn/wp-images/2020/06/12113245/Screen-Shot-2020-06-12-at-11.31.30-AM.png" alt="" class="avatar-xs rounded-circle material-shadow" />
                                    </div>
                                    <div class="flex-grow-1">Alex Smith</div>
                                  </div>
                                </td>
                                <td>9999</td>
                                <!-- <td>
                                  <span class="text-success">$109.00</span>
                                </td>
                                <td>Zoetic Fashion</td>
                                <td>
                                  <span class="badge bg-success-subtle text-success">Paid</span>
                                </td>
                                <td>
                                  <h5 class="fs-14 fw-medium mb-0">5.0<span class="text-muted fs-11 ms-1">(61 votes)</span></h5>
                                </td> -->
                              </tr><!-- end tr -->

                            </tbody><!-- end tbody -->
                          </table><!-- end table -->
                        </div>
                      </div>
                    </div> <!-- .card-->
                  </div> <!-- .col-->
                </div> <!-- end row-->

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
  require_once "layouts/libs_js.php";
  ?>

</body>

</html>