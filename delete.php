<?php
    include "db.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM `products` WHERE `id` = $id ";
    mysqli_query($conn, $sql);
    header("location:read.php");

?>















<?php
//     include "db.php";
//    $id = $_GET['id']; 
//    $sql = "DELETE FROM `products` WHERE `id` = $id ";
//     mysqli_query($conn, $sql);
//     header("location:read.php");
?>