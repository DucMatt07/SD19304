<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Thêm người dùng | Quản lý Tài Khoản</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <?php require_once "views/layouts/libs_css.php"; ?>
</head>

<body>

    <div id="layout-wrapper">

        <?php
        require_once "views/layouts/header.php";
        require_once "views/layouts/siderbar.php";
        ?>

        <div class="vertical-overlay"></div>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý Tài Khoản</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Thêm Người Dùng</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Thêm Người Dùng</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=handle-create-user" method="post" enctype="multipart/form-data">
                                                <div class="row g-3">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" name="ten_nguoi_dung" placeholder="Tên người dùng" required>
                                                            <label for="ten_nguoi_dung">Tên người dùng</label>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['Error']['ten_nguoi_dung']) ? $_SESSION['Error']['ten_nguoi_dung'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                                                            <label for="email">Email</label>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['Error']['email']) ? $_SESSION['Error']['email'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="sdt" class="form-label">Số điện thoại</label>
                                                            <input type="text" class="form-control" id="sdt" name="sdt" value="<?= isset($user['sdt']) ? $user['sdt'] : '' ?>" />
                                                        </div>



                                                    </div>
                                                    <div class="col-lg-6">

                                                        <div class="mb-3">
                                                            <label for="dia_chi" class="form-label">Địa chỉ</label>
                                                            <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="<?= isset($user['dia_chi']) ? $user['dia_chi'] : '' ?>" />
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control" name="mat_khau" placeholder="Mật khẩu" required>
                                                            <label for="mat_khau">Mật khẩu</label>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['Error']['mat_khau']) ? $_SESSION['Error']['mat_khau'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="date" class="form-control" name="ngay_sinh" required>
                                                            <label for="ngay_sinh">Ngày sinh</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <select class="form-control" name="gioi_tinh" required>
                                                                <option value="Nam">Nam</option>
                                                                <option value="Nữ">Nữ</option>
                                                            </select>
                                                            <label for="gioi_tinh">Giới tính</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <select class="form-control" name="trang_thai" required>
                                                                <option value="1">Hoạt động</option>
                                                                <option value="2">Khóa</option>
                                                            </select>
                                                            <label for="trang_thai">Trạng thái</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <select class="form-control" name="vai_tro" required>
                                                                <option value="1">Admin</option>
                                                            </select>
                                                            <label for="vai_tro">Vai trò</label>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="file" class="form-control" name="avatar">
                                                            <label for="avatar">Avatar</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="text-end">
                                                            <button type="reset" class="btn btn-secondary">Nhập lại</button>
                                                            <button type="submit" class="btn btn-primary">Tạo người dùng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php require_once "views/layouts/libs_js.php"; ?>
</body>

</html>