<!-- <?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login/login.php");
    exit;
}
?>
<?php require './includes/header.php' ;?>
<?php require './includes/navigation.php' ;?>
  
<link rel="stylesheet" type="text/css" href="./include/css/styles2.css">  



    <h1>Asset Register - Title Page</h1>
    <h2>Main Screen</h2>
    <p>SystemTalk Computers</p>




<div class="container" id="content" >

    <a href='./assets/asset-page.php' class="btn btn-primary btn-lg link-button">Log in</a>
    <button type="button" class="btn btn-primary btn-lg title-button"> Register </button>
    <button type="button" class="btn btn-primary btn-lg title-button">Admin </button>
    
    <p style="clear:both"></p>
    </div>
</div>



    
  <?php include "include/footer.php" ; ?>   -->
