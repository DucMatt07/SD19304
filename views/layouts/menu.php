<!-- Header Type 4 full width -->
<header id="header" class="header header_sticky header-fullwidth header-transparent-bg">
  <div class="header-desk header-desk_type_4">
    <div class="logo">
      <a href="?act=/">
        <img src="./assets/images/logo.jpg" alt="Uomo" class="logo__image d-block" width="80px">
      </a>
    </div><!-- /.logo -->

    <nav class="navigation">
      <ul class="navigation__list list-unstyled d-flex">
        <li class="navigation__item">
          <a href="?act=/" class="navigation__link">Trang chủ</a>

        </li>


        <li class="navigation__item">
          <a href="?act=list-danh-sach-san-pham" class="navigation__link">Sản phẩm</a>

        </li>
        <li class="navigation__item">
          <a href="?act=khuyen-mai" class="navigation__link">Khuyến Mãi</a>

        </li>
        <li class="navigation__item">
          <a href="?act=list-tin-tuc" class="navigation__link">Tin tức</a>
        </li>
        <li class="navigation__item">
          <a href="?act=lien-he" class="navigation__link">Liên hệ</a>
        </li>
      </ul><!-- /.navigation__list -->
    </nav><!-- /.navigation -->

    <div class="header-tools d-flex align-items-center">
      <div class="header-tools__item hover-container">
        <div class="js-hover__open position-relative">
          <a class="js-search-popup search-field__actor" href="?act=search">
            <i class="bi bi-search" style="font-size: 19;"></i>
          </a>
        </div>

        <div class="search-popup js-hidden-content">
          <form action="?act=search" method="POST" class="search-field container" name="search">
            <p class="text-uppercase text-secondary fw-medium mb-4">What are you looking for?</p>
            <div class="position-relative">
              <input class="search-field__input search-popup__input w-100 fw-medium" type="text" name="search_term" placeholder="Tìm kiếm sản phẩm">
              <button class="btn-icon search-popup__submit" type="submit">
                <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_search"></use>
                </svg>
              </button>
            </div>
          </form><!-- /.header-search -->
        </div><!-- /.search-popup -->
      </div><!-- /.header-tools__item hover-container -->

      <div class="header-tools__item hover-container">
        <label for=""><?php if (isset($_SESSION['user_client'])) {
                        echo $_SESSION['user_client'];
                      } ?>
        </label>
        <a>
          <i class="bi bi-person" style="font-size: 22;"></i>
        </a>
        <!-- Danh sách menu -->
        <ul class="dropdown-menu">
          <?php if (!isset($_SESSION['user_client'])) { ?>
            <li><a href="<?= BASE_URL . '?act=login' ?>">Đăng nhập</a></li>
            <li><a href="<?= BASE_URL . '?act=signup' ?>">Đăng ký</a></li>

          <?php } else { ?>
            <li><a href="?act=profile">Hồ sơ</a></li>
            <li><a href="<?= BASE_URL . '?act=lich-su-mua-hang' ?>">Đơn hàng</a></li>
            <li><a href="<?= BASE_URL . '?act=logout' ?>">Đăng xuất</a></li>
          <?php } ?>

        </ul>
      </div>
      <style>
        /* Ẩn menu mặc định */
        /* Đặt vị trí tương đối cho container cha */
        .hover-container {
          position: relative;
          display: inline-block;
        }

        /* Ẩn menu mặc định */
        .hover-container .dropdown-menu {
          display: none;
          /* Menu ẩn mặc định */
          position: absolute;
          /* Định vị menu */
          top: 100%;
          /* Đặt vị trí ngay dưới icon */
          left: 50%;
          /* Căn chỉnh giữa icon */
          transform: translateX(-50%);
          /* Căn giữa theo chiều ngang */
          background-color: #fff;
          /* Màu nền menu */
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
          /* Tạo đổ bóng */
          list-style: none;
          /* Xóa bullet points */
          padding: 10px 0;
          /* Khoảng cách bên trong menu */
          z-index: 1000;
          /* Đảm bảo menu ở trên cùng */
          min-width: 125px;
          /* Đặt kích thước menu */
        }

        /* Hiển thị menu khi hover */
        .hover-container:hover .dropdown-menu {
          display: block;
          /* Hiển thị menu khi hover */
        }

        /* Thiết kế từng mục trong menu */
        .dropdown-menu li {
          padding: 10px 15px;
          /* Khoảng cách bên trong mục */
        }

        .dropdown-menu li a {
          text-decoration: none;
          /* Xóa gạch chân */
          color: #333;
          /* Màu chữ */
          display: block;
          transition: all 0.2s ease;
          /* Hiệu ứng hover */
        }

        .dropdown-menu li a:hover {
          background-color: #f5f5f5;
          /* Màu nền khi hover */
        }
      </style>



      <a class="header-tools__item" href="./account_wishlist.html">
        <i class="bi bi-heart" style="font-size: 20;"></i>
      </a>

      <a href="?act=gio-hang" class="header-tools__item header-tools__cart js-open-aside" data-aside="cartDrawer">
        <i class="bi bi-bag-plus" style="font-size: 20;"></i>
      </a>

      <a class="header-tools__item" href="#" data-bs-toggle="modal" data-bs-target="#siteMap">
        <i class="bi bi-list-ul" style="font-size: 24;"></i>
      </a>
    </div>


  </div><!-- /.header-desk header-desk_type_1 -->
</header>
