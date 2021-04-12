<?php
include("db.php");

?>


<div id="footer">
<div class="container">

<div class="row">
<div class="col-md-3 col-sm-6">
    <h4>Pages</h4>
    <ul>
  <li><a href="cart.php">Shopping Cart</a></li>
  <li><a href="contact.php">Contact Us</a></li>
  <li><a href="shop.php">Shop</a></li>
  <li><a href="checkout.php">My Account</a></li>


    </ul>
    <hr>
    <h4>User Section</h4>
    <ul>
<li><a href="checkout.php">Login</a></li>
<li><a href="customer_registration.php">Register</a></li>


    </ul>
    <hr class="hidden-md hidden-lg hidden-sm">
</div>
<div class="col-md-3 col-sm-6">
    <h4>Top Product Categories</h4>
    <ul>
  <?php
  
  $get_product = "SELECT * FROM product_categories";

  $run_product = mysqli_query($con,$get_product);

  while($row= mysqli_fetch_assoc($run_product))
  {
     $product_id = $row['p_cat_id'];
     $product_title = $row['p_cat_title'];

     echo "
     
 
  <li><a href='shop.php?cat_id =$product_id'>$product_title</a></li>
 
     ";

  }
  
  
  ?>




    </ul>
    <hr class="hidden-md hidden-lg">
   
   
</div>


<div class="col-md-3 col-sm-6">
<h4>where to find us</h4>
<p>
<strong>Teehosting.com</strong>
<br>sohawal
<br>ayodhya
<br>uttar password_needs_rehash
<br>safin2222
<br>01727889667


</p>
<a href="contact.php">Go to Contact Us page</a>

</div>

<div class="col-md-3 col-sm-6">
<h4>Get the news</h4>
<p class="text-muted">Subscribe here for getting news</p>
<form action="" method="post">
<div class="input-group">
    <input type="text"name="email" class="form-control">
    <span class="input-group-btn"><input type="submit"class="btn btn-outline-dark"value="subscribe"></span>
</div>

</form>
<hr>
<h4>Stay In Touch</h4>
<p class="social">
<a href="#"><i class="fab fa-facebook-f"></i></a>
<a href="#"><i class="fab fa-instagram"></i></a>
<a href="#"><i class="fab fa-twitter"></i></a>
<a href="#"><i class="fab fa-google-plus-square"></i></a>
<a href="#"><i class="fa fa-envelope"></i></a>

</p>



</div>

</div>


</div>




</div>

<div id="copyright">
<div class="container">
<div class="row">
<div class="col-md-6">
<p class="float-left">
&copy;2019 Safin Mahmud
</p>
</div>
<div class="col-md-6">
<p class="float-right">

Template by techhosting.com
</p>
</div>

</div>

</div>


</div>