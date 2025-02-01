<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql= "SELECT * FROM `login` WHERE `email` = '$email'";
    $result = mysqli_query( $conn , $sql);
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['name'];
            $_SESSION['role'] = $row['role'];

            if ($row['role'] == 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: user.php");
            }
    } 
}
?>

