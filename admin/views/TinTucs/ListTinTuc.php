<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Danh sách tin tức | Adadis News</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />


    <?php require_once "views/layouts/libs_css.php"; ?>
</head>

<body>
    <div id="layout-wrapper">

        <?php require_once "views/layouts/header.php"; ?>
        <?php require_once "views/layouts/siderbar.php"; ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Quản Lý Tin Tức</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Danh sách tin tức</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Danh sách tin tức</h4>
                                        <a href="?act=form-add-tin-tuc" class="btn btn-soft-success material-shadow-none">
                                            <i class="ri-add-circle-line align-middle me-1"></i> Thêm tin tức
                                        </a>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Tiêu đề</th>
                                                        <th scope="col">Nội dung</th>
                                                        <th scope="col">Hình ảnh</th>
                                                        <th scope="col">Ngày đăng</th>
                                                        <th scope="col">Trạng thái</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($tinTucs as $tin) : ?>
                                                        <tr>
                                                            <td class="fw-medium"><?= $tin['tin_tuc_id'] ?></td>
                                                            <td><?= $tin['tieu_de'] ?></td>
                                                            <td>
                                                                <?php
                                                                // Lấy nội dung
                                                                $noi_dung = $tin['noi_dung'];

                                                                // Giới hạn số từ
                                                                $maxWords = 10;
                                                                $words = explode(' ', $noi_dung); // Tách chuỗi thành mảng các từ

                                                                if (count($words) > $maxWords) {
                                                                    // Nếu số từ vượt quá giới hạn, lấy 20 từ đầu tiên và thêm "..."
                                                                    echo implode(' ', array_slice($words, 0, $maxWords)) . '...';
                                                                } else {
                                                                    // Nếu số từ nhỏ hơn hoặc bằng giới hạn, hiển thị toàn bộ nội dung
                                                                    echo $noi_dung;
                                                                }
                                                                ?>
                                                            </td>

                                                            <td>
                                                                <img src="<?= $tin['hinh_anh'] ?>" alt="Hình ảnh" style="width: 100px; height: auto;">

                                                            </td>
                                                            <td><?= $tin['ngay_xuat_ban'] ? date("d/m/Y", strtotime($tin['ngay_xuat_ban'])) : 'Chưa có dữ liệu' ?></td>
                                                            <td>
                                                                <span class="badge <?= $tin['trang_thai'] == 1 ? 'bg-success' : 'bg-danger' ?>">
                                                                    <?= $tin['trang_thai'] == 1 ? 'Đã đăng' : 'Chưa đăng' ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <a href="?act=form-update-tin-tuc&id=<?= $tin['tin_tuc_id'] ?>" class="link-success fs-15">
                                                                    <i class="ri-edit-2-line"></i>
                                                                </a>

                                                                <form method="POST" action="?act=xoa-tin-tuc" style="display:inline;" onsubmit="return confirm('Xác nhận xóa?')">
                                                                    <input type="hidden" name="id" value="<?= $tin['tin_tuc_id'] ?>">
                                                                    <button type="submit" class="link-danger fs-15" style="border: none; background: none;">
                                                                        <i class="ri-delete-bin-line"></i>
                                                                    </button>
                                                                </form>
                                                            </td>


                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
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
                            .
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Back-to-top button and preloader -->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    <!-- JAVASCRIPT -->
    <?php require_once "views/layouts/libs_js.php"; ?>
</body>

</html>