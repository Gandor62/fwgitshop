<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$_SESSION['condition'] = "";
$_SESSION['typeasset'] = "";
$_SESSION['searchfield'] = "";
$goto= $_SESSION['parent'];

$goto = 'itselect.php';



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

    <h2>Asset Register</h2>

</div>

<div class = "nav">

    <p class = "navleft">  <i class="fas fa-home">  </i> <a href="../main.php">Home </a> > <a href="../assets/asset-page.php">Asset Register </a>   > IT Assets</p>

</div>


<div class="container">
    <a href='browse-it.php' class="btn btn-primary btn-lg link-button">Display all IT Assets</a>
    <a href='viewcomms.php' class="btn btn-primary btn-lg link-button">Communication Devices</a>
    <a href='viewcomp.php' class="btn btn-primary btn-lg link-button">Computer Equipment</a>
    <a href='peripherals.php' class="btn btn-primary btn-lg link-button">Peripheral and Small IT Equip</a>
    <a href='itstock.php'  class="btn btn-primary btn-lg link-button">IT Stock</a>
    <a href='#'  class="btn btn-primary btn-lg link-button">Passwords</a>
    <a href='software.php'  class="btn btn-primary btn-lg link-button">Licencing and Software</a>
    <a href='writtenoff.php'  class="btn btn-primary btn-lg link-button">Write OFF IT Assets</a>

    <p style="clear:both"></p>

</div>



<?php include "../includes/footer.php" ; ?>