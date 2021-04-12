<?php


include("includes/db.php");

if(isset($_SESSION['customer_email']))
{
  $customer_email=$_SESSION['customer_email'];
  $get_customer = "select * from customers where customer_email = '$customer_email'";
  $run_customer = mysqli_query($con,$get_customer);
  $row = mysqli_fetch_assoc($run_customer);
  $name = $row['customer_name'];
  $photo_name = $row['customer_img'];
}





?>







<div class="card sidebar-menu" style="width: 18rem;">
  <img class="card-img-top" src="customer_images/<?php echo $photo_name;?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo  $name; ?></h5>
    
    <ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link <?php if(isset($_GET['my_order'])){echo "active";}?>" href="myaccount.php?my_order">My Order</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if(isset($_GET['pay_offline'])){echo "active";}?>" href="myaccount.php?pay_offline">Pay Offline</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if(isset($_GET['my_address'])){echo "active";}?>" href="myaccount.php?my_address">My Address</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if(isset($_GET['edit_act'])){echo "active";}?>" href="myaccount.php?edit_act">Edit Account</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if(isset($_GET['change_pass'])){echo "active";}?>" href="myaccount.php?change_pass">Change Password</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if(isset($_GET['delete_ac'])){echo "active";}?>" href="myaccount.php?delete_ac">Delete Account</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if(isset($_GET['logout'])){echo "active";}?>" href="myaccount.php?logout">Log Out</a>
  </li>
  
  
</ul>

  
  </div>
</div>