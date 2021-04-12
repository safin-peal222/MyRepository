<?php
session_start();
include("includes/db.php");
if(!isset($_SESSION['admin_email']))
{
  header("location: ./login.php");

}else
{




?>













<div class="row">

<div class="col-lg-12">
<div class="card text-center">
  <div class="card-header bg-primary">
  Insert Product
  </div>
  <div class="card-body">
   <form action="" class="form-horizontal" enctype="multipart/form-data" method="post">
   <div class="form-group">
 <label for="" class="col-md-3 control-label text-primary" >Product title</label>
 <input type="text"name="product_title" class="form-control" required="">
   
   </div>

   <div class="form-group">
 <label for="" class="col-md-3 control-label text-primary" >Product Category</label>
 <select name="product_cat" class="form-control text-primary" id="">
 <option value="" class="text-primary">Select a Product Category</option>
 <?php
 
 $get_p_cats = "select * from product_categories";
 $run_p_cats = mysqli_query($con,$get_p_cats);

 while($row = mysqli_fetch_assoc($run_p_cats))
 {
     $id = $row['p_cat_id'];
     $cat_title = $row['p_cat_title'];
     echo "<option class='text-primary' value='$id'>$cat_title</option>";
 }

 
 
 
 
 
 
 ?>
 </select>
   
   </div>
   <div class="form-group">
 <label for="" class="col-md-3 control-label text-primary" >Category</label>
 <select name="cat" id="" class="form-control">
 <option value="">Select a category</option>

 <?php
 $get_cats = "select * from categories";
 $run_cats = mysqli_query($con,$get_cats);

 while($row=mysqli_fetch_assoc($run_cats))
 {
   $id = $row['car_id'];
   $cat_title=$row['cat_title'];

   echo "<option value='$id'>$cat_title</option>";

 }
 
 
 ?>
 
 </select>
   
   </div>
   <div class="form-group">
 <label for="" class="col-md-3 control-label text-primary" >Product Image 1</label>
 <input type="file"name="product_img1" class="form-control" required="">
   
   </div>
   <div class="form-group">
 <label for="" class="col-md-3 control-label text-primary" >Product Image 2</label>
 <input type="file"name="product_img2" class="form-control" required="">
   
   </div>
   <div class="form-group">
 <label for="" class="col-md-3 control-label text-primary" >Product Image 3</label>
 <input type="file"name="product_img3" class="form-control" required="">
   
   </div>
   <div class="form-group">
 <label for="" class="col-md-3 control-label text-primary" >Product Keyword</label>
 <input type="text"name="product_keyword" class="form-control" required="">
   
   </div>
   <div class="form-group">
 <label for="" class="col-md-3 control-label text-primary" >Product Price</label>
 <input type="text"name="product_price" class="form-control" required="">
   
   </div>
   <div class="form-group">
 <label for="" class="col-md-3 control-label text-primary" >Product Description</label>
 <textarea name="product_desc" id="" class="form-control"cols="30" rows="10"></textarea>
   
   </div>

   <div class="form-group">
   <input type="submit" class="form-control btn btn-primary " name="submit" value="Insert Product" >
   
   </div>
   
   
   </form>
  
  </div>
 
</div>
<div class="col-lg-3">

</div>

</div>


</div>




<?php
}
?>


<?php


if(isset($_POST['submit']))
{
  $product_title = $_POST['product_title'];
  $product_cat= $_POST['product_cat'];
  $cat = $_POST['cat'];
  $product_price=$_POST['product_price'];
  $product_desc = $_POST['product_desc'];
  $product_keyword = $_POST['product_keyword'];
  $product_img1 = $_FILES['product_img1']['name'];
  $product_img2 = $_FILES['product_img2']['name'];
  $product_img3 = $_FILES['product_img3']['name'];

  $temp_name1 = $_FILES['product_img1']['tmp_name'];
  $temp_name2 = $_FILES['product_img2']['tmp_name'];
  $temp_name3 = $_FILES['product_img3']['tmp_name'];

  move_uploaded_file($temp_name1,"product_images/$product_img1");
  move_uploaded_file($temp_name2,"product_images/$product_img2");
  move_uploaded_file($temp_name3,"product_images/$product_img3");

  $insert_product = "INSERT INTO product (p_cat_id,cat_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,product_keyword) 
  VALUES($product_cat,$cat,NOW(),'{$product_title}','{$product_img1}','{$product_img2}','{$product_img3}','{$product_price}','{$product_desc}','{$product_keyword}')";

  $run_product = mysqli_query($con,$insert_product);


}













?>