<?php
//session_start();
//
//if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//    header("location: login.php");
//    exit;
//}
//
//$_SESSION['condition'] = "";
//$_SESSION['typeasset'] = "";
//$_SESSION['searchfield'] = "";
//$_SESSION['parent'] = "../finance/finance.php";

include_once('../includes/config.php');

include "../includes/header.php" ;
include "../includes/navigation.php";

$totalvalue = 100;

?>
<style>
    /* unvisited link */
    a:link {
        color: grey;
    }

    /* visited link */
    a:visited {
        color: grey;
    }

    /* mouse over link */
    a:hover {
        color: blue;
        text-decoration:none;
    }

    /* selected link */
    a:active {
        color: grey;
    }

