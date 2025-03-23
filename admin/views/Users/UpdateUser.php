<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
 <meta charset="utf-8" />
 <title>Cập nhật người dùng | Quản lý Tài Khoản</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta content="Admin Dashboard Template" name="description" />
 <meta content="Themesbrand" name="author" />

 <!-- Include CSS libraries -->
 <?php require_once "views/layouts/libs_css.php"; ?>
</head>

<body>

 <div id="layout-wrapper">

  <?php
  require_once "views/layouts/header.php";  // Include header
  require_once "views/layouts/siderbar.php"; // Include sidebar
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
          <li class="breadcrumb-item active">Cập nhật Người Dùng</li>
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
          <h4 class="card-title mb-0 flex-grow-1">Cập nhật Người Dùng</h4>
         </div>
         <div class="card-body">
          <div class="live-preview">
           <!-- Update user form -->

           <form action="?act=handle-update-user" method="post" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?= $user['id'] ?>">

            <div class="row g-3">
             <!-- Nếu là admin -->
             <?php if ($user['vai_tro'] == 1) { ?>
              <div class="col-lg-6">
               <div class="form-floating">
                <input type="text" class="form-control" name="ten_nguoi_dung" value="<?= $user['ten_nguoi_dung'] ?>" placeholder="Tên người dùng" required>
                <label for="ten_nguoi_dung">Tên người dùng</label>
               </div>
              </div>
              <div class="col-lg-6">
               <div class="form-floating">
                <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" placeholder="Email" required>
                <label for="email">Email</label>
               </div>
              </div>

              <div class="col-lg-6">
               <div class="form-floating">
                <input type="file" class="form-control" name="avatar">
                <label for="avatar">Avatar</label>
               </div>
              </div>

              <input type="hidden" name="vai_tro" value="<?= $user['vai_tro'] ?>">

              <div class="col-lg-6">
               <div class="form-floating">
                <input type="password" class="form-control" name="mat_khau" placeholder="Mật khẩu mới">
                <label for="mat_khau">Mật khẩu</label>
               </div>
              </div>
              <div class="col-lg-6">
               <div class="form-floating">
                <input type="date" class="form-control" name="ngay_sinh" value="<?= $user['ngay_sinh'] ?>" required>
                <label for="ngay_sinh">Ngày sinh</label>
               </div>
              </div>
              <div class="col-lg-6">
               <div class="form-floating">
                <select class="form-control" name="gioi_tinh" required>
                 <option value="Nam" <?= $user['gioi_tinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
                 <option value="Nữ" <?= $user['gioi_tinh'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
                </select>
                <label for="gioi_tinh">Giới tính</label>
               </div>
              </div>
             <?php } ?>

             <!-- Trường trạng thái tài khoản (chung cho cả admin và user) -->
             <div class="col-lg-6">
              <div class="form-floating">
               <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                <option <?= $user['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Hoạt động</option>
                <option <?= $user['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Khóa</option>
               </select>
               <label for="trang_thai">Trạng thái tài khoản</label>
              </div>
             </div>
            </div>

            <div class="col-lg-12">
             <div class="text-end">
              <button type="reset" class="btn btn-secondary">Nhập lại</button>
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

 <!-- Include JS libraries -->
 <?php require_once "views/layouts/libs_js.php"; ?>
</body>

</html>
