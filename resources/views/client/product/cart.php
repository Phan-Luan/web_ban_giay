<?php
include '../resources/views/header.php';

?>
<!-- End Header Area -->
<style>
  #paypal-button {
    display: none;
  }
</style>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
  <div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
      <div class="col-first">
        <br>
        <h1>Giỏ hàng</h1>
        <nav class="d-flex align-items-center">
          <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
          <a href="single-product.php">Giỏ hàng</a>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- End Banner Area -->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
  <div class="container">
    <div class="returning_customer">
      <div class="billing_details d-flex">
        <!-- <div class="row"> -->
        <div class="col-lg-8">
          <h3>Billing Details</h3>
          <form class="contact_form" action="/confirmation" method="post">
            <?php
            if (isset($_SESSION['user'])) {
              extract($_SESSION['user']);
            }
            ?>
            <div class="row">
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="user" name="username" value="<?= !empty($username) ? $username : false ?>">
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="number" name="phone" value="<?= !empty($phone) ? $phone : false ?>">
                <span class="placeholder" data-placeholder=""></span>
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="email" name="email" value="<?= !empty($email) ? $email : false ?>">
                <span class="placeholder" data-placeholder=""></span>
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="user" name="address" value="<?= !empty($address) ? $address : false ?>">
              </div>
            </div>
            <section class="cart_area">
              <h3>Your Order</h3>
              <table class="table table-striped table-bordered text-center">
                <thead>
                  <tr>
                    <th scope="col">Sản phẩm</th>
                    <th>Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Size</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($list_cart as $cart) : ?>
                    <tr>
                      <td><?= $cart->name ?></td>
                      <td><img width="70px" src="images/<?= $cart->image ?>" alt="anh"></td>
                      <td><?= $cart->price ?></td>
                      <td><?= $cart->amount ?></td>
                      <td><?= $cart->size ?></td>
                      <td><a onclick="return confirm('Bạn muốn xóa sản phẩm')" href="/delete_cart?id=<?= $cart->id ?>">xóa</a></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
              <!-- <h5 class="text-center">Chưa có sản phẩm nào</h5> -->
            </section>
        </div>
        <div class="col-lg-4">
          <div class="order_box">
            <h2>Your Order</h2>
            <ul class="list">
              <li><a>Product <span>Total</span></a></li>

              <?php
              $total_bill = 0;
              foreach ($list_cart as $cart) :
                $total = $cart->amount * $cart->price;
              ?>
                <li><a><?= $cart->name ?> <span class="middle">x <?= $cart->amount ?></span> <span class="last">$ <?= $total ?></span></a></li>
              <?php
                $total_bill += $total;
              endforeach
              ?>
            </ul>

            <ul class="list list_2">
              <li><a>Subtotal <span>$ <?= $total_bill ?></span></a></li>
              <li><a>Shipping <span>Flat rate: $20.00</span></a></li>
              <li><a>Total <span>$ <?= $total_bill + 20 ?></span></a></li>
            </ul>
            <input type="hidden" name="total_money" value="<?= $total_bill + 20 ?>">
            <input type="hidden" name="user_id" value="<?= $id ?>">
            <div class="payment_item">
              <div class="radion_btn">
                <input type="radio" class="payment" checked id="f-option5" name="pttt" value="0">
                <label for="f-option5">Check payments</label>
                <div class="check"></div>
              </div>
            </div>
            <div class="payment_item active mt-2 ">
              <div class="radion_btn">
                <input type="radio" class="paypal" id="f-option6" name="pttt" value="1">
                <label for="f-option6">Paypal </label>
                <div class="check"></div>
              </div>
              <div id="paypal-button"></div>
            </div>
            <div class="d-flex flex-column form-group">
              <input type="hidden" id="total_paypal" value="222">
              <a href="/"><input class="btn primary-btn form-control" value="Shopping"></a>
              <button class="btn primary-btn form-control mt-2" type="submit">Hoàn tất đặt hàng</button>
              <a href="/delete_all_cart" onclick="return confirm('Xóa giỏ hàng')"><input class="btn btn-close-white form-control mt-2" value="Xóa giỏ hàng"></a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
<!--================End Checkout Area =================-->

<!-- start footer Area -->

<!-- End footer Area -->



</body>
<!-- paypal -->
<script src="https://www.paypal.com/sdk/js?client-id=AaX1fuJ8q5PrvEQaUb6nJ-cFFKigmQgcx1VtkPnLP21nLMiEtK3qaiq761vPjIgR54g_xkbygoMIcFny&currency=USD"></script>
<script>
  let total_paypal = document.getElementById("total_paypal").value;
  paypal.Buttons({
    // Sets up the transaction when a payment button is clicked
    createOrder: (data, actions) => {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: total_paypal // Can also reference a variable or function
          }
        }]
      });
    },
    // Finalize the transaction after payer approval
    onApprove: (data, actions) => {
      return actions.order.capture().then(function(orderData) {
        // Successful capture! For dev/demo purposes:
        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        const transaction = orderData.purchase_units[0].payments.captures[0];
        alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
        // When ready to go live, remove the alert and show a success message within this page. For example:
        // const element = document.getElementById('paypal-button-container');
        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
        // Or go to another URL:  actions.redirect('thank_you.html');
      });
    }
  }).render('#paypal-button');

  $(".paypal").click(function() {
    $("#paypal-button").show();
  });
  $(".payment").click(function() {
    $("#paypal-button").hide();
  });
  $("#paypal-button").css({
    'position': 'relative',
    'z-index': '1'
  });
  // $(".paypal").css('z-index','-1');
</script>
<?php
include '../resources/views/footer.php';

?>