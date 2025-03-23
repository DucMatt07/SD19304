<?php require_once './views/layouts/header.php'; ?>
<?php require_once './views/layouts/menu.php'; ?>


<div class="container"><br><br><br><br><br><br><br><br><br>

  <main>
    <div class="row g-4">
      <?php foreach ($danhSachKhuyenMai as $KhuyenMaiItem) { ?>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card text-center shadow-lg" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header bg-primary text-white py-3">
              <h5 class="card-title mb-0" style="color: #fff;"><?= $KhuyenMaiItem['ten_khuyen_mai'] ?></h5>
            </div>
            <div class="card-body">
              <p class="card-text text-muted">Hạn sử dụng: <strong><?= $KhuyenMaiItem['ngay_ket_thuc'] ?></strong></p>
              <div class="d-flex justify-content-between align-items-center border p-2 rounded bg-light">
                <span class="text-uppercase text-primary fw-bold">MÃ: <p style="color: red;"><?= $KhuyenMaiItem['ma_khuyen_mai'] ?></p></span>
                <button
                  class="btn btn-outline-danger btn-sm d-flex align-items-center"
                  onclick="copyCode('<?= $KhuyenMaiItem['ma_khuyen_mai'] ?>')">
                  <i class="bi bi-clipboard me-2" style="color: #000;">Sao chép mã </i>
                </button>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </main>
</div>
<div class="mb-4 pb-4"></div>
<div class="mb-4 pb-4"> </div>


<?php require_once './views/layouts/footer.php'; ?>


<script>
  function copyCode(code) {
    navigator.clipboard.writeText(code).then(() => {
      alert("Đã sao chép mã: " + code);
    });
  }
</script>
<style>
  .card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
}

.btn-outline-danger:hover {
  background-color: #dc3545;
  color: #fff;
}

.text-muted {
  color: #000 !important;
}

</style>