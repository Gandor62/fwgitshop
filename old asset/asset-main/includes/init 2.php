<?php

defined('DS') ? null :define('DS',DIRECTORY_SEPARATOR);

define('SITE_ROOT' ,  DS . 'Applications'. DS. 'MAMP' .DS. 'htdocs'. DS . 'asset');

defined('INCLUDES_PATH') ? null :define('INCLUDES_PATH',SITE_ROOT . DS . 'includes');

define('CSS_PATH' , INCLUDES_PATH . DS .'css'); //define CSS path
define('JS_PATH' , INCLUDES_PATH . DS .'js'); //define JavaScript path

//require_once(INCLUDES_PATH . DS . "functions.php");
require_once(INCLUDES_PATH . DS . "config.php");
require_once(INCLUDES_PATH . DS . "Database.php");
//require_once(INCLUDES_PATH . DS . "db_object.php");
//require_once(INCLUDES_PATH . DS . "user.php");
//require_once(INCLUDES_PATH . DS . 'photo.php');
//require_once(INCLUDES_PATH . DS . 'comment.php');
require_once(INCLUDES_PATH . DS . 'paginator.class.php');
//require_once(INCLUDES_PATH . DS . "session.php");

date_default_timezone_set('Australia/Queensland');
$dat = date("d-m_h-i") ;


?>
