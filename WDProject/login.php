<?php

include_once "back-end/connection.php";
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = ($_POST['password']);
    $select = "SELECT * FROM `users` WHERE email='$email' && password='$pass'";
    $result =  mysqli_query($conn, $select);

    $adminUser = 'admin@admin.net';
    $adminPass = 'admin1';


    switch ($email) {
        case $adminUser:
            if ($pass = $adminPass) {
                header('location:admin.php');
            } else {
                echo 'error';
            }
            break;

        default:
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['email'] = $email;
                header('location:index.php');
            } else {
                $error = 'Wrong email or password';
            }
    }
}

// if($email=$adminUser && $password=$adminPass){
//             header('location:admin.php');
//         }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="mystyle.css">
    <!--BOOTSTRAP CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php
    include "included/navbar.php";
    ?>
    <div class="login_container">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3>Please Login</h3>
                            <?php if (isset($error)) {
                                echo '<span class="error-msg" style="color:red;">' . $error . '</span>';
                            }
                            ?>
                        </div>
                        <div class="panel-body">
                            <p>Customer must have an account to place an order.</p>
                            <form method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="email@address.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="password (min. 6 characters)" pattern=".{6,}">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Login" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer">Don't have an account yet? <a href="register.php">Register</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "included/footer.php"
    ?>
    <!--BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>