<?php require_once './views/layouts/header.php'; ?>

<?php require_once './views/layouts/menu.php'; ?>

<div class="container rounded bg-white mt-5 mb-5">

    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <img class="rounded-circle mt-5" width="150px" src="<?= BASE_URL . htmlspecialchars($user['avatar']) ?? '' ?>" alt="Avatar">

                <span class="font-weight-bold"><?= htmlspecialchars($user['ten_nguoi_dung']) ?></span>
                <span class="text-black-50"><?= htmlspecialchars($user['email']) ?></span>
            </div>
        </div>
        <div class="col-md-9 border-right">
            <div class="p-3 py-5">
                <h4 class="text-right">Thông tin tài khoản</h4>
                <form action="?act=update-profile" method="POST" enctype="multipart/form-data">

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Họ và Tên</label>
                            <input type="text" class="form-control" name="ten_nguoi_dung" value="<?= htmlspecialchars($user['ten_nguoi_dung']) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Số điện thoại</label>
                            <input type="text" class="form-control" name="sdt" value="<?= ($user['sdt']) ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Địa chỉ</label>
                            <input type="text" class="form-control" name="dia_chi" value="<?= ($user['dia_chi']) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Ngày sinh</label>
                            <input type="date" class="form-control" name="ngay_sinh" value="<?= htmlspecialchars($user['ngay_sinh']) ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Giới tính</label>
                            <input type="text" class="form-control" name="gioi_tinh" value="<?= htmlspecialchars($user['gioi_tinh']) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($user['email']) ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="avatar">Ảnh đại diện</label>
                            <input type="file" class="form-control" id="avatar" name="avatar">
                        </div>
                        <!-- Mật khẩu -->
                        
                    </div>


                    <script>
                        // Lấy phần tử ô input mật khẩu và checkbox
                        const passwordInput = document.getElementById('mat_khau');
                        const showPasswordCheckbox = document.getElementById('show-password');

                        // Khi checkbox thay đổi, thay đổi type của input
                        showPasswordCheckbox.addEventListener('change', function() {
                            if (this.checked) {
                                passwordInput.type = 'text'; // Hiển thị mật khẩu
                            } else {
                                passwordInput.type = 'password'; // Ẩn mật khẩu
                            }
                        });
                    </script>
                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['success'] ?>
                        </div>
                        <?php unset($_SESSION['success']); ?>
                    <?php elseif (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['error'] ?>
                        </div>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>

                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once './views/layouts/footer.php'; ?>
