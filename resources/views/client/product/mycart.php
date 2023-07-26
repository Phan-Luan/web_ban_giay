<?php
include '../resources/views/header.php';

?>
<style>
  img {
    border-radius: .5rem;
    float: none;
  }

  .cart_inner .table4 tbody tr td {
    padding-top: 10px;
    padding-bottom: 10px;
  }

  .cart_inner .table thead tr th {
    font-weight: bold;
    font-size: 17px;
  }

  .cart_inner .table4 {
    margin-bottom: 60px;
    border-top: 1px solid #dee2e6;
  }
</style>
<!-- End Header Area -->
<!-- back to top-->
<button id="myBtn" title="Lên đầu trang"><img src="./view/assets/img/back_to_top.png" title='lên đầu trang' width='20px' height="20px" /></button>
<!--end back to top-->
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
  <div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
      <div class="col-first">
        <br>
        <h1>Giỏ hàng của tôi</h1>
        <nav class="d-flex align-items-center">
          <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
          <a href="index.php?act=cart">Giỏ hàng của tôi</a>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
  <div class="container">
    <div class="cart_inner">
      <div class="table-responsive">
        <?php
        if ($list_cart) {
        ?>
          <table class="table table-bordered text-center table4">
            <thead>
              <tr>
                <th>Tên sản phẩm</th>
                <th>Sản phẩm</th>
                <th>Size</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $total_bill = 0;
              foreach ($list_cart as $item) :
                $total = $item->price * $item->amount;
                $total_bill += $total;
              ?>
                <tr>
                  <td><?= $item->name ?></td>
                  <td><img src="images/<?= $item->image ?>" width="100px" alt=""></td>
                  <td><?= $item->size ?></td>
                  <td><?= $item->price ?></td>
                  <td><?= $item->amount ?></td>
                  <td><?= $total ?></td>
                </tr>
              <?php endforeach ?>
              <tr>
                <td class="font-weight-bold" style="font-size: 17px" colspan="5">Thành tiền</td>
                <td><?= $total_bill ?></td>
              </tr>
            </tbody>
          </table>
        <?php
        }
        ?>
        <table class="table table1 mt-3 text-center">
          <thead>
            <tr>
              <th scope="col">Mã đơn hàng</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Tổng tiền</th>
              <th scope="col">Ngày đặt hàng</th>
              <th scope="col">Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($list_bill as $bill) : ?>
              <tr>
                <td>DAM-<?= $bill->bill_id ?></td>
                <td><?= $bill->countcart ?></td>
                <td><?= $bill->total_money ?></td>
                <td><?= $bill->date ?></td>
                <?php
                $status = $bill->status;
                if ($status == 0) {
                  $status = "Đơn hàng mới";
                } elseif ($status == 1) {
                  $status  = "Đang xử lý";
                } elseif ($status == 2) {
                  $status = "Đang giao";
                } elseif ($status == 3) {
                  $status = "Đã giao hàng";
                } elseif ($status == 4) {
                  $status = "Đã hủy";
                  $exit = 'disable';
                }
                ?>
                <td><?= $status ?></td>
                <td>
                  <?php
                  if ($bill->status == 4) {
                  ?>
                    <a style="border-radius: .5rem;" class="primary-btn" href="/detail_bill?id=<?= $bill->bill_id ?>">Detail</a>
                    <a style="border-radius: .5rem;cursor: default;pointer-events: none;" class="primary-btn" href="/disable_bill?id=<?= $bill->bill_id ?>">Đơn đã bị hủy</a>
                  <?php
                  } else {
                  ?>
                    <a style="border-radius: .5rem;" class="primary-btn" href="/detail_bill?id=<?= $bill->bill_id ?>">Detail</a>
                    <?php
                    if ($bill->status == 0 || $bill->status == 1) {
                    ?>
                      <a style="border-radius: .5rem;" class="primary-btn" href="/disable_bill?id=<?= $bill->bill_id ?>">Hủy đơn</a>
                    <?php
                    }
                    ?>
                  <?php
                  }
                  ?>
                  <?php
                  if ($bill->status == 3) {
                  ?>
                    <a style="border-radius: .5rem;" class="primary-btn" href="/detail-product?id=<?= $bill->product_id ?>">Đánh giá</a>
                  <?php
                  }
                  ?>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!--================End Cart Area =================-->

</body>
<?php
include '../resources/views/footer.php';

?>