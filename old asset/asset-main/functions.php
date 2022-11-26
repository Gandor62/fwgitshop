
<?php


if(isset($_POST["Export"])){
     
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'assetNo', 'assetType', 'client', 'division', 'site','assignedTo', 'siteLocation', 'area','assetCategory', 'equipmentCategory', 'brand', 'modelNo', 'equipmentType', 'serialNo', 'equipmentID', 'aquiredCondition', 'itemNotes', 'imei', 'mobileNumner', 'simCard', 'datePurchased', 'warrantyEnd', 'budgetEnd', 'operatingSystem', 'softwareLicence', 'regoRequired', 'regoNumber', 'regoExpiryDate', 'Klms-Hrs', 'testTagRequired', 'testTagFrequency', 'testedBy', 'testTagNextDue', 'itemCondition', 'repairsMaintenanceDate', 'maintFrequency', 'repairsMaintenaceDetails', 'repairer', 'repairResult', 'supplier', 'deliveryNote', 'poNumber', 'invoiceNo', 'costCode', 'costCodeDescription', 'instantWriteOff', 'depreciation1', 'depreciation2', 'depreciation3', 'value', 'writtenOff', 'file_name', 'uploded_on'   
            ));  
      $query = "SELECT * from assetdata ORDER BY ID DESC";  
      $result = mysqli_query($con, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  





?>