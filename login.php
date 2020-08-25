<?php
//update data into database
if(isset($_POST['usubmit'])){
    $email=$_POST['uemail'];
    $password=$_POST['upassword'];
    $connection=mysqli_connect('localhost','root','','login');
    $query="UPDATE students SET password='$password' WHERE email='$email'";
    $result=mysqli_query($connection,$query);
    if($result){
        echo "Updated Successfully";
    }else{
        die('Update Failed'.mysqli_error());
    }

}
?>
<?php 
//delete data from database
if(isset($_POST['dsubmit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $connection=mysqli_connect('localhost','root','','login');
    $query="DELETE FROM students WHERE email='$email'";
    $result=mysqli_query($connection,$query);
    if($result){
        echo "Deleted Successfully";
    }else{
        die('Delete Failed'.mysqli_error());
    }

}


?>
<?php 
//insert
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $connection=mysqli_connect('localhost','root','','login');
    $query="INSERT INTO students (id,email,password) VALUES ( '0','$email','$password')";
    $result=mysqli_query($connection,$query);
    if($result){
        echo "Data submitted Successfully";
    }else{
        die('Inserted Failed'.mysqli_error());
    }

}



?>
<?php 
  //Displaying data in 
    $connection=mysqli_connect('localhost','root','','login');
    $query="SELECT * FROM students";
    $result=mysqli_query($connection,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
  <form method="post">
    <table>
        <tr>
            Email:
            <input type="email" name="email" placeholder="enter email">
        </tr>
        <tr>
            Password:
            <input type="password" name="password" placeholder="enter valid password">
        </tr>
        <tr>
        <input type="submit" name="submit" value="Sign Up" class="btn btn-primary"></tr>
        <tr>
        <input type="submit" name="dsubmit" value="Delete" class="btn btn-danger"></tr>
    </table>
    </form>
    <!-- for update-->
    <h4>For update</h4>
     <form method="post">
    <table>
        <tr>
            Existing Email:
            <input type="email" name="uemail" placeholder="enter email">
        </tr>
        <tr>
            Password:
            <input type="password" name="upassword" placeholder="enter valid password">
        </tr>
        <tr>
        <input type="submit" name="usubmit" value="Update" class="btn btn-primary"></tr>
    </table>
    </form>
    <!-- show the data in to table format-->
    <br><br>
    <table border="1" align="center">
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Password</th>
            </tr>
            <?php 
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_array($result)){
                    ?>
                    <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    </tr>

            <?php
                }
            }
            ?>
    </table>

  
</body>
</html>