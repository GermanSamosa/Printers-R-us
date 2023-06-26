<?php
include 'connection.php';

//BRING OUT ID SELECTED EDITUSER.PHP?EDITID=$ID
$id = $_GET['editid']; // <====  MUST FIX SOMEHOW, IT IS UNDEFINED, MIGHT HAVE A WEIRD CHARACTER IN FROM OR SUM

// $sql = "SELECT * FROM `users` where id=$id";
$result = mysqli_query($conn, ("SELECT * FROM `users` where id=$id"));
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$mobile = $row['mobile'];
$email = $row['email'];
$password = $row['password'];

//UPDATE BY ID USERS
if (isset($_POST['updateuser'])) {
    $username = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE `users` set id=$id, name='$username', mobile= '$mobile', email = '$email', password = '$password' where id='$id' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:../admin.php');
    } else {
        die(mysqli_error($conn));
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

</body>

</html>
<br><br>
<main class="container">
    <?php
    echo '<h3>Update User ' . $id . ' </h3>';
    ?>


    <form method="post" class="row g-3">
        <div class="col-12">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" id="name" value=<?php echo $name; ?>>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value=<?php echo $email; ?>>
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="text" name="password" class="form-control" id="password" value=<?php echo $password; ?>>
        </div>
        <div class="col-12">
            <label for="mobile" class="form-label">Mobile Phone Number</label>
            <input type="text" name="mobile" class="form-control" id="mobile" value=<?php echo $mobile; ?>>
        </div>
        <div class="col-12">
            <button type="submit" name="updateuser" id="updateuser" class="btn btn-success">Update</button>
        </div>
    </form>
</main>

<!--BOOTSTRAP JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>