<?php
include '../resources/views/header.php';

?>
<!--Important link from https://bootsnipp.com/snippets/XqvZr-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<div class="pd-wrap">
  <link rel="stylesheet" href="/assetsClient/css/detail_product.css">
  <script src="https://kit.fontawesome.com/cd29af7a45.js" crossorigin="anonymous"></script>
  <style>
    .detail-comment {
      background: rgb(216, 214, 214);
      padding: .5rem;
      padding-left: .7rem;
      border-radius: .5rem;
      position: relative;
    }

    .detail-comment::before {
      position: absolute;
      top: 20px;
      right: auto;
      bottom: auto;
      left: -12px;
      content: "";
      width: 0;
      height: 0;
      border-left: 8px solid transparent;
      border-right: 8px solid transparent;
      border-bottom: 8px solid rgb(216, 214, 214);
      -webkit-transform: translatey(-50%) rotate(-90deg);
      transform: translatey(-50%) rotate(-90deg);

    }

    a:hover {
      text-decoration: none;
    }
  </style>
  <div class="container">

    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
      <div class="col-first">
        <br>
        <nav class="d-flex align-items-center">
          <a href="/">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
          <a href="/">Chi tiết sản phẩm</a>
        </nav>
      </div>
    </div>

    <div class="heading-section">
      <h2>Chi tiết sản phẩm</h2>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div id="slider" class="owl-carousel product-slider">

          <div class="item" style="margin-left: 150px;">
            <img class="img-fluid" src="images/<?= $product->image ?>" alt="">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="product-dtl">
          <div class="product-info">
            <div class="product-name"><?= $product->name ?></div>
            <div class="reviews-counter">
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" checked />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" checked />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" checked />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
              </div>
              <span>3 Reviews</span>
            </div>
            <p class="mt-2">Số hàng còn lại: <?= $product->amount ?></p>
            <div class="product-price-discount"><span>$ <?= $product->price ?></span></div>
          </div>
          <p><?= $product->mota ?></p>
          <form action="/cart" method="post">
            <div class="row">
              <div class="col-md-6">
                <label for="size">Size</label>
                <select name="size" class="form-control">
                  <option value="0">Chọn size</option>
                  <?php foreach ($sizes as $size) : ?>
                    <option value="<?= $size->pr_size ?>"><?= $size->pr_size ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="product-count">
              <label for="size">Quantity</label>
              <input class="form-control" style="border-color: #dee2e6;width: 100px;border-radius: 5px;" value="0" id="product_amount" name="amount" type="number" min="1" max="<?= $product->amount ?>">

              <br>
              <div class="checkout_btn_inner d-flex align-items-center">
                <input type="hidden" name="name" value="<?= $product->name ?>">
                <input type="hidden" name="price" value="<?= $product->price ?>">
                <input type="hidden" name="image" value="<?= $product->image ?>">
                <input type="hidden" name="product_id" value="<?= $product->id ?>">
                <button type="submit" class="btn primary-btn">Thêm vào giỏ hàng</button>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
    <div class="product-info-tabs">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (<?= sizeof($comments) ?>)</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
          Giày thể thao nữ vải nữ viền độn đế mũi viền kẻ caro siêu hot <br><br>

          - Kiểu dáng thanh lịch, màu sắc hài hòa trang nhã<br>
          - Đế bằng cao su tổng hợp chắc chắn, bền <br><br>

          - Giày có hộp của shop mới 100%, nhưng trong quá trình vận chuyển rất có thể hộp sẽ bị móp méo, điều này shop không hề mong muốn và cũng không thể can thiệp được vào công việc vận chuyển, nên mong anh/chị thông cảm. <br>
          LƯU Ý: <br>
          - Tất cả giầy shop bán xuất trực tiếp từ kho nên không chăm chút được cẩn thận. Cũng hy hữu có thể xảy ra khi giày bị méo form, nhưng khi nhận giầy anh/chị đi lên chân 5' là giầy vào lại form ạ. <br><br>

          - Nến anh/chị nhận được sản phẩm lỗi hoặc do nhầm lẫn. Mong các bạn nhắn tin cho shop khắc phục trước khi đánh giá sản phẩm ạ ❤<br> Shop cam kết sẽ luôn có trách nhiệm với sản phẩm đã bán❤
        </div>
        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
          <div class="review-heading">REVIEWS</div>
          <!-- <p class="mb-20">There are no reviews yet.</p> -->
          <?php
          if (!empty($comments)) {
          ?>
            <div class="group-comment d-flex flex-column mb-3" style="margin-left: 3%;">
              <?php
              foreach ($comments as $comment) :
              ?>

                <div class="item-comment mt-4">
                  <div class="avatar">
                    <img src="images/<?= $comment->avatar ?>" style="width: 50px;height: 50px; border-radius: 50%;" alt="">
                  </div>
                  <div class="detail-comment d-flex flex-column">
                    <div class="detail d-flex flex-column">
                      <div class="username" style="color: #000000;font-weight: bold;"><?= $comment->username ?></div>
                      <div style="font-size: 14px;" class="time"><?= $comment->date ?></div>
                    </div>
                    <hr>
                    <div class="content"><?= $comment->content ?></div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          <?php
          } else {
          ?>
            <h5 class="text-center mt-2">No comment</h5>
          <?php
          }

          ?>
          <?php
          if (isset($_SESSION['user'])) {
            $id = $_SESSION['user']['id'];
          }

          ?>
          <form class="review-form" method="POST" action="/insert_comment">
            <div class="form-group">
              <label>Your message</label>
              <textarea class="form-control" rows="5" name="content" required></textarea>
              <input type="hidden" name="product_id" value="<?= $product->id ?>">
              <input type="hidden" name="user_id" value="<?= $id ?>">
            </div>
        </div>
        <div class="checkout_btn_inner d-flex align-items-center">
          <button type="submit" class="btn primary-btn">Submit Review
            <!-- <a class="btn primary-btn" href="">Submit Review</a> -->
          </button>
        </div>
        </form>
      </div>
    </div>
    <!-- single product slide -->
    <div class="single-product-slider">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center mt-5">
            <div class="section-title mt-5">
              <h1>Sản phẩm cùng loại</h1>
            </div>
          </div>
        </div>
        <div class="row">
          <?php foreach ($sameProducts as $product) : ?>
            <!-- single product -->
            <div class="col-lg-3 col-md-6">
              <a href="/detail-product?id=<?= $product->id ?>">
                <div class="single-product">
                  <img class="img-fluid" src="images/<?= $product->image ?>" alt="">
                  <div class="product-details">
                    <h6 style="color:black"><?= $product->name ?></h6>
                    <div class="price">
                      <h6 style="color:black">$ <?= $product->price ?></h6>
                      <h6 class="l-through">$ <?= $product->price + 50 ?>.00</h6>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity=" sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<?php
include '../resources/views/footer.php';

?>