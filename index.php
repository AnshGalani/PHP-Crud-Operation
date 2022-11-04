<?php
include "connection.php";
include "header.php";

if (isset($_REQUEST['btnsubmit'])) {
    $q = "select * from admin where 
        admin_name like'%" . $_REQUEST['admin_name'] . "' and
        admin_pass like'%" . $_REQUEST['admin_pass'] . "' 
        ";

    $res = mysqli_query($con, $q);
    if (mysqli_num_rows($res) > 0) {
        header('location:user_display.php');
    } else {
        echo "<script>alert('Invalid Username Or Password');</script>";
    }
}
?>

<html>

<body>
    <form method="POST">
        <table class="table table-hover">
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="admin_name" class="form-control" required></td>
            </tr>

            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="admin_pass" class="form-control" required></td>
            </tr>

            <tr>
                <td><input type="submit" name="btnsubmit" value="Login" class="btn btn-primary"></td>
                <td>:</td>
                <td><input type="reset" name="btnreset" value="Reset" class="btn btn-danger"></td>
            </tr>

        </table>
    </form>
</body>

</html>