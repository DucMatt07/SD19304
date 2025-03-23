<?php require_once './views/layouts/header.php'; ?>

<?php require_once './views/layouts/menu.php'; ?>

<main><br><br><br><br><br>
  <div class="mb-4 pb-4"></div>
  <section class="login-register container">
    <h2 class="d-none">Đăng nhập </h2>
    <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login" role="tab" aria-controls="tab-item-login" aria-selected="true">Đăng nhập</a>
      </li>
    </ul>
    <div class="tab-content pt-2" id="login_register_tab_content">
      <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
        <?php if (isset($_SESSION['error'])): ?>
          <div class="alert alert-danger">
            <?php echo ($_SESSION['error']); ?>
          </div>
          <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <div class="login-form">
          <form action="<?= BASE_URL . '?act=check-login' ?>" method="post" name="login-form" class="needs-validation" novalidate>
            <div class="form-floating mb-3">
              <input name="email" type="email" class="form-control" id="customerNameEmailInput1" placeholder="Email" required>
              <label for="customerNameEmailInput1">Email</label>
            </div>

            <div class="pb-3"></div>

            <!-- Ô nhập mật khẩu với icon con mắt -->
            <div class="form-floating mb-3 position-relative">
              <input name="mat_khau" type="password" class="form-control" id="customerPasswodInput" placeholder="Mật khẩu" required>
              <label for="customerPasswodInput">Mật khẩu</label>
              <!-- Icon con mắt bên phải -->
              <i class="fa fa-eye position-absolute" id="togglePassword" style="top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;"></i>
            </div>

            <div class="d-flex align-items-center mb-3 pb-2">
              <a href="reset_password.html" class="btn-text ms-auto">Quên mật khẩu?</a>
            </div>
            <button class="btn btn-primary w-100 text-uppercase" type="submit">Đăng nhập</button>

            <div class="customer-option mt-4 text-center">
              <span class="text-secondary">Chưa có tài khoản?</span>
              <a href="?act=signup" class="btn-text js-show-register">Tạo tài khoản</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once './views/layouts/footer.php'; ?>

<!-- Thêm FontAwesome nếu chưa có -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script>
  // Lấy icon con mắt và input mật khẩu
  const togglePassword = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('customerPasswodInput');

  // Lắng nghe sự kiện click vào icon con mắt
  togglePassword.addEventListener('click', function () {
    // Kiểm tra xem mật khẩu đang ẩn hay hiển thị, sau đó thay đổi trạng thái
    const type = passwordInput.type === 'password' ? 'text' : 'password';
    passwordInput.type = type;

    // Thay đổi icon con mắt (mở hay đóng)
    this.classList.toggle('fa-eye-slash');
  });
</script>
