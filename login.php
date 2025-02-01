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

<!DOCTYPE html>
<html>
 <html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet"  href="style.css">
  </head>
  <body>
  <div class="login-container">
    <h2>Login In</h2>
    <form method="post">
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" class="input" id="email" name="email" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" class="input" id="password" name="password" required>
      </div>
      <button type="submit" class="log">Login</button>
    </form>
    <div class="signup-link">
      Don't have an account? <a href="register.php" class="link">Register</a>
    </div>
  </div>
  </body>
</html>