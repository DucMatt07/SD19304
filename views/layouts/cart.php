<div class="aside aside_right overflow-hidden cart-drawer" id="cartDrawer">
  <div class="aside-header d-flex align-items-center">
    <h3 class="text-uppercase fs-6 mb-0">Giỏ hàng</h3>
    <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
  </div><!-- /.aside-header -->
  <div class="aside-content cart-drawer-items-list">
  <?php

  if (isset($_SESSION['user_client'])) { ?>

    <?php if (!empty($chiTietGioHang)) : ?>
      <?php
      $tongGioHang = 0;

      foreach ($chiTietGioHang as $cartItem) { ?>
        <div class="cart-drawer-item d-flex position-relative">
          <div class="position-relative">
            <a href="./product1_simple.html">
              <img loading="lazy" class="cart-drawer-item__img" src="<?= $cartItem['hinh_anh'] ?>" alt="">
            </a>
          </div>
          <div class="cart-drawer-item__info flex-grow-1">
            <h6 class="cart-drawer-item__title fw-normal"><a href="./product1_simple.html"><?= $cartItem['ten_san_pham'] ?></a></h6>
            <div class="d-flex align-items-center justify-content-between mt-1">
              <div class="qty-control position-relative qty-initialized">
                <p class="d-flex align-items-center ">SL: <?= $cartItem['so_luong'] ?></p>
              </div><!-- .qty-control -->
            </div>
          </div>

          <button class="btn-close-xs position-absolute top-0 end-0 js-cart-item-remove"></button>
        </div><!-- /.cart-drawer-item d-flex -->

        <?php
        $tongtien = 0;

        if ($cartItem['gia_khuyen_mai']) {
          $tongtien = $cartItem['gia_khuyen_mai'] * $cartItem['so_luong'];
        } else {
          $tongtien = $cartItem['gia_ban'] * $cartItem['so_luong'];
        }
        $tongGioHang += $tongtien;
        echo number_format($tongtien, 0, ',', '.') . ' đ';
        ?>
        <hr class="cart-drawer-divider">
      <?php } ?>
    <?php else : ?>
      <p class="text-center">Hiện tại giỏ hàng của bạn đang trống.</p>
    <?php endif; ?>


  <div class="cart-drawer-actions position-absolute start-0 bottom-0 w-100">
    <?php if (!empty($chiTietGioHang)) : ?>
      <hr class="cart-drawer-divider">
      <div class="d-flex justify-content-between">
        <h6 class="fs-base fw-medium">Tổng tiền:</h6>
        <span class="cart-subtotal fw-medium"><?= number_format($tongGioHang, 0, ',', '.') . ' đ'; ?></span>
      </div><!-- /.d-flex justify-content-between -->
      <a href="?act=gio-hang" class="btn btn-light mt-3 d-block">Xem giỏ hàng</a>
    <?php endif; ?>
  </div><!-- /.aside-content -->


  <?php } else {
    $chiTietGioHang = null;
    echo '<div class="text-center p-3">Vui lòng đăng nhập để xem giỏ hàng</div>';
    ?>
  <?php } ?>

  </div><!-- /.aside-content -->

  </div>
