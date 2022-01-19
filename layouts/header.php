<?php
if (!isset($_SESSION)) {
  session_start();
}


?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Site Metas -->
  <title>The Fashion Shop</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <!-- Site Icons -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- Site CSS -->
  <link rel="stylesheet" href="css/style.css" />
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="css/responsive.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css" />

  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <!-- Start Main Top -->
  <div class="main-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="text-slid-box">
            <div id="offer-box" class="carouselTicker">

            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

          <div class="our-link">
            <ul>
              <li><a href="index.php">Trang Chủ</a></li>
              <li><a href="admin/authen/login.php">Tài Khoản</a></li>
              <li><a href="" >Liên Hệ</a></li>
              <?php if (isset($_SESSION['user'])) : ?>

                <li>
                  <div class="dropdown show">
                    <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b><i class="fas fa-user"></i>  <?= $_SESSION['user']->name; ?></b> <i class="fas fa-angle-down"></i>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item text-dark" href="">Thông tin</a> <br>
                      <a class="dropdown-item text-dark" href="logout.php">Đăng xuất</a>
                    
                    </div>
                  </div>
               
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Main Top -->

  <!-- Start Main Top -->
  <header class="main-header">
    <!-- Start Navigation -->
    <nav class="
          navbar navbar-expand-lg navbar-light
          bg-light
          navbar-default
          bootsnav
        ">
      <div class="container">
        <!-- Start Header Navigation -->
        <div class="navbar-header">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button>
          <a class="navbar-brand" href="index.php">
            <img src="images/fashionlogo.jpg" width="100px" height="80px" class="logo" alt="" /><b>SH Shop</b></a>

        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
          <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
            <!-- <li class="nav-item active">
                <a class="nav-link" href="index.html">Home</a>
              </li> -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li> -->
            <li class="dropdown megamenu-fw">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sản phẩm</a>
              <ul class="dropdown-menu megamenu-content" role="menu">
                <li>
                  <div class="row">
                    <div class="col-menu col-md-3">
                      <h6 class="title">Áo</h6>
                      <div class="content">
                        <ul class="menu-col">
                          <li><a href="category.php?id=1">Sơ mi</a></li>
                          <li><a href="category.php?id=1">Thun</a></li>
                          <li><a href="category.php?id=1">Jacket</a></li>
                          <li><a href="category.php?id=1">Vest</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- end col-3 -->
                    <div class="col-menu col-md-3">
                      <h6 class="title">Quần</h6>
                      <div class="content">
                        <ul class="menu-col">
                          <li><a href="category.php?id=2">Tây</a></li>
                          <li><a href="category.php?id=2">Jeans</a></li>
                          <li><a href="category.php?id=2">Kaki</a></li>
                          <li><a href="category.php?id=2">Short</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- end col-3 -->
                    <div class="col-menu col-md-3">
                      <h6 class="title">Giày</h6>
                      <div class="content">
                        <ul class="menu-col">
                          <li><a href="category.php?id=3">Vải</a></li>
                          <li><a href="category.php?id=3">Da</a></li>
                          <li><a href="category.php?id=3">Lười</a></li>
                          <li><a href="category.php?id=3">Cổ cao</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-menu col-md-3">
                      <h6 class="title">Túi xách</h6>
                      <div class="content">
                        <ul class="menu-col">
                          <li><a href="category.php?id=4">Da</a></li>

                        </ul>
                      </div>
                    </div>
                    <div class="col-menu col-md-3">
                      <h6 class="title">Nhẫn</h6>
                      <div class="content">
                        <ul class="menu-col">
                          <li><a href="category.php?id=5">Bạc</a></li>
                          <li><a href="category.php?id=5">Titan</a></li>
                        </ul>
                      </div>
                    </div>
                    <br>
                    <div class="col-menu col-md-3">
                      <h6 class="title">Đồ ngủ</h6>
                      <div class="content">
                        <ul class="menu-col">
                          <li><a href="category.php?id=6">Pijama</a></li>
                          <li><a href="category.php?id=6">Thun cotton</a></li>
                          <li><a href="category.php?id=6">Đũi</a></li>
                          <!-- <li><a href="shop.html">Wallets</a></li> -->
                        </ul>
                      </div>
                    </div>
                    <div class="col-menu col-md-3">
                      <h6 class="title">Mũ</h6>
                      <div class="content">
                        <ul class="menu-col">
                          <li><a href="category.php?id=7">Lưới</a></li>
                          <li><a href="category.php?id=7">Backet</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-menu col-md-3">
                      <h6 class="title">Thắt lưng</h6>
                      <div class="content">
                        <ul class="menu-col">
                          <li><a href="category.php?id=8">Da</a></li>

                        </ul>
                      </div>
                    </div>

                    <div class="col-menu col-md-3">
                      <h6 class="title">Đồng Hồ</h6>
                      <div class="content">
                        <ul class="menu-col">
                          <li><a href="category.php?id=9">Cơ</a></li>
                          <li><a href="category.php?id=9">Pin</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- end col-3 -->
                  </div>
                  <!-- end row -->
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Cửa hàng</a>
              <ul class="dropdown-menu">
                <li><a href="cart.php">Giỏ hàng</a></li>
                <li><a href="checkout.php">Thủ tục thanh toán</a></li>
                <li><a href="my-account.php">Tài khoản của tôi</a></li>
                <li><a href="wishlist.php">Danh sách sản phẩm</a></li>
                <li><a href="shop-detail.php">Chi tiết sản phẩm</a></li>
              </ul>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="service.html">Our Service</a>
              </li> -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="contact-us.html">Contact Us</a>
              </li> -->
          </ul>
        </div>
        <!-- /.navbar-collapse -->

        <!-- Start Atribute Navigation -->
        <div class="attr-nav">
          <ul>
            <input class="search" />
            <a href="#"><i class="fa fa-search"></i></a>
            <!-- </li> -->
            <!-- <li class="side-menu">
                <a href="#">
                  <i class="fa fa-shopping-bag"></i>
                  <span class="badge">3</span>
                </a>
              </li> -->
          </ul>
        </div>
        <!-- End Atribute Navigation -->
      </div>
      <!-- Start Side Menu -->
      <div class="side">
        <a href="#" class="close-side"><i class="fa fa-times"></i></a>
        <li class="cart-box">
          <ul class="cart-list">
            <li>
              <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
              <h6><a href="#">Delica omtantur </a></h6>
              <p>1x - <span class="price">$80.00</span></p>
            </li>
            <li>
              <a href="#" class="photo"><img src="images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
              <h6><a href="#">Omnes ocurreret</a></h6>
              <p>1x - <span class="price">$60.00</span></p>
            </li>
            <li>
              <a href="#" class="photo"><img src="images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
              <h6><a href="#">Agam facilisis</a></h6>
              <p>1x - <span class="price">$40.00</span></p>
            </li>
            <li class="total">
              <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
              <span class="float-right"><strong>Total</strong>: $180.00</span>
            </li>
          </ul>
        </li>
      </div>
      <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
  </header>
  <!-- End Main Top -->

  <!-- Start Top Search -->
  <div class="top-search">
    <div class="container">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-search"></i></span>
        <input type="text" class="form-control" placeholder="Search" />
        <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
      </div>
    </div>
  </div>
  <!-- End Top Search -->