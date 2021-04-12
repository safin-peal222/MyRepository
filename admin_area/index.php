<?php

session_start();
include './includes/db.php';
if(!isset($_SESSION['admin_email']))
{
  header("location: ./login.php");

}else
{
$admin_session=$_SESSION['admin_email'];
$get_session="select * from admins where admin_email='$admin_session'";
$run_session=mysqli_query($con,$get_session);
$row=mysqli_fetch_assoc($run_session);
$admin_name=$row['admin_name'];
$admin_id=$row['admin_id'];

$get_pro="select * from product ";
$run_pro=mysqli_query($con,$get_pro);
$count_pro=mysqli_num_rows($run_pro);



$get_customer="select * from customers";
$run_customer=mysqli_query($con,$get_customer);
$count_customer=mysqli_num_rows($run_customer);

$get_p_cat="select * from product_categories";
$run_p_cat=mysqli_query($con,$get_p_cat);
$count_p_cat=mysqli_num_rows($run_p_cat);

$get_order="Select * from customer_order";
$run_order=mysqli_query($con,$get_order);
$count_order=mysqli_num_rows($run_order);




 





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
   
  <script src="./js/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./font-awesome/all.min.css">
    <link rel="stylesheet" href="./font-awesome/fontawesome.min.css">
    <link rel="stylesheet" href="./styles/styles.css">
    <script
  src="http://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script>
  $(document).ready(function()
  {
    $('#feat-btn').click(function(){
$('.sidebar ul .feat-show').toggleClass("show");
  });
  $('#serv-btn').click(function(){
$('.sidebar ul .serv-show').toggleClass("show1");
  });
  $('#serv-btn1').click(function(){
$('.sidebar ul .serve-show').toggleClass("show2");
  });
  $('#serv-btn2').click(function(){
$('.sidebar ul .serve-show1').toggleClass("show3");
  });
  $('#serv-btn3').click(function(){
$('.sidebar ul .serve-show2').toggleClass("show4");
  });
  $('.sidebar ul li').click(function()
  {
    $(this).addClass("active").siblings().removeClass("active");
  });
  });
  
</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed">
  <a class="navbar-brand" href="#">Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php echo $admin_name?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
<a class="dropdown-item" href="index.php?user_profile">Profile</a>
<a class="dropdown-item" href="index.php?view_product">Products</a>
<a class="dropdown-item" href="index.php?view_customer">Customer</a>
<a class="dropdown-item" href="index.php?pro_cat">Product Categories</a>
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
      </li>
     
  </div>
</nav>

<div id="wrapper">
 <div class="container-fluid">
   <div class="row">
     <div class="col-md-3">
       <?php
       include './includes/sidebar.php';
       ?>
     </div>
     <div class="col-md-9">
<?php
       if(isset($_GET['dashboard']))
       {
        include './dashboard.php';
       }
       if(isset($_GET['insert_product']))
       {
         include './insert_product.php';
       }
       if(isset($_GET['view_product']))
       {
         include './view_product.php';
       }
       if(isset($_GET['delete_product']))
       {
         include './delete_product.php';
       }
       if(isset($_GET['edit_product']))
       {
         include './edit_product.php';
       }
       if(isset($_GET['insert_categories']))
       {
         include './insert_category.php';
       }
       if(isset($_GET['view_categories']))
       {
         include './view_categories.php';
       }
       if(isset($_GET['edit_category']))
       {
         include './edit_category.php';
       }
       if(isset($_GET['delete_category']))
       {
         include './delete_category.php';
       }
?>
     </div>
   </div>
 </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</body>
</html>
<?php
}
?>