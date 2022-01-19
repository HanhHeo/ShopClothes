<?php
if (!isset($_SESSION)) {
  session_start();
}
include_once "admin/database/db.php";
include_once "layouts/header.php";

$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? $_REQUEST['id'] : "";
// if (!$id) {
//   header("Location:index.php");
// }

$sql = "SELECT * FROM products ";
$stmt   = $connect->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$rows   = $stmt->fetchAll();
// echo "<pre>";
// print_r($rows);
// die();
$sql = "SELECT * FROM products WHERE quantity_sold > 8 ";
$stmt = $connect->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$sold_products = $stmt->fetchAll();

// $sql = "SELECT * FROM products Where category_id = " . $id;
// $stmt   = $connect->query($sql);
// $stmt->setFetchMode(PDO::FETCH_OBJ);
// $rows   = $stmt->fetchAll();


?>
<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
  <ul class="slides-container">
    <li class="text-left">
      <img src="images/banner-01.jpg" alt="" />
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="m-b-20">
              <strong>Welcome To <br />
                SH Shop</strong>
            </h1>
            <p class="m-b-40">
              Phong cách trẻ trung,năng động,lịch lãm
              <br />
              Phù hợp với mọi lứa tuổi!
            </p>
            <p><a class="btn hvr-hover" href="#">Shop SH</a></p>
          </div>
        </div>
      </div>
    </li>
    <li class="text-center">
      <img src="images/banner-02.jpg" alt="" />
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="m-b-20">
              <strong>Welcome To <br />
                SH Shop</strong>
            </h1>
            <p class="m-b-40">
              Sự lựa chọn của bạn là niềm vinh dự cho chúng tôi
            </p>
            <p><a class="btn hvr-hover" href="#">Shop SH</a></p>
          </div>
        </div>
      </div>
    </li>
    <li class="text-right">
      <img src="images/banner-03.jpg" alt="" />
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="m-b-20">
              <strong>Welcome To <br />
                SH Shop</strong>
            </h1>
            <p class="m-b-40">
              Luôn hướng đến cái mới để phù hợp với xu hướng thời đại
            </p>
            <p><a class="btn hvr-hover" href="#">Shop SH</a></p>
          </div>
        </div>
      </div>
    </li>
  </ul>
  <div class="slides-navigation">
    <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
    <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
  </div>
</div>
<!-- End Slider -->

<!-- Start Categories  -->
<h1 style="text-align:center;"><b>Sản Phẩm</b></h1>
<div class="categories-shop">

  <div class="container">

    <div class="row">

      <?php foreach ($rows as $row) : ?>
        <div class="col-lg-3 col-md-6 special-grid top-featured">
          <div class="products-single fix">
            <div class="box-img-hover">
              <div class="type-lb">
                <p class="new">Mới</p>
              </div>
              <img width="200px" height="200px" src="<?php echo $row->image; ?>" class="img-fluid" alt="Image">
              <div class="mask-icon">
                <ul>
                  <li><a href="shop-detail.php?id=<?= $row->id; ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                  <!-- <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li> -->
                  <li><a href="listproducts.php" data-toggle="tooltip" data-placement="right" title="Thêm vào hóa đơn sản phẩm"><i class="far fa-heart"></i></a></li>
                </ul>
               <button> <a class="cart" href="shop-detail.php?id=<?= $row->id; ?>">Thêm vào giỏ hàng</a></button>
              </div>
            </div>
            <div class="why-text">
              <h4> <?php echo $row->name; ?></h4>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
    </div>
  </div>
</div>
<!-- End Categories -->

<!-- Start Products  -->
<div class="products-box">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="title-all text-center">
          <h1>Sản phẩm bán chạy</h1>
          <p>
            Các sản phẩm bán chạy nhất tháng 10/2021
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="special-menu text-center">
          <div class="button-group filter-button-group">
            <!-- <button class="active" data-filter="*">Tất cả</button> -->
            <!-- <button data-filter=".top-featured">Xu hướng</button> -->
            <button data-filter=".best-seller">Sản phẩm bán chạy nhất</button>
          </div>
        </div>
      </div>
    </div>

    <div class="row special-list">
      <?php foreach ($sold_products as $row) :  ?>
        <div class="col-lg-3 col-md-6 special-grid best-seller">
          <div class="products-single fix">
            <div class="box-img-hover">
              <div class="type-lb">
                <p class="sale">Giảm giá</p>
              </div>
              <img style="width:208px;height:202px;" src="<?= $row->image; ?>" class="img-fluid" alt="Image" />
              <div class="mask-icon">
                <ul>
                  <li>
                    <a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a>
                  </li>
                  <li>
                    <a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a>
                  </li>
                  <li>
                    <a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a>
                  </li>
                </ul>
                <a class="cart" href="cart.php">Thêm vào giỏ hàng</a>
              </div>
            </div>
            <div class="why-text">
              <h4><?= $row->name; ?></h4>
               <button class="btn btn-success"><a href="shop-detail.php?id=<?= $row->id; ?>">MUA</a></button>
          </div>
            </div>
           
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</div>
<!-- End Products  -->



<!-- Start Instagram Feed  -->
<div class="instagram-box">
  <div class="main-instagram owl-carousel owl-theme">
    <div class="item">
      <div class="ins-inner-box">
        <img src="images/instagram-img-01.jpg" alt="" />
        <div class="hov-in">
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="ins-inner-box">
        <img src="images/instagram-img-02.jpg" alt="" />
        <div class="hov-in">
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="ins-inner-box">
        <img src="images/instagram-img-03.jpg" alt="" />
        <div class="hov-in">
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="ins-inner-box">
        <img src="images/instagram-img-04.jpg" alt="" />
        <div class="hov-in">
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="ins-inner-box">
        <img src="images/instagram-img-05.jpg" alt="" />
        <div class="hov-in">
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="ins-inner-box">
        <img src="images/instagram-img-06.jpg" alt="" />
        <div class="hov-in">
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="ins-inner-box">
        <img src="images/instagram-img-07.jpg" alt="" />
        <div class="hov-in">
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="ins-inner-box">
        <img src="images/instagram-img-08.jpg" alt="" />
        <div class="hov-in">
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="ins-inner-box">
        <img src="images/instagram-img-09.jpg" alt="" />
        <div class="hov-in">
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="ins-inner-box">
        <img src="images/instagram-img-05.jpg" alt="" />
        <div class="hov-in">
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Instagram Feed  -->

<!-- Start Footer  -->
<?php include_once "layouts/footer.php"; ?>