<?php
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';



// Require toàn bộ file Models
require_once 'models/SanPham.php';
require_once 'models/Banner.php';
require_once 'models/TinTuc.php';
require_once 'models/DanhMuc.php';
require_once 'models/KhuyenMai.php';
require_once 'models/LienHe.php';
require_once 'models/User.php';
require_once 'models/GioHang.php';
require_once 'models/DonHang.php';
require_once 'models/ChiTietDonHang.php';












// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {

    // Trang chủ
    '/'                       => (new HomeController())->home(),
    'home'                       => (new HomeController())->home(),

    'chi-tiet-san-pham'       => (new HomeController())->chiTietSanPham(),
    'list-tin-tuc'            => (new HomeController())->tintuc(),
    'chi-tiet-tin-tuc'        => (new HomeController())->chiTietTinTuc(),
    'list-danh-sach-san-pham' => (new HomeController())->listdanhsachsanpham(),
    'tim-kiem-theo-danh-muc'  => (new HomeController())->timKiemTheoDanhMuc(),
    'khuyen-mai'              => (new HomeController())->view(),
    'lien-he'                 => (new HomeController())->views(),
    'add-lien-he'             => (new HomeController())->store(),
    'search'                  => (new HomeController())->searchSanPham(),



    'them-gio-hang'           => (new HomeController())->addGioHang(),
    'gio-hang'                => (new HomeController())->gioHang(),
    'cart'                    => (new HomeController())->cartDetal(),
    'xoa-san-pham-gio-hang'   => (new HomeController())->xoaSanPhamGioHang(),


    // 'handle-change-password' => (new LoginController())->handleChangePassword()
    'login'                   => (new HomeController())->formLogin(),
    'check-login'             => (new HomeController())->postLogin(),
    'logout'                  => (new HomeController())->logout(),
    'signup'                  => (new HomeController())->signupForm(),
    'check-signup'            => (new HomeController())->signup(),

    'profile'                 => (new HomeController())->profile(),
    'update-profile'          => (new HomeController())->updateProfile(),

    'thanh-toan'              => (new HomeController())->thanhToan(),
    'xu-ly-thanh-toan'        => (new HomeController())->postThanhToan(),

    'lich-su-mua-hang'        => (new HomeController())->lichSuMuaHang(),
    'huy-don-hang'            => (new HomeController())->huyDonHang(),
    'chi-tiet-don-hang'       => (new HomeController())->viewChiTietDH(),
    'tim-kiem-don-hang'       => (new HomeController())->timDonHang(),

    'xac-nhan-don-hang'       => (new HomeController())->xacNhanDonHang(),







    default => (new HomeController())->home(),


    //san pham ban chay

};
