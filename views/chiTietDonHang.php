<?php require_once './views/layouts/header.php'; ?>
<?php require_once './views/layouts/menu.php'; ?>
<?php
$totalAmount = $donHang['tong_tien']; // Tổng tiền

// Tính thành tiền
?>
<div class="container mt-4 p-3 border">
  <div class="row">
    <!-- Cột thông tin người nhận và đơn hàng -->
    <div class="col-md-6">
      <h5 class="text-primary">Thông tin người nhận và đơn hàng</h5>
      <form>
        <!-- Thông tin người nhận -->
        <div class="mb-3">
          <label for="name" class="form-label">Họ tên người nhận hàng</label>
          <input type="text" class="form-control" id="name" value="<?= $donHang['ten_nguoi_nhan'] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" value="<?= $donHang['email_nguoi_nhan'] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Địa chỉ nhận hàng</label>
          <input type="text" class="form-control" id="address" value="<?= $donHang['dia_chi_giao_hang'] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Số điện thoại</label>
          <input type="tel" class="form-control" id="phone" value="<?= $donHang['sdt_nguoi_nhan'] ?>" readonly>
        </div>


        <!-- Thông tin đơn hàng -->
        <div class="mb-3">
          <label for="orderId" class="form-label">Mã đơn hàng</label>
          <input type="text" class="form-control" id="orderId" value="<?= $donHang['ma_don_hang'] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Ngày đặt</label>
          <input type="text" class="form-control" value="<?= $donHang['ngay_dat_hang'] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="paymentStatus" class="form-label">Phương thức thanh toán</label>
          <input type="text" class="form-control" id="paymentStatus" value="<?= $pTTT[$donHang['phuong_thuc_thanh_toan_id']] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="orderStatus" class="form-label">Trạng thái đơn hàng</label>
          <input type="text" class="form-control" id="orderStatus" value="<?= $trangThaiDonHang[$donHang['trang_thai_don_hang']] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="totalAmount" class="form-label">Tổng tiền</label>
          <input type="text" class="form-control" id="totalAmount" value="<?= number_format($totalAmount, 0, ',', '.') . " VND" ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="note" class="form-label">Ghi chú</label>
          <textarea class="form-control" id="note" rows="3" readonly><?= htmlspecialchars($donHang['ghi_chu']) ?></textarea>
        </div>
      </form>
    </div>

    <!-- Cột thông tin sản phẩm -->
    <div class="col-md-6">
      <h5 class="text-primary">Thông tin sản phẩm</h5> <br>
      <table class="table table-border">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>

            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $tongTienHoaDon = 0; // Biến để tính tổng hóa đơn
          $stt = 1; // Biến để đánh số thứ tự

          foreach ($chiTietDonHang as $key => $item) {
            // Tính tổng tiền của sản phẩm
            $tongTienSanPham = $item['so_luong'] * $item['don_gia'];
            // Cộng dồn vào tổng hóa đơn
            $tongTienHoaDon += $tongTienSanPham;
          ?>
            <tr>
              <td><?= $stt++ ?></td> <!-- Số thứ tự -->

              <td><?= $item['ten_san_pham'] ?></td>
              <td>
                <img style="width: 300px;" src="<?= $item['hinh_anh'] ?>" alt="">
              </td>
              <td><?= $item['so_luong'] ?></td>
              <td><?= number_format($item['don_gia'], 0, ',', '.') ?> đ</td>
              <td><?= number_format($tongTienSanPham, 0, ',', '.') ?> đ</td>
            </tr>
          <?php }; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<br><br><br>
<?php require_once './views/layouts/footer.php'; ?>
