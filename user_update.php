<?php
include 'connection.php';
include 'header.php';

$q1 = "select*from user where id=" . $_GET['id'];
$res = mysqli_query($con, $q1);
$row = mysqli_fetch_object($res);

if (isset($_REQUEST['btnsubmit'])) {
    if ($_FILES['image']['name'] == "") {
        $q = "update user set
            ufname='" . $_REQUEST['user_fname'] . "',
            ulname='" . $_REQUEST['user_lname'] . "',
            email='" . $_REQUEST['user_email'] . "',
            password='" . $_REQUEST['user_pass'] . "'
            where id=" . $_GET['id'];
    } else {
        @$q = "update user set
            ufname='" . $_REQUEST['user_fname'] . "',
            ulname='" . $_REQUEST['user_lname'] . "',
            email='" . $_REQUEST['user_email'] . "',
            image='" . $_FILES['image']['name'] . "',
            password='" . $_REQUEST['user_pass'] . "'
            where id=" . $_GET['id'];

        move_uploaded_file($_FILES['image']['tmp_name'], "image/" . $_FILES['image']['name']);
    }
    mysqli_query($con, $q);
    header('location:user_display.php');
}

?>

<html>

<body>
    <form method="POST" enctype="multipart/form-data">
        <table class="table table-hover">
            <tr>
                <td>First Name</td>
                <td>:</td>
                <td><input type="text" name="user_fname" class="form-control" value="<?php echo $row->ufname; ?>" required>
            </td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>:</td>
                <td><input type="text" name="user_lname" class="form-control" value="<?php echo $row->ulname; ?>" required></td>
            </tr>

            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="email" name="user_email" class="form-control" value="<?php echo $row->email; ?>" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="user_pass" class="form-control" value="<?php echo $row->password; ?>" required></td>
            </tr>
            <tr>
                <td>Photo</td>
                <td>:</td>
                <td><input type="file" name="image" class="form-control">
                <img src="image/<?php echo $row->image; ?>" alt="Your Photo" height="25" width="25"> </td>
            
            </tr>
            <tr>
                <td><input type="submit" name="btnsubmit" value="Update" class="btn btn-primary" style="border-radius: 10px;"></td>
                <td>:</td>
                <td><input type="reset" name="btnreset" value="Reset" class="btn btn-danger" style="border-radius: 10px;"></td>
            </tr>
        </table>
    </form>
</body>

</html>