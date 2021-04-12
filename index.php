<?php
session_start();
include("includes/db.php");
include("function/function.php");

include("admin_area/functions/function.php");


                
         

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
<a href="#">Shopping cart Total Price : INR <?php getPrice()?> Total items <?php item();?></a>


</div>


<div class="col-md-6">
<ul class="menu">
<li>
<a href="customer_registration.php">Register</a>

</li>
<li>
<?php

if(!isset($_SESSION['customer_email']))
{
  echo "<a href='checkout.php'>My Account</a>";
}else{
  echo "<a href='customer/myaccount.php?my_order'>My Account</a>";
}







?>

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




</a>

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
        <a class="nav-link btn btn-primary" href="cart.php"><i class="fas fa-shopping-cart"></i> <?php item();?> items in shopping Cart</a>
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


<!--slider-->
<div class="container-fluid" id="slider">


<div class="col-md-12">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">

  <?php
  
  $get_slider ="select * from slider LIMIT 0,1";
  $run_slider = mysqli_query($con,$get_slider);
  while($row = mysqli_fetch_assoc($run_slider))
  {
    $slider_name = $row['slider_name'];
    $slider_image = $row['slider_images'];

    echo "<div class='carousel-item active'>
      <img src='./admin_area/slider_images/$slider_image' class='d-block w-100'>
    </div>
    ";

  }
  
  
  ?>

<?php

  
  $get_slider ="select * from slider LIMIT 0,1";
  $run_slider = mysqli_query($con,$get_slider);
  while($row = mysqli_fetch_assoc($run_slider))
  {
    $slider_name1 = $row['slider_name'];
    $slider_image1 = $row['slider_images'];

    echo "<div class='carousel-item'>
      <img src='./admin_area/slider_images/$slider_image' class='d-block w-100'>
    </div>
    ";

  }
  
  
  ?>
 

</div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>





</div>













</div>


















<!--slider-->




<!--advantage-->
<div id="advantage">
<div class="container">
<div class="row">

<div class="col-sm-4">
<div class="box same-height">

<div class="icon">

<i class="fa fa-heart"></i>
</div>
<h3><a href="#">BEST PRICES</a></h3>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores, assumenda.</p>
</div>

</div>
<div class="col-sm-4">
<div class="box same-height">

<div class="icon">

<i class="fa fa-heart"></i>
</div>
<h3><a href="#">100% Satisfaction Guaranteed from us</a></h3>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores, assumenda.</p>
</div>

</div>
<div class="col-sm-4">
<div class="box same-height">

<div class="icon">

<i class="fa fa-heart"></i>
</div>
<h3><a href="#">We love our Customers</a></h3>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores, assumenda.</p>
</div>

</div>

</div>


</div>


</div>



<div id="hotbox">
<div class="container">

<div class="row">

<div class="col-md-12 text-center">

<h2 class="text-primary">Latest This Week</h2>

</div>

</div>

</div>





</div>




<!--content-->
<div id="content">
<div class="container">
<div class="row">

<?php

getpro();

?>


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