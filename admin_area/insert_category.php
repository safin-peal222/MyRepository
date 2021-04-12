<?php

include './includes/db.php';
if(!isset($_SESSION['admin_email']))
{
    header("location: ./login.php");
}



?>



<div class="row my-5 mx-auto">
<div class="col-md-12">
<form action="" method="post">
<div class="form-group">
<label for="" class="control-label col-md-2">Category Title :</label>
<div class="col-md-8">
<input type="text" name="c_title" class="form-control py-2"id="">
</div>

</div>

<div class="form-group">
<label for="" class="control-label col-md-2">Category Desciption :</label>
<div class="col-md-8">
<input type="text" name="c_desc" class="form-control py-2"id="">
</div>

</div>
<div class="form-group">
<input type="submit" value="Add Category" name="add_category" class="btn btn-primary btn-lg col-md-8 form-control">

</div>


</div>



</form>

</div>


</div>

<?php
if(isset($_POST['add_category']))
{
    
    $category_title=$_POST['c_title'];
    $category_desc=$_POST['c_desc'];

   $insert_cat="INSERT INTO categories (cat_title,cat_desc) VALUES('$category_title','$category_desc')";
   $run_cat=mysqli_query($con,$insert_cat);
   header('location:./insert_category.php');

}




?>