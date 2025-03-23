<?php require_once './views/layouts/header.php'; ?>
<?php require_once './views/layouts/menu.php'; ?>



<main><br><br><br><br><br><br>
  <section class="google-map mt-n7 d-flex justify-content-center">
    <h2 class="d-none">Contact US</h2>
    <div id="map" class="google-map__wrapper">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8703050073427!2d105.74863183637073!3d21.037874809579094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1732156360244!5m2!1svi!2s" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </section>

  <section class="contact-us container">
    <div class="mw-930">
      <div class="row mb-5">
        <div class="col-lg-6">
          <h3 class="mb-4">Chi nhánh 1</h3>
          <p class="mb-4">Tòa nhà FPT Polytechnic., Cổng số 2, 13 P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm <br>Hà Nội, Việt Nam</p>
          <p class="mb-4">adadis@gmail.com<br>+1 246-345-0695</p>
        </div>
        <div class="col-lg-6">
          <h3 class="mb-4">Chi nhánh 2</h3>
          <p class="mb-4">P. Kiều Mai, Phúc Diễn, Từ Liêm<br>Hà Nội, Việt Nam</p>
          <p class="mb-4">adadis@uomo.com<br>+90 212 555 1212</p>
        </div>
      </div>
      <div class="contact-us__form">

        <form action="?act=add-lien-he"  method="POST" >
          <h3 class="mb-5">Get In Touch</h3>
          <div class="form-floating my-4">
            <input type="text" class="form-control" name="ten" placeholder="Name *">
            <label for="contact_us_name">Tên *</label>
            <span class="text-danger">
              <?= !empty($_SESSION['errors']['ten']) ? $_SESSION['errors']['ten'] : '' ?>
            </span>
          </div>
          <div class="form-floating my-4">
            <input type="tel" class="form-control" name="so_dien_thoai" placeholder="Email address *">
            <label for="contact_us_name">Số điện thoại *</label>
            <span class="text-danger">
              <?= !empty($_SESSION['errors']['so_dien_thoai']) ? $_SESSION['errors']['so_dien_thoai'] : '' ?>
            </span>
          </div>
          <div class="form-floating my-4">
            <input type="email" class="form-control" name="email" placeholder="Email address *">
            <label for="contact_us_name">Email *</label>
            <span class="text-danger">
              <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>
            </span>
          </div>
          <div class="my-4">
            <textarea name="noi_dung" class="form-control form-control_gray" placeholder="Nội dung *" cols="30" rows="8"></textarea>
            <span class="text-danger"><?= !empty($_SESSION['errors']['noi_dung']) ? $_SESSION['errors']['noi_dung'] : '' ?>
            </span>
          </div>
          <input type="hidden" name="ngay_tao" id="ngay_tao">

          <input type="hidden" name="trang_thai" value="1">

          <div class="my-4">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>

      </div>
    </div>
  </section>
</main><br><br><br><br><br>

<?php if (isset($_GET['status'])): ?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        <?php if ($_GET['status'] == 'success'): ?>
            alert("Thêm liên hệ thành công!");
        <?php elseif ($_GET['status'] == 'fail'): ?>
            alert("Đã xảy ra lỗi, vui lòng thử lại.");
        <?php endif; ?>
    });
</script>
<?php endif; ?>



<?php require_once './views/layouts/footer.php'; ?>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const now = new Date();
    const formattedDate = now.toISOString().slice(0, 16); // Định dạng YYYY-MM-DDTHH:mm
    document.getElementById("ngay_tao").value = formattedDate;
  });
</script>