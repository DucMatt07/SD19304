<?php 

class TinTuc {

    public $conn;

    // Kết nối cơ sở dữ liệu
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả tin tức
    public function getAll(){
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

    // Thêm mới tin tức
    public function CreateTinTuc($tieu_de, $noi_dung, $ngay_xuat_ban, $hinh_anh, $trang_thai) {
        try {
            $sql = "INSERT INTO tin_tucs (tieu_de, noi_dung, ngay_xuat_ban, hinh_anh, trang_thai) 
                    VALUES (:tieu_de, :noi_dung, :ngay_xuat_ban, :hinh_anh, :trang_thai)";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':ngay_xuat_ban', $ngay_xuat_ban);
            $stmt->bindParam(':hinh_anh', $hinh_anh);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    // Xóa tin tức
    public function deleteData($id) {
        try {
            $sql = "DELETE FROM tin_tucs WHERE tin_tuc_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    // Lấy chi tiết tin tức để cập nhật
    public function DetailUpdate($id) {
        try {
            $sql = "SELECT * FROM tin_tucs WHERE tin_tuc_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    // Cập nhật tin tức
    public function UpdateTinTuc($id, $tieu_de, $noi_dung, $ngay_xuat_ban, $hinh_anh, $trang_thai) {
        try {
            $sql = "UPDATE tin_tucs 
                    SET tieu_de = :tieu_de, noi_dung = :noi_dung, ngay_xuat_ban = :ngay_xuat_ban, hinh_anh = :hinh_anh, trang_thai =:trang_thai
                    WHERE tin_tuc_id = :id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':ngay_xuat_ban', $ngay_xuat_ban);
            $stmt->bindParam(':hinh_anh', $hinh_anh);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
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

?>
