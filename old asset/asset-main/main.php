<?php  if (!isset($_SESSION)) session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login/login.php");
    exit;
}


$_SESSION['condition'] = "";
$_SESSION['typeasset'] = "";
$_SESSION['searchfield'] = "";
$_SESSION['parent'] = "browse-it.php";

include_once('includes/config.php');

include "includes/header.php";
include "includes/navigation.php";



// header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");
// Copyright Tony Casbolt - SYSTEM Talk

//
//include "/includes/header.php" ;
//include "/includes/navigation.php";

?>


<div class="header">
    <h2>Asset Register V2.24 alpha - Home Page</h2>
    <p>Main Screen</p>
</div>



<div class="container" id="content" >

		<a href='assets/asset-page.php' class="btn btn-primary btn-lg link-button">Asset Register</a>
    <a href='finance/finance.php' class="btn btn-primary btn-lg link-button">Finance</a>

   
  <a href='assets/sysset.php' class="btn btn-primary btn-lg link-button">System Settings and Setup</a>




    <a href='testtag/ttview.php' class="btn btn-primary btn-lg link-button">Test and Tag System</a>
  
    <p style="clear:both"></p>
    
</div>

 
    
  <?php include "includes/footer.php" ; ?>