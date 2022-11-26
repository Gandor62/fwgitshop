<?php 
include_once('../../include/config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('fixtures',array('id'=>$_REQUEST['delId']));
	header('location: browse-plant.php?msg=rds');
	exit;
}
?>