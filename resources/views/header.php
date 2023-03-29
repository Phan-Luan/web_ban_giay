<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="google-translate-customization" content="9f841e7780177523-3214ceb76f765f38-gc38c6fe6f9d06436-c">
  </meta>
  <!-- Favicon-->
  <link rel="shortcut icon" href="./view/assets/img/fav.png">
  <!-- Author Meta -->
  <meta name="author" content="CodePixar">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
  <title>BE-Sneaker Shop bán giày</title>
  <!--
        CSS
        ============================================= -->
  <link rel="stylesheet" href="/assetsClient/css/linearicons.css">
  <link rel="stylesheet" href="/assetsClient/css/font-awesome.min.css">
  <link rel="stylesheet" href="/assetsClient/css/themify-icons.css">
  <link rel="stylesheet" href="/assetsClient/css/bootstrap.css">
  <link rel="stylesheet" href="/assetsClient/css/owl.carousel.css">
  <link rel="stylesheet" href="/assetsClient/css/nice-select.css">
  <link rel="stylesheet" href="/assetsClient/css/nouislider.min.css">
  <link rel="stylesheet" href="/assetsClient/css/ion.rangeSlider.css" />
  <link rel="stylesheet" href="/assetsClient/css/ion.rangeSlider.skinFlat.css" />
  <link rel="stylesheet" href="/assetsClient/css/magnific-popup.css">
  <link rel="stylesheet" href="/assetsClient/css/main.css">
  <link rel="stylesheet" href="/assetsClient/css/jquerysctipttop.css">
  <link rel="stylesheet" href="/assetsClient/css/availability-calendar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'vi',
        includedLanguages: 'en,vi,af,df',
      }, 'google_translate_element');
    }
  </script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<style>
  .goog-te-banner-frame.skiptranslate {
    display: none !important;
  }

  body {
    top: 0px !important;
  }

  body {
    position: relative;
  }

  #google_translate_element {
    position: absolute;
    top: 0;
    right: -25px;
    z-index: 99;
  }

  #google_translate_element select {
    border: 2px solid #ffba01;
  }

  #google_translate_element select:focus {
    outline: none;
  }

  #layer_translate {
    position: fixed;
    top: 25px;
    right: 0px;
    z-index: 100;
    background-color: #FFFFFF;
    width: 163px;
    height: 25px;
  }
</style>

<body>

  <div id="google_translate_element"></div>
  <div id="layer_translate"></div>
  <!-- Start Header Area -->
  <header class="header_area sticky-header">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light main_box">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="/"><img src="/assetsClient/img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto">
              <li class="nav-item"><a class="nav-link" href="/">Trang chủ</a></li>
              <li class="nav-item submenu dropdown">
                <a href="/man-products?cate=4" class="nav-link " role="button" aria-haspopup="true" aria-expanded="false">Nam</a>
              </li>
              <li class="nav-item submenu dropdown">
                <a href="/woman-products?cate=2" class="nav-link " role="button" aria-haspopup="true" aria-expanded="false">Nữ</a>
              </li>

              <li class="nav-item"><a class="nav-link" href="/contact">Liên hệ</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a class="nav-link" href="/cart" id="cart"><i class="lnr lnr-heart"></i><span class="badge"></span></a></li>
              <li><a class="nav-link" href="/mycart" id="cart"><i class="ti-bag"></i><span class="badge"></span>
              <li class="nav-item submenu dropdown ">
                <a href="" style="color:#ffba01" class="cart" class="nav-item" class="nav-link dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="true"><span class="ti-user"></span>
                  <?php if (isset($_SESSION['user'])) {
                  ?>
                    <span> Hello </span>[<?= $_SESSION['user']['username'] ?>]
                  <?php
                  } else {
                  }
                  ?></a>
                <ul class="dropdown-menu">
                  <?php
                  if (isset($_SESSION['user'])) {
                  ?>
                    <?php
                    if ($_SESSION['user']['role'] == '1') {
                    ?>
                      <li>
                      <li class="nav-item"><a class="nav-link" href="/admin"> Đăng nhập
                          admin</a></li>
              </li>

            <?php } ?>
            <li>
            <li class="nav-item"><a class="nav-link" href="/mycart?id=0"> Danh sách đơn hàng</a></li>
            </li>
            <li>
            <li class="nav-item"><a class="nav-link" href="/update_user"> Cập Nhật Tài Khoản</a></li>
            </li>

            <li class="nav-item"><a class="nav-link" href="/forgot_password"> Quên Mật
                Khẩu</a></li>
            <li class="nav-item"><a class="nav-link" href="/logout"> Đăng Xuất </a> </li>
          <?php
                  } else {
          ?>
            <li>
            <li class="nav-item"><a class="nav-link" href="/login">Đăng Nhập</a> </li>
            </li>

            <li class="nav-item"><a class="nav-link" href="/registration">Đăng Kí</a> </li>

          <?php
                  }
          ?>

            </ul>

            </li>

            <li class="nav-item">
              <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
            </li>

            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div class="search_input" id="search_input_box">
      <div class="container">
        <form class="d-flex justify-content-between" method="POST" action="/">
          <input type="text" class="form-control" id="search_input" name="kyw" placeholder="Tìm kiếm">
          <button type="submit" class="btn"></button>
          <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
        </form>
      </div>
    </div>

  </header>