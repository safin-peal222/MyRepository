




<div class="box">

<?php

include("includes/db.php");

$session_email = $_SESSION['customer_email'];
$select_customer = "select * from customers where customer_email ='$session_email'";
$run_customer = mysqli_query($con,$select_customer);
$row_customer = mysqli_fetch_assoc($run_customer);
$customer_id = $row_customer['customer_id'];



?>

<h1 class="text-center">Payment Options</h1>
<p class="lead text-center">
<a href="customer/order.php?c_id=<?php echo $customer_id;?>">Pay Offline</a>

</p>
<center>
<p class="lead">

<a href="#">
pay with paypal
<img src="images/download (1).jfif" width="500" height="270" class="img-fluid" alt="" srcset="">



</a>

</p>


</center>



</div>