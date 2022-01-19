<?php
session_start();
include_once "../database/db.php";
class User
{
  public $username;
  public $email;
  public $password;
}
$errors = [];
$show_alert = (isset($_REQUEST['show_alert'])) ? $_REQUEST['show_alert'] : 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $username        = trim($_POST['username']);
  $email           = trim($_POST['email']);
  $password        = trim($_POST['password']);
  $confirmpassword = trim($_POST['confirmpassword']);
  $sql             = " INSERT INTO user(name,email,password) VALUES ( '$username','$email','$password')";
  $stmt            = $connect->query($sql);




  if ($stmt == true) {
    $show_alert = "Đăng ký thành công";
  }
  if ($username == "") {
    $errors['username'] = "Vui lòng nhập tên";
  }
  if ($username == "") {
    $errors['email'] = "Vui lòng nhập email";
  }
  if ($username == "") {
    $errors['password'] = "Vui lòng nhập mật khẩu";
  }
  if ($confirmpassword == "") {
    $errors['confirmpassword'] = "Vui lòng xác nhận lại mật khẩu";
  } else {

    header("Loacation: register.php?show_alert=1");
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

  <title>Đăng ký</title>
</head>

<body style="background-image: url(https://khoimoc.com/uploads/news/2019_04/mau-1-thie-ke-shop-thoi-trang-nam.jpg);width:100%;">
  <div class="text-center text-danger">
    <h1>Đăng Ký Tài Khoản</h1>
    <?php if ($show_alert) : ?>
      <div class="alert alert-success" role="alert">
        Đăng Ký Thành Công,Vui Lòng Nhấn Vào <a href="login.php"> đây</a> để tới trang đăng nhập
      </div>
    <?php endif; ?>
  </div>
  <div class="container" style="width: 480px; height:460px; margin: 0px auto; border:1px solid blue;border-radius: 10px; background:white;box-shadow: 10px 10px 10px black;">
    <form action="" method="post" onsubmit="return validateForm();">
      <div class="form-group">
        <label for="exampleInputName1">Fullname</label>
        <input type="text" class="form-control" id="usr" placeholder="Name" name="username">

      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="text" class="form-control" id="eml" placeholder="Email" name="email">


      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Mật khẩu</label>
        <input type="password" class="form-control" id="pwd" placeholder="Password" name="password" minlength="6">


      </div>
      <div class="form-group">
        <label for="exampleConfirmPassword1">Xác nhận mật khẩu</label>
        <input type="password" class="form-control" id="cnfpwd" placeholder="ConfirmPassword" name="confirmpassword">
        <small class="form-text text-danger">


      </div>

      <p> <a href="login.php">Tôi đã có tài khoản</a></p>
      <button type="submit" class="btn" style="width:100%; background:#0066ff ;color:white;">Đăng ký</button>
    </form>
  </div>
  <script>
    function validateForm() {
      $pwd = $('#pwd').val();
      $confirmpassword = $('#cnfpwd').val();
      if ($pwd != $cnfpwd) {
        alert("Mật khẩu không đúng,Vui lòng kiểm tra lại");
        return false;
      }
      return true;
    }
  </script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>