

<?php

include("./includes/db.php");

if(!isset($_SESSION['admin_email']))
{
    header("location: ./login.php");
}else
{
    if(isset($_GET['delete_product']))
    {
        $product_id=$_GET['delete_product'];
        $sql="DELETE FROM product WHERE product_id='$product_id'";
        $run_query=mysqli_query($con,$sql) or die("query unsuccessfull");
        echo "this is output";
        header("location: ./index.php?view_product");
         
    }else
    {
        alert("not delted");
    }
}



?>
