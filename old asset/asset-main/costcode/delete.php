<?php 
include_once('../include/config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('costcode',array('id'=>$_REQUEST['delId']));
	header('location: browse-costcode.php?msg=rds');
	exit;
}
?>