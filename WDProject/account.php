<?php

session_start();
include_once('back-end/connection.php');
require_once('back-end/prodcard.php');

// REMOVE FROM CART
if (isset($_POST['remove'])) {
  if ($_GET['action'] == 'remove') {
    foreach ($_SESSION['cart'] as $key => $value) {
      if ($value['id'] == $_GET['id']) {
        unset($_SESSION['cart'][$key]);
        echo "<script>alert('Product has been removed from your shopping cart')</script>";
        echo "<script>window.location = 'account.php'</script>";
      }
    }
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
        echo "<script>windows.location=index.php'</script>";
      } else {
        //add to wish db
        $sql = "INSERT INTO `wishlist` (`user_id`, `product_id`) VALUES ('$userId', '$productid')";
        $insert = mysqli_query($conn, $sql);
      }
    }
  }
}


//ADD WISH TO CART
if (isset($_POST['addcart'])) {
  // var_dump($_GET['id']);
  if (isset($_SESSION['cart'])) {
    $item_array_id = array_column($_SESSION['cart'], "id");

    if (in_array($_GET['id'], $item_array_id)) {
      echo "<script>alert('Product is already in shopping cart')</script>";
      echo "<script>windows.location=index.php'</script>";
    } else {
      $count = count($_SESSION['cart']);
      $item_array = array(
        'id' => $_GET['id']
      );
      $_SESSION['cart'][$count] = $item_array;
      // print_r($_SESSION['cart']);
      //remove wishlist here
    }
  } else {
    $item_array = array(
      'id' => $_GET['id']
    );
    //session variable
    $_SESSION['cart'][0] = $item_array;
    print_r($_SESSION['cart']);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Account</title>
  <link rel="stylesheet" href="mystyle.css">
  <!--BOOTSTRAP CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
  <?php
  include "included/navbar.php";
  ?>
  <main class="container">
    <!-- My Account start-->
    <h1>Welcome <?php

                //lets welcome our user
                if (isset($_SESSION['email'])) {
                  $email = $_SESSION['email'];
                  $findName = mysqli_query($conn, "SELECT `name` FROM `USERS` WHERE email = '$email'");
                  while ($username = mysqli_fetch_array($findName)) {
                    $name = $username['name'];
                    echo $name;
                  }
                }

                ?></h1>
    <p>Your Shopping cart is for what you want now, your Wishlist will be there for you later.</p>
    <!-- My Account end-->
    <!-- Shopping cart start -->
    <div class="container-fluid">
      <div class="row px-5">
        <div class="col-md-6">
          <div class="shopping-cart">
            <h6>Your Shopping Cart</h6>
            <hr>
            <?php

            $total = 0;

            if (isset($_SESSION['cart'])) {

              $productid = array_column($_SESSION['cart'], "id");
              $result = mysqli_query($conn, "SELECT * FROM `printers`");
              while ($row = mysqli_fetch_assoc($result)) {
                foreach ($productid as $id) {
                  if ($row['id'] == $id) {
                    cartProduct($row['img_src'], $row['name'], $row['printer_desc'], $row['price'], $row['id']);
                    $total += (int)$row['price'];
                  }
                }
              }
            } else {
              echo "<h6>Cart is Empty</h6>";
            }

            ?>
          </div>
        </div>
        <div class="col-md-5 offset-md-1 mt-5 bg-white h-25">
          <div class="pt-4">
            <h6>Price Details</h6>
            <hr>
            <div class="row price-details">
              <div class="col-md-6">
                <?php
                if (isset($_SESSION['cart'])) {
                  $count = count($_SESSION['cart']);
                  echo "<h6>Price ($count items)</h6>";
                } else {
                  echo "<h6>Price (0 items)</h6>";
                }
                ?>
                <h6>Delivery Charges</h6>
                <hr>
                <h6>Amount Payable</h6>
              </div>
              <div class="col-md-6">
                <h6><?php echo $total ?>$</h6>
                <h6 class="text-success">FREE</h6>
                <hr>
                <h6><?php
                    echo $total;
                    ?>$</h6>
                <button class="btn btn-success">Purchase</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Shopping cart end -->
    <hr>
    <!-- Wish List star -->
    <div class="row px-5">
      <div class="col-md-6">
        <div class="shopping-cart">
          <h6>Your WishList</h6>
          <hr>

          <?php

          if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $sqli_id = mysqli_query($conn, "select id from `users` where email = '$email'");
            while ($user_id_get = mysqli_fetch_array($sqli_id)) {
              $userId = $user_id_get['id'];
              $wishQuery = "SELECT * FROM wishlist JOIN printers on printers.id = wishlist.product_id WHERE wishlist.user_id = $userId";
              $wish_result = mysqli_query($conn, $wishQuery);
              if (mysqli_num_rows($wish_result) > 0) {
                while ($row = mysqli_fetch_assoc($wish_result)) {
                  wishProd($row['user_id'], $row['product_id'], $row['price'], $row['printer_desc'], $row['name'], $row['img_src'], $row['wish_id']);
                }
              }
            }
          }
          ?>
        </div>
      </div>
      <!-- Wish List end -->
  </main>
  <br><br><br><br>
  <?php
  include "included/footer.php"
  ?>


  <!--BOOTSTRAP JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>