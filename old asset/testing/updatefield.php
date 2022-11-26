<?php

$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'asset';

$connection = mysql_connect($host, $user, $pass);
mysql_select_db($db);

$thisword = 'NULL';
$shouldbe = "No";
$thistable = "assetdata";

MySQL_replace_all($thisword, $shouldbe, $thistable);

function MySQL_replace_all($thisword,$shouldbe,$thistable){
    $cnamnes = "SHOW columns FROM " . $thistable;
    $result = mysql_query($cnamnes);
    while($columnname = mysql_fetch_row($result)){
        $replace_SQL = "UPDATE $thistable SET ". $columnname[0] ." = REPLACE(". $columnname[0] .",'". $thisword ."', '". $shouldbe ."');";
        echo $replace_SQL . "<br>";
        mysql_query($replace_SQL);
    }
}
echo 'Done';
?>