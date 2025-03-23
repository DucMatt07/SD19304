<?php require_once './views/layouts/header.php'; ?>

<?php require_once './views/layouts/menu.php'; ?>
<main style="padding-top: 90px;"> <br><br><br><br><br>
    <section class="blog-page-title mb-4 mb-xl-5">
      <div class="title-bg">
        <img loading="lazy" src="./assets/images/blog_title_bg.jpg" width="1780" height="420" alt="">
      </div>
      <div class="container">
        <h2 class="page-title">Tin Tức Mới</h2>
        <div class="blog__filter">
          <a href="#" class="menu-link menu-link_us-s">ALL</a>
          <a href="#" class="menu-link menu-link_us-s">COMPANY</a>
          <a href="#" class="menu-link menu-link_us-s menu-link_active">FASHION</a>
          <a href="#" class="menu-link menu-link_us-s">STYLE</a>
          <a href="#" class="menu-link menu-link_us-s">TRENDS</a>
          <a href="#" class="menu-link menu-link_us-s">BEAUTY</a>
        </div>
      </div>
    </section>
    <section class="blog-page container">
      <h2 class="d-none">The Blog</h2>
        <div class="blog-grid row row-cols-1 row-cols-md-2">
      <?php foreach ($tinTucs as $key => $tintuc) { ?>

        <div class="blog-grid__item">
            <a href="?act=chi-tiet-tin-tuc&id=<?=$tintuc['tin_tuc_id']?>"><img loading="lazy"src="<?=$tintuc['hinh_anh']?>" width="690" height="500" alt=""></a>
          <div class="blog-grid__item-detail">
            <div class="blog-grid__item-meta">
              <span class="blog-grid__item-meta__author">By Admin</span>
              <span class="blog-grid__item-meta__date"><?=$tintuc['ngay_xuat_ban']?></span>
            </div>
            <div class="blog-grid__item-title">
              <a href="?act=chi-tiet-tin-tuc&id=<?=$tintuc['tin_tuc_id']?>"><?=$tintuc['tieu_de']?></a>
            </div>
            <div class="blog-grid__item-content">
              <p>Midst one brought greater also morning green saying had good. Open stars day let over gathered, grass face one every light of under.</p>
              <a href="?act=chi-tiet-tin-tuc&id=<?=$tintuc['tin_tuc_id']?>" class="readmore-link">Đọc tiếp</a>
            </div>
          </div>
        </div>
      <?php } ?>

      </div>



      <div class="text-center">
      </div>
    </section>
  </main>
<?php require_once './views/layouts/footer.php'; ?>
