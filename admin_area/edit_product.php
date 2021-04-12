<?php
include("./includes/db.php");
if(!isset($_SESSION['admin_email']))
{
    header("location: ./login.php");
}else
{
    if(isset($_GET['edit_product']))
    {
        $edit_product=$_GET['edit_product'];
        $get_product="SELECT * FROM product WHERE product_id='$edit_product'";
        $run_product=mysqli_query($con,$get_product);
        $row=mysqli_fetch_assoc($run_product);
        $p_cat=$row['p_cat_id'];
        $cat=$row['cat_id'];
        $date=$row['date'];
        $title=$row['product_title'];
        $img1=$row['product_img1'];
        $img2=$row['product_img2'];
        $img3=$row['product_img3'];
        $price=$row['product_price'];
        $description=$row['product_desc'];
        $keyword=$row['product_keyword'];
        $get_category="SELECT * FROM category WHERE car_id='$cat'";
        $run_category=mysqli_query($con,$get_category);
        $row1=mysqli_fetch_assoc($run_category);
        $category_name=$row1['cat-title'];
        $get_product_category="SELECT * FROM product_categories WHERE p_cat_id='$p_cat'";
        $run_p_cat=mysqli_query($con,$get_product_category);
        $row2=mysqli_fetch_assoc($run_p_cat);
        $p_cat_name=$row2['p_cat_title'];


    }




?>
<div class="row">
<div class="col-md-12">
<form action="" enctype="multipart/form-data" method="post">

<div class="form-group">
<label for="" class="control-label col-md-3 text-primary">Product Title :</label>
<div class="col-md-9">
<input class="form-control text-primary py-3" type="text" name="p_title" value="<?php echo $title;?>" id="">
</div>

<div class="form-group">
<label for="" class="control-label col-md-3 text-primary">Product Keyword :</label>
<div class="col-md-9">
<input class="form-control text-primary py-3" type="text" name="p_key" value="<?php echo $keyword;?>" id="">
</div>



</div>




</div>

<div class="form-group">
<label for="" class="control-label col-md-3 text-primary">Product Price :</label>
<div class="col-md-9">
<input class="form-control text-primary py-3" type="text" name="p_price" value="<?php echo $price;?>" id="">
</div>
<div class="form-group class="text-primary">
<label class="text-primary control-label col-md-3" for="">Category</label>
<div class="col-md-9">
<?php
$sql1="select * from categories";
$run_sql1=mysqli_query($con,$sql1);
echo "<select class='text-primary form-control' name='sclass'>
<option class='text-primary' value='' selected disabled>Select Class</option>";
while($row_sql=mysqli_fetch_assoc($run_sql1))
{
    if($cat==$row_sql['car_id'])
    {
        $selected=selected;
    }
    else
    {
        $selected='';
    }
    echo "<option $selected class='text-primary' value='{$row_sql['car_id']}'>{$row_sql['cat_title']}</option>";

}
echo "</select>";

?>

</div>
</div>

<div class="form-group class="text-primary">
<label class="text-primary control-label col-md-3" for="">Product Categories</label>
<div class="col-md-9">
<?php
$sql2="select * from product_categories";
$run_sql2=mysqli_query($con,$sql2);
echo "<select class='text-primary form-control' name='sclass2'>
<option class='text-primary' value='' selected disabled>Select Class</option>";
while($row_sql2=mysqli_fetch_assoc($run_sql2))
{
    if($p_cat==$row_sql2['p_cat_id'])
    {
        $selected2=selected;
    }
    else
    {
        $selected2='';
    }
    echo "<option $selected2 class='text-primary' value='{$row_sql2['p_cat_id']}'>{$row_sql2['p_cat_title']}</option>";

}
echo "</select>";

?>

</div>
</div>
<div class="form-group">
 <label for="" class="col-md-3 control-label text-primary" >Product Description</label>
 <textarea name="p_desc" id="" class="form-control text-primary" cols="30" rows="10">
<?php echo $description;?>
 </textarea>
   
   </div>

   <div class="form-group">
 <label for="" class="col-md-3 control-label text-primary" >Product img1</label>
<div class="col-md-9">
<input class="form-control" type="file" name="p_img1" id="">
<br>
<img src="./product_images/<?php echo $img1;?>" alt="" srcset="" width="70" height="70">
</div>
<div class="form-group">
 <label for="" class="col-md-3 control-label text-primary" >Product img2</label>
<div class="col-md-9">
<input class="form-control" type="file" name="p_img2" id="">
<br>
<img src="./product_images/<?php echo $img2;?>" alt="" srcset="" width="70" height="70">
</div>
<div class="form-group">
 <label for="" class="col-md-3 control-label text-primary" >Product img3</label>
<div class="col-md-9">
<input class="form-control" type="file" name="p_img3" id="">
<br>
<img src="./product_images/<?php echo $img3;?>" alt="" srcset="" width="70" height="70">
</div>


   
   </div>
<div class="form-group">

<div class="col-md-9">
<input type="submit" name="update" value="Update a Product" class="btn btn-secondary form-control">

</div>


</div>

</div>


</form>

</div>



</div>
<?php
}

?>

<?php

if(isset($_POST['update']))
{
    $title=$_POST['p_title'];
    $c_title=$_POST['sclass'];
    $p_cat_title=$_POST['sclass1'];
    $desc=$_POST['p_desc'];
    $price=$_POST['p_price'];
    $key=$_POST['p_key'];
    
    $product_image1=$_FILES['p_img1']['name'];
    $product_image2=$_FILES['p_img2']['name'];
    $product_image3=$_FILES['p_img3']['name'];
    $temp1=$_FILES['p_img1']['tmp_name'];
    $temp2=$_FILES['p_img2']['tmp_name'];
    $temp3=$_FILES['p_img3']['tmp_name'];
    move_uploaded_file($temp1,"product_images/$product_image1");
    move_uploaded_file($temp2,"product_images/$product_image2");
    move_uploaded_file($temp3,"product_images/$product_image3");

    $update_product="UPDATE product SET p_cat_id='$p_cat_title',cat_id='$c_title',date=NOW(),product_title='$title',product_img1='$product_image1',product_img2='$product_image2',product_img3='$product_image3',product_price='$price',product_keyword='$key' WHERE product_id='$edit_product'";
    $run_update_product=mysqli_query($con,$update_product) or die("query unsuccessfull");
    if($run_update_product)
    {
        header("location: ./index.php?edit_product");  
    }


}




?>