<?php

class DonHang
{

  public $conn;


  // Ket noi csdl

  public function __construct()
  {
    $this->conn = connectDB();
  }


  public function addDonHang($nguoi_dung_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_giao_hang, $ghi_chu, $tong_tien, $phuong_thuc_thanh_toan_id, $ngay_dat_hang, $trang_thai_don_hang, $ma_don_hang)
  {
    try {
      $sql = 'INSERT INTO don_hangs (nguoi_dung_id, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, dia_chi_giao_hang, ghi_chu, tong_tien,phuong_thuc_thanh_toan_id,ngay_dat_hang, trang_thai_don_hang,ma_don_hang)
      VALUES (:nguoi_dung_id, :ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :dia_chi_giao_hang, :ghi_chu, :tong_tien,:phuong_thuc_thanh_toan_id,:ngay_dat_hang, :trang_thai_don_hang,:ma_don_hang)';

      $stmt = $this->conn->prepare($sql);

      $stmt->execute([
        ':nguoi_dung_id' => $nguoi_dung_id,
        ':ten_nguoi_nhan' => $ten_nguoi_nhan,
        ':email_nguoi_nhan' => $email_nguoi_nhan,
        ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
        ':dia_chi_giao_hang' => $dia_chi_giao_hang,
        ':ghi_chu' => $ghi_chu,
        ':tong_tien' => $tong_tien,
        ':phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
        ':trang_thai_don_hang' => $trang_thai_don_hang,
        ':ma_don_hang' => $ma_don_hang,
        ':ngay_dat_hang' => $ngay_dat_hang,
      ]);

      return $this->conn->lastInsertId();
    } catch (Exception $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }

  public function addChiTietDonHang($donHangId, $sanPhamId, $soLuong, $donGia, $thanhTien)
  {
    try {
      $sql = "INSERT INTO chi_tiet_don_hangs (don_hang_id,san_pham_id,so_luong,don_gia,thanh_tien) 
              VALUES (:don_hang_id,:san_pham_id,:so_luong,:don_gia,:thanh_tien)";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ':don_hang_id' => $donHangId,
        ':san_pham_id' => $sanPhamId,
        ':so_luong' => $soLuong,
        ':don_gia' => $donGia,
        ':thanh_tien' => $thanhTien,
      ]);
    } catch (Exception $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }

  public function getChiTietDonHangByOrderId($orderId)
  {
    $sql = "SELECT * FROM chi_tiet_don_hangs WHERE don_hang_id = :orderId";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Trả về tất cả chi tiết đơn hàng
  }


  public function getDonHangFromUser($nguoiDungId)
  {
    try {
      $sql = "SELECT * FROM `don_hangs` WHERE  `nguoi_dung_id` = :nguoi_dung_id ORDER BY `id` DESC";

      $stmt = $this->conn->prepare($sql);

      $stmt->execute([
        ':nguoi_dung_id' => $nguoiDungId
      ]);

      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage(); // In lỗi
      die(); // Dừng chương trình để kiểm tra
    }
  }

  public function getPttt()
  {
    try {
      $sql = "SELECT * FROM `phuong_thuc_thanh_toans`";

      $stmt = $this->conn->prepare($sql);

      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage(); // In lỗi
      die(); // Dừng chương trình để kiểm tra
    }
  }
  public function getTrangThai()
  {
    try {
      $sql = "SELECT * FROM `trang_thai_don_hangs`";

      $stmt = $this->conn->prepare($sql);

      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage(); // In lỗi
      die(); // Dừng chương trình để kiểm tra
    }
  }

  public function getDonHangById($donHangId)
  {
    try {
      $sql = "SELECT * FROM don_hangs WHERE id = :id";

      $stmt = $this->conn->prepare($sql);

      $stmt->execute([
        ':id' => $donHangId
      ]);

      return $stmt->fetch();
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage(); // In lỗi
      die(); // Dừng chương trình để kiểm tra
    }
  }

  public function updateDH($donHangId, $trang_thai_id)
  {
    try {
      $sql = "UPDATE don_hangs SET trang_thai_don_hang = :trang_thai_don_hang   WHERE id = :id";

      $stmt = $this->conn->prepare($sql);

      $stmt->execute([
        ':id' => $donHangId,
        ':trang_thai_don_hang' => $trang_thai_id
      ]);

      return true;
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage(); // In lỗi
      die(); // Dừng chương trình để kiểm tra
    }
  }

  // Tìm kiếm đơn hàng theo mã đơn và trạng thái
  public function searchOrders($search, $status)
  {

    $query = "SELECT don_hangs.*, trang_thai_don_hangs.trang_thai FROM don_hangs JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang = trang_thai_don_hangs.id ";

    if ($search) {
      $query .= " AND ma_don_hang LIKE :search";
    }
    if ($status) {
      $query .= " AND trang_thai = :status";
    }

    $stmt = $this->conn->prepare($query);

    if ($search) {
      $stmt->bindValue(':search', "%$search%");
    }
    if ($status) {
      $stmt->bindValue(':status', $status);
    }

    $stmt->execute();

    return $stmt->fetchAll();  // Trả về kết quả tìm kiếm
  }


  public function getChiTietDonHangByDonHangId($donHangId)
  {
    try {
      $sql = "SELECT 
                      chi_tiet_don_hangs.*,
                      san_phams.ten_san_pham,
                      san_phams.hinh_anh
                    FROM 
                      chi_tiet_don_hangs
                    JOIN
                      san_phams ON chi_tiet_don_hangs. san_pham_id = san_phams.id
                    WHERE 
                      chi_tiet_don_hangs.don_hang_id=:don_hang_id ";

      $stmt = $this->conn->prepare($sql);

      // Gán tham số :id_don_hang trong câu lệnh SQL
      $stmt->execute([':don_hang_id' => $donHangId]);

      // Trả về kết quả dưới dạng mảng liên kết
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
      return null;
    }
  }
}
