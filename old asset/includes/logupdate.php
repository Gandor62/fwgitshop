<?php

$servername = "localhost";
$database = "asset";
$username = "root";
$password = "root";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

$sql = "INSERT INTO logfile (assetNo, username,logtime, site, brand, model, serial, reason, writtenOff) VALUES('$assetNo','$user',CURRENT_TIMESTAMP,'$site','$brand','$modelNo', '$serialNo','$itemNotes','$writtenOff')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



?>