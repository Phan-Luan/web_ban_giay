<?php
include '../resources/views/header.php';

?>
<!-- End Header Area -->

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
  <div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
      <div class="col-first">
        <br>
        <h1>Confirmation</h1>
        <nav class="d-flex align-items-center">
          <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
          <a href="index.php?act=confirmation">Confirmation</a>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- End Banner Area -->

<!--================Order Details Area =================-->
<section class="order_details section_gap">
  <div class="container">
    <h3 class="title_confirmation">Thank you. Your order has been received.</h3>
    <div class="row order_d_inner">
      <div class="col-lg-4">
        <div class="details_item">
          <?php
          if ($bill['pttt'] == 0) {
            $pt = 'Thanh toán khi nhận hàng';
          } else {
            $pt = 'Thanh toán bằng Paypal';
          }
          ?>
          <h4>Order Info</h4>
          <ul class="list">
            <li><a href="#"><span>Code </span>: DAM-<?= $bill['id'] ?></a></li>
            <li><a href="#"><span>Date</span> : <?= $bill['date'] ?></a></li>
            <li><a href="#"><span>Total</span> : $ <?= $bill['total_money'] ?></a></li>
            <li><a href="#"><span>Payment method</span> :<?= $pt ?></a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="details_item">
          <h4>Shipping Detail</h4>
          <ul class="list">
            <li><a href="#"><span>Username</span> : <?= $bill['username'] ?></a></li>
            <li><a href="#"><span>Phone</span> : <?= $bill['phone'] ?></a></li>
            <li><a href="#"><span>Address</span> : <?= $bill['address'] ?></a></li>
            <li><a href="#"><span>Email </span> : <?= $bill['email'] ?></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="order_details_table">
      <h2>Order Details</h2>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($list_cart as $cart) : ?>
              <tr>
                <td>
                  <p><?= $cart->name ?></p>
                </td>
                <td>
                  <h5><?= $cart->amount ?></h5>
                </td>
                <td>
                  <p>$ <?= $cart->price * $cart->amount ?></p>
                </td>
              </tr>
            <?php endforeach ?>
            <tr>
              <td>
                <h4>Subtotal</h4>
              </td>
              <td>
                <h5></h5>
              </td>
              <td>
                <p> $ <?= $bill['total_money'] - 20 ?> </p>
              </td>
            </tr>
            <tr>
              <td>
                <h4>Shipping</h4>
              </td>
              <td>
                <h5></h5>
              </td>
              <td>
                <p>Flat rate: $20.00</p>
              </td>
            </tr>
            <tr>
              <td>
                <h4>Total</h4>
              </td>
              <td>
                <h5></h5>
              </td>
              <td>
                <p> $ <?= $bill['total_money'] ?> </p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!--================End Order Details Area =================-->

<!-- start footer Area -->

<!-- End footer Area -->

<?php
include '../resources/views/footer.php';

?>