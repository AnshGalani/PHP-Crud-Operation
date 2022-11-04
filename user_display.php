<?php
    include 'connection.php';
    include 'header.php';

    $q="select*from user";
    if(isset($_REQUEST['btnsearch'])){
        $q="select * from user where 
            ufname like '%".$_REQUEST['txtsearch']."%' or
            ulname like '%".$_REQUEST['txtsearch']."%' or
            email like '%".$_REQUEST['txtsearch']. "%' 
            ";
    }
    $res=mysqli_query($con,$q);
?>

<html>
    <body>
       <br>
        <form method="POST" style="padding-left: 10px;">
            Search: <input type="text" name="txtsearch" >
            <input type="submit" name="btnsearch" value="Search" class="btn btn-info">
            <input type="submit" value="Show all" class="btn btn-success">
        </form>
        <center><a href="user_insert.php"><button class="btn btn-outline-primary" style="margin-bottom: 20;">New Record</button></a><br> </center>
        <table class="table table-hover table-bordered">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Password</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
                while($row=mysqli_fetch_object(($res))){
            ?>

            <tr>
                <td><?php echo ucfirst($row->ufname);?></td>
                <td><?php echo $row->ulname; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><img src="image/<?php echo $row->image; ?>" alt="Your Photo" height="40" width="40"></td>
                <td><?php echo $row->password; ?></td>
                <td><a href="user_update.php?id=<?php echo $row->id; ?>"><button class="btn btn-secondary" style="border-radius: 10px;">Edit</button></a></td>
                <td><a href="user_delete.php?id=<?php echo $row->id; ?>" onclick="javascript:return confirm('Are you sure want to delete')"><button class="btn btn-danger" style="border-radius: 10px;">Delete</button></a></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>