<?php
include("includes/db.php");
if(isset($_GET['pro_id']))
{
    $product_id=$_GET['pro_id'];
    $sql = "DELETE FROM cart WHERE p_id='$product_id'";
    $run_sql = mysqli_query($con,$sql);
    header("location: ./cart.php");

}


?>