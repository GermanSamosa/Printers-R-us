<?php
include_once 'back-end/connection.php';
session_start();

if (isset($_POST['submit'])) {
  $name = $_POST['inputname'];
  $email = $_POST['inputemail'];
  $password = $_POST['inputpassword'];
  $mobile = $_POST['mobile'];

  $select = "SELECT * FROM `users` WHERE email='$email' && password='$pass'";
  $result =  mysqli_query($conn, $select);

  if (mysqli_num_rows($result) > 0) {
    $error = "You're already in the system!";
  } else {
    $insert = "INSERT INTO `users` (name, mobile, email, password) VALUES('$name', '$mobile', '$email', '$password')";
    mysqli_query($conn, $insert);
    header('location:login.php');
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
  <main class="login_container">
    <h3>Register an Account</h3>
    <p>Our customers have access to amazing products at competitive pricing.
      Join us today to forever change the way you print.</p>
    <form method="post" class="row g-3">
      <div class="col-12">
        <label for="inputname" class="form-label">Full Name</label>
        <input type="text" name="inputname" class="form-control" id="inputname" placeholder="George Gnarldo" required>
      </div>
      <div class="col-md-6">
        <label for="inputemail" class="form-label">Email</label>
        <input type="email" name="inputemail" class="form-control" id="inputemail" placeholder="george.gnrldo@gnarleycity.ca" required>
      </div>
      <div class="col-md-6">
        <label for="inputpassword" class="form-label">Password</label>
        <input type="password" name="inputpassword" class="form-control" id="inputpassword" required>
      </div>
      <div class="col-12">
        <label for="mobile" class="form-label">Mobile Phone Number</label>
        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="(514) 789-3455" required>
      </div>
      <div class="col-12">
        <button type="submit" name="submit" class="btn btn-primary">Register</button>
      </div>
    </form>
  </main>
  <?php
  include "included/footer.php"
  ?>


  <!--BOOTSTRAP JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>