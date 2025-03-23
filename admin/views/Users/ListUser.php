<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
 <meta charset="utf-8" />
 <title>Danh sách người dùng | Quản lý Tài Khoản</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta content="Admin Dashboard Template" name="description" />
 <meta content="Themesbrand" name="author" />

 <?php require_once "views/layouts/libs_css.php"; ?> <!-- Bao gồm CSS -->

 <style>
  /* CSS cho banner */
  .banner {
   background-color: #f8d7da;
   color: #721c24;
   padding: 10px 0;
   text-align: center;
   font-size: 18px;
   margin-bottom: 20px;
   border: 1px solid #f5c6cb;
  }

  /* Modal CSS */
  .modal-dialog {
   max-width: 800px;
  }
 </style>

 <script>
  // JavaScript để xử lý việc hiển thị chi tiết người dùng trong modal
  function showUserDetails(userId) {
   var userDetails = <?php echo json_encode($users); ?>;
   var user = userDetails.find(function(user) {
    return user.id == userId;
   });

   if (user) {
    var userDetailsHtml = `
                        <div class="modal-header">
                            <h5 class="modal-title" id="userModalLabel">Thông tin chi tiết người dùng</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <tr><th>ID</th><td>${user.id}</td></tr>
                                <tr><th>Avatar</th><td><img src="${user.avatar}" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%;"></td></tr>
                                <tr><th>Tên</th><td>${user.ten_nguoi_dung}</td></tr>
                                <tr><th>Email</th><td>${user.email}</td></tr>
                                <tr><th>Số điện thoại</th><td>${user.sdt}</td></tr>
                                <tr><th>Địa chỉ</th><td>${user.dia_chi}</td></tr>
                                <tr><th>Ngày sinh</th><td>${user.ngay_sinh ? new Date(user.ngay_sinh).toLocaleDateString() : 'Chưa có dữ liệu'}</td></tr>
                                <tr><th>Giới tính</th><td>${user.gioi_tinh}</td></tr>
                                <tr><th>Vai trò</th><td>${user.vai_tro  === 1 ? 'Admin' : 'User'}</td></tr>
                                <tr><th>Trạng thái</th><td>${user.trang_thai  === 1 ? 'Hoạt động' : 'Không hoạt động'}</td></tr>
                            </table>
                        </div>
                    `;
    // Hiển thị thông tin người dùng trong modal
    document.getElementById('userModalContent').innerHTML = userDetailsHtml;
    // Mở modal
    $('#userDetailsModal').modal('show');
   }
  }
 </script>
</head>

<body>
 <div id="layout-wrapper">

  <?php require_once "views/layouts/header.php"; ?>
  <?php require_once "views/layouts/siderbar.php"; ?>

  <div class="main-content">
   <div class="page-content">
    <div class="container-fluid">
     <!-- Banner Section -->


     <div class="row">
      <div class="col-12">
       <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Quản Lý Tài Khoản</h4>
        <div class="page-title-right">
         <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
          <li class="breadcrumb-item active">Danh sách người dùng</li>
         </ol>
        </div>
       </div>
      </div>
     </div>

     <!-- Danh sách người dùng -->
     <div class="row">
      <div class="col">
       <div class="h-100">
        <div class="card">
         <div class="card-header align-items-center d-flex">
          <h4 class="card-title mb-0 flex-grow-1">Danh sách người dùng</h4>
          <a href="?act=add-user" class="btn btn-soft-success material-shadow-none">
           <i class="ri-add-circle-line align-middle me-1"></i>
           Thêm người dùng
          </a>

         </div>

         <div class="card-body">
          <div class="table-responsive">
           <table class="table table-striped table-nowrap align-middle mb-0">
            <thead>
             <tr>
              <th scope="col">ID</th>
              <th scope="col">Avatar</th>
              <th scope="col">Tên</th>
              <th scope="col">Email</th>
              <th scope="col">Vai trò</th>
              <th scope="col">Trạng thái</th>
              <th scope="col">Hành động</th>
             </tr>
            </thead>
            <tbody>
             <?php foreach ($users as $user): ?>
              <tr>
               <td class="fw-medium"><?= $user['id'] ?></td>
               <td><img src="<?= $user['avatar'] ?>" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%;"></td>
               <td><?= $user['ten_nguoi_dung'] ?></td>
               <td><?= $user['email'] ?></td>
               <td><?php
                   if ($user['vai_tro'] == 1) { ?>
                 <span class="badge bg-success">Admin</span>
                <?php } else { ?>
                 <span class="badge bg-danger">User</span>

                <?php }
                ?>


               </td>
               <td><?php
                   if ($user['trang_thai'] == 1) { ?>
                 <span class="badge bg-success">Hoạt động</span>
                <?php } else { ?>
                 <span class="badge bg-danger">Khóa</span>

                <?php }
                ?>


               </td>
               <td>
                <a href="javascript:void(0);" class="link-info fs-15" onclick="showUserDetails(<?= $user['id'] ?>)">
                 <i class="bi bi-eye"></i>
                </a>
                <a href="?act=update-user&id=<?= $user['id'] ?>" class="link-success fs-15">
                 <i class="ri-edit-2-line"></i>
                </a>

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

   <!-- Modal hiển thị thông tin chi tiết người dùng -->
   <div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content" id="userModalContent">
      <!-- Nội dung sẽ được cập nhật khi người dùng click "Xem chi tiết" -->
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
     </div>
    </div>
   </footer>
  </div>
 </div>

 <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
  <i class="ri-arrow-up-line"></i>
 </button>

 <?php require_once "views/layouts/libs_js.php"; ?>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</html>
