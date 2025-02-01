<?php

  include "db.php";

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password_hash = password_hash($_POST['password'] , PASSWORD_DEFAULT);

    $sql ="INSERT INTO `login`(`name`,`email`,`password`)VALUES ('$name','$email','$password_hash')" ;

    if(mysqli_query($conn , $sql)){
      echo"<script>alert('Registerd');</script>";
    }else{
      echo"<script>alert('Error');</script>";
    };
  }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <h2>Register</h2>
    <form method="post">
      <div class="input-group">
        <label for="user">User Name</label>
        <input type="text" class="input" id="user" name="name" required >
      </div>
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required class="input">
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required class="input">
      </div>
      <button type="submit" class="log">Register</button>
    </form>
    <div class="signup-link">
      Don't have an account? <a href="login.php"class="link" >Come Back</a>
    </div>
</div>
</body>
</html>