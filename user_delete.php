<?php
    include 'connection.php';
    $q1 = "select*from user where id=" . $_GET['id'];
    $res1 = mysqli_query($con, $q1);
    $row = mysqli_fetch_object($res1);
    
    $q="delete from user where id=".$_GET['id'];
    $res=mysqli_query($con,$q);
    if($res){
        unlink("image/".$row->image);

    }
    header('location:user_display.php');
?>

