<?php

include_once "../database/db.php";

$id = "";
$name    = "";
$status  = "";
$alert = "";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM categories where id = $id";
    $query  = $connect->query($sql);
    $query->setFetchMode(PDO::FETCH_OBJ);
    $edit   = $query->fetch();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = $_POST['category_name'];
    $status = $_POST['status'];
    

    if ($name == "" && $status == "") {

        $alert =  "Vui lòng nhập dữ liệu";
    } else {
        $id = $_GET['id'];
        $alert = "Cập nhật thành công";
        $sql = " UPDATE categories SET name = '$category_name',status = '$status' WHERE id = $id";
        // echo $sql;
        $query  = $connect->query($sql);
        $query->setFetchMode(PDO::FETCH_OBJ);
        $categoryList   = $query->fetch();
        header("Location: home.php");
    }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Quản lý danh mục</title>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand text-danger" href="">Quản lý danh mục</a>
            <!-- <a class="navbar-brand" href="#">Quản lý sản phẩm</a> -->
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
    </div>
    <hr>
    <?php if ($alert) {    ?>

        <div class="alert alert-primary" role="alert">
            <?php echo $alert; ?>
        </div>
    <?php } ?>
    <div class="container">
        <form method="POST">
            <div class="form-group">
                <label for="exampleInputName1">Tên danh mục</label>
                <input type="text" value ="<?= $edit->name; ?>" class="form-control" name="category_name">

            </div>
            <div class="form-group">
                <label for="exampleInputStatus1">Trạng thái</label>
                <select type="text" class="form-control" name="status">
                    <option value="0" class="form-control" <?= $edit->status == 0?"selected":"" ?>>Hết hàng</option>
                    <option value="1" class="form-control " <?= $edit->status == 1?"selected":"" ?>>Còn hàng</option>

                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>



        </form>
    </div>
</body>

</html>