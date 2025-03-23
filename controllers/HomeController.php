<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

class HomeController
{
  public $modelSanPham;
  public $modelBanner;
  public $modelTinTuc;
  public $modelDanhMuc;
  public $modelKhuyenMai;
  public $modelLienHe;
  public $modelUser;
  public $modelGioHang;
  public $modelDonHang;
  public $modelChiTietDonHang;


  public function __construct()
  {
    $this->modelBanner = new Banner();
    $this->modelSanPham = new SanPham();
    $this->modelTinTuc = new TinTuc();
    $this->modelDanhMuc = new DanhMuc();
    $this->modelKhuyenMai = new KhuyenMai();
    $this->modelLienHe = new LienHe();
    $this->modelUser = new User();
    $this->modelGioHang = new GioHang();
    $this->modelDonHang = new DonHang();
    $this->modelChiTietDonHang = new ChiTietDonHang();
  }
  public function home()
  {
    // echo "đây là home";
    $listSanPham = $this->modelSanPham->getAllSanPham();
    $banNers = $this->modelBanner->getAll();
    $tinTucs = $this->modelTinTuc->getAll();
    if (isset($_SESSION['user_client'])) {
    $mail = $this->modelUser->getUserFormEmail($_SESSION['user_client']);
    $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
    if (!$gioHang) {
     $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
     $gioHang = ['id' => $gioHangId];
     $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
   } else {
     $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
   }
    }else{
      $chiTietGioHang = '';
    }

    require_once './views/trangchu.php';
  }
  public function searchSanPham()
  {
    // Lấy từ khóa tìm kiếm từ form
    $searchTerm = isset($_POST['search_term']) ? trim($_POST['search_term']) : '';

    // Kiểm tra từ khóa không rỗng
    if (!empty($searchTerm)) {
      // Gọi model để tìm sản phẩm
      $listSanPham = $this->modelSanPham->searchSanPhamByName($searchTerm);
    } else {
      // Nếu không có từ khóa, trả về toàn bộ danh sách sản phẩm
      $listSanPham = $this->modelSanPham->getAllSanPham();
    }

    // Lấy thêm dữ liệu khác nếu cần
    $banNers = $this->modelBanner->getAll();
    $listDanhMuc = $this->modelDanhMuc->getAll();

    // Gửi dữ liệu qua view
    require_once './views/listGiayTheThao.php';
  }



  //tin tức
  public function tintuc()
  {
    $tinTucs = $this->modelTinTuc->getAll();
    require_once './views/listTinTuc.php';
  }

  //chi tiết tin tức
  public function chiTietTinTuc()
  {
    $id = $_GET['id'];

    $tinTuc = $this->modelTinTuc->DetailUpdate($id);
    if (!$tinTuc) {
      echo "Không tìm thấy nội dung chi tiết!";
      return;
    }
    // var_dump($id);die;
    require_once './views/chiTietTinTuc.php';
  }

  //chi tiết sản phẩm
  public function chiTietSanPham()
  {
    $id = $_GET['id_san_pham'];

    $sanPham = $this->modelSanPham->getDetailSanPham($id);
    $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
    $listDanhGia = $this->modelSanPham->getDanhGiaFromSanPham($id);
    $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
    $listSanPhamCungDanhMuc = $this->modelSanPham->getlistSanPhamDanhMuc($sanPham['danh_muc_id']);
    $banNers = $this->modelBanner->getAll();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_SESSION['user_client'])) {
        $mail = $this->modelUser->getUserFormEmail($_SESSION['user_client']);

        $noi_dung = isset($_POST['noi_dung']) ? trim($_POST['noi_dung']) : null;

        if (!empty($noi_dung)) {
          $this->modelSanPham->themBinhLuan($mail['id'], $id, $noi_dung);


          $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        }

        header("Location: ?act=chi-tiet-san-pham&id_san_pham=" . $id);
        exit();
      } else {
        echo "<script>alert('Bạn cần đăng nhập để bình luận.'); window.location.href='?act=login';</script>";
        exit();
      }
    }

    // var_dump($SanPham);
    // die();
    if ($sanPham) {
      require_once './views/detailSanPham.php';
    } else {
      header("Location: " . BASE_URL);
      exit();
    }
  }

  // Tìm kiếm sản phẩm theo danh mục
  public function timKiemTheoDanhMuc()
  {


    // Lấy danh mục ID từ URL
    $danhMucId = isset($_GET['danh_muc_id']) ? $_GET['danh_muc_id'] : null;
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'asc';  // Mặc định là 'asc' nếu không có
    $banNers = $this->modelBanner->getAll();
    // Lấy tất cả danh mục
    $listDanhMuc = $this->modelDanhMuc->getAll();

    // Lọc sản phẩm theo danh mục
    if ($danhMucId) {
      $listSanPham = $this->modelSanPham->getSanPhamByDanhMucAndSort($danhMucId, $sort);
    } else {
      $listSanPham = [];
    }

    // Hiển thị view
    require_once './views/listGiayTheThao.php';
  }

  //danh sách sản phẩm
  public function listdanhsachsanpham()
  {
    // echo "đây là home";

    $listSanPham = $this->modelSanPham->getAllSanPham();
    $banNers = $this->modelBanner->getAll();
    $listDanhMuc = $this->modelDanhMuc->getAll();


    require_once './views/listGiayTheThao.php';
  }

  //khuyến mãi
  public function view()
  {
    //lấy ra danh sách khuyến mãi
    $danhSachKhuyenMai = $this->modelKhuyenMai->getAllKhuyenMai();
    $banNers = $this->modelBanner->getAll();

    // var_dump($danhSachKhuyenMai);
    // die();

    //đưa dữ liệu ra view
    require_once './views/KhuyenMai.php';
  }
  // Hàm xử lý thêm vào CSDL
  /// controller

  public function views()
  {
    require_once './views/LienHe.php';
  }

  public function store()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $ten = trim($_POST['ten']);
      $email = trim($_POST['email']);
      $so_dien_thoai = trim($_POST['so_dien_thoai']);
      $noi_dung = trim($_POST['noi_dung']);
      $ngay_tao = date('Y-m-d H:i:s');
      $trang_thai = 1;

      $errors = [];

      // Kiểm tra rỗng
      if (empty($ten)) {
        $errors['ten'] = 'Bạn phải nhập tên liên hệ';
      }
      if (empty($email)) {
        $errors['email'] = 'Bạn phải nhập email';
      } elseif (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
        $errors['email'] = 'Email không đúng định dạng (VD: example@domain.com)';
      }


      if (empty($so_dien_thoai)) {
        $errors['so_dien_thoai'] = 'Bạn phải nhập số điện thoại liên hệ';
      } elseif (!preg_match('/^[0-9]{10,11}$/', $so_dien_thoai)) {
        $errors['so_dien_thoai'] = 'Số điện thoại phải là số từ 10-11 chữ số';
      }

      if (empty($noi_dung)) {
        $errors['noi_dung'] = 'Bạn phải nhập nội dung liên hệ';
      }

      // Nếu không có lỗi, thực hiện lưu dữ liệu
      if (empty($errors)) {
        $result = $this->modelLienHe->postDataClient($ten, $email, $so_dien_thoai, $noi_dung, $ngay_tao, $trang_thai);
        if ($result) {
          // Thêm thành công, chuyển hướng với thông báo
          header('Location: ?act=lien-he&status=success');
          exit();
        } else {
          // Xử lý lỗi khi thêm thất bại
          header('Location: ?act=lien-he&status=fail');
          exit();
        }
      } else {
        // Ghi lại lỗi và chuyển hướng về trang liên hệ
        $_SESSION['errors'] = $errors;
        header('Location: ?act=lien-he');
        exit();
      }
    }
  }



  public function formLogin()
  {
    require_once './views/auth/formLogin.php';
    deleteSessionError();
    exit();
  }



  public function postLogin()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $email = $_POST['email'];
      $mat_khau = $_POST['mat_khau'];
      // var_dump($email);die;

      //xử lý ktra thông tin đnăg nhập
      $user = $this->modelUser->checkLogin($email, $mat_khau);

      // var_dump($user);die();


      if ($user == $email) { //trường hợp đăng nhập thành công
        // Lưu thông tin vào secstion
        $_SESSION['user_client'] = $user;
        header("Location: " . BASE_URL);
        exit();
      } else {
        //lỗi thì lưuu lỗi vào sesstion
        $_SESSION['error'] = $user;

        $_SESSION['flash'] = true;

        header("Location: " . BASE_URL . '?act=login');
        exit();
      }
    }
  }
  public function logout()
  {
    if (isset($_SESSION['user_client'])) {
      unset($_SESSION['user_client']);
      header("Location:" . BASE_URL . "?act=/");
    }
  }

  public function signupForm()
  {
    // Hiển thị form đăng ký
    require_once './views/auth/formSignup.php';
  }

  public function signup()
  {
    // Khởi tạo mảng lỗi
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Lấy dữ liệu từ form
      $ten_nguoi_dung = trim($_POST['ten_nguoi_dung']);
      $email = trim($_POST['email']);
      $mat_khau = $_POST['mat_khau'];
      $confirm_mat_khau = $_POST['confirm_mat_khau']; // Trường xác nhận mật khẩu

      // Kiểm tra dữ liệu (tên người dùng, email, mật khẩu)
      if (empty($ten_nguoi_dung)) {
        $errors['ten_nguoi_dung'] = 'Tên người dùng không được để trống!';
      }

      if (empty($email)) {
        $errors['email'] = 'Email không được để trống!';
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email không hợp lệ!';
      }

      if (empty($mat_khau)) {
        $errors['mat_khau'] = 'Mật khẩu không được để trống!';
      } elseif (strlen($mat_khau) < 6) {
        $errors['mat_khau'] = 'Mật khẩu phải có ít nhất 6 ký tự!';
      }

      if ($mat_khau !== $confirm_mat_khau) {
        $errors['confirm_mat_khau'] = 'Mật khẩu xác nhận không khớp!';
      }

      // Nếu có lỗi, lưu vào session và quay lại trang đăng ký
      if (!empty($errors)) {
        $_SESSION['Error'] = $errors;
        header("Location: " . BASE_URL . "?act=signup"); // Quay lại trang đăng ký
        exit;
      }

      // Nếu không có lỗi, thực hiện tạo tài khoản mới
      $vai_tro = "2";

      // Thực hiện tạo người dùng mới
      $this->modelUser->createUser($ten_nguoi_dung, $email, $mat_khau, $vai_tro);

      // Đăng ký thành công, chuyển hướng đến trang đăng nhập
      $_SESSION['Success'] = 'Đăng ký thành công!';
      header("Location: " . BASE_URL . "?act=login");
      exit;
    }
  }


  public function profile()
  {
    // Kiểm tra xem user đã đăng nhập chưa
    if (!isset($_SESSION['user_client'])) {
      $_SESSION['error'] = "Bạn cần đăng nhập để xem thông tin!";
      header("Location: " . BASE_URL . '?act=login');
      exit();
    }

    // Lấy thông tin user từ session
    $email = $_SESSION['user_client'];

    // Truy xuất thông tin chi tiết từ database
    $user = $this->modelUser->getUserByEmail($email);

    // Nếu không tìm thấy user
    if (!$user) {
      $_SESSION['error'] = "Không tìm thấy thông tin tài khoản.";
      header("Location: " . BASE_URL);
      exit();
    }

    // Truyền dữ liệu qua view
    require_once './views/profile.php';
  }

  public function updateProfile()
  {
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (!isset($_SESSION['user_client'])) {
      $_SESSION['error'] = "Bạn cần đăng nhập để cập nhật thông tin!";
      header("Location: " . BASE_URL . '?act=login');
      exit();
    }

    // Lấy thông tin người dùng từ session
    $email = $_SESSION['user_client'];

    // Kiểm tra xem dữ liệu có được gửi từ form không
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Lấy dữ liệu từ form
      $ten_nguoi_dung = htmlspecialchars($_POST['ten_nguoi_dung']);
      $sdt = htmlspecialchars($_POST['sdt']);
      $dia_chi = htmlspecialchars($_POST['dia_chi']);
      $ngay_sinh = htmlspecialchars($_POST['ngay_sinh']);
      $gioi_tinh = htmlspecialchars($_POST['gioi_tinh']);
      $mat_khau = isset($_POST['mat_khau']) ? $_POST['mat_khau'] : ''; // Nếu có mật khẩu mới thì lấy
      $avatar = null;

      // Xử lý upload ảnh
      if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "./uploads/";
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);

        // Kiểm tra loại file hợp lệ
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type = mime_content_type($_FILES['avatar']['tmp_name']);
        if (!in_array($file_type, $allowed_types)) {
          $_SESSION['error'] = "Chỉ cho phép tải lên file ảnh (JPEG, PNG, GIF)!";
          header("Location: " . BASE_URL . "?act=profile");
          exit();
        }

        // Di chuyển file vào thư mục đích
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
          $avatar = $target_file; // Lưu đường dẫn file
        } else {
          $_SESSION['error'] = "Không thể tải lên ảnh, vui lòng thử lại!";
          header("Location: " . BASE_URL . "?act=profile");
          exit();
        }
      } else {
        // Giữ nguyên avatar cũ nếu không có upload mới
        $user = $this->modelUser->getUserByEmail($email);
        $avatar = $user['avatar'];
      }

      // Kiểm tra ngày sinh hợp lệ
      $currentDate = new DateTime();
      $birthDate = DateTime::createFromFormat('Y-m-d', $ngay_sinh);

      if (!$birthDate || $birthDate > $currentDate) {
        $_SESSION['error'] = "Ngày sinh không hợp lệ, không được lớn hơn ngày hiện tại!";
        header("Location: " . BASE_URL . "?act=profile");
        exit();
      }

      // Kiểm tra tuổi tối thiểu 13
      $age = $currentDate->diff($birthDate)->y;
      if ($age < 13) {
        $_SESSION['error'] = "Bạn phải đủ 13 tuổi để cập nhật thông tin!";
        header("Location: " . BASE_URL . "?act=profile");
        exit();
      }

      // Kiểm tra mật khẩu nếu có
      if ($mat_khau) {
        // Mã hóa mật khẩu trước khi lưu (nếu có thay đổi)
        $mat_khau = password_hash($mat_khau, PASSWORD_BCRYPT);
      }

      // Cập nhật thông tin người dùng trong database
      $result = $this->modelUser->updateUserProfile($email, $ten_nguoi_dung, $sdt, $dia_chi, $ngay_sinh, $gioi_tinh, $mat_khau, $avatar);

      // Kiểm tra kết quả và thông báo cho người dùng
      if ($result) {
        $_SESSION['success'] = "Cập nhật thông tin thành công!";
      } else {
        $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại!";
      }

      // Quay lại trang profile
      header("Location: " . BASE_URL . "?act=profile");
      exit();
    }
  }

  public function addGioHang()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      if (isset($_SESSION['user_client'])) {
        $mail = $this->modelUser->getUserFormEmail($_SESSION['user_client']);
        //lấy dữu liệu giỏ hàng của người dùng
        // var_dump($mail['id']);
        // die;

        $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

        if (!$gioHang) {

          $gioHangId = $this->modelGioHang->addGioHang($mail['id']);

          $gioHang = ['id' => $gioHangId];
          $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        } else {

          $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        }

        $san_pham_id = $_POST['san_pham_id'];
        $so_luong = $_POST['so_luong'];


        // Kiểm tra số lượng tồn kho
        $so_luong_ton = $this->modelGioHang->getSoLuongSanPham($san_pham_id);
        // var_dump($so_luong_ton);
        // die;

        $tongSoLuongHienTai = 0;
        foreach ($chiTietGioHang as $detail) {
          if ($detail['san_pham_id'] == $san_pham_id) {
            $tongSoLuongHienTai = $detail['so_luong'];
            break;
          }
        }
        if ($tongSoLuongHienTai + $so_luong > $so_luong_ton) {
          echo "<script>alert('Không thể thêm sản phẩm, số lượng vượt quá số lượng trong giỏ hàng.'); window.history.back();</script>";
          exit();
        }
        if ($so_luong > $so_luong_ton) {
          echo "<script>alert('Không thể thêm sản phẩm, số lượng vượt quá tồn kho.'); window.history.back();</script>";
          exit();
        }

        $checkSanPham = false;
        foreach ($chiTietGioHang as $detail) {
          if ($detail['san_pham_id'] == $san_pham_id) {
            $newSoLuong = $detail['so_luong'] + $so_luong;

            $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);

            $checkSanPham = true;
            break;
          }
        }
      }
      if (!$checkSanPham) {
        $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
      }


      header("Location: " . BASE_URL . '?act=gio-hang');
    } else {
      echo "<script>alert('Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.'); window.location.href='formLogin.php';</script>";
      exit();
    }
  }


  public function gioHang()
  {
    if (isset($_SESSION['user_client'])) {
      $mail = $this->modelUser->getUserFormEmail($_SESSION['user_client']);
      //lấy dữu liệu giỏ hàng của người dùng
      // var_dump($mail['id']);
      // die;
      $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
      if (!$gioHang) {
        $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
        $gioHang = ['id' => $gioHangId];
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
      } else {
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
      }
      require_once './views/gioHang.php';
      // var_dump($chiTietGioHang);die;
    } else {
      header('Location: ' . BASE_URL . '?act=login');
    }
  }
  public function cartDetal()
  {
    if (isset($_SESSION['user_client'])) {
      $mail = $this->modelUser->getUserFormEmail($_SESSION['user_client']);

      $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
      $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

      require_once './views/layouts/cart.php';
    } else {
      header('Location: ' . BASE_URL . '?act=login');
    }
  }


  public function xoaSanPhamGioHang()
  {
    // var_dump($_POST);die;

    if (isset($_SESSION['user_client'])) {
      $mail = $this->modelUser->getUserFormEmail($_SESSION['user_client']);
      $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

      if ($gioHang) {
        // Lấy ID sản phẩm từ form POST
        $sanPhamId = isset($_POST['san_pham_id']) ? $_POST['san_pham_id'] : null;

        if ($sanPhamId) {
          // Xóa sản phẩm khỏi giỏ hàng
          $tatus = $this->modelGioHang->xoaSanPham($gioHang['id'], $sanPhamId);
        }
      }
      // Cập nhật lại giỏ hàng sau khi xóa
      $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
      $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

      header("Location: " . BASE_URL . '?act=gio-hang');
      exit();
    }
  }

  public function thanhToan()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_SESSION['user_client'])) {
        $user = $this->modelUser->getUserFormEmail($_SESSION['user_client']);
        //lấy dữu liệu giỏ hàng của người dùng
        // var_dump($mail['id']);
        // die;
        $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
        if (!$gioHang) {
          $gioHangId = $this->modelGioHang->addGioHang($user['id']);
          $gioHang = ['id' => $gioHangId];
          $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
          echo "<script>alert('Giỏ hàng trống!'); window.history.back();</script>";
          exit();
        } else {
          $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        }
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        // var_dump($chiTietGioHang);die;
        // Cập nhật số lượng giỏ hàng từ dữ liệu POST
        if (isset($_POST['so_luong'])) {
          foreach ($_POST['so_luong'] as $sanPhamId => $soLuongMoi) {
            $soLuongConLai = $this->modelSanPham->getSoLuongSanPham($sanPhamId);

            // Kiểm tra số lượng tồn kho
            if ($soLuongMoi > $soLuongConLai) {
              echo "<script>alert('Không đủ số lượng để thanh toán, vượt quá tồn kho.'); window.history.back();</script>";
              exit();
            }

            // Cập nhật số lượng vào giỏ hàng
            $this->modelGioHang->updateSoLuong($gioHang['id'], $sanPhamId, $soLuongMoi);
          }
          // Lấy lại chi tiết giỏ hàng sau khi cập nhật
          $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

          // Tính tổng tiền giỏ hàng sau khi cập nhật
          $tongGioHang = 0;
          foreach ($chiTietGioHang as $sanPham) {
            $giaSanPham = $sanPham['gia_khuyen_mai'] ?? $sanPham['gia_ban'];
            $tongGioHang += $giaSanPham * $sanPham['so_luong'];
          }

          // Chuyển hướng tới trang thanh toán
          require_once './views/thanhToan.php';
        } else {
          echo "<script>alert('Bạn cần đăng nhập để thanh toán!'); window.location.href = '?act=login';</script>";
          exit();
        }
      } else {
        var_dump("chưa đăng nhập!");
        die;
      }
    } else {
      echo "<script>alert('Yêu cầu không hợp lệ!'); window.history.back();</script>";
      exit();
    }
  }

  public function postThanhToan()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
      $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
      $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
      $tong_tien = $_POST['tong_tien'];
      $dia_chi_giao_hang = $_POST['dia_chi_giao_hang'];
      $ghi_chu = $_POST['ghi_chu'];
      $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
      $ngay_dat_hang =  date('Y-m-d');
      //  var_dump($ngay_dat_hang);die;
      $trang_thai_don_hang = 14;

      $user = $this->modelUser->getUserFormEmail($_SESSION['user_client']);
      $nguoi_dung_id = $user['id'];

      $ma_don_hang = "DH" . rand(1000, 9999);


      $donHang = $this->modelDonHang->addDonHang(
        $nguoi_dung_id,
        $ten_nguoi_nhan,
        $email_nguoi_nhan,
        $sdt_nguoi_nhan,
        $dia_chi_giao_hang,
        $ghi_chu,
        $tong_tien,
        $phuong_thuc_thanh_toan_id,
        $ngay_dat_hang,
        $trang_thai_don_hang,
        $ma_don_hang
      );

      //lấy thông tin giỏ hàng của ng dùng
      $gioHang = $this->modelGioHang->getGioHangFromUser($nguoi_dung_id);

      //Lưu sản phẩm vào ch tiết đơn hàng
      if ($donHang) {
        # lấy ra toàn bộ sản phẩm trong giỏ hàng
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

        //thêm từng sản phẩm từ giỏ hàng vào bảng chi tiết đơn hàng
        foreach ($chiTietGioHang as $key => $item) {
          $donGia = $item['gia_khuyen_mai'] ?? $item['gia_ban'];
          $this->modelDonHang->addChiTietDonHang(
            $donHang,   //id đơn hàng vừa tạo
            $item['san_pham_id'],  //id sản phẩm
            $item['so_luong'], //số lượng
            $donGia,    // đơn giá lấy từ sản phẩm
            $donGia * $item['so_luong']   //thành tiền
          );
        }
        $currentQuantity = $this->modelSanPham->getProductQuantity($item['san_pham_id']);
        $newQuantity = $currentQuantity - $item['so_luong'];  // Trừ đi số lượng bán


        $this->modelSanPham->updateQuantity($item['san_pham_id'], $newQuantity);

        $this->modelGioHang->clearDetailGioHang($gioHang['id']);

        //xoá thông tin giỏ hàng người dùng
        $this->modelGioHang->clearGioHang($nguoi_dung_id);

        // chuyển hướng về trang lịch sử mua hàng
        header("Location: " . BASE_URL . "?act=lich-su-mua-hang");
        exit();
      } else {
        var_dump("Lỗi đặt hàng");
        die;
      }
    }
  }






  public function lichSuMuaHang()
  {
    if (isset($_SESSION['user_client'])) {
      // Lay ra id
      $user = $this->modelUser->getUserFormEmail($_SESSION['user_client']);
      $nguoi_dung_id = $user['id'];

      // lay ra trang thai don hang
      $arrtrangThai = $this->modelDonHang->getTrangThai();
      $trangThaiDonHang = array_column($arrtrangThai, 'trang_thai', 'id');

      // Lay ra phuong thai thanh toan

      $arrPTTT = $this->modelDonHang->getPttt();
      $pTTT = array_column($arrPTTT, 'ten_phuong_thuc', 'id');

      // Lay ra danh sach all bill cua user

      $donHangs = $this->modelDonHang->getDonHangFromUser($nguoi_dung_id);
    } else {
      echo "Vui lòng đăng nhập.";
    }

    require_once './views/lichSuMuaHang.php';
  }



  public function huyDonHang()
  {
    // lấy ra thông tin tài khoản đăng nhập
    $user = $this->modelUser->getUserFormEmail($_SESSION['user_client']);
    $nguoi_dung_id = $user['id'];
    //lấy ra id truyền từ url
    $donHangId = $_GET['id'];

    // Kiểm tra đơn hàng
    $donHang = $this->modelDonHang->getDonHangById($donHangId);

    if (!$donHang) {
      echo "Đơn hàng không tồn tại.";
      exit;
    }

    if ($donHang['nguoi_dung_id'] != $nguoi_dung_id) {
      echo "Bạn không có quyền hủy đơn hàng này.";
      exit;
    }

    if ($donHang['trang_thai_don_hang'] != 14) {
      echo '<script>alert("Chỉ đơn hàng Chưa Xác Nhận mới có thể hủy.");</script>';
      exit('<script>window.location.href = "?act=lich-su-mua-hang"</script>');
    }
    if ($donHang['trang_thai_don_hang'] > 14) {
      echo '<script>alert("Chỉ đơn hàng Chưa Xác Nhận mới có thể hủy.");</script>';
      exit('<script>window.location.href = "?act=lich-su-mua-hang"</script>');
    }

    // Lấy chi tiết đơn hàng để cập nhật lại số lượng sản phẩm trong kho
    $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByOrderId($donHangId);

    // Kiểm tra nếu có chi tiết đơn hàng
    if ($chiTietDonHang) {
      // Duyệt qua từng sản phẩm trong đơn hàng để cộng lại số lượng trong kho
      foreach ($chiTietDonHang as $item) {
        $sanPhamId = $item['san_pham_id'];
        $soLuong = $item['so_luong'];

        // Cập nhật lại số lượng sản phẩm trong kho
        $this->modelSanPham->updateQuantityKhiHuy($sanPhamId, $soLuong);
      }
    }
    // Hủy đơn hàng
    if ($this->modelDonHang->updateDH($donHangId, 20)) {
      header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
      exit();
    } else {
      echo "Cập nhật đơn hàng thất bại.";
      exit;
    }
    require_once './views/lichSuMuaHang.php';
  }


  public function xacNhanDonHang()
  {
    // lấy ra thông tin tài khoản đăng nhập
    $user = $this->modelUser->getUserFormEmail($_SESSION['user_client']);
    $nguoi_dung_id = $user['id'];
    //lấy ra id truyền từ url
    $donHangId = $_GET['id'];

    // Kiểm tra đơn hàng
    $donHang = $this->modelDonHang->getDonHangById($donHangId);

    if (!$donHang) {
      echo "Đơn hàng không tồn tại.";
      exit;
    }

    if ($donHang['nguoi_dung_id'] != $nguoi_dung_id) {
      echo "Bạn không có quyền hủy đơn hàng này.";
      exit;
    }

    if ($donHang['trang_thai_don_hang'] != 17) {
      echo '<script>alert("Chỉ đơn hàng Đã giao mới có thể xác nhận.");</script>';
      exit;
    }
    // Xác nhận đơn hàng
    if ($this->modelDonHang->updateDH($donHangId, 18)) {
      header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
      exit();
    } else {
      echo "Cập nhật đơn hàng thất bại.";
      exit;
    }
    require_once './views/lichSuMuaHang.php';
  }

  public function timDonHang()
  {
    // var_dump($_POST);
    // Lấy các tham số từ POST thay vì GET
    $search = isset($_POST['search']) ? $_POST['search'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';

    // Gọi model để tìm kiếm đơn hàng
    $donHangs = $this->modelDonHang->searchOrders($search, $status);

    $arrtrangThai = $this->modelDonHang->getTrangThai();
    $trangThaiDonHang = array_column($arrtrangThai, 'trang_thai', 'id');

    // Lay ra phuong thai thanh toan

    $arrPTTT = $this->modelDonHang->getPttt();
    $pTTT = array_column($arrPTTT, 'ten_phuong_thuc', 'id');

    // Hiển thị kết quả tìm kiếm
    require_once './views/lichSuMuaHang.php';
  }


  public function viewChiTietDH()
  {

    if (isset($_SESSION['user_client'])) {
      $user = $this->modelUser->getUserFormEmail($_SESSION['user_client']);
      $nguoi_dung_id = $user['id'];
    }
    //lấy id đơn hàng
    $donHangId = $_GET['id'];
    //lấy ds trạng tháid dơn hàng

    $arrtrangThai = $this->modelDonHang->getTrangThai();
    $trangThaiDonHang = array_column($arrtrangThai, 'trang_thai', 'id');
    $arrPTTT = $this->modelDonHang->getPttt();
    $pTTT = array_column($arrPTTT, 'ten_phuong_thuc', 'id');


    $arrKM = $this->modelChiTietDonHang->getKhuyenMai();
    $Km = array_column($arrKM, 'gia_tri', 'id');

    // Kiểm tra đơn hàng
    $donHang = $this->modelDonHang->getDonHangById($donHangId);
    $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByDonHangId($donHangId);




    if ($donHang['nguoi_dung_id'] != $nguoi_dung_id) {
      echo "Bạn không có quyền truy cập.";
      exit;
    }
    if (!isset($_GET['id'])) {
      echo "ID đơn hàng không hợp lệ.";
      exit;
    }

    require_once './views/chiTietDonHang.php';
  }
}
