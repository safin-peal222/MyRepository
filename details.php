<?php
session_start();
include("includes/db.php");
include("function/function.php");

if(isset($_GET['pro_id']))
{
  $product_id = $_GET['pro_id'];
  $get_product = "SELECT * from product where product_id = '$product_id'";
  $run_product = mysqli_query($con,$get_product);
  $row = mysqli_fetch_assoc($run_product);
  $prod_id = $row['p_cat_id'];
  $prod_title = $row['product_title'];
  $prod_img1 = $row['product_img1'];
  $prod_img2 = $row['product_img2'];
  $prod_img3 = $row['product_img3'];
  $prod_price = $row['product_price'];
  $prod_desc = $row['product_desc'];
  $prod_key=$row['product_keyword'];

  $get_product_category = "SELECT * FROM product_categories WHERE p_cat_id =$prod_id";
  $run_product_category = mysqli_query($con,$get_product_category);
 
  while($row1=mysqli_fetch_array($run_product_category))
  {
  $product_cat_title=$row1['p_cat_title'];
  $product_cat_desc= $row1['p_cat_desc'];
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
<div class="row">
    <div class="col-sm-6">

        <div id="mainimage">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <?php echo "<img src='admin_area/product_images/$prod_img1' class='d-block w-100' alt='...''>";?>
    </div>
    <div class="carousel-item">
      <?php echo "<img src='admin_area/product_images/$prod_img2' class='d-block w-100' alt='...''>";?>
    </div>
    <div class="carousel-item">
    <?php echo "<img src='admin_area/product_images/$prod_img3' class='d-block w-100' alt='...''>";?>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </div>
        
    </div>
    <div class="col-sm-6">
            <div class="box">
                <h1 class="text-center">
                    <?php echo"<h3>$prod_desc</h3>"?>
                </h1>
                <?php
                 if(isset($_GET['add-cart']))
                 {
                  $p_id = $_GET['add-cart'];
                  $ip_add = 2;
                  $product_qty=$_POST['product_qty'];
                  $product_size = $_POST['product_size'];
                  $check_product = "select * from cart where p_id ='$p_id' AND ip_add ='$ip_add'";
                  $run_check = mysqli_query($con,$check_product);
                 if(mysqli_num_rows($run_check)>0)
                  {
                      echo "<script>alert('This product is already in the cart')</script>";
                      
          
                  }else{
                      $query="INSERT INTO cart(p_id,qty,size,ip_add) VALUES ('$p_id','$product_qty','$product_size','$ip_add')";
                      $run_cart_query=mysqli_query($con,$query) or die("cannot inserted");
                     
                  }
                 }


  

?>


          <form action="details.php?add-cart=<?php echo $product_id?>&&pro_id=<?php echo $product_id?>" method="post" class="form-horizontal">
                    <div class="form-group">
                    <div class="row">
                    <div class="col-md-5">
                       <label for="" class="control-label">Product Quantity</label>
                       </div>
                        <div class="col-md-7">
                        <select name="product_qty" class="form-control" id="">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    </div>

                    </div>
                    <div class="form-group">
                    <div class="row">
                    <div class="col-md-5">
                       <label for="" class="control-label">Product Size</label>
                       </div>
                        <div class="col-md-7">
                        <select name="product_size" class="form-control" id="">
                            <option value="">select a size</option>
                            <option value="small">small</option>
                            <option value="medium">medium</option>
                            <option value="large">large</option>
                            <option value="extra large">extra large</option>
                        </select>
                    </div>

                    </div>

                    </div>
                    <p class="price"><?php echo "$prod_price"?></p>
                    <p class="text-center buttons"><button class="btn btn-primary" type="submit">Add to cart</button></p>
                    
                </form>
            </div>
           <div class="row">
           <div class="col">
           <?php
        
        $get_add_product ="select * from product order by $product_id LIMIT 0,3";
        $run_add_product =mysqli_query($con,$get_add_product);
        while($row_add_product = mysqli_fetch_assoc($run_add_product))
        {
          $product_img1 = $row_add_product['product_img1'];
          $product_id = $row_add_product['product_id'];


          echo"<div class='row'>
          <div class='col-md-3 col-sm-6 center-responsive'>
          <div class='product'>
          
          <a href='details.php?pro_id=$product_id'><img class='img-fluid' src='admin_area/product_images/$product_img1'></a>
          </div>
          
          </div>
          </div>
          ";
        }
        
        
        
        ?>
            
            </div>
            
           
           
           </div>
        </div>
        <div class="box" id="details">
        
        <h4>Product Details</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita aut eum est cupiditate odit dicta porro inventore amet? Dignissimos, eligendi ex enim fugit corporis voluptate, voluptates optio maxime sint dolore exercitationem rerum possimus? Deleniti iste esse itaque quos quia distinctio ducimus officia, quas minima sunt nihil, excepturi voluptatibus atque voluptas adipisci reprehenderit a placeat quam alias praesentium. Officiis at laboriosam ad officia, provident maxime atque sunt, rem quo sapiente sit.</p>
        <h4>Size</h4>
        <ul>
        <li>small</li>
        <li>medium</li>
        <li>large</li>
        <li>Extra large</li>
        
        </ul>
        </div>
        <div class="row">
        <div class="col-md-3 col-sm-6 mt-5">
        <div class="box">
        <h5 class="text-center">You Also like these products</h5>
        </div>
        </div>



     

        </div>
        
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