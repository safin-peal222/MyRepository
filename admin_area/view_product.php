<?php
session_start();
include './includes/db.php';
if(!isset($_SESSION['admin_email']))
{
    header("location: ./login.php");
}
else
{





?>
<div class="row">


<div class="col-md-12">

<div class="card text-white mb-3">
  <div class="card-header bg-primary">Products</div>
  <div class="card-body">
    <table class="table table-bordered table-hover table-striped">
    <thead class="bg-dark">
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Product Title</th>
      <th scope="col">Date</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Image</th>
      <th scope="col">Product Description</th>
      <th scope="col">Product keyword</th>
      <th scope="col">Product Delete</th>
      <th scope="col">Product Edit</th>
    </tr>
    <tbody>
    <?php
    $i=0;
$get_product="SELECT * FROM product";
$run_product=mysqli_query($con,$get_product);

while($row_product=mysqli_fetch_assoc($run_product))
{


$product_id=$row_product['product_id'];
$product_title=$row_product['product_title'];
$date=$row_product['date'];
$product_price=$row_product['product_price'];
$product_desc=$row_product['product_desc'];
$product_keyword=$row_product['product_keyword'];
$product_image=$row_product['product_img1'];
$i++;



?>
    
    <tr>
    <td class="text-primary"><?php echo $i?></td>
    <td class="text-primary"><?php echo $product_title?></td>
    <td class="text-primary"><?php echo $date?></td>
    <td class="text-primary"><?php echo $product_price?></td>
    <td><img class="img-fluid" src="./product_images/<?php echo $product_image;?>" width="50" height="50"alt=""></td>
    <td class="text-primary"><?php echo $product_desc;?></td>
    <td class="text-primary"><?php echo $product_keyword?></td>
    <td class="table-link"><a class="px-3" href="index.php?delete_product=<?php echo $product_id;?>">DELETE</a></td> 
    <td class="table-link "><a class="px-3" href="index.php?edit_product=<?php echo $product_id;?>">EDIT</a></td> 
    </tr>
    <?php
}
    ?>
 
    </tbody>
 
  </thead>
    
    
    
    
    </table>
  </div>
</div>




</table>


</div>

</div>






<?php
}

?>






<?php
$get_product="SELECT * FROM product";
$run_product=mysqli_query($con,$get_product);
$row_product=mysqli_fetch_assoc($run_product);
$product_id=$row_product['product_id'];
$product_title=$row_product['product_title'];
$date=$row_product['date'];
$product_price=$row_product['product_price'];
$product_desc=$row_product['product_desc'];
$product_keyword=$row_product['product_keyword'];


?>