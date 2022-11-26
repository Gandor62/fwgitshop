<?php 

include_once('../includes/config.php');

include "../includes/header.php" ;
include "../includes/navigation.php";
?>

<style>
/* unvisited link */
a:link {
  color: white;
}

/* visited link */
a:visited {
  color: White;
}

/* mouse over link */
a:hover {
  color: grey;
  text-decoration:none;
}

/* selected link */
a:active {
  color: grey;
}
</style>

<div class="header">
 
    <h2>System Settings</h2>
    
  </div>

<div class = "nav">

  <p class = "navleft"> <a href="/asset/main.php">Home </a>><a href="../assets/sysset.php"> System Settings  </a> > Equipment Types</p>

</div>




<div class="container">
  <a href='ict/browse-itequip.php' class="btn btn-primary btn-lg link-button">ICT Equipment</a>
     <a href='/assettype/plant/browse-plant.php' class="btn btn-primary btn-lg title-button">Plant and Equipment</a>
    <a href='/assettype/tools/browse-tools.php' class="btn btn-primary btn-lg title-button">Small Tools and Equipment</a>
    <a href='/assettype/fixtures/browse-fixtures.php' class="btn btn-primary btn-lg title-button">Furniture and Fixtures</a>
    <a href='/assettype/vehicles/browse-vehicles.php' class="btn btn-primary btn-lg title-button">Vehicles</a>
   <a href='/assettype/property/browse-property.php' class="btn btn-primary btn-lg title-button">Land and Buildings</a>
  
    <p style="clear:both"></p>
    
</div>


    
  <?php include "../includes/footer.php" ; ?>  