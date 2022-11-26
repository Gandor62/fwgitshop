<?php 
include_once('../includes/config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('assetdata',array('id'=>$_REQUEST['delId']));
	header('location: browse-property.php?msg=rds');
	exit;
}
?>