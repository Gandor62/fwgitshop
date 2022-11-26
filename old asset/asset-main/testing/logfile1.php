
<?php


$servername = "localhost";
$database = "asset";
$username = "root";
$password = "root";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

$asset = '3456';
$sitename = 'SSP';
$serialNo = '99999978';
$itemNotes = "This is anoither note";
$woff = 'Yes';
$user='Fred';




$sql = "INSERT INTO logfile (assetNo, logtime, site, serial, username,  reason, writtenOff) VALUES('$asset',current_timestamp,'$sitename', '$serialNo', '$user','$itemNotes','$woff')";
if (mysqli_query($conn, $sql)) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



?>