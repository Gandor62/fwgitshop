<?php 
include_once('../../includes/config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('itequip',array('id'=>$_REQUEST['delId']));
	header('location: browse-itequip.php?msg=rds');
	exit;
}
?>