<?php
class Banner
{
    public $conn;
    //kết nối cơ sở dữ liệu
    public function __construct()
    {
        $this->conn = connectDB();
    }

    //Danh sách banner
    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM danh_muc_banners';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    //thêm dữu liệu vào csdl
    public function postData( $ten_danh_muc_banner, $ngay_tao, $trang_thai, $link_hinh_anh ) {
        try {
            $sql = 'INSERT INTO danh_muc_banners(ten_danh_muc_banner,ngay_tao,trang_thai,link_hinh_anh)VALUES (:ten_danh_muc_banner,:ngay_tao,:trang_thai, :link_hinh_anh)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_danh_muc_banner' => $ten_danh_muc_banner,
                ':ngay_tao' => $ngay_tao,
                ':trang_thai' => $trang_thai,
                ':link_hinh_anh' => $link_hinh_anh
            ]);
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function deleteData($id)
    {
        try {
            // Sử dụng câu lệnh SQL với tham số placeholder
            $sql = "DELETE FROM danh_muc_banners WHERE id = :id";

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

    // lấy thông tin chi tiết
    public function DetailUpdate($id)
    {
        try {
            // Sử dụng câu lệnh SQL với tham số placeholder
            $sql = "SELECT * FROM danh_muc_banners WHERE id = :id";

            // Chuẩn bị câu lệnh
            $stmt = $this->conn->prepare($sql);

            // Gán giá trị cho tham số
            $stmt->bindParam(':id', $id);

            // Thực thi câu lệnh
            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function UpdateCate($id, $ten_danh_muc_banner, $link_hinh_anh, $ngay_tao, $trang_thai)
    {
        try {
            // Sử dụng câu lệnh UPDATE để cập nhật dữ liệu
            $sql = "UPDATE danh_muc_banners
                    SET ten_danh_muc_banner = :ten_danh_muc_banner,link_hinh_anh = :link_hinh_anh, ngay_tao = :ngay_tao, trang_thai = :trang_thai 
                    WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            // Liên kết các giá trị với các placeholder trong câu lệnh SQL
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_danh_muc_banner', $ten_danh_muc_banner);
            $stmt->bindParam(':link_hinh_anh', $link_hinh_anh);

            $stmt->bindParam(':ngay_tao', $ngay_tao);

            $stmt->bindParam(':trang_thai', $trang_thai);


            // Thực hiện câu lệnh
            $stmt->execute();

            // Trả về true để xác nhận cập nhật thành công
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function getDetailBanNer($id)
    {
        try {
            $sql = 'SELECT  *
            FROM danh_muc_banners
            
            WHERE id = :id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    //Hủy kết nối csdl
    public function __destruct()
    { {
            $this->conn = null;
        }
    }
}
