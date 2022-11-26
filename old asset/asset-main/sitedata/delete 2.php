<?php 
include_once('../include/config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('site',array('id'=>$_REQUEST['delId']));
	header('location: browse-site.php?msg=rds');
	exit;
}
?>