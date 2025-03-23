<?php
class LienHe{
    public $conn;

    //Kết nối csdl
    public function __construct()
    {
        $this->conn = connectDB();
    }

    //Truy cập csdl để lấy ds liên hệ
    public function getAllLienHe(){
        try {
            $sql = 'SELECT*FROM lien_hes';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt ->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi: " .$e->getMessage();
        }
    }
    public function postData($ten, $email, $so_dien_thoai,$noi_dung, $ngay_tao, $trang_thai){
        try {
            $sql = 'INSERT INTO lien_hes(ten,email,so_dien_thoai,noi_dung, ngay_tao,trang_thai) values (:ten, :email, :so_dien_thoai,:noi_dung, :ngay_tao, :trang_thai ) ';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':ten'=>$ten,
                            ':email'=>$email,
                            ':so_dien_thoai'=>$so_dien_thoai,
                            ':noi_dung'=>$noi_dung,

                            ':ngay_tao'=>$ngay_tao,
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
            $sql = 'SELECT *FROM  lien_hes WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi: " .$e->getMessage();
        }
    }
    public function updateData($id, $trang_thai){
        try {
            $sql = 'UPDATE lien_hes SET  trang_thai = :trang_thai WHERE id = :id ';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id,

                            ':trang_thai'=>$trang_thai

                        ]);

            return true;
        } catch (PDOException $e) {
            echo "Lỗi: " .$e->getMessage();
        }
    }
    //xóa dữ liệu
    public function deleteData($id){
        try {
            $sql = 'DELETE from lien_hes WHERE id = :id';

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
