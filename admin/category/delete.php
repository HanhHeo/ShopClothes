<?php 
    include_once "../database/db.php";

    $id = $_GET['id'];
    $sql    = " DELETE FROM categories WHERE id = $id";
    $query  = $connect->query($sql);
    $query->setFetchMode(PDO::FETCH_OBJ);
    $delete   = $query->fetch();
    header("Location: home.php");
?>