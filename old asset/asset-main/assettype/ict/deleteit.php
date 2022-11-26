<?php
require_once("../../includes/init.php");
require_once(INCLUDES_PATH . DS . "config.php");
//require_once(INCLUDES_PATH . DS . 'header.php');
//require_once(INCLUDES_PATH . DS . "navigation.php");
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('itequip',array('id'=>$_REQUEST['delId']));
	header('location: browse-itequip.php?msg=rds');
	exit;
}
?>