<?php

require_once("../includes/init.php");
require_once(INCLUDES_PATH . DS . "config.php");
require_once(INCLUDES_PATH . DS . 'header.php');
require_once(INCLUDES_PATH . DS . "navigation.php");


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

  <p class = "navleft">  <i class="fas fa-home"> </i><a href="/asset/main.php"> Home </a> >   System Settings </p>

</div>




<div class="container">
  <a href='sites.php' class="btn btn-primary btn-lg link-button">Sites and Departments </a>
     <a href='../assettype/equip-breakdown.php' class="btn btn-primary btn-lg title-button">Asset Breakdown Types</a>
     <a href='../costcode/browse-costcode.php' class="btn btn-primary btn-lg link-button">Cost Codes</a>
     <a href='../admin/register.php' class="btn btn-primary btn-lg link-button">Users </a>
     <a href='../assets/owner.php' class="btn btn-primary btn-lg link-button">Company Settings </a>
    <a href='../includes/export.php' class="btn btn-primary btn-lg link-button">Backup DataBase to CSV File </a>
</div>



<?php require_once(INCLUDES_PATH . DS . "footer.php"); ?>