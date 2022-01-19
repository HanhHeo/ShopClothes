
<?php 
$username = 'root';// đăng nhập CSDL
$password = ''; //mật khẩu
$option   = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); 
// kết nối tới CSDL
$connect = new PDO('mysql:host=localhost;dbname=fashion', $username, $password,$option);
?>

