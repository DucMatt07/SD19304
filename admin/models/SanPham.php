<?php
class SanPham{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham()
    {
        try {
            $sql = 'SELECT san_phams.*, danh_muc_san_phams.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_muc_san_phams ON san_phams.danh_muc_id  = danh_muc_san_phams.id
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function insertSanPham(
        $ten_san_pham,
        $mo_ta_dai,
        $mo_ta_ngan,
        $gia_ban,
        $gia_nhap,
        $gia_khuyen_mai,
        $so_luong,
        $ngay_nhap,
        $danh_muc_id,
        $trang_thai,

        $hinh_anh
    ) {
        try {
            $sql = 'INSERT INTO san_phams(ten_san_pham,
    mo_ta_dai,
    mo_ta_ngan,
    gia_ban,
    gia_nhap,
    gia_khuyen_mai,
    so_luong,
    ngay_nhap,
    danh_muc_id,
    trang_thai,
    hinh_anh)
            VALUES (:ten_san_pham,
    :mo_ta_dai,
    :mo_ta_ngan,
    :gia_ban,
    :gia_nhap,
    :gia_khuyen_mai,
    :so_luong,
    :ngay_nhap,
    :danh_muc_id,
    :trang_thai,
    :hinh_anh)';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':mo_ta_dai' => $mo_ta_dai,
                ':mo_ta_ngan' => $mo_ta_ngan,
                ':gia_ban' => $gia_ban,
                ':gia_nhap' => $gia_nhap,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':hinh_anh' => $hinh_anh
            ]);
            //lấy id sản phẩm vừa thêm
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh)
    {
        try {

            $sql = 'INSERT INTO hinh_anh_san_phams(san_pham_id, link_hinh_anh)
            VALUES (:san_pham_id, :link_hinh_anh)';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':link_hinh_anh' => $link_hinh_anh
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function getListAnhSanPham($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function updateSanpham( $san_pham_id,
        $ten_san_pham,
        $mo_ta_dai,
        $mo_ta_ngan,
        $gia_ban,
        $gia_nhap,
        $gia_khuyen_mai,
        $so_luong,
        $ngay_nhap,
        $danh_muc_id,
        $trang_thai,

        $hinh_anh
    ) {
        try {
            $sql = 'UPDATE san_phams SET ten_san_pham = :ten_san_pham,
                     mo_ta_dai = :mo_ta_dai,
                     mo_ta_ngan = :mo_ta_ngan,
                     gia_ban = :gia_ban,
                     gia_nhap = :gia_nhap,
                     gia_khuyen_mai = :gia_khuyen_mai,
                     so_luong = :so_luong,
                     ngay_nhap = :ngay_nhap,
                     danh_muc_id = :danh_muc_id,
                     trang_thai = :trang_thai,
                     hinh_anh = :hinh_anh WHERE id =:id' ;

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':mo_ta_dai' => $mo_ta_dai,
                ':mo_ta_ngan' => $mo_ta_ngan,
                ':gia_ban' => $gia_ban,
                ':gia_nhap' => $gia_nhap,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':hinh_anh' => $hinh_anh,
                ':id' => $san_pham_id
            ]);
            //lấy id sản phẩm vừa thêm
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function getDetailAnhSanPham($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function updateAnhSanPham($id, $new_file)
    {

        try {

            $sql = 'UPDATE hinh_anh_san_phams
                 SET
                     link_hinh_anh = :new_file

                WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':new_file' => $new_file,
                ':id' => $id

            ]);

            //lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function destroyAnhSanPham($id)
    {
        try {
            $sql = 'DELETE FROM hinh_anh_san_phams WHERE id = :id';


            $stmt = $this->conn->prepare($sql);

            $stmt->execute([

                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }//shdbfhsdbjf
    public function getDetailSanPham($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_muc_san_phams.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_muc_san_phams ON san_phams.danh_muc_id  = danh_muc_san_phams.id
            WHERE san_phams.id = :id
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function destroySanPham($id)
    {
        try {
            $sql = 'DELETE FROM san_phams WHERE id = :id';


            $stmt = $this->conn->prepare($sql);

            $stmt->execute([

                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function getDetailBinhLuan($id)
    {
        try {
            $sql = 'SELECT * FROM binh_luans WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function getDetailDanhGia($id)
    {
        try {
            $sql = 'SELECT * FROM danh_gia_san_phams WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function updateTrangThaiBinhLuan($id, $trang_thai)
    {

        try {

            $sql = 'UPDATE binh_luans
                 SET
                     trang_thai = :trang_thai

                WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':trang_thai' => $trang_thai,
                ':id' => $id

            ]);

            //lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function updateTrangThaiDanhGia($id, $trang_thai)
    {

        try {

            $sql = 'UPDATE danh_gia_san_phams
                 SET
                     trang_thai = :trang_thai

                WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':trang_thai' => $trang_thai,
                ':id' => $id

            ]);

            //lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function getBinhLuanFromSanPham($id){
        try {
            $sql = 'SELECT binh_luans.*, nguoi_dungs.ten_nguoi_dung
            FROM binh_luans
            INNER JOIN nguoi_dungs ON binh_luans.tai_khoan_id = nguoi_dungs.id
            WHERE binh_luans.san_pham_id = :id
            ';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
            // var_dump($stmt);die();
            }catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
            }
    }
    public function getDanhGiaFromSanPham($id){
        try {
            $sql = 'SELECT danh_gia_san_phams.*, nguoi_dungs.ten_nguoi_dung
            FROM danh_gia_san_phams
            INNER JOIN nguoi_dungs ON danh_gia_san_phams.tai_khoan_id = nguoi_dungs.id
            WHERE danh_gia_san_phams.san_pham_id = :id
            ';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
            // var_dump($stmt);die();
            }catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
            }
    }
}
