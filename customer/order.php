<?php

session_start();
include("includes/db.php");
include("function/function.php");


?>

<?php

if(isset($_GET['c_id']))
{
    $ip_add = "2";  
    $customer_id = $_GET['c_id'];
    $status ="pending";
    $invoice_no = mt_rand();
    $select_cart = "select * from cart where ip_add ='$ip_add'";
    $run_cart = mysqli_query($con,$select_cart);
    while($row_cart = mysqli_fetch_assoc($run_cart))
    {
        $pro_id = $row_cart['p_id'];
        $size = $row_cart['size'];
        $qty = $row_cart['qty'];
        
        $get_product = "select * from product where product_id ='$pro_id'";
        $run_product = mysqli_query($con,$get_product);
        while($row_product = mysqli_fetch_assoc($run_product))
        {
            $sub_total = $row_product['product_price'] * $qty;
            $insert_order = "INSERT INTO customer_order (customer_id,product_id,due_amount,invoice_no,qty,size,order_date,order_status) VALUES ('$customer_id','$pro_id','$sub_total','$invoice_no','$qty','$size',NOW(),'$status')";
            $run_insert_order = mysqli_query($con,$insert_order);

            $insert_pending= "INSERT INTO pending_order(customer_id,invoice_no,product_id,qty,size,order_status) VALUES ('$customer_id','$invoice_no','$pro_id','$qty','$size','$status')";
            $run_pending = mysqli_query($con,$insert_pending);
           

        }
    }

    $delete_cart ="Delete From cart where ip_add = '$ip_add'";
    $run_del = mysqli_query($con,$delete_cart);
    echo "<script>alert('Your order has been submitted')</script>"; 
}



?>