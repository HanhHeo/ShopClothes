<?php
session_start();
include_once "admin/database/db.php";
include_once "layouts/header.php";


if (isset($_SESSION['user']->name)) {


    // echo "<pre>";
    // print_r($_SESSION['user']->name);
    // die();
}

?>

<div class="container">
    <div class="alert alert-secondary" role="alert">
        <h1>Đặt hàng thành công! Cảm ơn quý khách <?= $_SESSION['user']->name; ?> đã mua hàng ♥ </h1>
    </div>



</div>