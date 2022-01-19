<?php
session_start();
include_once "admin/database/db.php";
// session_destroy();
// die();
$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? $_REQUEST['id'] : "";
if(isset($_SESSION["cart"][$id])){
    unset($_SESSION['cart'][$id]);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $_SESSION["cart"] = $_REQUEST['qty'];
}


$cart       = (isset($_SESSION["cart"])) ? $_SESSION["cart"] : [];
$cart_ids   = array_keys($cart);
$cart_ids   = implode(",", $cart_ids);
if (!$cart_ids) {
    header("location:index.php");
}

// include_once "layouts/header.php";
$sql = "SELECT * FROM `products` WHERE id IN (" . $cart_ids . ")";
$query  = $connect->query($sql);
$query->setFetchMode(PDO::FETCH_OBJ);
$rows   = $query->fetchAll();


// $id = $_GET["id"];
// try {
//     $sql1 = "SELECT * FROM products WHERE category_id='$id' ";
//     $stmt = $connect->query($sql1);
//     $stmt->setFetchMode(PDO::FETCH_OBJ);
//     $row2    = $result->fetchAll();
//     // var_dump($row2);
//     // die();
//     if ($row2) {
//         throw new Exception();
//     }
//     $delete = "DELETE FROM categories WHERE id=" . $id . "";
//     $stmt   = $connect->query($delete);
//     $_SESSION['success'] = 'Đã xóa thành công !';
// } catch (Exception $e) {
//     $error = 'Không thể xóa do dính khóa ngoại !';
//     $_SESSION['error'] = $error;
// }
// header("location:index.php");



?>
<?php include_once "layouts/header.php"; ?>

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <form method="post" action="">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               
                                $total_price = 0;
                                foreach ($rows as $key => $row) :
                                $quantity = $cart[$row->id];
                                $total_price += $row->price * $quantity;
                                ?>
                                    <tr>
                                        <td class="number">
                                            <h1><?= $key + 1; ?></h1>
                                        </td>
                                        <td class="thumbnail-img">
                                            <a href="#">
                                                <img class="img-fluid" src="<?= $row->image; ?>" alt="" />
                                            </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="#">
                                                <h1><?= $row->name; ?></h1>
                                            </a>
                                        </td>
                                        <td class="price-pr">
                                            <p><?= number_format($row->price) . " VNĐ"; ?></p>
                                        </td>
                                        <td class="quantity-box">
                                            <input type="number" name="qty[<?= $row->id; ?>]" size="4" value="<?= $cart[$row->id]; ?>" min="0" step="1" class="c-input-text qty text">
                                        </td>
                                        <td class="total-pr">
                                            <p><?= number_format($row->price * $cart[$row->id]) . " VNĐ"; ?></p>
                                        </td>
                                        <!-- <td class="remove-pr"> -->
                                        <td>
                                            <a class="btn btn-danger" href="cart.php?id=<?= $row->id;?>">Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <!-- <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div>
                        <button type="submit" style="margin-left: 330px;margin-top: -100px;width: 100px;" class="btn btn-success">Cập nhật</button>
                    </div>
                </div>
            </div>
        </form>


        <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <h3>Bảng Thanh Toán</h3>
                    <div class="d-flex">
                        <h4>Tổng Tiền</h4>
                        <div class="ml-auto font-weight-bold"><?= number_format($total_price) . " VNĐ" ?> </div>
                    </div>


                    <!-- <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold"> </div>
                        </div> -->
                    <div class="d-flex">
                        <h4>Giá Vận Chuyển</h4>
                        <div class="ml-auto font-weight-bold"> Free </div>
                    </div>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Tỏng phải thanh toán</h5>
                        <div class="ml-auto h5"> <?= number_format($total_price) . " VNĐ" ?> </div>
                    </div>
                    <hr>
                </div>
            </div>

            <div class="col-12 d-flex shopping-box"><a href="checkOut.php?id= <?= $row->id; ?>" class="ml-auto btn hvr-hover">Thanh toán</a> </div>
        </div>

    </div>
</div>
<!-- End Cart -->

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