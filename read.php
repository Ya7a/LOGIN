<?php
    include "db.php";
    $sql = "SELECT * FROM `products`";
    $result = mysqli_query( $conn , $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>read</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="my-5 text-center">All Products</h2>
            </div>
            <div class="col-lg-12">
                <table class="table table-dark table-striped-columns">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Details</th>
                        <th scope="col">Price</th>
                        <th scope="col">Createrd</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php while($row = mysqli_fetch_assoc($result)):?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><img src="images/<?php echo $row['image'];?>" width="50" height="50"></td>
                                <td><?php echo $row['details']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['created']; ?></td>
                                <td><button class="btn btn-info">Edit</button></td>
                                <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                            </tr>
                        <?php endwhile;?> 
                    </tbody>
                </table>        
            </div>
        </div>
    </div>
</body>
</html>
