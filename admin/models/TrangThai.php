<?php
class TrangThai{
    public $conn;

    //Kết nối csdl
    public function __construct()
    {
        $this->conn = connectDB();
    }

    //Truy cập csdl để lấy ds liên hệ
    public function getAllTrangThai(){
        try {
            $sql = 'SELECT*FROM trang_thai_don_hangs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt ->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi: " .$e->getMessage();
        }
    }
    public function postData($trang_thai){
        try {
            $sql = 'INSERT INTO trang_thai_don_hangs (trang_thai) values ( :trang_thai ) ';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                            ':trang_thai'=>$trang_thai
                        ]);

            return true;
        } catch (PDOException $e) {
            echo "Lỗi: " .$e->getMessage();
        }
    }
    //lấy thông tin chi tiết
    public function getDeltailData($id){
        try {
            $sql = 'SELECT *FROM  trang_thai_don_hangs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi: " .$e->getMessage();
        }
    }
    public function updateData($id, $trang_thai){
        try {
            $sql = 'UPDATE trang_thai_don_hangs SET  trang_thai = :trang_thai WHERE id = :id ';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id,                          
                            ':trang_thai'=>$trang_thai,
                        ]);

            return true;
        } catch (PDOException $e) {
            echo "Lỗi: " .$e->getMessage();
        }
    }
    //xóa dữ liệu 
    public function deleteData($id){
        try {
            $sql = 'DELETE from trang_thai_don_hangs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return true;
        } catch (PDOException $e) {
            echo "Lỗi: " .$e->getMessage();
        }
    }

    //Hủy kết nối csdl
    public function __destruct()
    {
        $this->conn = null;
    }
}