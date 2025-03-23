<!-- start page title -->

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

 <meta charset="utf-8" />
 <title>Chi tiết Sản phẩm | NN Shop</title>
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
       <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Chi tiết sản phẩm</h4>

        <div class="page-title-right">
         <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
          <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
         </ol>
        </div>

       </div>
      </div>
     </div>
     <!-- end page title -->

     <div class="row">
      <div class="col-lg-12">
       <div class="card">
        <div class="card-body">
         <div class="row gx-lg-5">
          <div class="col-xl-4 col-md-8 mx-auto">
           <div class="product-img-slider sticky-side-div">
            <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
             <div class="swiper-wrapper">
              <div class="swiper-slide">
               <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" class="img-fluid " />
              </div>

             </div>

            </div>
            <!-- end swiper thumbnail slide -->


            <div class="nav-slide-item">
             <?php foreach ($listAnhSanPham as $key => $anhSP) : ?>
              <div class="product-image-thumb <?= $key == 0 ? 'active' : '' ?>">
               <img class="rounded material-shadow" src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" alt="" width="100">
              </div>
             <?php endforeach; ?>
            </div>
            <style>
             .nav-slide-item {
              display: flex;
              /* Sắp xếp các phần tử theo chiều ngang */
              gap: 10px;
              /* Khoảng cách giữa các ảnh */
              overflow-x: auto;
              /* Kích hoạt cuộn ngang */
              padding: 10px;
              max-width: calc(4 * 110px);
              /* Hiển thị tối đa 4 ảnh (110px bao gồm ảnh + khoảng cách) */
              scrollbar-width: thin;
              /* Thanh cuộn nhỏ gọn */
              scrollbar-color: gray;
              /* Màu của thanh cuộn */
             }

             .nav-slide-item::-webkit-scrollbar {
              height: 8px;
              /* Độ cao của thanh cuộn ngang */
             }

             .nav-slide-item::-webkit-scrollbar-thumb {
              background: gray;
              /* Màu thanh cuộn */
              border-radius: 4px;
             }

             .nav-slide-item::-webkit-scrollbar-track {
              background: gray;
              /* Màu nền thanh cuộn */
             }

             .product-image-thumb {
              flex: 0 0 auto;
              /* Đảm bảo các ảnh không bị co lại */
              cursor: pointer;
              transition: transform 0.2s ease-in-out;
             }

             .product-image-thumb.active img {
              border: 2px solid #007bff;
              /* Viền nổi bật cho ảnh được chọn */
              transform: scale(1.1);
              /* Phóng to ảnh được chọn */
             }

             .product-image-thumb img {
              display: block;
              max-width: 100%;
              height: auto;
              border-radius: 8px;
              /* Bo tròn góc ảnh */

             }

             .product-image-thumb img {
              display: block;
              width: 100px;
              /* Chiều rộng cố định */
              height: 100px;
              /* Chiều cao cố định */
              object-fit: cover;
              /* Đảm bảo hình ảnh vừa khung mà không bị biến dạng */
              border-radius: 8px;
              /* Bo tròn góc ảnh */
             }

             .swiper-slide img {
              display: block;
              width: 100%;
              /* Đảm bảo ảnh lấp đầy slide */
              height: 300px;
              /* Đặt chiều cao cụ thể */
              object-fit: cover;
              /* Giữ tỷ lệ ảnh và cắt các phần dư */
              border-radius: 8px;
              /* Bo tròn góc ảnh */
             }
            </style>


            <!-- end swiper nav slide -->
           </div>
          </div>
          <!-- end col -->

          <div class="col-xl-8">
           <div class="mt-xl-0 mt-5">
            <div class="d-flex">
             <div class="flex-grow-1">
              <h4>Tên sản phẩm: <?= $sanPham['ten_san_pham'] ?></h4>
              <div class="hstack gap-3 flex-wrap">


               <div class="vr"></div>
               <div class="text-muted">Ngày nhập : <span class="text-body fw-medium"><?= $sanPham['ngay_nhap'] ?></span></div>
              </div>
             </div>
             <div class="flex-shrink-0">
              <div>
               <a href="?act=san-phams" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">Quay lại</a>
              </div>
             </div>
            </div>

            <div class="row mt-4">
             <div class="col-lg-3 col-sm-6">
              <div class=" border border-dashed rounded">
               <div class="d-flex align-items-center">
                <div class="avatar-sm me-2">
                 <div class="avatar-title rounded bg-transparent text-success fs-24">
                  <i class="ri-money-dollar-circle-fill"></i>
                 </div>
                </div>
                <div class="flex-grow-1">
                 <p class="text-muted mb-1">Giá tiền:</p>
                 <h5 class="mb-0"><?= $sanPham['gia_ban'] ?></h5>
                </div>
               </div>
              </div>
             </div>
             <!-- end col -->
             <div class="col-lg-3 col-sm-6">
              <div class=" border border-dashed rounded">
               <div class="d-flex align-items-center">
                <div class="avatar-sm me-2">
                 <div class="avatar-title rounded bg-transparent text-success fs-24">
                  <i class="ri-file-copy-2-fill"></i>
                 </div>
                </div>
                <div class="flex-grow-1">
                 <p class="text-muted mb-1">Giá khuyến mãi:</p>
                 <h5 class="mb-0"><?= $sanPham['gia_khuyen_mai'] ?></h5>
                </div>
               </div>
              </div>
             </div>
             <!-- end col -->

             <!-- end col -->
            </div>


            <div class="mt-4 text-muted">
             <h5 class="fs-14">Tình trạng:</h5>
             <p style="color: red;"><?= $sanPham['trang_thai'] == 1  ? 'Còn bán' : ' Dừng bán' ?></p>
            </div>
            <div class="mt-4 text-muted">
             <h5 class="fs-14">Số lượng:</h5>
             <p><?= $sanPham['so_luong'] ?></p>
            </div>
            <div class="mt-4 text-muted">
             <h5 class="fs-14">Tên danh mục:</h5>
             <p><?= $sanPham['ten_danh_muc'] ?></p>
            </div>
            <div class="mt-4 text-muted">
             <h5 class="fs-14">Mô tả:</h5>
             <p><?= $sanPham['mo_ta_dai'] ?></p>
            </div>
             <div class="text-center pt-3 pb-4 mb-1 d-flex justify-content-center">
              <h3>Bình luận và Đánh giá</h3>
             </div>
             <div class="step-arrow-nav mb-4">

              <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
               <li class="nav-item" role="presentation">
                <button class="nav-link active" id="steparrow-gen-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-gen-info" type="button" role="tab" aria-controls="steparrow-gen-info" aria-selected="true" data-position="0">Bình luận</button>
               </li>
               <li class="nav-item" role="presentation">
                <button class="nav-link" id="steparrow-description-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-description-info" type="button" role="tab" aria-controls="steparrow-description-info" aria-selected="false" data-position="1" tabindex="-1">Đánh giá</button>
               </li>

              </ul>
             </div>

             <div class="tab-content">
              <div class="tab-pane fade active show" id="steparrow-gen-info" role="tabpanel" aria-labelledby="steparrow-gen-info-tab">
               <div class="mt-5">

                <div class="row gy-4 gx-0">


                 <div class="col-lg-8">
                  <div class="ps-lg">
                   <div class="d-flex flex-wrap align-items-start gap-3">
                    <h3 class="fs-14">Bình luận của sản phẩm </h3>
                   </div>


                   <table class="table table-nowrap">
                    <thead>
                     <tr>
                      <th scope="col">STT</th>
                      <th scope="col">Người bình luận</th>
                      <th scope="col">Nội dung</th>
                      <th scope="col">Ngày bình luận</th>
                      <th scope="col">Trạng thái</th>
                      <th scope="col">Thao Tác</th>
                     </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($listBinhLuan as $key => $binhLuan) : ?>

                      <th scope="row"><?= $key + 1 ?></th>
                      <td><?= $binhLuan['ten_nguoi_dung'] ?></td>
                      <td><?= $binhLuan['noi_dung'] ?></td>
                      <td><?= $binhLuan['ngay_dang'] ?></td>
                      <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?></td>
                      <td>
                       <form action="?act=update-trang-thai-binh-luan" method="post">
                        <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                        <input type="hidden" name="name_view" value="detail_sanpham">
                        <button  type="submit" onclick="return confirm('Bạn muốn ẩn bình luận này không?')" class="btn btn-danger">
                         <?= $binhLuan['trang_thai'] == 1 ? 'Ẩn' : 'Bỏ ẩn' ?>
                        </button>

                       </form>
                      </td>

                      </tr>

                     <?php endforeach ?>
                    </tbody>
                   </table>


                  </div>
                 </div>
                 <!-- end col -->
                </div>
                <!-- end Ratings & Reviews -->
               </div>
              </div>
              <!-- end tab pane -->

              <div class="tab-pane fade" id="steparrow-description-info" role="tabpanel" aria-labelledby="steparrow-description-info-tab">
               <div class="mt-5">

                <div class="row gy-4 gx-0">


                 <div class="col-lg-8">
                  <div class="ps-lg">
                   <div class="d-flex flex-wrap align-items-start gap-3">
                    <h3 class="fs-14">Đánh giá sản phẩm </h3>
                   </div>


                   <table class="table table-nowrap">
                    <thead>
                     <tr>
                      <th scope="col">STT</th>
                      <th scope="col">Người đánh giá</th>
                      <th scope="col">Nội dung</th>
                      <th scope="col">Ngày đánh giá</th>
                      <th scope="col">Điểm đánh giá</th>
                      <th scope="col">Trạng thái</th>
                      <th scope="col">Thao Tác</th>
                     </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($listDanhGia as $key => $danhGia) : ?>

                      <th scope="row"><?= $key + 1 ?></th>
                      <td><?= $danhGia['ten_nguoi_dung'] ?></td>
                      <td><?= $danhGia['noi_dung'] ?></td>
                      <td><?= $danhGia['ngay_danh_gia'] ?></td>
                      <td><?= $danhGia['diem_danh_gia'] ?></td>
                      <td><?= $danhGia['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?></td>
                      <td>
                       <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-danh-gia' ?>" method="post">
                        <input type="hidden" name="id_danh_gia" value="<?= $danhGia['id'] ?>">
                        <input type="hidden" name="name_view" value="detail_sanpham">
                        <button onclick="return confirm('Bạn muốn ẩn trạng thái này không?')" class="btn btn-danger">
                         <?= $danhGia['trang_thai'] == 1 ? 'Ẩn' : 'Bỏ ẩn' ?>
                        </button>

                       </form>
                      </td>

                      </tr>

                     <?php endforeach ?>
                    </tbody>
                   </table>


                  </div>
                 </div>
                 <!-- end col -->
                </div>
                <!-- end Ratings & Reviews -->
               </div>
              </div>
              <!-- end tab pane -->



             </div>
             <!-- end tab content -->








            <!-- end card body -->
           </div>
          </div>
          <!-- end col -->
         </div>
         <!-- end row -->
        </div>
        <!-- end card body -->
       </div>
       <!-- end card -->
      </div>
      <!-- end col -->
     </div>
     <!-- end row -->

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


 <?php
 require_once "views/layouts/libs_js.php";
 ?>

 <!-- JAVASCRIPT -->
 <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="assets/libs/simplebar/simplebar.min.js"></script>
 <script src="assets/libs/node-waves/waves.min.js"></script>
 <script src="assets/libs/feather-icons/feather.min.js"></script>
 <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
 <script src="assets/js/plugins.js"></script>

 <!--Swiper slider js-->
 <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

 <!-- ecommerce product details init -->
 <script src="assets/js/pages/ecommerce-product-details.init.js"></script>

 <!-- App js -->
 <script src="assets/js/app.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script>
  $(document).ready(function() {
   $('.product-image-thumb').on('click', function() {
    var $image_element = $(this).find('img')
    $('.img-fluid').prop('src', $image_element.attr('src'))
    $('.product-image-thumb.active').removeClass('active')
    $(this).addClass('active')
   })
  })
 </script>


</body>

</html>
