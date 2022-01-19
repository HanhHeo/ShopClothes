<?php
session_start();
include_once "../database/db.php";
$alert = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  $sql =  "SELECT * FROM user where email = '$email' AND password = '$password'";
  $stmt = $connect->query($sql);
  $stmt->setFetchMode(PDO::FETCH_OBJ);
  $row = $stmt->fetch();
  if (isset($row)) {
    $_SESSION['user'] = $row;
    $alert = "Đăng nhập thành công";
    header("Location:../../index.php?alert=" . $alert);
  } else {
    $alert = "Vui lòng kiểm tra lại Email và Password";
  }
  
}



?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Đăng nhập</title>
</head>

<body style="background-image: url(https://khoimoc.com/uploads/news/2019_04/mau-1-thie-ke-shop-thoi-trang-nam.jpg);width:100%;">
  <div class="text-center text-danger">
    <h1>Đăng Nhập Tài Khoản </h1>
    <?php if ($alert) : ?>
      <div class="alert alert-success" role="alert">
        <?= $alert; ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="container" style="width: 480px; height:320px; margin: 0px auto; border:1px solid blue;border-radius: 10px; background:white;box-shadow: 10px 10px 10px black;">
    <form action="" method="post">


      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
        <small id="emailHelp" class="form-text text-danger">Vui lòng nhập Email</small>
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        <small id="passwordHelp" class="form-text text-danger">Vui lòng nhập Mật Khẩu</small>
      </div>
      <button type="submit" class="btn" style="width:100%; background:#0066ff ;">Đăng nhập</button>
      <br> <br>
      <p class="text-right"> <a href="register.php"> ->Nhấn vào đây để đăng ký</a> </p>

    </form>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>