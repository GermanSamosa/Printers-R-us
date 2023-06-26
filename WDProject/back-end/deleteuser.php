<?php
include 'connection.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "DELETE FROM `users` where id=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header('location:../admin.php');
    }else{
        die(mysqli_error($conn));
    }
}
