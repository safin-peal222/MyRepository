<?php
session_start();
include("function/function.php");
include("includes/db.php");


?>
<?php

if(isset($_POST['submit']))
{
  $c_name=$_POST['c_name'];
  $c_mail=$_POST['c_email'];
  $c_password=$_POST['c_password'];
  $c_country=$_POST['c_country'];
  $c_city=$_POST['c_city'];
  $c_contact=$_POST['c_contact'];
  $c_address=$_POST['c_address'];
  $c_imageName=$_FILES['cimage']['name'];
  $c_imagetmp =$_FILES['cimage']['tmp_name'];
  $c_ip = 2;
  move_uploaded_file($c_imagetmp,"customer/customer_images/".$c_imageName);
  $insert_customer="INSERT INTO customers (customer_name,customer_email,customer_pw,customer_country,customer_city,customer_contact,customer_address,customer_img,customer_ip) VALUES('$c_name','$c_mail','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_imageName','$c_ip')";
  $run_customer=mysqli_query($con,$insert_customer);
  $sel_cart = "SELECT * FROM cart where ip_add ='$c_ip'";
  $run_cart = mysqli_query($con,$sel_cart);
  if(mysqli_num_rows($run_cart)>0)
  {
    $_SESSION['customer_email'] = $c_mail;
    $logged_in = "you have";
    header("location: ./checkout.php");
    
  }else{
 $not_logged_in ="you dont have";
 $_SESSION['customer_email'] = $c_mail;
    header("location : ./index.php");
  }
  
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E commerce</title>
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./font-awesome/all.min.css">
    <link rel="stylesheet" href="./font-awesome/fontawesome.min.css">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    










<div id="top">  <!--container top-->

<div class="container">

<div class="row">

<div class="col-md-6 offer">

<a href="#" class="btn btn-success btn-sm buttons "> 
<?php
 if(!isset($_SESSION['customer_email']))
{
  echo "Welcome Guest";
}
else{
   echo "welcome:".$_SESSION['customer_email']." ";
}
?>
</a>
<a href="#">Shopping cart Total Price : INR 100 Total items 2</a>


</div>


<div class="col-md-6">
<ul class="menu">
<li>
<a href="customer_registration.php">Register</a>

</li>
<li>
<a href="customer/myaccount.php">My Account</a>

</li>
<li>
<a href="cart.php">Goto Cart</a>

</li>
<li>

<?php

if(!isset($_SESSION['customer_email']))
{
  echo "<a href='checkout.php'>Login</a>";
}else{
  echo "<a href='logout.php'>Logout</a>";
}


?>
</li>


</ul>


</div>




</div>


</div>




</div>




<div id="navbar">
<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">E-Commerce</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="shop.php">Shop</a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="customer/myaccount.php">My Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php">Shopping Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="services.php">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li>

      <li class="nav-item">
        <a class="nav-link btn btn-primary" href="cart.php"><i class="fas fa-shopping-cart"></i> 4 items in shopping Cart</a>
      </li>
      
    </ul>
    <form class="form-inline my-lg-0">
      <input class="form-control my-2 mx-1" type="search" placeholder="Search" aria-label="Search" name="user_query">
      <button class="btn btn-outline-success" type="submit" name="search"><i class="fas fa-search-plus"></i>Search</button>
    </form>
  </div>
</nav>



</div>


</div>

<div id="content">

<div class="container">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="home.php">Home</a></li>
<li>Shop</li>

</ul>

</div>

<div class="row">
<div class="col-md-3">

<?php

include("includes/sidebar.php");

?>


</div>

<div class="col-md-9"> <!--col-md-9 start-->
<div class="box"><!--box-->
<div class="box-header">
<center>
<h2> CustomerRegistration </h2>
<p class="text-muted">
Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt possimus cum molestias atque reprehenderit porro ullam! Dignissimos nam est enim.

<?php

if(!empty($logged_in))
{
  echo '<p class="alert alert-warning">'.$logged_in.'</p>';
}
if(!empty($not_logged_in))
{
  echo "<p class='alert alert-warning'>'.$not_logged_in.'</p>";
}


?>
</p>

</center>

</div>
<form action="customer_registration.php" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="">Customer Name</label>
<input type="text" name="c_name" required="" class="form-control">

</div>

<div class="form-group">
<label for="">Customer Email</label>
<input type="text" name="c_email" required="" class="form-control">

</div>

<div class="form-group">
<label for="">Customer Password</label>
<input type="password" name="c_password" required="" class="form-control">

</div>
<div class="form-group">
<label for="">Country</label>
<input type="password" name="c_country" required="" class="form-control">

</div>
<div class="form-group">
<label for="">City</label>
<input type="password" name="c_city" required="" class="form-control">

</div>
<div class="form-group">
<label for="">Contact Number</label>
<input type="password" name="c_contact" required="" class="form-control">

</div>

<div class="form-group">
<label for="">Address</label>
<input type="password" name="c_address" required="" class="form-control">

</div>

<div class="form-group">
<label for="">Image</label>
<input type="file" name="cimage" required="" class="form-control">

</div>

<div class="text-center">
<button type="submit"name="submit"class="btn btn-primary"><i class="fa fa-user-md"></i>Register</button>
</div>


</form>


</div> <!--box-->

</div>


</div>
</div>



<!--footer start-->
<?php

include("./includes/footer.php")

?>



<!--footer end-->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
