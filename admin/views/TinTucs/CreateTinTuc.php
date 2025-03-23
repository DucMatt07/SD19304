<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Thêm tin tức | Adadis Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />


    <?php
    require_once "views/layouts/libs_css.php";
    ?>
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
                                <h4 class="mb-sm-0">Quản lý Tin Tức</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Thêm Tin Tức</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Thêm Tin Tức</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=them-tin-tuc" method="post" enctype="multipart/form-data">
                                                <div class="row g-3">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" name="tieu_de" required>
                                                            <label for="tieu_de">Tiêu đề</label>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['Error']['tieu_de']) ? $_SESSION['Error']['tieu_de'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="date" class="form-control" name="ngay_xuat_ban" required>
                                                            <label for="ngay_xuat_ban">Ngày xuất bản</label>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['Error']['ngay_xuat_ban']) ? $_SESSION['Error']['ngay_xuat_ban'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="form-floating">
                                                            <input type="file" class="form-control" name="hinh_anh" required>
                                                            <label for="hinh_anh">Hình ảnh</label>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Trạng thái</label>
                                                            <select name="trang_thai" id="ForminputState" class="form-select">
                                                                <option selected disabled>Chọn trạng thái</option>
                                                                <option value="1">Đăng </option>
                                                                <option value="2">Không đăng</option>
                                                            </select>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION["Error"]['trang_thai']) ? $_SESSION["Error"]['trang_thai'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Nội dung</label>
                                                            <textarea name="noi_dung" id="editor" class="ckeditor-classic"></textarea>
                                                            <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
                                                            <script>
                                                                // Khởi tạo CKEditor cho textarea
                                                                ClassicEditor
                                                                    .create(document.querySelector('#editor'))
                                                                    .catch(error => {
                                                                        console.error(error);
                                                                    });
                                                            </script>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['Error']['noi_dung']) ? $_SESSION['Error']['noi_dung'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-primary">Thêm</button>
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
    <?php
    require_once "views/layouts/libs_js.php";
    ?>
</body>

</html>