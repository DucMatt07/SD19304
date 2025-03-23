<?php
class Dashboard
{
  public $conn;

  // Kết nối cơ sở dữ liệu
  public function __construct()
  {
    $this->conn = connectDB();
  }

  // Lấy tổng doanh thu theo trạng thái
  public function getRevenueByStatus()
  {
    try {
      $sql = "SELECT SUM(IFNULL(tong_tien, 0)) AS revenue FROM don_hangs WHERE trang_thai_don_hang = 18 ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetch();
      // return (float) ($result['revenue'] ?? 0);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return 0;
    }
  }

  // Lấy tổng đơn hàng đã hoàn thành

  public function getTotalDh()
  {
    try {
      $sql = "SELECT COUNT(*) AS completed_orders FROM don_hangs JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang = trang_thai_don_hangs.id WHERE trang_thai_don_hangs.id = 18;";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetch();
      // return (float) ($result['revenue'] ?? 0);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return 0;
    }
  }



  public function getTotalUser()
  {
    try {
      $sql = "SELECT COUNT(*) AS total_users FROM nguoi_dungs WHERE vai_tro = '2';";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetch();
      // return (float) ($result['revenue'] ?? 0);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return 0;
    }
  }


  //Lợi nhuận = (Giá bán - Giá nhập) * Số lượng còn lại

  public function getLoiNhuan()
  {
    try {
      $sql = "SELECT SUM((gia_ban - gia_nhap) * so_luong) AS profit
FROM san_phams
WHERE trang_thai = 1;
";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetch();
      // return (float) ($result['revenue'] ?? 0);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return 0;
    }
  }

  // Lợi nhuận theo tháng
  public function getMoth()
  {
    try {
      $sql = "SELECT
                      YEAR(ngay_nhap) AS year,
                      MONTH(ngay_nhap) AS month,
                      SUM((gia_ban - gia_nhap) * so_luong) AS monthly_profit
                  FROM san_phams
                  WHERE trang_thai = 1
                  GROUP BY YEAR(ngay_nhap), MONTH(ngay_nhap)
                  ORDER BY year, month;";

      // Prepare and execute the query
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();

      // Fetch all the results as an associative array
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      // Handle errors
      echo "Error: " . $e->getMessage();
      return [];
    }
  }


  public function totalSp()
  {
    try {
      $sql = " SELECT dmsp.ten_danh_muc, COUNT(SP.id) as totalSp FROM `san_phams` as SP INNER JOIN danh_muc_san_phams as dmsp ON SP.danh_muc_id = dmsp.id GROUP BY dmsp.id";

      // Prepare and execute the query
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();

      // Fetch all the results as an associative array
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      // Handle errors
      echo "Error: " . $e->getMessage();
      return [];
    }
  }
}
