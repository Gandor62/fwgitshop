<?php 

// include_once('../include/config.php');

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
 
    <h2>Asset Register</h2>
    
  </div>

<div class = "nav">

 <p class = "navleft">  <i class="fas fa-home">  </i> <a href="./../main.php">Home </a> > Asset Register</p> 

</div>


<div class="container">
  <a href='../all-asset/browse-all.php' class="btn btn-primary btn-lg link-button">Display all Assets</a>
  <a href='../it/itselect.php' class="btn btn-primary btn-lg link-button">IT Hardware</a>
  <a href='../plant/browse-plant.php' class="btn btn-primary btn-lg link-button">Plant and Machinery</a>
  <a href='../tools/browse-tools.php' class="btn btn-primary btn-lg link-button">Small Tools and Equipment</a>
  <a href='../vehicles/browse-vehicles.php'  class="btn btn-primary btn-lg link-button">Vehicles (Not Complete))</a>
  <a href='../fixtures/browse-fixtures.php'  class="btn btn-primary btn-lg link-button">Furniture and Fixtures (Coding)</a>
  <a href='../property/browse-property.php'  class="btn btn-primary btn-lg link-button">Buildings and Land (Coding)</a>
    <a href='../log/view_logfile.php'  class="btn btn-primary btn-lg link-button">View Log File</a>
    <a href='#'  onclick="Coming()" class="btn btn-primary btn-lg link-button" >Transfer Asset</a>
    
    <p style="clear:both"></p>
    




<?php require_once(INCLUDES_PATH . DS . 'footer.php'); ?>