<?php

include_once "admin/database/db.php";
include_once "layouts/header.php";


$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? $_REQUEST['id'] : "";
if (!$id) {
    header("Location:index.php");
}
$sql = "SELECT * FROM categories where id = $id";
$stmt = $connect->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$category = $stmt->fetch();
// echo  "<pre>";
// print_r($category);
// die();


$sql = "SELECT * FROM products Where category_id = " . $id;
$stmt   = $connect->query($sql);
//tùy chọn kiểu trả về
$stmt->setFetchMode(PDO::FETCH_OBJ);
//lấy tất cả kết quả
$rows   = $stmt->fetchAll();

?>

<!-- End Main Top -->


<!-- End Top Search -->

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Shop</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Shop SH</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<!-- Start Shop Page  -->
<div class="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                <div class="product-categori">

                    <div class="filter-sidebar-left">
                        <div class="title-left">
                            <h3><?php echo $category->name; ?></h3>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 shop-content-right">
    <div class="right-product-box">
    </div>

    <div class="row product-categorie-box">

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                <div class="row">
                    <?php foreach ($rows as $row) : ?>
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <div class="type-lb">
                                        <p class="sale">Mới</p>
                                    </div>
                                    <img style="width:250px;height:250px;" src="<?php echo $row->image; ?>" class="img-fluid" alt="Image">
                                    <div style="width:270px;height:250px;margin-left:100px;" class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="shop-detail.php?id=<?php echo $row->id;?>">Thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                                <div style="width:300px;margin-left:93px;" class="why-text">
                                    <h4><?php echo $row->name; ?></h4>
                                    <h5> <?php echo number_format($row->price). "VNĐ" ; ?></h5>
                                    <button class="btn btn-success"><a href="shop-detail.php?id=<?= $row->id; ?>">Mua</a></button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shop Page -->

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