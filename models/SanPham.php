<?php
class SanPham
{
  public $conn; //khai báo phương thức

  public function __construct()
  {
    $this->conn = connectDB();
  }
  //viết hàm lấy toàn bộ danh sách sản phẩm
  public function getAllSanPham()
  {
    try {
      $sql = 'SELECT san_phams.*, danh_muc_san_phams.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_muc_san_phams ON san_phams.danh_muc_id = danh_muc_san_phams.id
            ';

      $stmt = $this->conn->prepare($sql);

      $stmt->execute();

      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }
  public function getDetailSanPham($id)
  {
    try {
      $sql = 'SELECT san_phams.*, danh_muc_san_phams.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_muc_san_phams ON san_phams.danh_muc_id  = danh_muc_san_phams.id
            WHERE san_phams.id = :id
            ';

      $stmt = $this->conn->prepare($sql);

      $stmt->execute([':id' => $id]);

      return $stmt->fetch();
    } catch (Exception $e) {
      echo 'Lỗi' . $e->getMessage();
    }
  }
  public function getListAnhSanPham($id)
  {
    try {
      $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id';

      $stmt = $this->conn->prepare($sql);

      $stmt->execute([':id' => $id]);

      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo 'Lỗi' . $e->getMessage();
    }
  }
  public function getBinhLuanFromSanPham($id)
  {
    try {
      $sql = 'SELECT binh_luans.*, nguoi_dungs.ten_nguoi_dung, nguoi_dungs.avatar
            FROM binh_luans
            INNER JOIN nguoi_dungs ON binh_luans.tai_khoan_id = nguoi_dungs.id
            WHERE binh_luans.san_pham_id = :id
            ';
      $stmt = $this->conn->prepare($sql);

      $stmt->execute([':id' => $id]);
      return $stmt->fetchAll();
      // var_dump($stmt);die();
    } catch (Exception $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }
  public function themBinhLuan($tai_khoan_id, $san_pham_id, $noi_dung)
  {
    try {
      $sql = "INSERT INTO binh_luans (tai_khoan_id, san_pham_id, noi_dung, ngay_dang)
                    VALUES (:tai_khoan_id, :san_pham_id, :noi_dung,NOW())";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ':tai_khoan_id' => $tai_khoan_id,
        ':san_pham_id' => $san_pham_id,
        ':noi_dung' => $noi_dung,
      ]);
    } catch (Exception $e) {
      echo "Lỗi: " . $e->getMessage();
    }
  }
  public function getlistSanPhamDanhMuc($danh_muc_id)
  {
    try {
      $sql = 'SELECT san_phams.*, danh_muc_san_phams.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_muc_san_phams ON san_phams.danh_muc_id = danh_muc_san_phams.id
            WHERE san_phams.danh_muc_id =
            ' . $danh_muc_id;

      $stmt = $this->conn->prepare($sql);

      $stmt->execute();

      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }
  public function getDanhGiaFromSanPham($id)
  {
    try {
      $sql = 'SELECT danh_gia_san_phams.*, nguoi_dungs.ten_nguoi_dung
            FROM danh_gia_san_phams
            INNER JOIN nguoi_dungs ON danh_gia_san_phams.tai_khoan_id = nguoi_dungs.id
            WHERE danh_gia_san_phams.san_pham_id = :id
            ';
      $stmt = $this->conn->prepare($sql);

      $stmt->execute([':id' => $id]);
      return $stmt->fetchAll();
      // var_dump($stmt);die();
    } catch (Exception $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }
  public function getSanPhamByDanhMucAndSort($danhMucId, $sort = 'asc')
  {


    // Kiểm tra giá trị sort (asc hoặc desc)
    if ($sort !== 'asc' && $sort !== 'desc') {
      $sort = 'asc';  // Mặc định là tăng dần nếu giá trị sort không hợp lệ
    }
    $sql = "SELECT
        san_phams.*,
        danh_muc_san_phams.ten_danh_muc
    FROM
        san_phams
    JOIN
        danh_muc_san_phams
    ON
        san_phams.danh_muc_id = danh_muc_san_phams.id
    WHERE
        san_phams.danh_muc_id = :danh_muc_id
    ORDER BY
        san_phams.gia_ban $sort";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':danh_muc_id', $danhMucId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // số lượng sản phẩm
  public function getSoLuongSanPham($sanPhamId)
  {
    $sql = "SELECT so_luong FROM san_phams WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([':id' => $sanPhamId]);
    $result = $stmt->fetch();
    return $result['so_luong'];
  }


  //search
  public function searchSanPhamByName($searchTerm)
  {
    // Chuẩn bị câu lệnh SQL
    $sql = "SELECT
    san_phams.*,
    danh_muc_san_phams.ten_danh_muc
FROM
    san_phams
JOIN
    danh_muc_san_phams
ON
    san_phams.danh_muc_id = danh_muc_san_phams.id
WHERE
    san_phams.ten_san_pham LIKE :searchTerm OR
    danh_muc_san_phams.ten_danh_muc LIKE :searchTerm";

    // Sử dụng chuẩn bị câu lệnh (Prepared Statement) để tránh SQL Injection
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);

    // Thực thi câu lệnh và trả kết quả
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }



  public function getProductQuantity($sanPhamId)
  {
    // Truy vấn số lượng sản phẩm hiện tại trong kho
    $sql = "SELECT so_luong FROM san_phams WHERE id = :sanPhamId";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':sanPhamId', $sanPhamId, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['so_luong'] : 0; // trả về số lượng, hoặc 0 nếu không tìm thấy
  }


  public function updateQuantity($sanPhamId, $newQuantity)
  {
    // Cập nhật số lượng trong kho
    $sql = "UPDATE san_phams SET so_luong = :newQuantity WHERE id = :sanPhamId";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':newQuantity', $newQuantity, PDO::PARAM_INT);
    $stmt->bindParam(':sanPhamId', $sanPhamId, PDO::PARAM_INT);

    return $stmt->execute();
  }

  public function updateQuantityKhiHuy($sanPhamId, $quantityChange)
  {
    // Lấy số lượng hiện tại trong kho
    $currentQuantity = $this->getProductQuantity($sanPhamId);

    // Cập nhật số lượng mới (cộng hoặc trừ)
    $newQuantity = $currentQuantity + $quantityChange;

    // Cập nhật số lượng trong kho
    $sql = "UPDATE san_phams SET so_luong = :newQuantity WHERE id = :sanPhamId";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':newQuantity', $newQuantity, PDO::PARAM_INT);
    $stmt->bindParam(':sanPhamId', $sanPhamId, PDO::PARAM_INT);

    return $stmt->execute();
  }
}
