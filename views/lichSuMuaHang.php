<?php require_once './views/layouts/header.php'; ?>
<?php require_once './views/layouts/menu.php'; ?>






<div class="p-5 align-items-center d-flex justify-content-center ">
  <div class="card " style="width: 1200px;">
    <div class="card-header align-items-center d-flex justify-content-between">



      <!-- Search Form -->
      <form class="d-flex me-3" action="index.php?act=tim-kiem-don-hang" method="POST" role="search">
        <input type="search" class="form-control me-2" placeholder="Tìm mã đơn hàng..." aria-label="Search" name="search" />
        <!-- <select class="form-control me-2" name="status">
                        <option value="">Tất cả trạng thái</option>
                        <option value="Chờ xác nhận">Chờ xác nhận</option>
                        <option value="đã xác nhận">Đã xác nhận</option>
                        <option value="Đang giao">Đang giao</option>s
                        <option value="Đã giao">Đã giao</option>
                        <option value="Đã hoàn thành">Đã hoàn thành</option>
                        <option value="Đã thất bại">Đã thất bại</option>
                        <option value="Đã hủy">Đã hủy</option>
                      </select> -->
        <input class="btn btn-outline-primary" type="submit" value="Tìm kiếm" />
      </form>


    </div><!-- end card header -->

    <div class="card-body">
      <div class="live-preview">
        <div class="table-responsive">
          <table class="table table-striped table-nowrap align-middle mb-0">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Phương Thức Thanh Toán</th>
                <th scope="col">Trạng thái đơn hàng</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($donHangs)): ?>
                <?php foreach ($donHangs as $index => $donHangItem): ?>
                  <tr>
                    <td class="fw-medium"><?= $index + 1 ?></td>
                    <td class=""><?= ($donHangItem['ma_don_hang']) ?></td>
                    <td><?= htmlspecialchars(date('d/m/Y', strtotime($donHangItem['ngay_dat_hang']))) ?></td>
                    <td><?= number_format($donHangItem['tong_tien'], 0, ',', '.') ?> đ</td>
                    <td><?= $pTTT[$donHangItem['phuong_thuc_thanh_toan_id']] ?></td>
                    <td><?= $trangThaiDonHang[$donHangItem['trang_thai_don_hang']] ?></td>

                    <td>
                      <a href="?act=chi-tiet-don-hang&id=<?= $donHangItem['id']  ?>" class="p-2"><i class="bi bi-eye"></i></a>

                      <?php if ($donHangItem['trang_thai_don_hang'] == 14) : ?>
                        <a href="<?= BASE_URL  ?>?act=huy-don-hang&id=<?= $donHangItem['id'] ?>"

                          onclick="return confirm('Xác định hủy đơn hàng')"><i class="bi bi-trash-fill"></i> <!-- Phiên bản tô đầy của thùng rác -->


                          </a>
                      <?php endif; ?>
                      
                      <?php if ($donHangItem['trang_thai_don_hang'] == 17) : ?>
                        <a href="<?= BASE_URL  ?>?act=xac-nhan-don-hang&id=<?= $donHangItem['id'] ?>"

                          onclick="return confirm('Xác nhận đơn hàng')"><i class="bi bi-check2"></i>

                        </a>
                      <?php endif; ?>


                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="7" class="text-center">Không tìm thấy kết quả.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>



    <div class="d-none code-view">
      <pre class="language-markup" style="height: 275px;"><code>&lt;table class=&quot;table table-nowrap&quot;&gt;
    &lt;thead&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;col&quot;&gt;ID&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Customer&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Date&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Invoice&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Action&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/thead&gt;
    &lt;tbody&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;fw-semibold&quot;&gt;#VZ2110&lt;/a&gt;&lt;/th&gt;
            &lt;td&gt;Bobby Davis&lt;/td&gt;
            &lt;td&gt;October 15, 2021&lt;/td&gt;
            &lt;td&gt;$2,300&lt;/td&gt;
            &lt;td&gt;&lt;a href=&quot;javascript:void(0);&quot; class=&quot;link-success&quot;&gt;View More &lt;i class=&quot;ri-arrow-right-line align-middle&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;fw-semibold&quot;&gt;#VZ2109&lt;/a&gt;&lt;/th&gt;
            &lt;td&gt;Christopher Neal&lt;/td&gt;
            &lt;td&gt;October 7, 2021&lt;/td&gt;
            &lt;td&gt;$5,500&lt;/td&gt;
            &lt;td&gt;&lt;a href=&quot;javascript:void(0);&quot; class=&quot;link-success&quot;&gt;View More &lt;i class=&quot;ri-arrow-right-line align-middle&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;fw-semibold&quot;&gt;#VZ2108&lt;/a&gt;&lt;/th&gt;
            &lt;td&gt;Monkey Karry&lt;/td&gt;
            &lt;td&gt;October 5, 2021&lt;/td&gt;
            &lt;td&gt;$2,420&lt;/td&gt;
            &lt;td&gt;&lt;a href=&quot;javascript:void(0);&quot; class=&quot;link-success&quot;&gt;View More &lt;i class=&quot;ri-arrow-right-line align-middle&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;fw-semibold&quot;&gt;#VZ2107&lt;/a&gt;&lt;/th&gt;
            &lt;td&gt;James White&lt;/td&gt;
            &lt;td&gt;October 2, 2021&lt;/td&gt;
            &lt;td&gt;$7,452&lt;/td&gt;
            &lt;td&gt;&lt;a href=&quot;javascript:void(0);&quot; class=&quot;link-success&quot;&gt;View More &lt;i class=&quot;ri-arrow-right-line align-middle&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/td&gt;
        &lt;/tr&gt;
    &lt;/tbody&gt;
&lt;/table&gt;</code></pre>
    </div>
  </div><!-- end card-body -->
</div><!-- end card -->



</div> <!-- end .h-100-->



<?php require_once './views/layouts/footer.php'; ?>
