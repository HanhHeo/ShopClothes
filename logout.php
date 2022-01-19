<?php 
    if(isset($_SESSION)){
unset($_SESSION['user']);
header('Location:index.php');
};
?>