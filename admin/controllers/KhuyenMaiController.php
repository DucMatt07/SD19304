<?php

class KhuyenMaiController
{
 //kết nối file model
 public $modelKhuyenMai;
 public function __construct()
 {
  $this->modelKhuyenMai = new KhuyenMai();
 }
 //Hiển thị danh sách khuyến mãi
 public function index()
 {
  //lấy ra danh sách khuyến mãi
  $danhSachKhuyenMai = $this->modelKhuyenMai->getAllKhuyenMai();

  //đưa dữ liệu ra view
  require_once './views/khuyenmais/listkhuyenmai.php';
 }
 //Hàm hiển thị form thêm
 public function create()
 {
  require_once './views/khuyenmais/createkhuyenmai.php';
 }

 //Hàm xử lý thêm vào csdl
 public function store()
 {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // lấy ra dữ liệu
   $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
   $ma_khuyen_mai = $_POST['ma_khuyen_mai'];
   $gia_tri = $_POST['gia_tri'];
   $ngay_bat_dau = $_POST['ngay_bat_dau'];
   $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
   $mo_ta = $_POST['mo_ta'];
   $trang_thai = $_POST['trang_thai'];
   // var_dump($ma_khuyen_mai);die();

   // validate
   $errors = [];

   if (empty($ten_khuyen_mai)) {
    $errors['ten_khuyen_mai'] = 'Bạn phải tên khuyến mãi';
   }

   if (empty($ma_khuyen_mai)) {
    $errors['ma_khuyen_mai'] = 'Bạn phải nhập mã khuyến mãi';
   }
   if (empty($gia_tri)) {
    $errors['gia_tri'] = 'Bạn phải nhập giá trị khuyến mãi';
   }
   if (empty($ngay_bat_dau)) {
    $errors['ngay_bat_dau'] = 'Bạn phải nhập ngày bắt đầu';
   }
   if (empty($ngay_ket_thuc)) {
    $errors['ngay_ket_thuc'] = 'Bạn phải nhập ngày kết thúc';
   }
   if (empty($mo_ta)) {
    $errors['mo_ta'] = 'Bạn phải nhập mô tả';
   }
   if (empty($trang_thai)) {
    $errors['trang_thai'] = 'Bạn phải nhập trạng thái';
   }
   if (empty($errors)) {
    # nếu không có lỗi thì thêm dữ liệu
    $this->modelKhuyenMai->postData($ten_khuyen_mai,  $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai);
    unset($_SESSION['errors']);
    // echo "Thêm thành công";
    header('Location: ?act=khuyen-mai');
    exit();
   } else {
    $_SESSION['errors'] = $errors;
    header('Location: ?act=form-add-khuyen-mai');
    exit();
   }
  }
 }

 //Hàm hiển thị form sửa
 public function edit()
 {
  //lấy id
  $id = $_GET['khuyen_mai_id'];
  // lấy thông tin chi tiết của danh mục
  $khuyenMai = $this->modelKhuyenMai->getDeltailData($id);
  require_once './views/khuyenmais/editkhuyenmai.php';
  // var_dump($lienHe);



 }

 //Hàm xử lý cập nhật dữ liệu vào csdl
 public function update()
 {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // lấy ra dữ liệu
   $id = $_POST['id'];
   $ten_khuyen_mai = $_POST['ten_khuyen_mai'];

   $ma_khuyen_mai = $_POST['ma_khuyen_mai'];
   $gia_tri = $_POST['gia_tri'];
   $mo_ta = $_POST['mo_ta'];
   $ngay_bat_dau = $_POST['ngay_bat_dau'];
   $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
   $trang_thai = $_POST['trang_thai'];
   // var_dump($email)

   // validate
   $errors = [];

   if (empty($ten_khuyen_mai)) {
    $errors['ten_khuyen_mai'] = 'Bạn phải nhập mô tả';
   }
   if (empty($mo_ta)) {
    $errors['mo_ta'] = 'Bạn phải nhập mô tả';
   }
   if (empty($ma_khuyen_mai)) {
    $errors['ma_khuyen_mai'] = 'Bạn phải mã khuyến mãi';
   }
   if (empty($gia_tri)) {
    $errors['gia_tri'] = 'Bạn phải mã khuyến mãi';
   }
   if (empty($ngay_bat_dau)) {
    $errors['ngay_bat_dau'] = 'Bạn phải nhập ngày bắt đầu';
   }
   if (empty($ngay_ket_thuc)) {
    $errors['ngay_ket_thuc'] = 'Bạn phải nhập ngày kết thúc';
   }
   if (empty($trang_thai)) {
    $errors['trang_thai'] = 'Bạn phải nhập trạng thái';
   }
   if (empty($errors)) {
    # nếu không có lỗi thì thêm dữ liệu
    $this->modelKhuyenMai->updateData($id, $ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai);
    unset($_SESSION['errors']);
    // echo "sửa thành công";
    header('Location: ?act=khuyen-mai');
    exit();
   } else {
    $_SESSION['errors'] = $errors;
    header('Location: ?act=form-update-khuyen-mai');
    exit();
   }
  }
 }

 //Hàm xử lý xóa dữ liệu vào csdl
 public function destroy()
 {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id = $_POST['khuyen_mai_id'];

   //xóa danh mục
   $this->modelKhuyenMai->deleteData($id);
   header('Location: ?act=khuyen-mai');
   exit();
  }
 }
}
