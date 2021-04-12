<?php

include './includes/db.php';
if(!isset($_SESSION['admin_email']))
{
    header("location:./login.php");
}else{



?>



<div class="row mx-auto my-2">
<div class="col-md-12">
<h1>See The Categories</h1>
<div class="card text-white">
<div class="card-header bg-primary">
Categories


</div>
<div class="card-body">
<table class="table-bordered table-hover table-striped col-md-12">
<thead class="bg-dark">

<tr>

<th class="p-3">Category ID</th>
<th class="p-3">Category Title</th>
<th class="p-3">Category Description</th>
<th class="p-3">Category DELETE</th>
<th class="p-3">Category Edit</th>

</tr>

</thead>
<tbody>

<?php

$get_category="SELECT * FROM categories";
$run_category=mysqli_query($con,$get_category) or die("query unsuccessfull");
while($row=mysqli_fetch_assoc($run_category))
{



?>
<tr>
<td class="p-2"><?php echo $row['car_id'];?></td>
<td class="p-2"><?php  echo $row['cat_title'];?></td>
<td class="p-2"><?php echo $row['cat_desc'];?></td>
<td class="table-link p-2"><a href="index.php?delete_category=<?php echo $row['car_id'];?>">DELETE</a></td>
<td class="table-link p-2"><a href="index.php?edit_category=<?php echo $row['car_id'];?>">EDIT</a></td>

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

<?php

}

?>