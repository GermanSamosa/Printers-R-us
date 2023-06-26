<?php
include 'back-end/connection.php';
//USER MANAGEMENT
if(isset($_POST['adduser'])){
    $username = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $userpass = $_POST['password'];

    $sql = "INSERT INTO `users` (name, mobile, email, password)
    values('$username','$mobile','$email','$userpass')";
    $result = mysqli_query($conn, $sql);
}
//PRODUCT MANAGEMENT
if(isset($_POST['addproduct'])){
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $imgsrc = $_POST['imgsrc'];

    $sql = "INSERT INTO `printers` (name, printer_desc, price, img_src)
    values('$name','$desc','$price','$imgsrc')";
    $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="mystyle.css">
    <!--BOOTSTRAP CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <?php
      include "included/navbar.php";
    ?>
    <main class="container">
        <div class="row justify-content-around">
            <div class="col-6">
                <!-- COLUMN 1 USERS -->

            
            <h1>User Manager</h1>
            <!-- USER ADDED FORM START -->
            <div class="form">
                <form action="admin.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">User Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Mark Ruffalo">
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Number</label>
                        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="(416) 760-8837">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="mark.ruff@gmail.ca">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="Hulk12">
                    </div>
                    <button type="submit" name="adduser" id="adduser" class="btn btn-success">Add User</button>
                </form>
            </div>
            <!-- USER ADDED FORM END -->
            <!-- USER GET TABLE START -->
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                $sql_getUsers = "SELECT * FROM `users`";
                $result_getUsers = mysqli_query($conn, $sql_getUsers);
                if($result_getUsers){
                    while($row = mysqli_fetch_assoc($result_getUsers)){
                        $id = $row['id'];
                        $name = $row['name'];
                        $mobile = $row['mobile'];
                        $email = $row['email'];
                        $password = $row['password'];
                        echo '
                            <tr>
                                <td>'.$id.'</td>
                                <td>'.$name.'</td>
                                <td>'.$mobile.'</td>
                                <td>'.$email.'</td>
                                <td>'.$password.'</td>
                                <td><button style="margin: 2px;" name="update" class="btn btn-warning btn-sm"><a href="back-end/edituser.php?editid='.$id.'" style="text-decoration: none;" style="color: black;" class="text-light">Update</a></button>
                                <button style="margin: 2px;" name="delete" class="btn btn-danger btn-sm"><a href="back-end/deleteuser.php?deleteid='.$id.'" style="text-decoration: none;" class="text-light">Delete</a></button></td>
                            </tr>
                        ';
                    }
                }
            ?>
            </tbody>
            </table>
            <!-- USER GET TABLE END -->
            </div>
        <div class="col-6">
            <!-- COLUMN 2 PRODUCTS -->


            <h1>Product Manager</h1>
            <!-- PRODUCT ADDED FORM START -->
            <div class="form">
                <form action="admin.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="EZ-2UZ Printer 5000">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Printer Description</label>
                        <input type="text" name="desc" class="form-control" id="desc" placeholder="DIY professional printing has never been easier! Small, light and easy to use.">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="999999">
                    </div>
                    <div class="mb-3">
                        <label for="imgsrc" class="form-label">Image Source</label>
                        <input type="text" name="imgsrc" class="form-control" id="imgsrc" placeholder="kewl_pic.png">
                    </div>
                    <button type="submit" name="addproduct" id="addproduct" class="btn btn-success">Add Product</button>
                </form>
            </div>
            <!-- PRODUCT ADDED FORM END -->
            <!-- PRODUCT GET TABLE START -->
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image Source</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql_getPrinters = "SELECT * FROM `printers`";
                $result_getPrinters = mysqli_query($conn, $sql_getPrinters);
                if($result_getPrinters){
                    while($row = mysqli_fetch_assoc($result_getPrinters)){
                        $id = $row['id'];
                        $name = $row['name'];
                        $desc = $row['printer_desc'];
                        $price = $row['price'];
                        $img_src = $row['img_src'];
                        echo '
                            <tr>
                                <td>'.$id.'</td>
                                <td>'.$name.'</td>
                                <td>'.$desc.'</td>
                                <td>'.$price.'</td>
                                <td>'.$img_src.'</td>
                                <td><button style="margin: 2px;" name="update" class="btn btn-warning btn-sm"><a href="back-end/editproduct.php?editid='.$id.'" style="text-decoration: none;" style="color: black;" class="text-light">Update</a></button>
                                <button style="margin: 2px;" name="delete" class="btn btn-danger btn-sm"><a href="back-end/deleteproduct.php?deleteid='.$id.'" style="text-decoration: none;" class="text-light">Delete</a></button></td>
                            </tr>
                        ';
                    }
                }
            ?>
                </tbody>
            </table>
            <!-- PRODUCT GET TABLE END -->
        </div>
        </div>
    </main>
    <br><br><br><br>
    <?php
      include "included/footer.php"
    ?>


<!--BOOTSTRAP JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>