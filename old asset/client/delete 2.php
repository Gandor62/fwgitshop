<?php 
include_once('../include/config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('client',array('id'=>$_REQUEST['delId']));
	header('location: browse-client.php?msg=rds');
	exit;
}
?>