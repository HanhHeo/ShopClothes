<?php if (!isset($_SESSION)) {
    session_start();
}
include_once "../database/db.php";

$sql = "SELECT * FROM categories";
$query  = $connect->query($sql);
$query->setFetchMode(PDO::FETCH_OBJ);
$cates   = $query->fetchAll();



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
            <a class="navbar-brand" href="#">Quản lý danh mục</a>
            <!-- <a class="navbar-brand" href="#">Quản lý sản phẩm</a> -->
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
    </div>
    </nav>
    </div>
    <div>
        <div class="container">
            <div class="card-body">
                <table class="table">
                    <thead class="thead-secondary">
                        <tr>
                            <th></th>
                            <th>Tên sản phẩm</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cates as $key => $cate) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $cate->name; ?></td>
                                
                                <td>
                                    <!-- <?= $cate->status?"Đang bày bán":"hết"; ?> -->
                                    <?php if ($cate->status == 0){?>
                                        <div class= "text-danger">
                                            Hết hàng
                                        </div> 
                                        <?php }else{

                                         ?> 
                                         <div class= "text-success">Đang bày bán</div><?php } ?>
                                    </td>
                                <td><a class="btn btn-success"href= "edit.php?id=<?= $cate->id; ?>">Sửa </a>
                            <a class="btn btn-danger"href= "delete.php?id=<?= $cate->id; ?>"onclick="return confirm('Bạn chắc chắn muốn xóa?');">Xóa</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a class="btn btn-success" href="add.php?page=add">Thêm mới</a>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
