<?php
session_start();
include "db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $image_name = $_FILES['image']['name'];
    $image_location = $_FILES['image']['tmp_name'];
    move_uploaded_file( $image_location , "images/$image_name");
    $description = $_POST['description'];
    $price = $_POST['price'];
    $sql = "INSERT INTO `products` (`name`, `image` , `details`, `price`)  VALUES('$name','$image_name','$description','$price')";
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
    <title>admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="row d-flex justify-contect-center align-item-center">
            <div class="col-lg-6">
                <div class="home ">
                <h1 class="my-5 text-center  text-white  " > Admin Page</h1>
                <h3 class="mb-3 text-center  text-white"> Hello MS/MR: <?php echo $_SESSION['username'];?></h3>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="login-container ">
                    <h2>Add Products</h2>
                    <form method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <label for="user">Add Name</label>
                            <input type="text" class="input" id="user" name="name" required >
                        </div>

                        <div class="input-group">
                            <label for="image">Add Image</label>
                            <input type="file" id="image" name="image" required class="image" >
                        </div>
                        
                        <div class="input-group">
                            <label for="description">Add Description</label>
                            <textarea name="description" id="description" class= "input"></textarea>
                        </div>
                        
                        <div class="input-group">
                            <label for="price">Add Price</label>
                            <input type="number" id="price" name="price" required class="input" >
                        </div>

                        <a href="read.php" class="btn btn-primary log" type="button" >Add Product</a>
                    </form>
                </div>
            </div>
      </div>
 </div>
</body>
</html>