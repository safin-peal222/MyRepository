<?php
include("function/function1.php");


?>





<div class="sidebar-menu card mt-2">
    <div class="card-header">
        <h3 class="card-title">Product Categories</h3>
    </div>
    <div class="card-body category">
        <ul>
            <?php
            
            get_p_cat();
            
            ?>
        </ul>
    </div>
</div>
<div class="sidebar-menu card mt-2">
    <div class="card-header">
        <h3 class="card-title">Categories</h3>
    </div>
    <div class="card-body category">
        <ul>
           <?php
           
           get_cat();
           
           ?>
            
        </ul>
    </div>
</div>