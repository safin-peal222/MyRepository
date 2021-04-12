<div class="box"><!--box-->
<div class="box-header">
<center>
<h2> CustomerRegistration </h2>
<p class="text-muted">
Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt possimus cum molestias atque reprehenderit porro ullam! Dignissimos nam est enim.

</p>
</center>

</div>
<form action="" method="post" enctype="multipart-form-data">
<div class="form-group">
<label for="">Customer Name</label>
<input type="text" name="c_name" required="" class="form-control">

</div>

<div class="form-group">
<label for="">Customer Email</label>
<input type="text" name="c_email" required="" class="form-control">

</div>

<div class="form-group">
<label for="">Customer Password</label>
<input type="password" name="c_password" required="" class="form-control">

</div>
<div class="form-group">
<label for="">Country</label>
<input type="text" name="c_country" required="" class="form-control">

</div>
<div class="form-group">
<label for="">City</label>
<input type="text" name="c_city" required="" class="form-control">

</div>
<div class="form-group">
<label for="">Contact Number</label>
<input type="password" name="c_contact" required="" class="form-control">

</div>

<div class="form-group">
<label for="">Address</label>
<input type="text" name="c_address" required="" class="form-control">

</div>

<div class="form-group">
<label for="">Image</label>
<input type="file" name="c_image" required="" class="form-control">
<img src="customer_images/80669691_2647234848726374_734088092176089088_o.jpg" height="100" width="100" class="img-fluid" alt="">

</div>

<div class="text-center">
<button type="submit"name="submit"class="btn btn-primary"><i class="fa fa-user-md"></i>Update</button>
</div>


</form>


</div> <!--box-->
<?php

include("./includes/db.php");

$get_session=$_SESSION['customer_email'];
$query="select * from customers where customer_email='$get_session'";
$run_query=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($run_query);
$customer_id =$row['customer_id'];


if(isset($_POST['submit']))
{
    $name=$_POST['c_name'];
    $email=$_POST['c_email'];
    $password=$_POST['c_password'];
    $country=$_POST['c_country'];
    $city=$_POST['c_city'];
    $contact=$_POST['c_contact'];
    $address=$_POST['_address'];

    $query1="UPDATE customers SET customer_name='$name',customer_email='$email',customer_pw='$password',customer_country='$country',customer_city='$city',customer_contact='$contact',customer_address='$address'";
    $run_query1=mysqli_query($con,$query1);
    header("location: ../logout.php");

}







?>