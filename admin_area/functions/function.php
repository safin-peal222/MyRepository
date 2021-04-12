<?php

$db = mysqli_connect("localhost","root","","ecom");

function getpro()
{
    global $db;

    $get_product = "SELECT * FROM product ORDER BY 1 DESC LIMIT 0,6";

    $run_product = mysqli_query($db,$get_product);

    while($row = mysqli_fetch_assoc($run_product))
    {
        $pro_id = $row['product_id'];
        $pro_title = $row['product_title'];
        $pro_price = $row['product_price'];
        $pro_img1 = $row['product_img1'];

        echo "<div class='col-md-4 col-sm-6'>
         <div class='product'>
         <a href='details.php?pro_id=$pro_id'><img class='img-responsive img-fluid'  src='admin_area/product_images/$pro_img1'></a>
         <div class='text'>
         <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
         <p class='price'>INR $pro_price</p>
         <p class='buttons'>
         <a href='details.php?pro_id=$pro_id' class='btn btn-primary btn-lg'>view details</a>
         <a href='details.php?pro_id=$pro_id' class='btn btn-primary btn-lg'>Add to cart</a>
         
         </p>
         
         </div>
         
         </div>
        
        </div>";
    }
}












