


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
  <?php
  
  if(!isset($_SESSION['customer_email']))
  {
    echo "<a href='checkout.php'>My Account</a>";
  }else{
    echo "<a href='customer/myaccount.php?my_order'>My Account</a>";
  }
  
  
  
  
  
  
  

  
  ?>
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

<div class="col-md-9">

<?php

if(isset($_SESSION['customer_email']))
{
   
   include("./payment.php");
   
}else{
include("./customer_login.php");
   
}




?>



</div>


</div>
</div>



<!--footer start-->
<?php

include("./includes/footer.php");


?>


