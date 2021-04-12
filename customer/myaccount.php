
<?php
session_start();
if(!isset($_SESSION['customer_email']))
{
  header("Location: ../checkout.php");
}else

{
include("includes/db.php");
include("../admin_area/functions/function.php");

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

<a href="#" class="btn btn-success btn-sm buttons ">Welcome guest</a>
<a href="#">Shopping cart Total Price : INR 100 Total items 2</a>


</div>


<div class="col-md-6">
<ul class="menu">
<li>
<a href="../customer_registration.php">Register</a>

</li>
<li>
<a href="myaccount.php">My Account</a>

</li>
<li>
<a href="../cart.php">Goto Cart</a>

</li>
<li>
<a href="../login.php">Log In</a>

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
      <li class="nav-item">
        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../shop.php">Shop</a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="myaccount.php">My Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../cart.php">Shopping Cart</a>
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
<!--including my order.php-->
<?php    

if(isset($_GET['my_order']))
{
  include "my_order.php";
}

?>
<!--including my order.php-->

<!--including pay offline-->

<?php    

if(isset($_GET['pay_offline']))
{
  include "pay_offline.php";
}

?>


<!--including pay offline-->

<!--including edit account page-->

<?php    

if(isset($_GET['edit_act']))
{
  include "edit_act.php";
}

?>

<!---including edit account page-->


<!--change password-->

<?php    

if(isset($_GET['change_pass']))
{
  include "change_password.php";
}

?>



<?php    

if(isset($_GET['delete_ac']))
{
  include "delete_ac.php";
}

?>

<!---including edit account page-->
</div>






</div>  <!--container end-->
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
<?php

}

?>