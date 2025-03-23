<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Cập nhật tin tức | Adadis News</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="News Update Page" name="description" />
    <meta content="Adadis" name="author" />

    
    <?php require_once "views/layouts/libs_css.php"; ?>
</head>

<body>

   
    <div id="layout-wrapper">

      
        <?php
        require_once "views/layouts/header.php";
        require_once "views/layouts/siderbar.php";
        ?>

        >
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
                                        <li class="breadcrumb-item active">Cập nhật Tin Tức</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Cập nhật Tin Tức</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=cap-nhat" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="tin_tuc_id" value="<?= isset($tinTuc['tin_tuc_id']) ? $tinTuc['tin_tuc_id'] : ''; ?>">

                                                <div class="row g-3">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" name="tieu_de" value="<?= isset($tinTuc['tieu_de']) ? htmlspecialchars($tinTuc['tieu_de']) : ''; ?>" required>
                                                            <label for="tieu_de">Tiêu đề</label>
                                                            <span class="text-danger"><?= !empty($_SESSION['Error']['tieu_de']) ? $_SESSION['Error']['tieu_de'] : ''; ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-floating">
                                                            <textarea class="form-control" name="noi_dung" style="height: 200px" required><?= isset($tinTuc['noi_dung']) ? htmlspecialchars($tinTuc['noi_dung']) : ''; ?></textarea>
                                                            <label for="noi_dung">Nội dung chi tiết</label>
                                                            <span class="text-danger"><?= !empty($_SESSION['Error']['noi_dung']) ? $_SESSION['Error']['noi_dung'] : ''; ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="date" class="form-control" name="ngay_xuat_ban" value="<?= isset($tinTuc['ngay_xuat_ban']) ? $tinTuc['ngay_xuat_ban'] : ''; ?>" required>
                                                            <label for="ngay_xuat_ban">Ngày xuất bản</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="hinh_anh">Hình ảnh hiện tại</label><br>
                                                            <img src="<?= isset($tinTuc['hinh_anh']) ? $tinTuc['hinh_anh'] : ''; ?>" width="100" alt="Ảnh tin tức">
                                                            <input type="hidden" name="hinh_anh_cu" value="<?= isset($tinTuc['hinh_anh']) ? $tinTuc['hinh_anh'] : ''; ?>">
                                                            <label for="hinh_anh">Hình ảnh mới (nếu có)</label>
                                                            <input type="file" class="form-control-file" name="hinh_anh">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Trạng thái</label>
                                                            <select name="trang_thai" id="ForminputState" class="form-select" value="<?= $tinTuc['trang_thai'] ?>">
                                                                <option selected disabled>Chọn trạng thái</option>
                                                                <option value="1" <?= $tinTuc['trang_thai'] == 1 ? 'selected' : '' ?>>Đăng</option>
                                                                <option value="2" <?= $tinTuc['trang_thai'] == 2 ? 'selected' : '' ?>>Không đăng</option>
                                                            </select>
                                                           
                                                        </div>

                                                    <div class="col-lg-12 text-end">
                                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
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
                            </script>  © Velzon.

                        </div>
                        
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Back to Top -->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    <!-- Javascript Libraries -->
    <?php require_once "views/layouts/libs_js.php"; ?>

</body>
</html>
