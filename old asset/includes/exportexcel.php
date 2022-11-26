<?php
session_start();

$condition = $_SESSION['condition'];
$typeasset = $_SESSION['typeasset'];
$searchfield = $_SESSION['searchfield'];
date_default_timezone_set('Australia/Queensland');
$dat = date("d-m_h-i") ;







header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=asset_list_$dat.xls");
header("Pragma: no-cache");
header("Expires: 0");

require_once 'conn.php';

$output = "";

$output .="
		<table border = '1'>
			<thead>
				<tr>
					<th>Asset No</th>
					<th>Site</th>
					<th>Model No</th>
					<th>Serial</th>
					<th>EquipmentType</th>
				</tr>
			<tbody>
	";

$query = $conn->query("SELECT * FROM assetdata WHERE 1 " .$condition." AND assetType LIKE " .$typeasset. " AND " .$searchfield.  " ORDER BY site ASC, brand ASC , assetNo ASC");

//$query = $conn->query("SELECT * FROM `assetdata`") or die(mysqli_errno());
while($fetch = $query->fetch_array()){

    $output .= "
				<tr>
					<td>".$fetch['assetNo']."</td>
					<td>".$fetch['site']."</td>
					<td>".$fetch['modelNo']."</td>
					<td>".$fetch['serialNo']."</td>
					<td>".$fetch['equipmentType']."</td>
				</tr>
	";
}

$output .="
			</tbody>
 
		</table>
	";

echo $output;


?>