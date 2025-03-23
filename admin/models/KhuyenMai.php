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
 public function postData($ten_khuyen_mai,  $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai)
 {
  try {
   $sql = 'INSERT INTO khuyen_mais(ten_khuyen_mai,  ma_khuyen_mai, gia_tri, ngay_bat_dau, ngay_ket_thuc,mo_ta, trang_thai)
            values (:ten_khuyen_mai, :ma_khuyen_mai,:gia_tri, :ngay_bat_dau, :ngay_ket_thuc, :mo_ta, :trang_thai ) ';

   $stmt = $this->conn->prepare($sql);
   // var_dump([':ten_khuyen_mai'=>$ten_khuyen_mai, ':mo_ta'=>$mo_ta, ':ma_khuyen_mai'=>$ma_khuyen_mai, ':gia_tri'=>$gia_tri, ':ngay_bat_dau'=>$ngay_bat_dau, ':ngay_ket_thuc'=>$ngay_ket_thuc, ':trang_thai'=>$trang_thai]);
   // die();
   $stmt->execute([
    ':ten_khuyen_mai' => $ten_khuyen_mai,
    ':ma_khuyen_mai' => $ma_khuyen_mai,
    ':gia_tri' => $gia_tri,
    ':ngay_bat_dau' => $ngay_bat_dau,
    ':ngay_ket_thuc' => $ngay_ket_thuc,
    ':mo_ta' => $mo_ta,
    ':trang_thai' => $trang_thai
   ]);

   return true;
  } catch (PDOException $e) {
   echo "Lỗi: " . $e->getMessage();
  }
 }
 //lấy thông tin chi tiết
 public function getDeltailData($id)
 {
  try {
   $sql = 'SELECT * FROM `khuyen_mais` WHERE id = :id';

   $stmt = $this->conn->prepare($sql);

   $stmt->execute([':id' => $id]);

   return $stmt->fetch();
  } catch (PDOException $e) {
   echo "Lỗi: " . $e->getMessage();
  }
 }
 public function updateData($id, $ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai)
 {
  try {
   $sql = 'UPDATE khuyen_mais SET ten_khuyen_mai=:ten_khuyen_mai,  ma_khuyen_mai = :ma_khuyen_mai, gia_tri=:gia_tri, ngay_bat_dau = :ngay_bat_dau, ngay_ket_thuc = :ngay_ket_thuc,mo_ta = :mo_ta, trang_thai =:trang_thai WHERE id = :id ';

   $stmt = $this->conn->prepare($sql);
   $stmt->execute([
    'id' => $id,
    ':ten_khuyen_mai' => $ten_khuyen_mai,
    ':ma_khuyen_mai' => $ma_khuyen_mai,
    ':gia_tri' => $gia_tri,
    ':ngay_bat_dau' => $ngay_bat_dau,
    ':ngay_ket_thuc' => $ngay_ket_thuc,
    ':mo_ta' => $mo_ta,
    ':trang_thai' => $trang_thai
   ]);

   return true;
  } catch (PDOException $e) {
   echo "Lỗi: " . $e->getMessage();
  }
 }
 //xóa dữ liệu
 public function deleteData($id)
 {
  try {
   $sql = 'DELETE from khuyen_mais WHERE id = :id';

   $stmt = $this->conn->prepare($sql);

   $stmt->execute([':id' => $id]);

   return true;
  } catch (PDOException $e) {
   echo "Lỗi: " . $e->getMessage();
  }
 }

 //Hủy kết nối csdl
 public function __destruct()
 {
  $this->conn = null;
 }
}
