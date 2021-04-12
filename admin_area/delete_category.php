<?php
ob_start();
include './includes/db.php';
if(isset($_GET['delete_category']))
{
$delete_category=$_GET['delete_category'];
$delete="DELETE FROM categories WHERE car_id='$delete_category'";
$run=mysqli_query($con,$delete) or die("query failed");
echo "<script>location.href='./index.php?view_categories'</script>";
}else
{
    alert("not deleted");
}

?>

