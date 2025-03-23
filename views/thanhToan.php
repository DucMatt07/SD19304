<?php require_once './views/layouts/header.php'; ?>

<?php require_once './views/layouts/menu.php'; ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<br><br><br><br>
<main style="padding-top: 60px;">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
        <div class="checkout-steps">
            <a href="./shop_cart.html" class="checkout-steps__item active">
                <span class="checkout-steps__item-number">01</span>
                <span class="checkout-steps__item-title">
                    <span>Giỏ hàng</span>
                </span>
            </a>
            <a href="./shop_checkout.html" class="checkout-steps__item active">
                <span class="checkout-steps__item-number">02</span>
                <span class="checkout-steps__item-title">
                    <span>Thanh toán và vận chuyển</span>
                </span>
            </a>
            <a href="./shop_order_complete.html" class="checkout-steps__item">
                <span class="checkout-steps__item-number">03</span>
                <span class="checkout-steps__item-title">
                    <span>Confirmation</span>
                </span>
            </a>
        </div>

        <form name="checkout-form" action="?act=xu-ly-thanh-toan" method="POST">
            <div class="checkout-form">
                <div class="billing-info__wrapper">
                    <h4>Thông tin đặt hàng</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" name="ten_nguoi_nhan" placeholder="Company Name (optional)" value="<?= $user['ten_nguoi_dung'] ?>">
                                <label for="ten_nguoi_nhan">Tên người nhận</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" name="sdt_nguoi_nhan" placeholder="Số điện thoại" value="<?= $user['sdt'] ?>">
                                <label for="sdt_nguoi_nhan">Số điện thoại</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating my-3">
                                <input type="email" class="form-control" name="email_nguoi_nhan" placeholder="Email" value="<?= $user['email'] ?>">
                                <label for="email_nguoi_nhan">Email</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" name="dia_chi_giao_hang" placeholder="Địa chỉ" value="<?= $user['dia_chi'] ?>">
                                <label for="dia_chi_giao_hang">Địa chỉ</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="mt-3">
                            <textarea class="form-control form-control_gray" placeholder="Ghi chú" cols="30" rows="8" name="ghi_chu"></textarea>
                        </div>
                    </div>
                </div>
                <div class="checkout__totals-wrapper">
                    <div class="sticky-content">
                        <div class="checkout__totals">
                            <h3>Đơn hàng của bạn</h3>
                            <table class="checkout-cart-items">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $tongSP = 0;
                                    foreach ($chiTietGioHang as $key => $sanPham) { ?>

                                        <tr>
                                            <td>
                                                <?= $sanPham['ten_san_pham'] ?> <strong>x<?= $sanPham['so_luong'] ?></strong>
                                            </td>
                                            <td>
                                            <img src="<?=$sanPham['hinh_anh']?>" alt="" width="100px">

                                            </td>

                                            <td>
                                                <?php
                                                $tongtien = 0;
                                                if ($sanPham['gia_khuyen_mai']) {
                                                    $tongtien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                                } else {
                                                    $tongtien = $sanPham['gia_ban'] * $sanPham['so_luong'];
                                                }

                                                echo number_format($tongtien, 0, ',', '.') . ' đ';
                                                ?>
                                                <?php $tongSP += $tongtien; ?>


                                            </td>
                                        </tr>


                                    <?php } ?>



                                </tbody>
                            </table>
                            <table class="checkout-totals">
                                <tbody>
                                    <tr>
                                        <th>Thành tiền</th>
                                        <td><?= number_format($tongSP, 0, ',', '.') ?>đ</td>
                                    </tr>
                                    <tr>
                                        <th>Vận chuyển</th>
                                        <td>50.000đ</td>
                                    </tr>
                                    <tr>
                                        <th>Tổng tiền</th>
                                        <input type="hidden" name="tong_tien" value="<?= ($tongSP + 50000) ?>">
                                        <td><?= number_format($tongSP + 50000, 0, ',', '.') ?>đ</td>
                                    </tr>
                                    <tr>

                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input form-check-input_fill" type="radio" value='1' name="phuong_thuc_thanh_toan_id" id="checkout_payment_method_3">
                                <label class="form-check-label ms-2 d-flex align-items-center" for="checkout_payment_method_3">
                                    <i class="fas fa-truck ms-2 me-2"></i> <!-- Biểu tượng giao hàng COD -->
                                    Thanh toán khi nhận hàng
                                </label>
                            </div>

                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input form-check-input_fill" type="radio" value="2" name="phuong_thuc_thanh_toan_id" id="checkout_payment_method_4" onclick="togglePaymentImages()">
                                <label class="form-check-label ms-2 d-flex align-items-center" for="checkout_payment_method_4">
                                    <i class="fab fa-paypal ms-2 me-2"></i> <!-- Biểu tượng PayPal -->
                                    Thanh toán online
                                </label>
                            </div>

                            <div id="paymentImages" style="display: none; margin-left: 30px;">
                                <img src="./assets/images/visa.png" alt="Visa" style="width: 50px; margin-right: 10px;">
                                <img src="./assets/images/paypal.png" alt="PayPal" style="width: 50px; margin-right: 10px;">
                                <img src="./assets/images/momo.png" alt="MoMo" style="width: 50px; margin-right: 10px;">
                            </div>



                        </div>
                        <button class="btn btn-primary" id="placeOrderBtn" style="margin-left: 128px;">Đặt hàng</button>
<div id="loadingOverlay" style="display: none;">
    <div class="spinner"></div>
    <p>Đang xử lý, vui lòng đợi...</p>
</div>

                    </div>
                </div>
            </div>



            </div>

            </div>

            </div>

        </form>

    </section>
</main>

<script>
    function togglePaymentImages() {
        const paymentImages = document.getElementById("paymentImages");
        paymentImages.style.display = "block"; // Hiển thị ảnh các phương thức online
    }
</script>
<?php require_once './views/layouts/footer.php'; ?>
<style>
    #paymentImages img {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;
        transition: transform 0.3s ease;
    }

    #paymentImages img:hover {
        transform: scale(1.1);
        /* Phóng to nhẹ khi hover */
    }
</style>
<style>
    /* Overlay cho hiệu ứng loading */
    #loadingOverlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        color: #fff;
        font-size: 1.5rem;
        flex-direction: column;
    }

    /* Spinner */
    .spinner {
        border: 6px solid rgba(255, 255, 255, 0.3);
        border-top: 6px solid #fff;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
        margin-bottom: 10px;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>
<script>
document.getElementById('placeOrderBtn').addEventListener('click', function (e) {
    e.preventDefault(); // Ngăn form gửi ngay lập tức

    // Kiểm tra xem phương thức thanh toán đã được chọn chưa
    const paymentMethods = document.querySelectorAll('input[name="phuong_thuc_thanh_toan_id"]');
    let paymentSelected = false;

    paymentMethods.forEach(method => {
        if (method.checked) {
            paymentSelected = true;
        }
    });

    if (!paymentSelected) {
        alert('Vui lòng chọn phương thức thanh toán!');
        return; // Dừng nếu không có phương thức thanh toán nào được chọn
    }

    // Hiển thị overlay loading
    const loadingOverlay = document.getElementById('loadingOverlay');
    loadingOverlay.style.display = 'flex';

    // Gửi form sau thời gian chờ (hoặc ngay lập tức nếu không cần chờ)
    setTimeout(() => {
        // Gửi form
        document.forms['checkout-form'].submit();
        alert('Đặt hàng thành công.')
    }, 3000); // Giả lập 3 giây xử lý
});


</script>
