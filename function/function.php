<?php

$db = mysqli_connect("localhost","root","","ecom");

function getUserIP()
{
    switch(true)
    {
        case(!empty($_SERVER['HTTP_X_REAL_IP'])) : 
            return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : 
                return $_SERVER['HTTP_CLIENT_IP'];
                case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : 
                    return $_SERVER['HTTP_X_FORWARDED_FOR'];

                    default : return $_SERVER['REMOTE_ADDR'];
    }
}

function addCart()
{
    global $db;
    if(isset($_GET['add_cart']))
    {
        //$ip_add = getUserIP();
        $p_id = $_GET['add_cart'];
        $ip_add = 1;
        $product_qty=$_POST['product_qty'];
        $product_size = $_POST['product_size'];
        $check_product = "select * from cart where p_id ='$p_id' AND ip_add ='$ip_add'";
        $run_check = mysqli_query($db,$check_product);
        if(mysqli_num_rows($run_check)>0)
        {
            echo "<script>alert('This product is already in the cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";

        }else{
            $query="INSERT INTO cart(p_id,qty,size,ip_add) VALUES ('$p_id','$product_qty','$product_size',1)";
            $run_cart_query=mysqli_query($db,$query) or die("cannot inserted");
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        }
    }
}

//function for item
function item()
{
    global $db;

    $ip_add = 2;
    $get_items ="SELECT * FROM cart WHERE ip_add = '$ip_add'";
    $run_item = mysqli_query($db,$get_items);
    $count= mysqli_num_rows($run_item);
    echo $count;

}


function getPrice()
{
    global $db;
    $total_price=0;
    $get_price ="select * from cart where ip_add = '2'";
    $run_price = mysqli_query($db,$get_price);
  while($row=mysqli_fetch_assoc($run_price))
  {
      $product_qty= $row['qty'];
      $pro_id = $row['p_id'];
      $get_prices ="select * from product where product_id ='$pro_id'";
      $run_prices = mysqli_query($db,$get_prices);
      while($row1=mysqli_fetch_assoc($run_prices))
      {
          $pro_price = $row1['product_price'];
          $total_price+=$pro_price;
      }
      

  }
  echo $total_price;
   

}



//function for item
function getproo()
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



function get_p_cats()
{

    global $db;
  
$get_p_cat = "SELECT * FROM product_categories";

$run_p_cat = mysqli_query($db,$get_p_cat);

while($row= mysqli_fetch_assoc($run_p_cat))
{
   $product_id = $row['p_cat_id'];
   $product_title = $row['p_cat_title'];

   echo "
   

<li><a href='shop.php?p_cat=$product_id'>$product_title</a></li>

   ";

}



}


function get_cats()
{
   
    global $db;
  
    $get_cat = "SELECT * FROM categories";
    
    $run_cat = mysqli_query($db,$get_cat);
    
    while($row= mysqli_fetch_assoc($run_cat))
    {
       $cat_id = $row['car_id'];
       $cat_title = $row['cat_title'];
    
       echo "
       
    
    <li><a href='shop.php?cat_id=$cat_id'>$cat_title</a></li>
    
       ";

}
}

/* function get product */

function getproduct()
{
    global $db;
    if(isset($_GET['p_cat']))
    {
        $p_cat_id = $_GET['p_cat'];
        $get_p_cat = "select * from product_categories where p_cat_id ='$p_cat_id'";
        $run_p_cat=mysqli_query($db,$get_p_cat);
        $row_p_cat = mysqli_fetch_assoc($run_p_cat);
        $p_cat_title = $row_p_cat['p_cat_title'];
        $p_cat_desc =$row_p_cat['p_cat_desc'];

        $get_products = "select * from product where p_cat_id='$p_cat_id'";
        $run_product = mysqli_query($db,$get_products);
        $count = mysqli_num_rows($run_product);
        if($count == 0)
        {
            echo "<div class='box'><h3>No product fount in product category</h3></div>";
        }else{
            echo"
            <div class='box'>
            <h1>$p_cat_title</h1>
            <p>$p_cat_desc</p>
            </div>
            
            ";
        }
        while($row_get_product = mysqli_fetch_assoc($run_product) )
        {
            $pro_id = $row_get_product['product_id'];
            $pro_title= $row_get_product['product_title'];
            $pro_price = $row_get_product['product_price'];
            $pro_img1=$row_get_product['product_img1'];
            
            echo"
            <div class='col-md-4 col-sm-6 center-responsive'>
            <div class='product'>
            <a href='details.php?pro_id=$pro_id'>
            <img class='img-fluid' src='admin_area/product_images/$pro_img1'>
            </a>
            <div class=''text>
            <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
            <p class='price'>$pro_price</p>
            <p class='buttons'>
            <a class='btn btn-primary btn-sm' href='details.php?pro_id=$pro_id'>View details</a>
            <a class='btn btn-primary btn-sm' href='details.php?pro_id=$pro_id'>Add To cart</a>
            </p>
            
            </div>
            </div>
            
            </div>
        ";
        }
        

    }
}
function get_category()
{
    global $db;
    if(isset($_GET['cat_id']))
    {
        $cat_id = $_GET['cat_id'];

        $query ="SELECT * FROM categories WHERE car_id = '$cat_id'";
        $run_query= mysqli_query($db,$query);
        $row = mysqli_fetch_assoc($run_query);
        $cat_name = $row['cat_title'];
        $cat_desc = $row['cat_desc'];
        $get_product = "SELECT * FROM product WHERE cat_id ='$cat_id'";
        $run_product = mysqli_query($db,$get_product);
        $rows = mysqli_num_rows($run_product);
        if($rows ==0)
        {
            echo "No Products TO show";

    }else{
        echo "<div><h3>$cat_name</h3>
        <p>$cat_desc</p>
        
        </div>";
    }

    while($row=mysqli_fetch_assoc($run_product))
    {
            $pro_id = $row['product_id'];
            $pro_title= $row['product_title'];
            $pro_price = $row['product_price'];
            $pro_img1=$row['product_img1'];
            echo"
            <div class='col-md-4 col-sm-6 center-responsive'>
            <div class='product'>
            <a href='details.php?pro_id=$pro_id'>
            <img class='img-fluid' src='admin_area/product_images/$pro_img1'>
            </a>
            <div class=''text>
            <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
            <p class='price'>$pro_price</p>
            <p class='buttons'>
            <a class='btn btn-primary btn-sm' href='details.php?pro_id=$pro_id'>View details</a>
            <a class='btn btn-primary btn-sm' href='details.php?pro_id=$pro_id'>Add To cart</a>
            </p>
            
            </div>
            </div>
            
            </div>
        ";
    }
}
}











