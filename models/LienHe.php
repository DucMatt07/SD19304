<?php
class LienHe
{
  public $conn;

  //Kết nối csdl
  public function __construct()
  {
    $this->conn = connectDB();
  }

  public function postDataClient($ten, $email, $so_dien_thoai, $noi_dung, $ngay_tao, $trang_thai)
  {
      try {
          // Câu truy vấn SQL
          $sql = "INSERT INTO lien_hes (ten, email, so_dien_thoai, noi_dung, ngay_tao, trang_thai)
                  VALUES (:ten, :email, :so_dien_thoai, :noi_dung, :ngay_tao, :trang_thai)";

          // Chuẩn bị truy vấn
          $stmt = $this->conn->prepare($sql);

          // Thực thi truy vấn
          $stmt->execute([
              ':ten' => $ten,
              ':email' => $email,
              ':so_dien_thoai' => $so_dien_thoai,
              ':noi_dung' => $noi_dung,
              ':ngay_tao' => $ngay_tao,
              ':trang_thai' => $trang_thai,
          ]);

          // Nếu thành công, trả về true
          return true;

      } catch (PDOException $e) {
          // Log lỗi ra file (nếu cần)
          error_log("Lỗi khi thêm dữ liệu vào bảng lien_hes: " . $e->getMessage());

          // Hiển thị thông báo lỗi gọn gàng (cho developer)
          echo "Đã xảy ra lỗi khi thêm dữ liệu. Vui lòng kiểm tra lại.";

          // Có thể trả về false để xử lý logic khác
          return false;
      }
  }


}