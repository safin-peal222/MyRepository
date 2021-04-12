<?php
include "./includes/db.php";


?>


<div class="row"><!--rowstart-->

<div class="col-lg-12">
   <h1 class="text-primary">Dashboard</h1>
 
</div>


</div><!--rowstart-->
<div class="row">
<div class="col-lg-3 col-md-6">
<div class="card text-white bg-primary">
<div class="card-header">
<div class="row">
<div class="col-xs-3">
<i class="fas fa-tasks fa-5x"></i>

</div>
<div class="col-xs-9 ml-auto">
<div class="huge"><?php echo $count_pro;?></div>
<div class="intro">Products</div>

</div>


</div>


</div>
<a href="index.php?view_product">
<div class="card-footer">
<span class="mr-auto">View Details</span>

</div>


</a>

</div>



</div>
<div class="col-lg-3 col-md-6">
<div class="card text-white bg-primary">
<div class="card-header">
<div class="row">
<div class="col-xs-3">
<i class="fas fa-tasks fa-5x"></i>

</div>
<div class="col-xs-9 ml-auto">
<div class="huge"><?php echo $count_customer?></div>
<div class="intro">Customers</div>

</div>


</div>


</div>
<a href="index.php?view_customer">
<div class="card-footer">
<span class="mr-auto">View Details</span>

</div>


</a>

</div>



</div>
<div class="col-lg-3 col-md-6">
<div class="card text-white bg-primary">
<div class="card-header">
<div class="row">
<div class="col-xs-3">
<i class="fas fa-tasks fa-5x"></i>

</div>
<div class="col-xs-9 ml-auto">
<div class="huge"><?php echo $count_p_cat;?></div>
<div class="intro">P.Categories</div>

</div>


</div>


</div>
<a href="index.php?view_product_cat">
<div class="card-footer">
<span class="mr-auto">View Details</span>

</div>


</a>

</div>



</div>
<div class="col-lg-3 col-md-6">
<div class="card text-white bg-primary">
<div class="card-header">
<div class="row">
<div class="col-xs-3">
<i class="fas fa-tasks fa-5x"></i>

</div>
<div class="col-xs-9 ml-auto">
<div class="huge"><?php echo $count_order;?></div>
<div class="intro">Orders</div>

</div>


</div>


</div>
<a href="index.php?view_order">
<div class="card-footer">
<span class="mr-auto">View Details</span>

</div>


</a>

</div>



</div>


</div>
<div class="row mt-5">
<div class="col-lg-8">

<div class="card bg-primary">

<div class="card-heading">
<h3 class="card-title">

New Orders
</h3>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>

<tr>

<th>Order No:</th>
<th>Customer Email</th>
<th>Product ID</th>
<th>Invoice No:</th>
<th>Total:</th>
<th>Date</th>
<th>Status</th>

</tr>

</thead>
<tbody>
   <?php
   $i=0;
   
   $get_order="SELECT * FROM customer_order ORDER BY order_id DESC LIMIT 0,5";
   $run_order=mysqli_query($con,$get_order);
   
  while($row_order=mysqli_fetch_assoc($run_order))
  {
     $order_id=$row_order['order_id'];
     $product_id=$row_order['product_id'];
     $customer_id=$row_order['customer_id'];
     $invoice_no=$row_order['invoice_no'];
     $qty=$row_order['qty'];
     $size=$row_order['size'];
     $order_status=$row_order['order_status'];
     $i++;
  

   ?>
   

<tr>


<td><?php echo $i?></td>
<td>

<?php
$get_customer="SELECT * FROM customers where customer_id='$customer_id'";
$run_customer=mysqli_query($con,$get_customer);
$row=mysqli_fetch_assoc($run_customer);
$customer_email=$row['customer_email'];
echo $customer_email;


?>

</td>
<td><?php echo $product_id;?></td>
<td><?php echo $invoice_no;?></td>

<td><?php echo $product_id;?></td>

<td><?php echo $product_id;?></td>
<td><?php echo $order_status;?></td>

</tr>
<?php
}

?>

</tbody>




</table>


</div>

</div>

</div>

</div>
<div class="col-md-4">
<div class="card bg-dark prfl" style="width: 15rem;">
<?php
$admin_session=$_SESSION['admin_email'];
$get_admin="SELECT * FROM admins WHERE admin_email='$admin_session'";
$run_admin=mysqli_query($con,$get_admin);
$row_admin=mysqli_fetch_assoc($run_admin);
$admin_name=$row_admin['admin_name'];
$admin_job=$row_admin['admin_job'];
$admin_country=$row_admin['admin_country'];
$admin_contact=$row_admin['admin_contact'];
$admin_photo=$row_admin['admin_image']




?>
 <img src="./admin-images/<?php echo $admin_photo;?>" class="card-img-top img-fluid w-50 mx-auto img" alt="">
<div id="admin-intro">
<span><?php echo $admin_name;?></span><br>
 <span><?php echo $admin_job;?></span>

</div>
<div class="admin-info">
<i class="fas fa-user"> </i><span> Email:</span> <?php echo $admin_session;?><br>
<i class="fas fa-user"> </i><span> Country:</span><?php echo $admin_country;?><br>
<i class="fas fa-user"> </i><span> Contact:</span><?php echo $admin_contact;?><br>

</div>
  </div>

</div>


</div>

</div>


</div>





</div>