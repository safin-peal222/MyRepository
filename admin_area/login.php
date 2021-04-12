<?php
session_start();
include './includes/db.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/login.css">
</head>
<body>
    <div class="container">
    
    <form class="form-login" action="" method="post">
    <h2 class="form-login-heading">
    Admin Login
    
    </h2>
    <input type="text" class="form-control" name="admin_email"Placeholder="Email Address" required>
    <input type="password" name="admin_password" class="form-control" placeholder="Password" required>
    <div class="submit">
    <input type="submit" class="btn btn-lg btn-primary form-control" name="admin_login" value="Admin Login">
    </div>
    <h4 class="forgot_password">
    <a href="forgot_password.php">Lost Your Password?Forgot Password</a>
    </h4>
    
    
    </form>
    
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>


<?php

if(isset($_POST['admin_login']))
{
    $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
    $admin_pass = mysqli_real_escape_string($con,$_POST['admin_password']);
    $get_admin="select * from admins where admin_email = '$admin_email' AND admin_pass = '$admin_pass'";
    $run_admin=mysqli_query($con,$get_admin);
    $count=mysqli_num_rows($run_admin);
    if($count==1)
    {
        $_SESSION['admin_email']=$admin_email;
        echo "<script>alert('you are logged in')</script>";
        header("location: ./index.php?dashboard");
    }
}









?>