
<?php
if (!session_id()) {
    session_start();
}
// session_destroy();
// die();

$product_id = $_REQUEST['product_id'];
$quantity = $_REQUEST['quantity'];

$cart = (isset($_SESSION["cart"])) ? $_SESSION["cart"] : [];

if (isset($cart[$product_id])) {
    // var_dump(123);
    $cart[$product_id] += $quantity;
} else {
    $cart[$product_id] = $quantity;
}

$_SESSION["cart"] = $cart;

// echo "<pre>";
// print_r($_SESSION["cart"]);
// echo "</pre>";
// die();

header("location:cart.php");
die();
