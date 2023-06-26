<?php
include 'connection.php';

if(isset($_GET['deleteid'])){
    $wishId = $_GET['deleteid'];

    $sql = "DELETE from `wishlist` where wish_id = $wishId";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:../account.php');
    }else{
        die(mysqli_error($conn));
    }
}
