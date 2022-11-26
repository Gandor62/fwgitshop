<?php
//include database configuration file


include "./include/config.php'";

include "./include/header.php" ;
include "./include/navigation.php"; 

?>
<div>
            <form class="form-horizontal" action="functions.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <input type="submit" name="Export" class="btn btn-success" value="export to excel"/>
                            </div>
                   </div>                    
            </form>           
 </div>
<?php


// //get records from database
// $query = $db->query("SELECT * FROM assetdata ORDER BY id DESC");

// if($query->num_rows > 0){
//     $delimiter = ",";
//     $filename = "Asset_register_" . date('d-m-Y') . ".csv";
    
//     //create a file pointer
//     $f = fopen('php://memory', 'w');
    
//     //set column headers
//     $fields = array('ID', 'assetNo', 'assetType', 'client', 'division', 'site','assignedTo', 'siteLocation', 'area','assetCategory', 'equipmentCategory', 'brand', 'modelNo', 'equipmentType', 'serialNo', 'equipmentID', 'aquiredCondition', 'itemNotes', 'imei', 'mobileNumner', 'simCard', 'datePurchased', 'warrantyEnd', 'budgetEnd', 'operatingSystem', 'softwareLicence', 'regoRequired', 'regoNumber', 'regoExpiryDate', 'Klms-Hrs', 'testTagRequired', 'testTagFrequency', 'testedBy', 'testTagNextDue', 'itemCondition', 'repairsMaintenanceDate', 'maintFrequency', 'repairsMaintenaceDetails', 'repairer', 'repairResult', 'supplier', 'deliveryNote', 'poNumber', 'invoiceNo', 'costCode', 'costCodeDescription', 'instantWriteOff', 'depreciation1', 'depreciation2', 'depreciation3', 'value', 'writtenOff', 'file_name', 'uploded_on'   
//             );
//     fputcsv($f, $fields, $delimiter);
    
//   echo $fields; 
//     //output each row of the data, format line as csv and write to file pointer
//     while($row = $query->fetch_assoc()){
       
//                 $lineData = array($row['id'], $row['assetNo'],  $row['assetType'],  $row['client'],  $row['division'],  $row['site'], $row['assignedTo'],  $row['siteLocation'],  $row['area'], $row['assetCategory'],  $row['equipmentCategory'],  $row['brand'],  $row['modelNo'],  $row['equipmentType'],  $row['serialNo'],  $row['equipmentID'],  $row['aquiredCondition'],  $row['itemNotes'],  $row['imei'],  $row['mobileNumner'],  $row['simCard'],  $row['datePurchased'],  $row['warrantyEnd'],  $row['budgetEnd'],  $row['operatingSystem'],  $row['softwareLicence'],  $row['regoRequired'],  $row['regoNumber'],  $row['regoExpiryDate'],  $row['Klms-Hrs'],  $row['testTagRequired'],  $row['testTagFrequency'],  $row['testedBy'],  $row['testTagNextDue'],  $row['itemCondition'],  $row['repairsMaintenanceDate'],  $row['maintFrequency'],  $row['repairsMaintenaceDetails'],  $row['repairer'],  $row['repairResult'],  $row['supplier'],  $row['deliveryNote'],  $row['poNumber'],  $row['invoiceNo'],  $row['costCode'],  $row['costCodeDescription'],  $row['instantWriteOff'],  $row['depreciation1'],  $row['depreciation2'],  $row['depreciation3'],  $row['value'],  $row['writtenOff'],  $row['file_name'],  $row['uploaded_on']);

//         fputcsv($f, $lineData, $delimiter);
//     }
//     echo $linedata;
//     //move back to beginning of file
//     fseek($f, 0);
    
//     //set headers to download file rather than displayed
//     header('Content-Type: text/csv');
//     header('Content-Disposition: attachment; filename="' . $filename . '";');
//     echo "File Downloaded";
//     //output all remaining data on a file pointer
//     fpassthru($f);
// }
// exit;

?>