<?php
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
    

<center>
<h1>My Order</h1>
<p class="text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut dolorem itaque praesentium nulla unde totam, dolorum soluta? Delectus, eum vitae.</p>

</center>
<hr>
<div class="table-responsive">
<table class="table table-bordered table-hover">

<thead>
<tr>
<th>Sr. No</th>
<th>Due Amount</th>
<th>Invoice Number</th>
<th>Quantity</th>
<th>Size</th>
<th>Order Date</th>
<th>Paid/Unpaid</th>
<th>Status</th>

</tr>
</thead>
<tbody>
<?php

$customer_email = $_SESSION['customer_email'];
$get_customer = "select * from customers where customer_email ='$customer_email'";
$run_customer = mysqli_query($con,$get_customer);
$row_customer = mysqli_fetch_assoc($run_customer);
$customer_id = $row_customer['customer_id'];
$get_order = "select * from customer_order where customer_id ='$customer_id'";
$run_order =mysqli_query($con,$get_order);
$i=0;
while($row1=mysqli_fetch_assoc($run_order))
{
    $order_id=$row1['order_id'];
    $order_due=$row1['due_amount'];
    $order_invoice=$row1['invoice_no'];
    $order_qty=$row1['qty'];
    $order_size=$row1['size'];
    $order_date=$row1['order_date'];
    $order_status=$row1['order_status'];
    $i++;
    if($order_status =='pending')
    {
        $order_status="unpaid";

    }else{
        $order_status ="paid";
    }







?>

<tr>
<td><?php echo $i; ?></td>
<td><?php echo $order_due;?></td>
<td><?php echo $order_invoice;?></td>
<td><?php echo $order_qty;?></td>
<td><?php echo $order_size;?></td>
<td><?php echo $order_date;?></td>
<td><?php echo $order_status;?></td>
<td><a href="confirm.php?order_id=<?php echo  $order_id ;?>" target="_blank" class="btn btn-primary btn-sm">Confirm If Paid</a></td>

</tr>
<?php

}

?>


</tbody>


</table>


</div>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>