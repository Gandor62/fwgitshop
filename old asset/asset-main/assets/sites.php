<?php
session_start();

$_SESSION['condition'] = "";
$_SESSION['typeasset'] = "";
$_SESSION['searchfield'] = "";
$_SESSION['parent'] = "sites.php";


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
    <h2>Asset Register - Sites and Departments</h2>
    
</div>
<div class = "nav">

  <p class = "navleft">  <i class="fas fa-home">  </i> <a href="/asset/main.php">Home </a> >   <a href="/asset/assets/sysset.php">System Settings </a>  > Site Settings</p>

</div>

<div class="container">

    <a href='sitedata/browse-site.php' class="btn btn-primary btn-lg link-button">Site Data</a>
    <a href='../department/browse-department.php' class="btn btn-primary btn-lg link-button">Department Data</a>
    <a href='../client//browse-client.php' class="btn btn-primary btn-lg link-button">Client Data</a>


   
    <p style="clear:both"></p>
    </div>
</div>



<?php require_once(INCLUDES_PATH . DS . 'footer.php'); ?>