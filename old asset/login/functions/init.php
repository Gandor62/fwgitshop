<?php ob_start();


session_start();


defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

//define('SITE_ROOT' ,  DS . 'home'.DS.'gct48h6h1p7k'.DS.'public_html');

define('SITE_ROOT', DS . 'Applications' . DS . 'MAMP' . DS . 'htdocs');

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'includes');


define('CSS_PATH', INCLUDES_PATH . DS . 'css'.DS); //define CSS path
define('JS_PATH', INCLUDES_PATH . DS . 'js' . DS); //define JavaScript path
define('LOGIN_PATH', SITE_ROOT . DS . 'login' . DS); //define Security login/out path

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
$dat = date("d-m_h-i");


include("db.php");
include("functions.php");




 ?>