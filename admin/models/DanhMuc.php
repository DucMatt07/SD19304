<?php 

class DanhMuc{

    public $conn;


    // Ket noi csdl 

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll(){
        try{
            $sql = "SELECT * FROM `danh_muc_san_phams`";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        }
        catch(PDOException $e){
            echo 'Error'.$e->getMessage();
        }
    }

    public function CreateCate($ten_danh_muc, $mo_ta, $trang_thai) {
        try {
            $sql = "INSERT INTO `danh_muc_san_phams` (`ten_danh_muc`, `mo_ta`, `trang_thai`) 
                    VALUES (:ten_danh_muc, :mo_ta, :trang_thai)";
    
            $stmt = $this->conn->prepare($sql);
    
            // Liên kết các giá trị với các placeholder trong câu lệnh SQL
            $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':trang_thai', $trang_thai);
    
            // Thực hiện câu lệnh
            $stmt->execute();
    
            // Trả về true để xác nhận thêm thành công
            return true;
    
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    
    public function deleteData($id) {
        try {
            // Sử dụng câu lệnh SQL với tham số placeholder
            $sql = "DELETE FROM danh_muc_san_phams WHERE id = :id";
    
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


    public function DetailUpdate($id) {
        try {
            // Sử dụng câu lệnh SQL với tham số placeholder
            $sql = "SELECT * FROM danh_muc_san_phams WHERE id = :id";
    
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
    

    public function UpdateCate($id, $ten_danh_muc, $mo_ta, $trang_thai) {
        try {
            // Sử dụng câu lệnh UPDATE để cập nhật dữ liệu
            $sql = "UPDATE danh_muc_san_phams 
                    SET ten_danh_muc = :ten_danh_muc, mo_ta = :mo_ta, trang_thai = :trang_thai 
                    WHERE id = :id";
            
            $stmt = $this->conn->prepare($sql);
            
            // Liên kết các giá trị với các placeholder trong câu lệnh SQL
            $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':id', $id);
            
            // Thực hiện câu lệnh
            $stmt->execute();
            
            // Trả về true để xác nhận cập nhật thành công
            return true;
    
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    



    // Huy ket noi
    public function __destruct()
    {
        $this->conn = null;
    }
    
}


?>