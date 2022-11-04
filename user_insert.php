<?php
    include 'connection.php';
    include 'header.php';

    if(isset($_REQUEST['btnsubmit']))
    {
        @$q="insert into user set
        ufname='".$_REQUEST['user_fname']."',
        ulname='".$_REQUEST['user_lname']."',
        email='".$_REQUEST['user_email']."',
        image='".$_FILES['image'] ['name']."',
        password='".$_REQUEST['user_pass']."'
        ";

        move_uploaded_file($_FILES['image'] ['tmp_name'],"image/".$_FILES['image'] ['name']);
        mysqli_query($con,$q);
        header('location:user_display.php');
    }
   
?>

<html>
    <head>
    
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <table class="table table-hover">
            <tr>
                <td>First Name</td>
                <td>:</td>
                <td><input type="text" name="user_fname" class="form-control" required placeholder="Please Enter First Name"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>:</td>
                <td><input type="text" name="user_lname" class="form-control" required placeholder=" Please Enter Last Name"></td>
            </tr>

            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="email" name="user_email" class="form-control" required placeholder=" Please Enter Email"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="user_pass" class="form-control" required placeholder="Please Enter Password"></td>
            </tr>
            <tr>
                <td>Photo</td>
                <td>:</td>
                <td><input type="file" name="image" class="form-control rounded" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="btnsubmit" value="Save" class="btn btn-primary" style="border-radius: 10px;"></td>
                <td>:</td>
                <td><input type="reset" name="btnreset" value="Reset" class="btn btn-danger" style="border-radius: 10px;"></td>
            </tr>
            <tr>
                
            </tr>
        </form>
        </table>
    </body>
</html>