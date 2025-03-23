<?php
class ChiTietDonHang
{
  public $conn; // Biến kết nối cơ sở dữ liệu

  public function __construct()
  {
    // Hàm connectDB() phải được định nghĩa để trả về một kết nối PDO
    $this->conn = connectDB();
  }

  /**
   * Lấy chi tiết đơn hàng cùng thông tin người dùng
   *
   * @param int $id ID của đơn hàng
   * @return array|null Trả về thông tin đơn hàng và người dùng nếu tồn tại, hoặc null nếu không tìm thấy
   */
  public function getDetaiUser($id)
  {
    try {
      $sql = '
            SELECT
                don_hangs.id_don_hang,
                don_hangs.ngay_dat_hang,
                don_hangs.khuyen_mai,
                don_hangs.tong_tien,
                don_hangs.dia_chi_giao_hang,
                don_hangs.phuong_thuc_thanh_toan,
                don_hangs.trang_thai_don_hang,
                don_hangs.trang_thai_thanh_toan,
                don_hangs.ghi_chu,
                nguoi_dungs.ten_nguoi_dung,
                nguoi_dungs.email,
                nguoi_dungs.id,
                nguoi_dungs.sdt,
                nguoi_dungs.dia_chi,
                nguoi_dungs.ngay_sinh,
                nguoi_dungs.gioi_tinh
            FROM
                don_hangs
            JOIN
                nguoi_dungs ON don_hangs.id_nguoi_dung = nguoi_dungs.id
            WHERE
                don_hangs.id_don_hang = :id_don_hang';

      $stmt = $this->conn->prepare($sql);

      // Gán tham số :id_don_hang trong câu lệnh SQL
      $stmt->execute([':id_don_hang' => $id]);

      // Trả về kết quả dưới dạng mảng liên kết
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
      return null;
    }
  }

  public function getDetaiSP($id)
  {
    try {
      $sql = '
            SELECT
                don_hangs.id_don_hang,
                chi_tiet_don_hangs.id_san_pham ,
                chi_tiet_don_hangs.id_don_hang  ,
                chi_tiet_don_hangs.so_luong ,
                chi_tiet_don_hangs.gia ,
                chi_tiet_don_hangs.id_chi_tiet_don_hang ,
                san_phams.ten_san_pham,
                san_phams.gia_ban,
                san_phams.id,
                san_phams.hinh_anh
            FROM
                don_hangs
            JOIN
                chi_tiet_don_hangs ON don_hangs.id_don_hang  = chi_tiet_don_hangs.id_don_hang
            JOIN
                san_phams ON chi_tiet_don_hangs.id_san_pham  = san_phams.id
            WHERE
                don_hangs.id_don_hang = :id_don_hang';

      $stmt = $this->conn->prepare($sql);

      // Gán tham số :id_don_hang trong câu lệnh SQL
      $stmt->execute([':id_don_hang' => $id]);

      // Trả về kết quả dưới dạng mảng liên kết
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
      return null;
    }
  }





  public function getKhuyenMai()
  {
    try {
      $sql = "SELECT * FROM `khuyen_mais`";

      $stmt = $this->conn->prepare($sql);

      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage(); // In lỗi
      die(); // Dừng chương trình để kiểm tra
    }
  }
}
