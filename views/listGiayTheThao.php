<?php require_once './views/layouts/header.php'; ?>
<?php require_once './views/layouts/menu.php'; ?>


<main style="padding-top: 90px;"><br><br><br><br><br><br>
  <section class="full-width_padding">
    <div class="full-width_border border-2" style="border-color: #eeeeee;">
      <div class="shop-banner position-relative ">
        <div class="background-img" style="background-color: #eeeeee;">
          <img loading="lazy" src="./assets/images/shop/shop_banner_character1.png" width="1759" height="420" alt="Pattern" class="slideshow-bg__img object-fit-cover">
        </div>

        <div class="shop-banner__content container position-absolute start-50 top-50 translate-middle">
          <h2 class="stroke-text h1 smooth-16 text-uppercase fw-bold mb-3 mb-xl-4 mb-xl-5">Adadis &amp; Sneaker</h2>

        </div><!-- /.shop-banner__content -->
      </div><!-- /.shop-banner position-relative -->
    </div><!-- /.full-width_border -->
  </section><!-- /.full-width_padding-->

  <div class="mb-4 pb-lg-3"></div>

  <section class="shop-main container">
    <div class="d-flex justify-content-between mb-4 pb-md-2">
      <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
        <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
        <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
        <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">The Shop</a>
      </div><!-- /.breadcrumb -->

      <div class="shop-acs d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">



        <div class="col-size align-items-center order-1 d-none d-lg-flex">
          <span class="text-uppercase fw-medium me-2">View</span>
          <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid" data-cols="2">2</button>
          <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid" data-cols="3">3</button>
          <button class="btn-link fw-medium js-cols-size" data-target="products-grid" data-cols="4">4</button>
        </div><!-- /.col-size -->

        <!-- fillter lọc -->
        <div class="aside-filters aside aside_right " id="shopFilter">
          <div class="aside-header d-flex align-items-center">

            <h3 class="text-uppercase fs-6 mb-0">Filter By</h3>
            <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
          </div><!-- /.aside-header -->

          <div class="aside-content">
            <div class="accordion" id="brand-filters">
              <div class="accordion-item mb-4">
                <h5 class="accordion-header" id="accordion-heading-brand">
                  <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-filter-brand" aria-expanded="true" aria-controls="accordion-filter-brand">
                    Danh mục
                    <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                      <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                        <path d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z"></path>
                      </g>
                    </svg>
                  </button>
                </h5>


                <div id="accordion-filter-brand" class="accordion-collapse collapse show border-0" aria-labelledby="accordion-heading-brand" data-bs-parent="#brand-filters">
                  <div class="search-field multi-select accordion-body px-0 pb-0">

                    <?php foreach ($listDanhMuc as $key => $danhMuc): ?>

                      <ul class="list-group">
                        <li class="list-group-item">
                          <a href="?act=tim-kiem-theo-danh-muc&danh_muc_id=<?= $danhMuc['id'] ?>" class="me-auto"><?= $danhMuc['ten_danh_muc'] ?></a>

                        </li>

                      </ul>
                    <?php endforeach ?>
                  </div>

                </div>

              </div><!-- /.accordion-item -->
            </div><!-- /.accordion -->


            <div class="accordion" id="price-filters">
              <div class="accordion-item mb-4">
                <h5 class="accordion-header mb-2" id="accordion-heading-price">
                  <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-filter-price" aria-expanded="true" aria-controls="accordion-filter-price">
                    <label for="sort" class="form-label">Sắp xếp theo giá:</label>
                    <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                      <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                        <path d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z"></path>
                      </g>
                    </svg>
                  </button>
                </h5>
                <div id="accordion-filter-price" class="accordion-collapse collapse show border-0" aria-labelledby="accordion-heading-price" data-bs-parent="#price-filters">
                  <div class="price-range__info d-flex align-items-center mt-2">
                    <div class="mb-3">
                      <?php $sort = isset($_GET['sort']) ? $_GET['sort'] : 'asc';  // Mặc định là 'asc' nếu không có
                      ?>

                      <select id="sort" class="form-select" onchange="window.location.href = this.value;">
                        <option value="?act=tim-kiem-theo-danh-muc&danh_muc_id=<?= $danhMucId ?>&sort=asc" <?= ($sort === 'asc') ? 'selected' : '' ?>>Giá tăng dần</option>
                        <option value="?act=tim-kiem-theo-danh-muc&danh_muc_id=<?= $danhMucId ?>&sort=desc" <?= ($sort === 'desc') ? 'selected' : '' ?>>Giá giảm dần</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div><!-- /.accordion-item -->
            </div><!-- /.accordion -->


          </div><!-- /.aside-content -->
        </div>
        <div class="shop-asc__seprator mx-3 bg-light d-none d-lg-block order-md-1"></div>

        <div class="shop-filter d-flex align-items-center order-0 order-md-3">
          <button class="btn-link btn-link_f d-flex align-items-center ps-0 js-open-aside" data-aside="shopFilter">
            <svg class="d-inline-block align-middle me-2" width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_filter"></use>
            </svg>
            <span class="text-uppercase fw-medium d-inline-block align-middle">Filter</span>
          </button>
        </div><!-- /.col-size d-flex align-items-center ms-auto ms-md-3 -->


      </div><!-- /.shop-acs -->
    </div><!-- /.d-flex justify-content-between -->

    <div class="products-grid row row-cols-2 row-cols-md-3 row-cols-lg-4" id="products-grid">

      <?php foreach ($listSanPham as $key => $sanPham) { ?>

        <div class="product-card-wrapper">
          <div class="product-card mb-3 mb-md-4 mb-xxl-5">
            <div class="pc__img-wrapper">
              <div class="swiper-container background-img js-swiper-slider swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                <div class="swiper-wrapper" id="swiper-wrapper-02c2f05a5570d4ff">
                  <div class="" data-swiper-slide-index="1" role="group" style="width: 210px;">
                    <a href="<?= "?act=chi-tiet-san-pham&id_san_pham=" . $sanPham['id'] ?>"><img loading="lazy" src="<?= $sanPham['hinh_anh'] ?>" width="330" height="400" alt="" class="pc__img"></a>
                  </div>


                </div>
              </div>
            </div>

            <div class="pc__info position-relative">
              <p><?= $sanPham['ten_danh_muc'] ?></p>
              <h6 class="pc__title"><a href="<?= "?act=chi-tiet-san-pham&id_san_pham=" . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a></h6>
              <span class="money price"><?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?>đ</span>
              <div class="product-card__price d-flex">


                <del style="color: gray;"><span class="money price" style="color: gray;"><?= number_format($sanPham['gia_ban'], 0, ',', '.') ?>đ</span></del>

              </div>



              <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_heart"></use>
                </svg>
              </button>
            </div>
          </div>


        </div>
      <?php } ?>

    </div><!-- /.products-grid row -->
    <br>
    <?php
    // Tổng số sản phẩm và số sản phẩm mỗi trang
    $totalItems = 96; // Ví dụ dữ liệu
    $itemsPerPage = 36;
    $totalPages = ceil($totalItems / $itemsPerPage);

    // Trang hiện tại (nên lấy từ query string, mặc định là 1)
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    ?>



    <div class="pagination-wrapper text-center">
      <div class="pagination">
        <?php if ($currentPage > 1): ?>
          <a class="btn-link btn-link_sm" href="?page=<?php echo $currentPage - 1; ?>">&laquo; Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
          <a class="btn-link btn-link_sm <?php echo $i == $currentPage ? 'active' : ''; ?>"
            href="?page=<?php echo $i; ?>">
            <?php echo $i; ?>
          </a>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
          <a class="btn-link btn-link_sm" href="?page=<?php echo $currentPage + 1; ?>">Next &raquo;</a>
        <?php endif; ?>
      </div>
    </div>



  </section><!-- /.shop-main container -->

</main> <br><br>
<?php require_once './views/layouts/footer.php'; ?>
<style>
.pagination-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}

.pagination {
    display: inline-block;
}

.pagination a {
    display: inline-block;
    padding: 5px 10px;
    margin: 0 5px;
    border: 1px solid black;
    color: #333;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.pagination a.active {
    background-color: gray;
    color: #fff;
}

.pagination a:hover {
    background-color: #f1f1f1;
}

</style>
