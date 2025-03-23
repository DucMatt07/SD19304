<?php
class SanPhamController
{
  public $modelSanPham;
  public $modelDanhMuc;
  public function __construct()
  {
    $this->modelDanhMuc = new DanhMuc();
    $this->modelSanPham = new SanPham();
  }
  public function danhSachSanPham()
  {
    $listSanPham = $this->modelSanPham->getAllSanPham();

    require_once './views/sanphams/listSanPham.php';
  }
  public function formAddSanPham()
  {
    //dùng để hiển thị form nhập
    $danhMucs = $this->modelDanhMuc->getAll();
    require_once './views/sanphams/create_san_pham.php';
  }
  public function postAddSanPham()
  {
    // var_dump($_POST);
    // dùng để thêm dữ liệu xử lý dữ liệu
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $ten_san_pham = $_POST['ten_san_pham'] ?? '';
      $mo_ta_dai = $_POST['mo_ta_dai'] ?? '';
      $mo_ta_ngan = $_POST['mo_ta_ngan'] ?? '';
      $trang_thai = $_POST['trang_thai'] ?? '';
      $gia_ban = $_POST['gia_ban'] ?? '';
      $gia_nhap = $_POST['gia_nhap'] ?? '';
      $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
      $so_luong = $_POST['so_luong'] ?? '';
      $ngay_nhap = $_POST['ngay_nhap'] ?? '';
      $danh_muc_id = $_POST['danh_muc_id'] ?? '';



      $hinh_anh = $_FILES['hinh_anh'] ?? null;

      // //Lưu hình ảnh
      $file_thumb = uploadFile($hinh_anh, './uploads/');


      //mảng hình ảnh
      $img_array = $_FILES['img_array'];
      // var_dump($img_array);die();




      $errors = [];
      if (empty($ten_san_pham)) {
        $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
      }
      if (empty($mo_ta_dai)) {
        $errors['mo_ta_dai'] = 'Tên sản phẩm không được để trống';
      }
      if (empty($mo_ta_ngan)) {
        $errors['mo_ta_ngan'] = 'Tên sản phẩm không được để trống';
      }
      if (empty($trang_thai)) {
        $errors['trang_thai'] = 'trang thái phải chọn';
      }
      if (empty($gia_ban)) {
        $errors['gia_ban'] = 'Tên sản phẩm không được để trống';
      }

      if (empty($gia_nhap)) {
        $errors['gia_nhap'] = 'giá sản phẩm không được để trống';
      }
      if (empty($gia_khuyen_mai)) {
        $errors['gia_khuyen_mai'] = 'giá khuyến mãi không được để trống';
      }
      if (empty($so_luong)) {
        $errors['so_luong'] = 'số lượng không được để trống';
      }
      if (empty($ngay_nhap)) {
        $errors['ngay_nhap'] = 'ngày nhập không được để trống';
      }
      if (empty($danh_muc_id)) {
        $errors['danh_muc_id'] = 'danh mục phải chọn';
      }

      if ($hinh_anh['error'] !== 0) {
        $errors['hinh_anh'] = 'phải chọn ảnh sản ohaamr';
      }

      $_SESSION['error'] = $errors;



      if (empty($errors)) {
        // var_dump('ac');die;
        //nếu k có lỗi tiến hành tên sản phẩm
        $san_pham_id = $this->modelSanPham->insertSanPham(
          $ten_san_pham,
          $mo_ta_dai,
          $mo_ta_ngan,
          $gia_ban,
          $gia_nhap,
          $gia_khuyen_mai,
          $so_luong,
          $ngay_nhap,
          $danh_muc_id,
          $trang_thai,

          $file_thumb
        );
        // var_dump($file_thumb);die();
        //xử lý thêm album ảnh sản phẩm img_array
        if (!empty($img_array['name'])) {
          foreach ($img_array['name'] as $key => $value) {
            $file = [
              'name' => $img_array['name'][$key],
              'type' => $img_array['type'][$key],
              'tmp_name' => $img_array['tmp_name'][$key],
              'error' => $img_array['error'][$key],
              'size' => $img_array['size'][$key]
            ];
            $link_hinh_anh = uploadFile($file, './uploads/');
            $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
          }
        }

        header("Location: " . BASE_URL_ADMIN . '?act=san-phams');

        exit();
      } else {
        //trả lỗi

        //đặt chỉ thị xóa session sau khi hiển thị form
        $_SESSION['flash'] = true;
        header("Location: " . BASE_URL_ADMIN . '?act=form-them-san-pham');
        exit();
      }
    }
  }
  public function formEditSanPham()
  {
    //dùng để hiển thị form nhập
    //echo 'hehe';
    //lấy ra thông tin danh mục cần sửa
    $id = $_GET['id_san_pham'];
    $sanPham = $this->modelSanPham->getDetailSanPham($id);
    $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
    $danhMucs = $this->modelDanhMuc->getAll();
    // var_dump($listAnhSanPham);
    // die();
    if ($sanPham) {
      require_once './views/sanphams/update_san_pham.php';
    } else {
      header("Location: " . BASE_URL_ADMIN . '?act=san-phams');
      exit();
    }
  }
  public function postEditSanPham()
  {
    // var_dump($_POST);
    // dùng để thêm dữ liệu xử lý dữ liệu
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      //lấy ra dữu liệu
      //lấy ra dữ liệu cũ của sản phẩm

      $san_pham_id = $_POST['id'] ?? '';

      //truy vấn
      $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
      $old_file = $sanPhamOld['hinh_anh']; //lấy ảnh cũ để phục vụ sửa ảnh

      $ten_san_pham = $_POST['ten_san_pham'] ?? '';
      $mo_ta_dai = $_POST['mo_ta_dai'] ?? '';
      $mo_ta_ngan = $_POST['mo_ta_ngan'] ?? '';
      $trang_thai = $_POST['trang_thai'] ?? '';
      $gia_ban = $_POST['gia_ban'] ?? '';
      $gia_nhap = $_POST['gia_nhap'] ?? '';
      $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
      $so_luong = $_POST['so_luong'] ?? '';
      $ngay_nhap = $_POST['ngay_nhap'] ?? '';
      $danh_muc_id = $_POST['danh_muc_id'] ?? '';



      $hinh_anh = $_FILES['hinh_anh'] ?? null;




      $errors = [];
      if (empty($ten_san_pham)) {
        $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
      }
      if (empty($mo_ta_dai)) {
        $errors['mo_ta_dai'] = 'Tên sản phẩm không được để trống';
      }
      if (empty($mo_ta_ngan)) {
        $errors['mo_ta_ngan'] = 'Tên sản phẩm không được để trống';
      }
      if (empty($trang_thai)) {
        $errors['trang_thai'] = 'trang thái phải chọn';
      }
      if (empty($gia_ban)) {
        $errors['gia_ban'] = 'Tên sản phẩm không được để trống';
      }

      if (empty($gia_nhap)) {
        $errors['gia_nhap'] = 'giá sản phẩm không được để trống';
      }
      if (empty($gia_khuyen_mai)) {
        $errors['gia_khuyen_mai'] = 'giá khuyến mãi không được để trống';
      }
      if (empty($so_luong)) {
        $errors['so_luong'] = 'số lượng không được để trống';
      }
      if (empty($ngay_nhap)) {
        $errors['ngay_nhap'] = 'ngày nhập không được để trống';
      }
      if (empty($danh_muc_id)) {
        $errors['danh_muc_id'] = 'danh mục phải chọn';
      }



      $_SESSION['error'] = $errors;
      // var_dump($errors);die();


      //logic sửa ảnh
      if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
        //upload ảnh mới lên
        $new_file = uploadFile($hinh_anh, './uploads/');
        if (!empty($old_file)) { //nếu có ảnh cũ thì xóa đi
          deleteFile($old_file);
        }
      } else {
        $new_file = $old_file;
      }

      if (empty($errors)) {
        // var_dump('ac');die;
        //nếu k có lỗi tiến hành tên sản phẩm
        $this->modelSanPham->updateSanPham(
          $san_pham_id,
          $ten_san_pham,
          $mo_ta_dai,
          $mo_ta_ngan,
          $gia_ban,
          $gia_nhap,
          $gia_khuyen_mai,
          $so_luong,
          $ngay_nhap,
          $danh_muc_id,
          $trang_thai,

          $new_file
        );
        // var_dump($status);die();
        header("Location:  ?act=san-phams");
        exit();
      } else {
        //trả lỗi

        //đặt chỉ thị xóa session sau khi hiển thị form
        $_SESSION['flash'] = true;
        header("Location:  ?act=form-sua-san-pham&id_san_pham=" . $san_pham_id);
        exit();
      }
    }
  }
  public function postEditAnhSanPham()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $san_pham_id = $_POST['san_pham_id'] ?? '';
      // var_dump($san_pham_id);die();

      //lấy danh sách ảnh hiện tại của sản phẩm
      $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);

      //xử lý các ảnh được gửi từ form
      $img_array = $_FILES['img_array'];
      // var_dump($img_array);die();
      $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
      $current_img_ids = $_POST['current_img_ids'] ?? [];

      //khai báo ảnh để lưu ảnh thêm mới hoặc thay thế ảnh cũ
      $upload_file = [];

      //upload ảnh mới hoặc thay thế ảnh cũ
      foreach ($img_array['name'] as $key => $value) {
        if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
          $new_file = uploadFileAlbum($img_array, './uploads/', $key);
          if ($new_file) {
            $upload_file[] = [
              'id' => $current_img_ids[$key] ?? null,
              'file' => $new_file
            ];
          }
        }
      }

      //lưu ảnh mưới vào db và xóa ảnh cũ nếu có
      foreach ($upload_file as $file_info) {
        if ($file_info['id']) {
          $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
          //cập nhật ảnh cũ
          $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);

          //xóa ảnh cũ
          deleteFile($old_file);
        } else {
          //thêm ảnh mới
          $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
        }
      }
      //xử lý xóa ảnh
      foreach ($listAnhSanPhamCurrent as $anhSP) {
        $anh_id = $anhSP['id'];
        if (in_array($anh_id, $img_delete)) {
          //xóa ảnh trong db
          $this->modelSanPham->destroyAnhSanPham($anh_id);

          //xóa file
          deleteFile($anhSP['link_hinh_anh']);
        }
      }
      header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
      // echo "them thành cong";
      exit();
    }
  }
  public function deleteSanPham()
  {
    $id = $_GET['id_san_pham'];
    $sanPham = $this->modelSanPham->getDetailSanPham($id);

    if ($sanPham) {
      deleteFile($sanPham['hinh_anh']);
      $this->modelSanPham->destroySanPham($id);
    }

    header("Location: " . BASE_URL_ADMIN . '?act=san-phams');
    exit();
  }
  public function detailSanPham()
  {
    $id = $_GET['id_san_pham'];
    $sanPham = $this->modelSanPham->getDetailSanPham($id);
    $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
    $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
    $listDanhGia = $this->modelSanPham->getDanhGiaFromSanPham($id);

    // var_dump($SanPham);
    // die();
    if ($sanPham) {
      require_once './views/sanphams/detailSanPham.php';
    } else {
      header("Location: " . BASE_URL_ADMIN . '?act=san-phams');
      exit();
    }
  }

  public function updateTrangThaiBinhLuan(){
    $id_binh_luan = $_POST['id_binh_luan'];
    $name_view = $_POST['name_view'];
    $binhLuan = $this -> modelSanPham->getDetailBinhLuan($id_binh_luan);

    if ($binhLuan) {
      $trang_thai_update = '';
      if ($binhLuan['trang_thai'] == 1) {
        $trang_thai_update = 2;
      }else{
        $trang_thai_update = 1;
      }
     $status =  $this -> modelSanPham ->updateTrangThaiBinhLuan($id_binh_luan, $trang_thai_update);

     if ($status) {
       if ($name_view == 'detail_sanpham') {
        header("Location: ". BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id']);
       }
     }
    //  var_dump($status);die();
    require_once './views/sanphams/detailSanPham.php';
    }
  }
  public function updateTrangThaiDanhGia(){
    $id_danh_gia = $_POST['id_danh_gia'];
    $name_view = $_POST['name_view'];
    $danhGia = $this -> modelSanPham->getDetailDanhGia($id_danh_gia);

    if ($danhGia) {
      $trang_thai_update = '';
      if ($danhGia['trang_thai'] == 1) {
        $trang_thai_update = 2;
      }else{
        $trang_thai_update = 1;
      }
     $status =  $this -> modelSanPham ->updateTrangThaiDanhGia($id_danh_gia, $trang_thai_update);
     if ($status) {
       if ($name_view == 'detail_sanpham') {
        header("Location: ". BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $danhGia['san_pham_id']);
       }
     }

    }
  }

}
