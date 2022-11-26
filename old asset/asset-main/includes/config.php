<?php



  include_once('Database.php');

  include_once('paginator.class.php');

  define('SS_DB_NAME', 'asset');
  define('SS_DB_USER', 'root');
  define('SS_DB_PASSWORD', 'root');
  define('SS_DB_HOST', 'localhost');

  $dsn  =   "mysql:dbname=".SS_DB_NAME.";host=".SS_DB_HOST."";
  $pdo  =   "";

  try {
    $pdo = new PDO($dsn, SS_DB_USER, SS_DB_PASSWORD);
//    echo "Connected";
  }catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  
  }

  $db    =   new Database($pdo);
  $pages =   new Paginator();

$mysqli = new mysqli("localhost", "root", "root", "asset");



?>


