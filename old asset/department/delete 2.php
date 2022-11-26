<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


require_once("../includes/init.php");
require_once(INCLUDES_PATH . DS . "config.php");
require_once(INCLUDES_PATH . DS . 'header.php');
require_once(INCLUDES_PATH . DS . "navigation.php");


if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('department',array('id'=>$_REQUEST['delId']));
	header('location: browse-department.php?msg=rds');
	exit;
}
?>