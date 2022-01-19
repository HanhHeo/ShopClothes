<?php
include_once "admin/database/db.php";
include_once "layouts/header.php";

$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? $_REQUEST['id'] : "";
if (!$id) {
    header("Location:index.php");
}
$sql = "SELECT * FROM categories where id=" . $id;
$stmt = $connect->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$category = $stmt->fetch();

$sql = "SELECT * FROM products Where id = " . $id;
$stmt   = $connect->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$row   = $stmt->fetch();
// echo "<pre>";
// print_r($row);
// die();

?>
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2><b>CHI TIẾT SẢN PHẨM</b></h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">SH Shop</a></li>
                    <li class="breadcrumb-item active"><a href="shop-detail.php">Chi tiết sản phẩm</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"> <img class="d-block w-100" src="<?= $row->image; ?>" alt=""> </div>

                    </div>

                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
                <div class="single-product-details">
                    <h2><?php echo $row->name; ?></h2>
                    <h5><?= number_format($row->price) . "VNĐ"; ?></h5>
                    <p class="available-stock"><span>Số lượng còn lại: <?= $row->stock; ?> / Số lượng đã bán:<?= $row->quantity_sold; ?> </a></span>
                    <form method="get" action ="addtocart.php">
                        <input type="hidden" name="product_id" value="<?= $row->id; ?>">
                        <ul>
                            <li>

                                <div class="form-group quantity-box">
                                    <label class="control-label">Số lượng</label>
                                    <input name="quantity" class="form-control" min="0" max="20" type="number" value="1">
                                </div>
                            </li>
                            <li>

                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn" style= "margin-top: 35px;margin-left: -20px;">
                                        <button style="width:100%;" class="btn hvr-hover" data-fancybox-close="" href="addtocart.php?id=<?= $row->id; ?>">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>

                            </li>
                        </ul>
                    </form>


                </div>
            </div>
        </div>


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


        <?php include_once "layouts/footer.php"; ?>