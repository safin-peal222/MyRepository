<?php

include("includes/db.php");

?>


<div class="box">

<div class="box-header">


<center>

<h2>Login</h2>
<p class="lead">Already our customer</p>

</center>


</div>

<form action="checkout.php" method="post">

<div class="form-group">
<label for=""> Email:</label>
<input type="text" class="form-control"name="c_email" required="">

</div>

<div class="form-group">
<label for=""> Password:</label>
<input type="password" class="form-control"name="c_password" required="">

</div>

<div class="text-center">

<button name="login" value="login" class="btn btn-primary">Login</button>


</div>

</form>

<center>
<a href="customer_registration.php">register now</a>
</center>



</div>


<?php


if(isset($_POST['login']))
{
    $customer_email = $_POST['c_email'];
    $password=$_POST['c_password'];
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pw='$password'";
    $run_customer=mysqli_query($con,$select_customer) or die("query unsuccessfull");
    $check_customer= mysqli_num_rows($run_customer);
    $select_cart = "select * cart from cart where ip_add='2'";
    $run_cart = mysqli_query($con,$select_cart);
    $check_cart=mysqli_num_rows($run_cart);
    if($check_customer==0)
    {
        echo "<script>alert('password/email is wrong')</script>";
        exit();
    }
    if($check_customer==1 AND $check_cart==0)
    {
        $_SESSION['customer_email'] = $customer_email;
        echo "<script>alert('you are logged in')</script>";
        header("location: customer/myaccout.php");

    }else{
        $_SESSION['customer_email'] = $customer_email;
        echo "<script>alert('you are logged in')</script>";
        header("location : ./checkout.php");
    }
}


?>