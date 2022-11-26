<?php 
include_once('../include/config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('assetdata',array('id'=>$_REQUEST['delId']));
	header('location: browse-vehicles.php?msg=rds');
	exit;
}
?>