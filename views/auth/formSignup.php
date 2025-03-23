<?php require_once './views/layouts/header.php'; ?>
<?php require_once './views/layouts/menu.php'; ?>

<head>
    <!-- Thêm link Font Awesome vào trang của bạn -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<main><br><br><br><br><br>
    <div class="mb-4 pb-4"></div>
    <section class="login-register container">
        <h2 class="d-none">Đăng ký </h2>
        <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login" role="tab" aria-controls="tab-item-login" aria-selected="true">Đăng ký</a>
            </li>
        </ul>

        <form action="<?= BASE_URL . '?act=check-signup' ?>" method="POST" name="register-form" class="needs-validation" novalidate="">
            <div class="form-floating mb-3">
                <input name="ten_nguoi_dung" type="text" class="form-control form-control_gray" id="customerNameRegisterInput" placeholder="Username" required="">
                <label for="customerNameRegisterInput">Username</label>
                <?php if (!empty($_SESSION['Error']['ten_nguoi_dung'])): ?>
                    <div class="text-danger"><?= $_SESSION['Error']['ten_nguoi_dung'] ?></div>
                <?php endif; ?>
            </div>

            <div class="pb-3"></div>

            <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control form-control_gray" id="customerEmailRegisterInput" placeholder="Email address *" required="">
                <label for="customerEmailRegisterInput">Email address *</label>
                <?php if (!empty($_SESSION['Error']['email'])): ?>
                    <div class="text-danger"><?= $_SESSION['Error']['email'] ?></div>
                <?php endif; ?>
            </div>

            <div class="pb-3"></div>

            <div class="form-floating mb-3">
                <input name="mat_khau" type="password" class="form-control form-control_gray" id="customerPasswodRegisterInput" placeholder="Password *" required="" minlength="6">
                <label for="customerPasswodRegisterInput">Password *</label>
                <span toggle="#customerPasswodRegisterInput" class="fa fa-eye field-icon toggle-password"></span>
                <?php if (!empty($_SESSION['Error']['mat_khau'])): ?>
                    <div class="text-danger"><?= $_SESSION['Error']['mat_khau'] ?></div>
                <?php endif; ?>
            </div>

            <div class="form-floating mb-3">
                <input name="confirm_mat_khau" type="password" class="form-control form-control_gray" id="customerConfirmPasswordRegisterInput" placeholder="Confirm Password *" required="" minlength="6">
                <label for="customerConfirmPasswordRegisterInput">Confirm Password *</label>
                <span toggle="#customerConfirmPasswordRegisterInput" class="fa fa-eye field-icon toggle-password"></span>
                <?php if (!empty($_SESSION['Error']['confirm_mat_khau'])): ?>
                    <div class="text-danger"><?= $_SESSION['Error']['confirm_mat_khau'] ?></div>
                <?php endif; ?>
            </div>

            <div class="d-flex align-items-center mb-3 pb-2">
                <p class="m-0">Dữ liệu cá nhân của bạn sẽ được sử dụng để hỗ trợ trải nghiệm của bạn trên toàn bộ trang web này, để quản lý quyền truy cập vào tài khoản của bạn và cho các mục đích khác được mô tả trong chính sách bảo mật của chúng tôi.</p>
            </div>

            <button class="btn btn-primary w-100 text-uppercase" type="submit">Đăng ký</button>
        </form>
    </section>
</main>

<?php require_once './views/layouts/footer.php'; ?>

<!-- Thêm phần JavaScript -->
<script>
    // JavaScript to toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(item => {
        item.addEventListener('click', function() {
            let input = document.querySelector(this.getAttribute('toggle'));
            if (input.type === 'password') {
                input.type = 'text';
                this.classList.add('fa-eye-slash');
                this.classList.remove('fa-eye');
            } else {
                input.type = 'password';
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    });
</script>
<style>
    .field-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 15px;
        /* Điều chỉnh kích thước của biểu tượng */
    }
</style>