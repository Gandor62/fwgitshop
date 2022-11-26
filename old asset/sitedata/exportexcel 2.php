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

require '../includes/conn.php';

$output = "";

$output .="
		<table border = '1'>
			<thead>
				<tr>
					<th>Client</th>
                    <th>Site</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Department</th>
                    <th>Cost Centre</th>
                    <th>In Contract</th>
				</tr>
			<tbody>
	";

//$query = $conn->query("SELECT * FROM assetdata WHERE 1 " .$condition." AND assetType LIKE " .$typeasset. " AND " .$searchfield.  " ORDER BY site ASC, brand ASC , assetNo ASC");

$query = $conn->query("SELECT * FROM site WHERE 1 " .$condition. "ORDER BY client ASC, site ASC");

//$query = $conn->query("SELECT * FROM `assetdata`") or die(mysqli_errno());
while($fetch = $query->fetch_array()){

    $output .= "
				<tr>
					<td>".$fetch['client']."</td>
					<td>".$fetch['site']."</td>
					<td>".$fetch['city']."</td>
					<td>".$fetch['state']."</td>
					<td>".$fetch['department']."</td>
					<td>".$fetch['costcentre']."</td>
					<td>".$fetch['active']."</td>
				</tr>
	";
}

$output .="
			</tbody>
 
		</table>
	";

echo $output;


?>