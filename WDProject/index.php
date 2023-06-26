<?php
include('back-end/prodcard.php');
include('back-end/connection.php');
$result = mysqli_query($conn, "SELECT * FROM `printers`");
session_start();

//CART TRACKING
if (isset($_POST['addcart'])) {
    // print_r($_POST['id']);
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "id");

        if (in_array($_POST['id'], $item_array_id)) {
            echo "<script>alert('Product is already in shopping cart')</script>";
            echo "<script>windows.location=index.php'</script>";
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'id' => $_POST['id']
            );
            $_SESSION['cart'][$count] = $item_array;
            //   print_r($_SESSION['cart']);
        }
    } else {
        $item_array = array(
            'id' => $_POST['id']
        );
        //session variable
        $_SESSION['cart'][0] = $item_array;
        //   print_r($_SESSION['cart']);
    }
}

//WISHLIST
if (isset($_POST['addwish'])) {
    if (!isset($_SESSION['email'])) {
        header('location:login.php');
    } else {
        $productid = $_GET['id'];
        $email = $_SESSION['email'];
        $sqli_id = mysqli_query($conn, "select id from `users` where email = '$email'");
        while ($user_id_get = mysqli_fetch_array($sqli_id)) {
            $userId = $user_id_get['id'];
            // var_dump($userId);
            //check if already added
            $sql_check = "SELECT * FROM `wishlist` where user_id = $userId AND product_id = $productid";
            $check_results = mysqli_query($conn, $sql_check);

            if (mysqli_num_rows($check_results) == 1) {
                echo "<script>alert('Product is already on your Wishlist!')</script>";
                echo "<script>windows.location='index.php'</script>";
            } else {

                //add to wish db
                $sql = "INSERT INTO `wishlist` (`user_id`, `product_id`) VALUES ('$userId', '$productid')";
                $insert = mysqli_query($conn, $sql);
                echo "<script>alert('Item has been added to your Wishlist, check out 'My Account' to view your wishlist.')</script>";
                echo "<script>windows.location='index.php'</script>";
            }
        }
    }
}
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
    <main>
        <?php
        include "included/herosection.php"
        ?>


        <?php
        include "included/shop.php";
        ?>
    </main>
    <br><br><br><br>
    <?php
    include "included/footer.php"
    ?>


    <!--BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>