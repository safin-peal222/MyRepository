 <?php
session_start();
include("includes/db.php");
include("function/function.php");

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
<a href="#">Shopping cart Total Price : INR <?php getPrice()?>  Total items <?php item();?></a>


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
   
   if(!isset($_GET['p_cat']))
   {
       if(!isset($_GET['cat_id']))
       {
               echo "<div class='box'>
               <h1>Shop</h1>
               <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium, placeat.</p>
               
               </div>";
       }
   }
   
   ?>
    <div class="row">
       <?php
        if(!isset($_GET['p_cat']))
        {
            if(!isset($_GET['cat_id']))
            {
                $per_page = 6;
                if(isset($_GET['page']))
                {
                    $page = $_GET['page'];
                } else 
                {
                    $page = 1;
                }

                $start_from = ($page -1) * $per_page;
                $get_product = "SELECT * FROM product ORDER BY product_id DESC LIMIT $start_from,$per_page";
                $run_product = mysqli_query($con,$get_product);
                while($row= mysqli_fetch_assoc($run_product))
                {
                    $pro_id = $row['product_id'];
                    $pro_title = $row['product_title'];
                  
                    $pro_price = $row['product_price'];
                    $pro_img1 = $row['product_img1'];
                    
                    echo "<div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                    <a href='details.php?pro_id=$pro_id'>
                    <img class='img-fluid' src='admin_area/product_images/$pro_img1'>
                    </a>
                    <div class='text'>
                    
                    <h3 class='text-center'><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                    <p class='price'> INR $pro_price</p>
                    <p class='buttons'>
                    <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>View Details</a>
                    <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>Add to cart</a>
                    </p>
                    
                    </div>
                    
                    </div>
                    
                    
                    </div>";
                }
        
       
       
       ?>
    </div>
    <nav aria-label="Page navigation example">
  <ul class="pagination">
<?php

$query = "SELECT * FROM product";
$result = mysqli_query($con,$query);
$total_record = mysqli_num_rows($result);
$total_page = ceil($total_record/$per_page);

echo "
 <li class='page-item'><a class='page-link' href='shop.php?page=1'>".'First Page'."</a></li>

";

for($i=1;$i<=$total_page;$i++)
{
  echo "
 <li class='page-item'><a class='page-link' href='shop.php?page=".$i."'>".$i."</a></li>

";
};


echo "
 <li class='page-item'><a class='page-link' href='shop.php?page=$total_page'>".'Last Page'."</a></li>

";

}
}


?>
       
  </ul>
</nav>
<div class="row">
<?php

getproduct();

?>



</div>
<div class="row">
<?php

get_category()

?>


</div>


</div>


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