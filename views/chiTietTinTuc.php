<?php require_once './views/layouts/header.php'; ?>

<?php require_once './views/layouts/menu.php'; ?>


<main style="padding-top: 90px;"><br><br><br><br><br>
    <div class="mb-4 pb-4"></div>
        <section class="blog-page blog-single container">

        <div class="mw-930">
    <h2 class="page-title"><?= ($tinTuc['tieu_de'] ?? 'Không có tiêu đề') ?></h2>
    <div class="blog-single__item-meta">
        <span class="blog-single__item-meta__author">By Admin</span>
        <span class="blog-single__item-meta__date"><?= ($tinTuc['ngay_xuat_ban'] ?? 'Không có ngày xuất bản') ?></span>
        <span class="blog-single__item-meta__category">Trends</span>
    </div>
    <div class="blog-single__item-content">
        <p>
          <img loading="lazy" class="w-100 h-auto d-block" src="<?= ($tinTuc['hinh_anh'] ?? 'Không có nội dung') ?>" width="1410" height="550" alt="">
        </p>
      </div>
    <div class="blog-single__item-content">
        <p><?= ($tinTuc['noi_dung'] ?? 'Không có nội dung') ?></p>
    </div>
</div>

     
      
      
       

      </div>

    </section>
   
  </main><br><br>
<?php require_once './views/layouts/footer.php'; ?>
