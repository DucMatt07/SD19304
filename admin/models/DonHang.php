<?php

class DonHang
{

  public $conn;

  // Kết nối cơ sở dữ liệu
  public function __construct()
  {
    $this->conn = connectDB();  // Giả sử connectDB() là một hàm kết nối cơ sở dữ liệu đã được định nghĩa ở nơi khác
  }

  // Lấy tất cả đơn hàng
  public function getAll()
  {
    try {
      $sql = "SELECT don_hangs.*, trang_thai_don_hangs.trang_thai
                    FROM don_hangs
                    JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang = trang_thai_don_hangs.id ORDER BY `id` DESC";
 ;
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function getDetailDonHang($id)
  {
    try {
      $sql = "SELECT don_hangs.*, trang_thai_don_hangs.trang_thai, nguoi_dungs.ten_nguoi_dung, nguoi_dungs.email, nguoi_dungs.sdt
                    FROM don_hangs
                   INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang = trang_thai_don_hangs.id
                   INNER JOIN nguoi_dungs ON don_hangs.nguoi_dung_id = nguoi_dungs.id
                   WHERE don_hangs.id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([':id' => $id]);
      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
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

  public function getListSpDonHang($id)
  {
    try {
      $sql = "SELECT chi_tiet_don_hangs.*,san_phams.ten_san_pham,san_phams.hinh_anh
      FROM chi_tiet_don_hangs
      INNER JOIN san_phams on chi_tiet_don_hangs.san_pham_id = san_phams.id
       WHERE chi_tiet_don_hangs.don_hang_id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([':id' => $id]);
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
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

  public function deleteDonHang($id)
  {
    try {
      // Sử dụng câu lệnh SQL với tham số placeholder
      $sql = "DELETE FROM don_hangs WHERE id = :id";

      // Chuẩn bị câu lệnh
      $stmt = $this->conn->prepare($sql);

      // Gán giá trị cho tham số
      $stmt->bindParam(':id', $id);

      // Thực thi câu lệnh
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage();
      return false; // Trả về false nếu có lỗi
    }
  }



  public function donHangShow($id)
  {
    try {
      // Sử dụng câu lệnh SQL với tham số placeholder
      $sql = "SELECT don_hangs.*, trang_thai_don_hangs.trang_thai
                    FROM don_hangs
                    JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang = trang_thai_don_hangs.id WHERE don_hangs.id = :id";

      // Chuẩn bị câu lệnh
      $stmt = $this->conn->prepare($sql);

      // Gán giá trị cho tham số
      $stmt->bindParam(':id', $id);

      // Thực thi câu lệnh
      $stmt->execute();

      return $stmt->fetch();
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage();
      return false; // Trả về false nếu có lỗi
    }
  }

  public function updateDonHang($id, $trang_thai)
  {
    try {
      // Sử dụng câu lệnh UPDATE để cập nhật trạng thái đơn hàng
      $sql = "UPDATE `don_hangs` SET `trang_thai_don_hang` = :trang_thai_don_hang WHERE `don_hangs`.`id` = :id";

      // Chuẩn bị câu lệnh SQL
      $stmt = $this->conn->prepare($sql);

      // Liên kết các giá trị với các placeholder trong câu lệnh SQL
      $stmt->bindParam(':trang_thai_don_hang', $trang_thai);
      $stmt->bindParam(':id', $id);

      // Thực hiện câu lệnh
      $stmt->execute();

      // Kiểm tra số dòng bị ảnh hưởng để xác nhận cập nhật
      return $stmt->rowCount() > 0; // Trả về true nếu có ít nhất 1 bản ghi được cập nhật
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage();
      return false;
    }
  }
}
