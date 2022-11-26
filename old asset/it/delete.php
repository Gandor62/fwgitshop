<?php
session_start();


$goto = $_SESSION['parent'];
include_once('../includes/config.php');

if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('assetdata',array('id'=>$_REQUEST['delId']));
    header("location:". $goto."?msg=rds");
	exit;
}
?>