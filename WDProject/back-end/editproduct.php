<?php
include 'connection.php';


$id = $_GET['editid'];

$var_result = mysqli_query($conn, ("SELECT * FROM `printers` where id = $id"));
$printer_data = mysqli_fetch_assoc($var_result);
$name = $printer_data['name'];
$printer_desc = $printer_data['printer_desc'];
$price = $printer_data['price'];
$img_src = $printer_data['img_src'];


if (isset($_POST['updateproduct'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $imgsrc = $_POST['imgsrc'];

    $sql = "UPDATE `printers` set id=$id, name='$name', printer_desc='$desc', price='$price', img_src='$imgsrc' where id=$id ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "success";
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
    <br><br>
    <div class="container">
        <?php
        echo '<h3>Update Printer ' . $id . ' </h3>';
        ?>
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" id="name" value=<?php echo $name; ?>>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Printer Description</label>
                <input type="text" name="desc" class="form-control" id="desc" value=<?php echo $printer_desc; ?>>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" class="form-control" id="price" value=<?php echo $price; ?>>
            </div>
            <div class="mb-3">
                <label for="imgsrc" class="form-label">Image Source</label>
                <input type="text" name="imgsrc" class="form-control" id="imgsrc" value=<?php echo $img_src; ?>>
            </div>
            <button type="submit" name="updateproduct" id="updateproduct" class="btn btn-success">Update</button>
        </form>
    </div>
    <!--BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>