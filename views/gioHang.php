<?php require_once './views/layouts/header.php'; ?>

<?php require_once './views/layouts/menu.php'; ?>
<main><br><br><br><br>
  <div class="mb-4 pb-4"></div>
  <section class="shop-checkout container">
    <div class="checkout-steps">
      <a href="<?= '?act=gio-hang' ?>" class="checkout-steps__item active">
        <span class="checkout-steps__item-number">01</span>
        <span class="checkout-steps__item-title">
          <span>Giỏ hàng</span>
          <em></em>
        </span>
      </a>
      <a href="shop_checkout.html" class="checkout-steps__item">
        <span class="checkout-steps__item-number">02</span>
        <span class="checkout-steps__item-title">
          <span>Thanh toán và vận chuyển</span>
        </span>
      </a>
      <a href="shop_order_complete.html" class="checkout-steps__item">
        <span class="checkout-steps__item-number">03</span>
        <span class="checkout-steps__item-title">
          <span>Confirmation</span>
        </span>
      </a>
    </div>

    <form action="?act=thanh-toan" method="POST">
      <div class="shopping-cart mb-5">
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
              <tr>
                <th>Ảnh sản phẩm</th>
                <th></th>
                <th>Giá tiền</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tongGioHang = 0;
              foreach ($chiTietGioHang as $sanPham) :
              ?>
                <tr>
                  <td>
                    <div class="shopping-cart__product-item">
                      <a href="<?= "?act=chi-tiet-san-pham&id_san_pham=" . $sanPham['san_pham_id'] ?>">
                        <img loading="lazy" src="<?= $sanPham['hinh_anh'] ?>" width="100" height="110" alt="" class="pc__img">
                      </a>
                    </div>
                  </td>
                  <td>
                    <div class="shopping-cart__product-item__detail">
                      <h4><a href=""><?= $sanPham['ten_san_pham'] ?></a></h4>
                    </div>
                  </td>
                  <td>
                    <span class="shopping-cart__product-price">
                      <?php if ($sanPham['gia_khuyen_mai']) { ?>
                        <span style="color: red;"> <?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?>đ</span><br>
                        <span><del><?= number_format($sanPham['gia_ban'], 0, ',', '.') ?>đ</del></span>
                      <?php } else { ?>
                        <span> <?= number_format($sanPham['gia_ban'], 0, ',', '.') ?>đ</span>
                      <?php } ?>
                    </span>
                  </td>
                  <td>
                    <div class="qty-control position-relative">
                      <input type="number" name="so_luong[<?= $sanPham['san_pham_id'] ?>]" class="qty-control__number text-center" value="<?= $sanPham['so_luong'] ?>" min="1" data-gia="<?= $sanPham['gia_khuyen_mai'] ?? $sanPham['gia_ban'] ?>" data-san-pham-id="<?= $sanPham['san_pham_id'] ?>" oninput="updateProductPrice(this)">
                      <div class="qty-control__reduce">-</div>
                      <div class="qty-control__increase">+</div>
                    </div>
                  </td>
                  <td>
                    <span class="shopping-cart__subtotal total-price" id="subtotal-<?= $sanPham['san_pham_id'] ?>">
                      <?php
                      $tongtien = 0;
                      if ($sanPham['gia_khuyen_mai']) {
                        $tongtien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                      } else {
                        $tongtien = $sanPham['gia_ban'] * $sanPham['so_luong'];
                      }
                      $tongGioHang += $tongtien;
                      echo number_format($tongtien, 0, ',', '.') . ' đ';
                      ?>
                    </span>
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger" onclick="deleteProduct(<?= $sanPham['san_pham_id'] ?>)"><i class="bi bi-trash3-fill"></i></button>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <div class="shopping-cart__totals-wrapper">
          <div class="sticky-content">
            <div class="shopping-cart__totals">
              <h3>Tổng tiền giỏ hàng</h3>
              <input type="hidden" name="tong_gio_hang" value="<?= $tongGioHang ?>">
              <table class="cart-totals">
                <tbody>
                  <tr>
                    <th>Tổng tiền sản phẩm</th>
                    <td id="total-amount"><?php echo number_format($tongGioHang, 0, ',', '.') ?> đ</td>
                  </tr>
                  <tr>
                    <th>Vận chuyển</th>
                    <td>
                      <label id="shipping-cost" class="form-check-label mb-2" for="free_shipping">
                        <?php $phiship = 50000;
                        if ($tongGioHang > 0) {
                          echo number_format($phiship, 0, ',', '.') . ' đ';
                        } else {
                          echo "0 đ";
                        }
                        ?>
                      </label>
                    </td>
                  </tr>
                  <tr>
                    <th>Tổng thanh toán</th>
                    <td class="grand-total"><?php $phiship = 50000;
                                            if ($tongGioHang > 0) {
                                              echo number_format($tongGioHang + $phiship, 0, ',', '.') . ' đ';
                                            } else {
                                              echo "0 đ";
                                            }
                                            ?> </td>
                  </tr>
                </tbody>
              </table>

            </div>
            <div class="mobile_fixed-btn_wrapper">
              <div class="button-wrapper container">
                <?php if ($tongGioHang > 0) : ?>
                  <button type="submit" class="btn btn-primary btn-checkout">Bắt đầu thanh toán</button>
                <?php else : ?>
                  <button class="btn btn-primary btn-checkout" disabled>Không có sản phẩm trong giỏ hàng</button>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </form>




  </section>

  <style>
    .shopping-cart__product-item img {
      width: 150px;
      /* Chiều rộng ảnh */
      height: 150px;
      /* Chiều cao ảnh */
      object-fit: cover;
      /* Cắt hoặc co dãn ảnh để vừa với khung */
      display: block;
      /* Đảm bảo ảnh không ảnh hưởng đến các phần tử khác */
      margin: 0 auto;
      /* Căn giữa ảnh trong phần tử cha */
    }

    .shopping-cart__product-item {
      display: flex;
      justify-content: center;
      /* Căn giữa nội dung theo chiều ngang */
      align-items: center;
      /* Căn giữa nội dung theo chiều dọc */
      text-align: center;
      /* Đảm bảo nội dung văn bản căn giữa nếu có */
      height: 110px;
      /* Chiều cao của dòng để ảnh luôn vừa khung */
    }
  </style>
</main>

<script>
  function handleDelete(productId) {
    // Xác nhận người dùng có muốn xóa sản phẩm không
    if (confirm('Bạn chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
      // Nếu đồng ý, tìm form và submit nó
      const form = document.getElementById('deleteForm-' + productId);
      form.submit();
    }
  }
  document.addEventListener('DOMContentLoaded', function() {
    // Hàm tính tổng tiền cho từng sản phẩm
    function updateProductPrice(inputElement) {
      const quantity = parseInt(inputElement.value); // Số lượng sản phẩm
      const price = parseInt(inputElement.getAttribute('data-gia')); // Giá sản phẩm
      const productId = inputElement.getAttribute('data-san-pham-id'); // ID sản phẩm

      // Tính tổng tiền cho sản phẩm
      const subtotal = quantity * price;
      document.getElementById('subtotal-' + productId).innerText = new Intl.NumberFormat('vi-VN').format(subtotal) + ' đ';

      // Cập nhật tổng tiền sản phẩm
      let total = 0;
      document.querySelectorAll('.total-price').forEach(function(subtotalElement) {
        total += parseInt(subtotalElement.innerText.replace(/[^\d]/g, '')); // Loại bỏ ký tự không phải số và tính tổng
      });

      // Cập nhật tổng tiền giỏ hàng (bao gồm phí vận chuyển)
      const shippingCost = 50000; // Phí vận chuyển
      const grandTotal = total + shippingCost;

      // Cập nhật tổng tiền giỏ hàng
      const grandTotalElement = document.querySelector('.grand-total');
      grandTotalElement.innerText = new Intl.NumberFormat('vi-VN').format(grandTotal) + ' đ';

      // Cập nhật tổng tiền sản phẩm
      const totalAmountElement = document.getElementById('total-amount');
      totalAmountElement.innerText = new Intl.NumberFormat('vi-VN').format(total) + ' đ';
    }

    // Lắng nghe sự kiện thay đổi số lượng cho mỗi sản phẩm
    const qtyInputs = document.querySelectorAll('.qty-control__number');
    qtyInputs.forEach(function(input) {
      input.addEventListener('input', function() {
        setTimeout(function() {
          console.log('Giá trị sau khi thay đổi: ' + input.value); // Giá trị sau khi thay đổi
          updateProductPrice(input); // Cập nhật lại giá sản phẩm khi thay đổi số lượng
        }, 0);
      });
    });

    // Lắng nghe sự kiện cho nút tăng số lượng
    const increaseBtns = document.querySelectorAll('.qty-control__increase');
    increaseBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
        const input = btn.closest('.qty-control').querySelector('.qty-control__number');
        const prevValue = input.value; // Lưu giá trị trước khi thay đổi
        input.value = parseInt(input.value) + 0; // Tăng số lượng lên 1

        // Sử dụng setTimeout để ghi lại giá trị sau khi thay đổi
        setTimeout(function() {
          console.log('Giá trị trước khi thay đổi: ' + prevValue); // Giá trị trước khi thay đổi
          console.log('Giá trị sau khi thay đổi: ' + input.value); // Giá trị sau khi thay đổi
          updateProductPrice(input); // Cập nhật giá sản phẩm sau khi thay đổi
        }, 0);
      });
    });

    // Lắng nghe sự kiện cho nút giảm số lượng
    const reduceBtns = document.querySelectorAll('.qty-control__reduce');
    reduceBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
        const input = btn.closest('.qty-control').querySelector('.qty-control__number');
        const prevValue = input.value; // Lưu giá trị trước khi thay đổi
        if (parseInt(input.value) > 1) {
          input.value = parseInt(input.value) - 0; // Giảm số lượng đi 1
        }

        // Sử dụng setTimeout để ghi lại giá trị sau khi thay đổi
        setTimeout(function() {
          console.log('Giá trị trước khi thay đổi: ' + prevValue); // Giá trị trước khi thay đổi
          console.log('Giá trị sau khi thay đổi: ' + input.value); // Giá trị sau khi thay đổi
          updateProductPrice(input); // Cập nhật giá sản phẩm sau khi thay đổi
        }, 0);
      });
    });
  });
</script>
<script>
  function deleteProduct(productId) {
    if (confirm('Bạn chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
      // Gửi yêu cầu xóa sản phẩm bằng AJAX
      fetch('?act=xoa-san-pham-gio-hang', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: `san_pham_id=${productId}`
        })
        .then(response => response.text())
        .then(data => {
          // Xử lý kết quả trả về từ server
          if (data.includes('success')) {
            alert('Xóa sản phẩm thành công!');
            location.reload(); // Tải lại trang để cập nhật
          } else {
            alert('Không thể xóa sản phẩm, vui lòng thử lại!');
          }
        })
        .catch(error => console.error('Lỗi:', error));
    }
  }
</script>
<?php require_once './views/layouts/cart.php'; ?>
<?php require_once './views/layouts/footer.php'; ?>
