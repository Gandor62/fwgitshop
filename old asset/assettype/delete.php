<?php 
include_once('../include/config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('assettype',array('id'=>$_REQUEST['delId']));
	header('location: browse-type.php?msg=rds');
	exit;
}
?>