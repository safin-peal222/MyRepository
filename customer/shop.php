



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
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="shop.php">Shop</a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">My Account</a>
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
    <div class="box">
        <h1>Shop</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, optio fuga est consequatur unde quo ipsa repellendus aliquid fugit culpa.</p>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6 center-responsive">
            <div class="product">
                <a href="details.php"><img class="img-fluid img-responsive" src="admin_area/product_images/1.png" alt=""></a> 
                <div class="text">
                    <h3>
                        <a href="details.php" class="text-center text-dark">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, officia.</a>
                    </h3>
                    <p class="price">INR 200</p>
                    <p class="buttons">
                        <a href="details.php" class="btn btn-sm btn-outline-dark">View details</a>
                        <a href="details.php" class="btn btn-sm btn-primary"><i class="fas fa-cart-plus"></i>View details</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 center-responsive">
            <div class="product">
                <a href="details.php" class="text-center text-dark"><img class="img-fluid img-responsive" src="admin_area/product_images/1.png" alt=""></a> 
                <div class="text">
                    <h3>
                        <a href="details.php" class="text-center text-dark">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, officia.</a>
                    </h3>
                    <p class="price">INR 200</p>
                    <p class="buttons">
                        <a href="details.php" class="btn btn-sm btn-outline-dark">View details</a>
                        <a href="details.php" class="btn btn-sm btn-primary"><i class="fas fa-cart-plus"></i>View details</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 center-responsive">
            <div class="product">
                <a href="details.php"><img class="img-fluid img-responsive" src="admin_area/product_images/1.png" alt=""></a> 
                <div class="text">
                    <h3>
                        <a href="details.php" class="text-center text-dark">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, officia.</a>
                    </h3>
                    <p class="price">INR 200</p>
                    <p class="buttons">
                        <a href="details.php" class="btn btn-sm btn-outline-dark">View details</a>
                        <a href="details.php" class="btn btn-sm btn-primary"><i class="fas fa-cart-plus"></i>View details</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 center-responsive">
            <div class="product">
                <a href="details.php"><img class="img-fluid img-responsive" src="admin_area/product_images/1.png" alt=""></a> 
                <div class="text">
                    <h3>
                        <a href="details.php" class="text-center text-dark">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, officia.</a>
                    </h3>
                    <p class="price">INR 200</p>
                    <p class="buttons">
                        <a href="details.php" class="btn btn-sm btn-outline-dark">View details</a>
                        <a href="details.php" class="btn btn-sm btn-primary"><i class="fas fa-cart-plus"></i>View details</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 center-responsive">
            <div class="product">
                <a href="details.php"><img class="img-fluid img-responsive" src="admin_area/product_images/1.png" alt=""></a> 
                <div class="text">
                    <h3>
                        <a href="details.php" class="text-center text-dark">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, officia.</a>
                    </h3>
                    <p class="price">INR 200</p>
                    <p class="buttons">
                        <a href="details.php" class="btn btn-sm btn-outline-dark">View details</a>
                        <a href="details.php" class="btn btn-sm btn-primary"><i class="fas fa-cart-plus"></i>View details</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 center-responsive">
            <div class="product">
                <a href="details.php"><img class="img-fluid img-responsive" src="admin_area/product_images/1.png" alt=""></a> 
                <div class="text">
                    <h3>
                        <a href="details.php" class="text-center text-dark">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, officia.</a>
                    </h3>
                    <p class="price">INR 200</p>
                    <p class="buttons">
                        <a href="details.php" class="btn btn-sm btn-outline-dark">View details</a>
                        <a href="details.php" class="btn btn-sm btn-primary"><i class="fas fa-cart-plus"></i>View Add to cart</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">First Page</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Last Page</a></li>
  </ul>
</nav>
</div>


</div>
</div>

</div>













<!--footer start-->
<?php

include("./includes/footer.php")

?>



<!--footer end-->