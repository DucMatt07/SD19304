<?php

class TinTuc
{

    public $conn;

    // Kết nối cơ sở dữ liệu
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả tin tức
    public function getAll()
    {
        try {
            $sql = "SELECT * FROM tin_tucs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    public function DetailUpdate($id)
    {
        try {

            $sql = "SELECT * FROM tin_tucs WHERE tin_tuc_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
            var_dump($id); // Giá trị ID
            var_dump($query); // Kiểm tra truy vấn SQL
            var_dump($tinTuc); // Kết quả trả về từ Model
            die();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }



    // Hủy kết nối
    public function __destruct()
    {
        $this->conn = null;
    }
}
