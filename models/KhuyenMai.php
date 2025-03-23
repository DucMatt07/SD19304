<?php
class KhuyenMai
{

  public $conn;
  // kết nối csdl
  public function __construct()
  {
    $this->conn = connectDB();
  }

  public function getAllKhuyenMai()
  {
    try {
      $sql = 'SELECT * FROM khuyen_mais';

      $stmt = $this->conn->prepare($sql);

      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }


  //Hủy kết nối csdl
  public function __destruct()
  {
    $this->conn = null;
  }
}
