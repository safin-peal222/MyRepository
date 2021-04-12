<?php
session_start();
include("function/function.php");
include("includes/db.php");


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
<a href="checkout.php">My Account</a>

</li>
<li>
<a href="cart.php">Goto Cart</a>

</li>
<li>
<a href="login.php">Log In</a>

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
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="shop.php">Shop</a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">My Account</a>
      </li>
      <li class="nav-item active">
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
<li>Cart</li>

</ul>

</div>
<div class="row">
<div class="col-md-9" id="cart">
<div class="box">

<form action="cart.php" method="post" enctype="multipart-form-data">
<?php
$ip_add=2;
$subtotal=0;







$get_product="select * from cart where ip_add= '$ip_add'";
$run_product = mysqli_query($con,$get_product);
$count=mysqli_num_rows($run_product);
/*while($row=mysqli_fetch_assoc($run_product))
{
  $pro_id = $row['p_id'];
  $product_quantity=$row['qty'];
  $product_size=$row['size'];
  $get_details = "select * from product where $pro_id='product_id' ";
  $run_details = mysqli_query($con,$get_details);
  while($row1=mysqli_fetch_assoc($run_details))
  {
    $pro_price = $row1['product_price'];
    $pro_img=$row1['product_img1'];
    $pro_desc= $row1['product_desc'];
    $subtotal+=$pro_price;
    */
 
?>


<h4>Shopping Cart</h4>
<p class="text-muted">Currently you have <?php echo $count;?> items in your cart</p>
<div class="table-responsive">

<table class="table">

<thead>
<tr>
<th colspan="2">product</th>
<th>Quantity</th>
<th>unit price</th>
<th>Size</th>
<th colspan="1">Delete</th>
<th colspan="1">Subtotal</th>
</tr>
</thead>

<tbody>
<?php
while($row=mysqli_fetch_assoc($run_product))
{
  
  
  $pro_id = $row['p_id'];
  $product_quantity=$row['qty'];
  $product_size=$row['size'];
  $get_details = "select * from product where product_id='$pro_id'";
  $run_details = mysqli_query($con,$get_details);
  while($row1=mysqli_fetch_assoc($run_details))
  {
    $pro_price = $row1['product_price'];
    $pro_img=$row1['product_img1'];
    $pro_desc= $row1['product_desc'];
    $pro_prices = $pro_price*$product_quantity;
    $subtotal = $pro_prices+$subtotal

   

?>


<tr>
<td><img class="img-fluid" src="admin_area/product_images/<?php echo $pro_img;?>" alt=""></td>
<td><?php echo $pro_desc; ?></td>
<td><?php echo "$product_quantity"; ?></td>
<td><?php echo "$pro_price"; ?></td>
<td><?php echo $product_size; ?></td>
<td><a class="btn btn-primary btn-sm" href='delete.php?pro_id=<?php echo $pro_id;?>'>Delete</a></td>
<td><?php echo $pro_prices;?></td>



</tr>



</tbody>
<?php
  }
  
}


?>
<tfoot>
<th colspan="5">Total</th>
<th colspan="2"><?php echo $subtotal;?></th>


</tfoot>









</table>

</div>
<div class="box-footer">
<div class="float-left">
<a href="index.php" class="btn btn-outline-dark"><i class="fa fa-chevron-left"></i>Continue Shopping</a>

</div>
<div class="float-right">
<button class="btn btn-outline-dark" type="submit"name="update" value="update cart"><i class="fa fa-refresh"></i>Update Cart</button>
<a href="checkout.php" class="btn btn-primary">Proceed to checkpoint</a>

</div>




</div>

</form>
<div class="row">
        <div class="col-md-3 col-sm-6 mt-5">
        <div class="box">
        <h5 class="text-center">You Also like these products</h5>
        </div>
        </div>
        <div class="col-md-3 col-sm-6 center-responsive">
        <div class="product">
        <a href="details.php"><img class="img-fluid" src="admin_area/product_images/2.png" alt=""></a>
        </div>
        </div>
        <div class="col-md-3 col-sm-6 center-responsive">
        <div class="product">
        <a href="details.php"><img class="img-fluid" src="admin_area/product_images/2.png" alt=""></a>
        </div>
        </div>
        <div class="col-md-3 col-sm-6 center-responsive">
        <div class="product">
        <a href="details.php"><img class="img-fluid" src="admin_area/product_images/2.png" alt=""></a>
        </div>
        </div>
    

</div>
</div>

</div>


<div class="col-md-3"><!--col-md-3start-->
          
        <div class="box" id="order-summarry">
        
        <div class="box-header">
        <h3>Order summarry</h3>
        
        </div>
        <p class="text-muted">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae tempore molestias saepe optio, non numquam dolores quis iure, nesciunt velit veritatis facilis consequatur, voluptatibus quibusdam commodi eius officiis dolorum. Nisi?
        </p>
        <div class="table-responsive">
        <table class="table">
        
        <tbody>
        <tr>
       <th>Order Subtotal</th>
       <th>INR 398</th>
        
        </tr>
        <tr>
        <td>Lorem ipsum dolor sit.</td>
        <td>INR 0</td>
        
        </tr>
        <tr class="total">
        <td>Total</td>
        <td>INR 399</td>
        </tr>
       
        
        </tbody>
        
        </table>
        
        </div>
        </div>
        
        
        </div>


</div> 
<!--

<div class="row">
        <div class="col-md-3 col-sm-6 mt-5">
        <div class="box">
        <h5 class="text-center">You Also like these products</h5>
        </div>
        </div>
        <div class="col-md-3 col-sm-6 center-responsive">
        <div class="product">
        <a href="details.php"><img class="img-fluid" src="admin_area/product_images/2.png" alt=""></a>
        </div>
        </div>
        <div class="col-md-3 col-sm-6 center-responsive">
        <div class="product">
        <a href="details.php"><img class="img-fluid" src="admin_area/product_images/2.png" alt=""></a>
        </div>
        </div>
        <div class="col-md-3 col-sm-6 center-responsive">
        <div class="product">
        <a href="details.php"><img class="img-fluid" src="admin_area/product_images/2.png" alt=""></a>
        </div>
        </div>
        -->
 
       
     

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