<?php
session_start();
include_once "layouts/header.php";
include_once "admin/database/db.php";

$id = $_GET["id"];
    $order_id = $_GET['id'];

    // $sql = "SELECT * FROM oders Where id = $order_id";
    // $stmt = $connect->query($sql);
    // $stmt->setFetchMode(PDO::FETCH_OBJ);
    // $orders = $stmt->fetch();

    // $user_id = $order['user_id'];
    // $sql = "SELECT * FROM user WHERE id= $user_id";
    // $stmt = $connect->query($sql);
    // $stmt->setFetchMode(PDO::FETCH_OBJ);
    // $users = $stmt->fetch();
// }

// echo "<pre>";
// print_r($_SESSION['user']);
// die();

if (isset($_SESSION["cart"][$id])) {
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
?>
<?php if (isset($_SESSION['user'])) { ?>
    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <form method="post" action="">
                <div class="row">
                    <div class="col-lg-4">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputName1">Full name</label>
                               
   
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"value= " <?= $_SESSION['user']->name; ?>" >
                                <small id="name" class="form-text text-danger">Vui lòng điền đầy đủ tên</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value=" <?= $_SESSION['user']->email; ?>">
                                <small id="name" class="form-text text-danger">Vui lòng điền email</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone">Phone</label>
                                <input type="text" class="form-control" id="exampleInputPhone1" placeholder="Phone">
                                <small id="name" class="form-text text-danger">Vui lòng điền số điện thoại</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAdress">Address</label>
                                <input type="text" class="form-control" id="exampleInputAddress1" placeholder="Address">
                                <small id="name" class="form-text text-danger">Vui lòng điền địa chỉ</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNote">Ghi chú</label> <br>
                                <textarea name="" id="" style="width:347px;"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-danger"><a href="orders.php" style="color:white;">Đặt hàng</a></button>
                            </div>



                        </form>
                    </div>
                    <div class="col-lg-8">
                        <div class="table-main table-responsive">
                            <table class="table" style="border:1px solid red;">
                                <thead>
                                    <tr>

                                        <th>Sản phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
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


                                            <td class="name-pr">
                                                <a href="#">
                                                    <h1><?= $row->name; ?></h1>
                                                </a>
                                            </td>
                                            <td class="img-pr">
                                                <a href="#">
                                                    <img  width= "90px"src="<?= $row->image;?>"> 
                                                </a>
                                            </td>
                                            <td class="price-pr">
                                                <p><?= number_format($row->price) . " VNĐ"; ?></p>
                                            </td>
                                            <td class="quantity-box">
                                                <p><?= $cart[$row->id]; ?></p>
                                            </td>
                                            <td class="total-pr">
                                                <p><?= number_format($row->price * $cart[$row->id]) . " VNĐ"; ?></p>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="col-12 d-flex shopping-box">
                            <a href="orders.php?" class="ml-auto btn hvr-hover">Thanh toán</a>
                        </div> -->
                    </div>

                </div>

        </div>
    </div>
<?php } else { ?>
    <div class="alert alert-primary">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <b class= "text-dark">Vui lòng đăng nhập để mua hàng,nhấn tại </b> <a href="admin/authen/login.php">đây</a> <b class= "text-dark">để tới đăng nhập</b>
    </div>
<?php }; ?>
<div class="row my-5">
    <div class="col-lg-6 col-sm-6">
        <div class="coupon-box">

        </div>
    </div>

</div>
</form>


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