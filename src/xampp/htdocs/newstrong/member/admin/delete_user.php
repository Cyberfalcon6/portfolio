<?php
include '../db.php';
include '../auth.php'; 

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $remove = mysqli_query($conn, "delete from users where id='$id'");
    if ($remove){
        header("Location: manageuser.php?success=1");
        exit();
    } else {
        header("Location: admin/manageuser.php?error=1");
        exit();
    }
}