<?php require_once './views/layouts/header.php'; ?>

<?php require_once './views/layouts/menu.php'; ?>



<main><br><br><br><br><br><br>

  <br><br><br><br>
  <div class="mb-md-1 pb-md-3"></div>
  <section class="product-single container product-single__type-9">
    <div class="row">
      <div class="col-lg-7">
        <div class="product-single__media" data-media-type="vertical-thumbnail">
          <div class="product-single__image">
            <div class="swiper-container">
              <div class="swiper-wrapper">

                <!-- Chi tiết sản phẩm -->
                <?php foreach ($listAnhSanPham as $key => $anhSanPham): ?>
                  <div class="swiper-slide product-single__image-item">

                    <img loading="lazy" class="h-auto" src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" width="674" height="674" alt="">
                  </div>
                <?php endforeach ?>




              </div>
              <div class="swiper-button-prev"><i class="bi bi-chevron-left"></i></div>
              <div class="swiper-button-next"><i class="bi bi-chevron-right"></i></div>
            </div>
          </div>
          <div class="product-single__thumbnail">
            <div class="swiper-container">
              <div class="swiper-wrapper">
                <!-- Ảnh sản phẩm -->
                <?php foreach ($listAnhSanPham as $key => $anhSanPham): ?>
                  <div class="swiper-slide product-single__image-item"><img loading="lazy" class="h-auto" src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" width="104" height="104" alt=""></div>
                <?php endforeach ?>
              </div>


            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="d-flex justify-content-between mb-4 pb-md-2">
          <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
            <a href="?act=/" class="menu-link menu-link_us-s text-uppercase fw-medium">Trang chủ</a>
            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
            <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Chi Tiết Sản Phẩm</a>
          </div><!-- /.breadcrumb -->

          <div class="product-single__prev-next d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
            <a href="#" class="text-uppercase fw-medium disabled"><svg class="mb-1px" width="10" height="10" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_prev_md"></use>
                <use href="#icon_next_md"></use>
              </svg></a>
          </div><!-- /.shop-acs -->
        </div>
        <h1 class="product-single__name"><?= $sanPham['ten_san_pham'] ?></h1>
        <div class="product-single__rating">
          <div class="reviews-group d-flex">
            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_star"></use>
            </svg>
            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_star"></use>
            </svg>
            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_star"></use>
            </svg>
            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_star"></use>
            </svg>
            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_star"></use>
            </svg>
          </div>
        </div>

        <div class="product-single__price">
          <span class="current-price"><?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?>đ</span>
          <del style="color: gray;"><span class="current-price" style="color: gray;"><?= number_format($sanPham['gia_ban'], 0, ',', '.') ?>đ</span></del>

        </div>




        <div class="product-single__short-desc">
          <p><?= $sanPham['mo_ta_ngan'] ?></p>
        </div>
        <!-- form thêm giỏ hàng -->
        <div class="availability">
          <i class="bi bi-check-circle"></i>
          <span><?= $sanPham['so_luong'] . ' Số lượng' ?></span>
        </div><br>
        <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post">
          <div class="product-single__addtocart">
            <div class="qty-control position-relative">
              <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
              <input type="text" name="so_luong" value="1" min="1" class="qty-control__number text-center">
              <div class="qty-control__reduce">-</div>
              <div class="qty-control__increase">+</div>
            </div><!-- .qty-control -->
            <button type="submit" class="btn btn-primary btn-addtocart">Thêm giỏ hàng</button>
          </div>
        </form>

        <div id="product_single_details_accordion" class="product-single__details-accordion accordion">

          <div class="accordion-item">
            <h5 class="accordion-header" id="accordion-heading-11">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1" aria-expanded="true" aria-controls="accordion-collapse-1">
                Mô tả

                <svg class="accordion-button__icon" viewBox="0 0 14 14">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path>
                    <path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path>
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-collapse-1" class="accordion-collapse collapse show" aria-labelledby="accordion-heading-11" data-bs-parent="#product_single_details_accordion">
              <div class="accordion-body">
                <div class="product-single__description">

                  <p class="content"><?= $sanPham['mo_ta_dai'] ?></p>


                </div>
              </div>
            </div>

          </div><!-- /.accordion-item -->

          <div class="accordion-item">
            <h5 class="accordion-header" id="accordion-heading-3">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-3" aria-expanded="false" aria-controls="accordion-collapse-3">
                <div class="ratings d-flex">

                  <div class="pro-review">
                    <?php $countBinhLuan = count($listBinhLuan); ?>
                    <?php $countDanhGia = count($listDanhGia); ?>

                  </div>

                </div>
                Bình luận(<?= $countBinhLuan ?>)

                <svg class="accordion-button__icon" viewBox="0 0 14 14">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path>
                    <path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path>
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-collapse-3" class="accordion-collapse collapse" aria-labelledby="accordion-heading-3" data-bs-parent="#product_single_details_accordion">
              <div class="accordion-body">
                <h2 class="product-single__reviews-title">Bình luận</h2>
                <div class="product-single__reviews-list">
                  <div class="product-single__reviews-item">
                    <div class="ratings d-flex">


                    </div>
                    <div class="customer-review">
                      <?php foreach ($listBinhLuan as $binhLuan): ?>
                        <div class="total-reviews">
                          <div class="customer-avatar">
                            <img loading="lazy" src=<?= BASE_URL . $binhLuan['avatar'] ?> alt="">
                          </div>
                          <div class="review-box">

                            <div class="post-author">
                              <p><span><?= $binhLuan['ten_nguoi_dung'] ?> - </span><?= $binhLuan['ngay_dang'] ?></p>
                            </div>
                            <p><?= $binhLuan['noi_dung'] ?></p>
                          </div>
                        </div>
                      <?php endforeach ?>
                    </div>
                  </div>

                </div>
                <div class="product-single__review-form">

                  <form method="POST" action="">


                    <div class="mb-4">
                      <?php if (isset($_SESSION['user_client'])) { ?>
                        <label for="form-input-name" class="form-label">Tên: <?= ($_SESSION['user_client']) ?> </label>
                        <input type="hidden" name="ten_nguoi_dung" value="<?= ($_SESSION['user_client']) ?>">
                      <?php } else { ?>
                        <label for="form-input-name" class="form-label"><input type="text" placeholder="Nhập tên"> </label>
                      <?php   } ?>

                    </div>

                    <div class="mb-4">
                      <textarea id="form-input-review" name="noi_dung" class="form-control form-control_gray" placeholder="Bình luận..." cols="30" rows="8" required></textarea>

                    </div>
                    <div class="mb-4">
                      <div id="ngay_thang_nam" name="ngay_dang" class="form-control form-control_gray" cols="30" rows="8" required></div>


                    </div>


                    <div class="form-action">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div><!-- /.accordion-item -->

          <div class="accordion-item">
            <h5 class="accordion-header" id="accordion-heading-3">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-3" aria-controls="accordion-collapse-3">
                Đánh giá
                <svg class="accordion-button__icon" viewBox="0 0 14 14">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path>
                    <path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path>
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-collapse-3" class="accordion-collapse collapse" aria-labelledby="accordion-heading-3" data-bs-parent="#product_single_details_accordion">
              <div class="accordion-body">
                <h2 class="product-single__reviews-title">Đánh giá</h2>
                <div class="product-single__reviews-list">
                  <div class="product-single__reviews-item">

                    <div class="customer-review">

                      <?php foreach ($listDanhGia as $danhGia): ?>
                        <div class="total-reviews">
                          <div class="customer-avatar">
                            <img loading="lazy" src=<?= BASE_URL . $danhGia['avatar'] ?> alt="">
                          </div>
                          <div class="review-box">

                            <div class="post-author">
                              <p><span><?= $danhGia['ten_nguoi_dung'] ?> - </span><?= $danhGia['ngay_danh_gia'] ?></p>
                            </div>
                            <p><?= $danhGia['noi_dung'] ?></p>
                            <p>Điểm đánh giá: <?= $danhGia['diem_danh_gia'] ?></p>
                          </div>
                        </div>
                      <?php endforeach ?>


                    </div>
                  </div>

                </div>
                <div class="product-single__review-form">
                  <form name="customer-review-form">
                    <h5>Hãy là người đầu tiên đánh giá “<?= $sanPham['ten_san_pham'] ?>”</h5>
                    <div class="select-star-rating">
                      <label>Your rating *</label>
                      <span class="star-rating">
                        <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                        </svg>
                        <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                        </svg>
                        <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                        </svg>
                        <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                        </svg>
                        <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                        </svg>
                      </span>
                      <input type="hidden" id="form-input-rating" value="">
                    </div>
                    <div class="form-label-fixed mb-4">
                      <label for="form-input-name" class="form-label">Tên</label>
                      <input id="form-input-name" class="form-control form-control-md form-control_gray">
                    </div>
                    <div class="mb-4">
                      <textarea id="form-input-review" class="form-control form-control_gray" placeholder="Đánh giá..." cols="30" rows="8"></textarea>
                    </div>


                    <div class="form-action">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div><!-- /.accordion-item -->
        </div>

      </div>
    </div>
  </section>

  <section class="products-carousel container">


    <div id="related_products" class="position-relative">
      <div class="swiper-container js-swiper-slider"
        data-settings='{
            "autoplay": false,
            "slidesPerView": 4,
            "slidesPerGroup": 4,
            "effect": "none",
            "loop": true,
            "pagination": {
              "el": "#related_products .products-pagination",
              "type": "bullets",
              "clickable": true
            },
            "navigation": {
              "nextEl": "#related_products .products-carousel__next",
              "prevEl": "#related_products .products-carousel__prev"
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 2,
                "slidesPerGroup": 2,
                "spaceBetween": 14
              },
              "768": {
                "slidesPerView": 3,
                "slidesPerGroup": 3,
                "spaceBetween": 24
              },
              "992": {
                "slidesPerView": 4,
                "slidesPerGroup": 4,
                "spaceBetween": 30
              }
            }
          }'>
        <br><br><br><br> <br><br><br><br><br><br>
        <h2 class="h3 text-uppercase mb-4 pb-xl-2 mb-xl-4">Sản phẩm liên quan</h2>
        <div class="swiper-wrapper">
          <?php foreach ($listSanPhamCungDanhMuc as $sanPham): ?>
            <div class="swiper-slide product-card">
              <div class="product-item">
                <div class="pc__img-wrapper">
                  <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                    <img loading="lazy" src="<?= $sanPham['hinh_anh'] ?>" width="330" height="400" alt="<?= $sanPham['ten_san_pham'] ?>" class="pc__img">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Thêm vào giỏ hàng"><a href="?act=gio-hang">Add To Card</a></button>
                </div>
                <div class="pc__info position-relative">
                  <div class="product-card__price">
                    <?php if ($sanPham['gia_khuyen_mai']): ?>
                      <div class="price-sale">
                        <span class="money"><?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?>đ</span>
                      </div>
                      <div class="price-old">
                        <span class="money"><del><?= number_format($sanPham['gia_ban'], 0, ',', '.') ?>đ</del></span>
                      </div>
                    <?php else: ?>
                      <div class="price-default">
                        <span class="money"><?= ($sanPham['gia_ban']) ?>đ</span>
                      </div>
                    <?php endif; ?>
                  </div>

                  <h6 class="pc__title">
                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                  </h6>

                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div><!-- /.swiper-wrapper -->
      </div><!-- /.swiper-container js-swiper-slider -->

      <div class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
        <i class="bi bi-chevron-left"></i>
      </div><!-- /.products-carousel__prev -->
      <div class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
        <i class="bi bi-chevron-right"></i>
      </div><!-- /.products-carousel__next -->

      <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
      <!-- /.products-pagination -->
    </div><!-- /.position-relative -->

  </section><!-- /.products-carousel container -->

</main>
<script>
  // Hàm để cập nhật ngày tháng năm
  function capNhatNgayThangNam() {
    var ngayGio = new Date(); // Lấy ngày hiện tại

    var ngay = ngayGio.getDate(); // Lấy ngày
    var thang = ngayGio.getMonth() + 1; // Lấy tháng (tháng bắt đầu từ 0)
    var nam = ngayGio.getFullYear(); // Lấy năm

    // Đảm bảo hiển thị đúng định dạng (2 chữ số cho ngày và tháng)
    ngay = ngay < 10 ? "0" + ngay : ngay;
    thang = thang < 10 ? "0" + thang : thang;

    // Cập nhật nội dung của thẻ có id="ngay_thang_nam"
    document.getElementById("ngay_thang_nam").innerHTML = ngay + "/" + thang + "/" + nam;
  }

  // Gọi hàm capNhatNgayThangNam khi trang được tải
  window.onload = capNhatNgayThangNam;
</script>
<?php require_once './views/layouts/footer.php'; ?>
