<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$_SESSION['condition'] = "";
$_SESSION['typeasset'] = "";
$_SESSION['searchfield'] = "";
$goto= $_SESSION['parent'];

require_once("../includes/init.php");
require_once(INCLUDES_PATH . DS . "config.php");
require_once(INCLUDES_PATH . DS . 'header.php');
require_once(INCLUDES_PATH . DS . "navigation.php");




if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('assetdata','*',' AND id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
  
	if($assetNo==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
		exit;
	}
	 
	
	
	if ($_POST["maintenanceRequired"] === "Not Required") {
		
		$repairsMaintenanceDate = NULL;
	
				$maintFrequency= NULL;
				$repairsMaintenanceDetails= NULL;
				$repairer= NULL;
				$lastService=NULL;	
	}
	
	
	if ($_POST["testTagRequired"] === "Not Required") {
	
				$testTagFrequency= NULL;
				$testTagDate= NULL;
				$testedBy= NULL;
				$testTagNextDue= NULL;
	}
	
	
	

	if (empty($_POST["testTagDate"]))
 {      
   $testTagDate = NULL;
 }
 
if (empty($_POST["testTagNextDue"]))
 {      
   $testTagNextDue = NULL;
	
 }
	
	if (empty($_POST["repairsMaintenanceDate"]))
 {      
   $repairsMaintenanceDate = NULL;
 }
 
 if (empty($_POST["lastService"]))
 {      
   $lastServcice = NULL;
 }
	

	
	$data	=	array(

        'assetNo'=>$assetNo,
        'assetType'=>$assetType,
        'client'=>$client,
        'site'=>$site,
        'division'=>$division,
        'assignedTo'=>$assignedTo,
        'position'=>$position,
        'assetCategory'=>$assetCategory,
        'equipmentType'=>$equipmentType,
        'brand'=>$brand,
        'modelNo'=>$modelNo,
        'serialNo'=>$serialNo,
        'equipmentID'=>$equipmentID,
        'imei'=>$imei,
        'mobileNumber'=>$mobileNumber,
        'simCard'=>$simCard,
        'mobilePlan'=>$mobilePlan,
        'warrantyEnd'=>$warrantyEnd,
        'budgetEnd'=>$budgetEnd,
        'aquiredCondition'=>$aquiredCondition,
        'testTagRequired'=>$testTagRequired,
        'testTagFrequency'=>$testTagFrequency,
        'testTagDate'=>$testTagDate,
        'testedBy'=>$testedBy,
        'testTagNextDue'=>$testTagNextDue,
        'datePurchased'=>$datePurchased,
        'costCode'=>$costCode,
        'supplier'=>$supplier,
        'poNumber'=>$poNumber,
        'deliveryNote'=>$deliveryNote,
        'invoiceNo'=>$invoiceNo,
        'invoiceReference'=>$invoiceReference,
        'invoiceDate'=>$invoiceDate,
        'costExGST'=>$costExGST,
        'value'=>$value,
        'itemNotes'=>$itemNotes,
        'file_name'=>$file_name,
        'writtenOff'=>$writtenOff,
        'dateWrittenOff'=>$dateWrittenOff,
        'reasonWrittenOff'=>$reasonWrittenOff,
        'itemCondition'=>$itemCondition,
        'maintenanceRequired'=>$maintenanceRequired,
        'lastService'=>$lastService,
        'repairsMaintenanceDate'=>$repairsMaintenanceDate,
        'maintFrequency'=>$maintFrequency,
        'repairsMaintenanceDetails'=>$repairsMaintenanceDetails,
        'repairer'=>$repairer,
        'repairResult'=>$repairResult,

					);
  
 

		

  
	$update	=	$db->update('assetdata',$data,array('id'=>$editId));
	if($update){
		header('location: browse-plant.php?msg=rus');
		exit;
	}else{
		header('location: browse-plant.php?msg=rnu');
		exit;
	}
}
?>

	
	
   	<div class="container">
		<h1>Edit Plant and Equipment Asset Details</h1>
		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Field is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Description is mandatory field!</div>';
		
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Cost Centre Data added successfully!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Cost Centre Data not added <strong>Please try again!</strong></div>';
		}
			
		?>
      
      
      
      
      
		<div class="card" style="width:100%;">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Edit Asset</strong> <a href="browse-plant.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Plant and Equipment</a></div>
			<div class="card-body">
				
				<div class="col-sm-12">
					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
					
         
          
          
          <form method="post">
            
            
						
					
            
            <div class="form-group form-row ">
                <div class="col-3"> 
                  <label>Asset Number</label>
                  <input type="text" name="assetNo" id="assetNo" class="form-control form-control-sm" value="<?php echo $row[0]['assetNo']; ?>" >
						    </div>
							
							
              <div class="form-group col">
							  <label>Asset Type  </label>
									<?php
												$sql = "SELECT type FROM assettype";
												$stmt = $pdo->prepare($sql);
												$stmt->execute();
												$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
												if ($stmt->rowCount() > 0) {
										 ?>
												<select name="assetType" id="assetType" class="form-control form-control-sm">
														<option value =  "<?php  echo $row[0]['assetType'];?>"><?php  echo $row[0]['assetType'];?></option>
														<?php foreach ($results as $typerow) { ?>
														<option value="<?php echo $typerow['type']; ?>"><?php echo $typerow['type'];?></option>
														<?php } ?>
												</select>
										<?php
												} 
										?>
               </div>  
							
							
            
               <div class="form-group col">
                  <label>Client Name  </label>
                 <?php
                    $sql = "SELECT clientname FROM client";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($stmt->rowCount() > 0) {
                 ?>
                <select name="client" id="client" class="form-control form-control-sm">
                    <option value =  "<?php  echo $row[0]['client'];?>"><?php  echo $row[0]['client'];?></option>
                    <?php foreach ($results as $crow) { ?>
                    <option value="<?php echo $crow['clientname']; ?>"><?php echo $crow['clientname'];?></option>
                    <?php } ?>
                </select>
                <?php
                    } 
                ?>
               </div>  
           
            </div>
   
         	
						 <div class="form-group form-row ">
                <div class="col-4"> 
                  
									<label>Site Name </label>
							    <?php
                    $sql = "SELECT site FROM site";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($stmt->rowCount() > 0) {
                 ?>
                <select class="form-control form-control-sm" name="site" id="site" >
                    <option value =  "<?php  echo $row[0]['site'];?>"><?php  echo $row[0]['site'];?></option>
                    <?php foreach ($results as $siterow) { ?>
                    <option value="<?php echo $siterow['site']; ?>"><?php echo $siterow['site'];?></option>
                    <?php } ?>
                </select>
                <?php
                    } 
                ?>
							 </div>
              
            
           		 <div class="form-group col">
							
                 <label>Division/Department</label>
                 <?php
                    $sql = "SELECT department FROM department";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($stmt->rowCount() > 0) {
                 ?>
										<select name="division" id="division" class="form-control form-control-sm">
												<option value =  "<?php  echo $row[0]['division'];?>"><?php  echo $row[0]['division'];?></option>
												<?php foreach ($results as $departmentrow) { ?>
												<option value="<?php echo $departmentrow['department']; ?>"><?php echo $departmentrow['department'];?></option>
												<?php } ?>
										</select>
										<?php
												} 
										?>
							 </div>
							 
							 
						
                <div class="form-group col">
                  <label>Cost Center</label>
                 
									<?php
                    $sql = "SELECT account, description FROM costcode";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($stmt->rowCount() > 0) {
                 ?>
                <select name="costCode" id="costCode" class="form-control form-control-sm">
                    <option value =  "<?php  echo $row[0]['costCode'];?>"><?php  echo $row[0]['costCode'];?></option>
                    <?php foreach ($results as $costrow) { ?>
                    <option value="<?php echo $costrow['account']; ?>"><?php echo $costrow['account'];?><?php echo $costrow['description'];?></option>
                    <?php } ?>
                </select>
                <?php
                    } 
                ?>
								
						    </div>
             </div>
              
            
              <div class="form-group form-row">
                <div class="col-3"> 
                  <label>Assigned To  </label>
                  <input type="text" name="assignedTo" id="assignedTo" class="form-control form-control-sm" value="<?php echo $row[0]['assignedTo']; ?>" placeholder="Assigned To"  >
                 
                </div>
	
                
                <div class="form-group col">
                   <label>Position  </label>
                  <input type="text" name="position" id="position" class="form-control form-control-sm" value="<?php echo $row[0]['position']; ?>" placeholder="Position"  >
                </div>
						   
            
	

            
						    <div class="form-group col">
                  <label>Equipment Type  </label>
                 
									
									<?php
												$sql = "SELECT type FROM plant";
												$stmt = $pdo->prepare($sql);
												$stmt->execute();
												$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
												if ($stmt->rowCount() > 0) {
										 ?>
												<select name="equipmentType" id="equipmentType" class="form-control form-control-sm">
														<option value =  "<?php  echo $row[0]['equipmentType'];?>"><?php  echo $row[0]['equipmentType'];?></option>
														<?php foreach ($results as $equiprow) { ?>
														<option value="<?php echo $equiprow['type']; ?>"><?php echo $equiprow['type'];?></option>
														<?php } ?>
												</select>
										<?php
												} 
										?>
              </div>
						    </div>
        
            
            
            <div class="form-group form-row">
                <div class="form-group col"> 
                  <label>Brand  </label>
                  <input type="text" name="brand" id="brand" class="form-control form-control-sm" value="<?php echo $row[0]['brand']; ?>" placeholder="Brand"  >
                </div>
	
                <div class="form-group col">
                  <label>Model Number  </label>
                  <input type="text" name="modelNo" id="modelNo" class="form-control form-control-sm" value="<?php echo $row[0]['modelNo']; ?>" placeholder="Model"  >
						    </div>
            
						    <div class="form-group col">
                  <label>Serial No.  </label>
                  <input type="text" name="serialNo" id="serialNo" class="form-control form-control-sm" value="<?php echo $row[0]['serialNo']; ?>" placeholder="Serial No"  >
						    </div>
              
                <div class="form-group col">
                  <label>Equipment ID / Code  </label>
                  <input type="text" name="equipmentID" id="equipmentID" class="form-control form-control-sm" value="<?php echo $row[0]['equipmentID']; ?>" placeholder="equipmentID"  >
						    </div>
          
            </div>
            
            
               
					
					
					
			 <div class="form-group form-row">			
				
					
						 <div class="form-group col "> 
											<label>Maintenance Required </label>
							
											<select type="text" name="maintenanceRequired" id="maintenanceRequired" class="form-control form-control-sm " >
												<option value =  "<?php  echo $row[0]['maintenanceRequired'];?>"><?php  echo $row[0]['maintenanceRequired'];?></option>	
												<option value="Not Required" >Not Required</option>
												<option value="Required" >Required</option>
											</select>
						 </div>
					
				 
				  <div class="form-group col "> 
                  <label >Service Frequency</label>
								 
								
                <?php 
							
								$mf = $row[0]['maintFrequency'];
						
								
										switch ($mf) {
											case "0":
												$result = "Not required";
												break;
											case ".1":
												$result = "Every Month";
												break;
											case ".4":
												$result = "Every Three Months";
												break;
												
													case ".6":
												$result = "Every 6 Months";
												break;
											case "1":
												$result = "Yearly";
												break;
											case "2":
												$result = "24 Months";
												break;
												
											default:
												$result = "Not Required";
										}
							
									 
								?>
								 
									<select class="form-control form-control-sm" name="maintFrequency" id="maintFrequency" >
													
										<option value =  "<?php  echo $row[0]['maintFrequency'];?>"><?php  echo $result;?></option>
													
										
													<option value="0">Not Required</option>
													<option value=".1">Every Month</option>
													<option value=".4">Every 3 Months</option>
													<option value=".6">Every 6 Months</option>
													<option value="1">Every 12 Months</option>
													<option value="2">Every 2 Years</option>
												
									</select>
							</div>
							
					 			<div class="form-group col">
                    <label for="otherField3b">Last Service Date </label>
                    <input type="date" name="lastService" id="lastService" class="form-control form-control-sm" value ="<?php echo $row[0]['lastService']; ?>">
                </div>
						
							<div class="form-group col ">
								<label >Company Maintain</label>
								<input type="text" name="repairer" id="repairer" class="form-control form-control-sm"  placeholder="Name of Service Provider " value="<?php echo $row[0]['repairer']; ?>" >
      				</div>
				 
							<div class="form-group col ">
								<label >Next Maintenance Date</label>
								<input type="date" name="repairsMaintenanceDate" id="repairsMaintenanceDate" class="form-control form-control-sm"  value="<?php echo $row[0]['repairsMaintenanceDate']; ?>" >
								
							</div>
							
				</div>
					
				  <div class="form-group form-row">		
						 <div class="form-group col "> 
                  <label>Comment</label>
                  <input type="text" name="repairResult" id="repairResult" class="form-control form-control-sm"  placeholder="Result last Maintenance"  >
						</div>
					</div>	
								
						
						
						
						
				<div class="form-group form-row">		
					
		  			
                <div class="form-group col"> 
                  <label>Test and Tag </label>
                  <select type="text" name="testTagRequired" id="testTagRequired" class="form-control form-control-sm " value ="<?php echo $row[0]['testTagRequired']; ?>" >
             	 			<option value =  "<?php  echo $row[0]['testTagRequired'];?>"><?php  echo $row[0]['testTagRequired'];?></option>	
										<option value="Not Required" >Not Required</option>
										<option value="Required" >Required</option>
									</select>
						
						
							</div>
					
					
					 <?php 
							
								$mf1 = $row[0]['testTagFrequency'];
						
								
										switch ($mf1) {
											case "0":
												$result1 = "Not required";
												break;
											case ".1":
												$result1 = "Every Month";
												break;
											case ".4":
												$result1 = "Every Three Months";
												break;
												
											case ".6":
												$result1 = "Every 6 Months";
												break;
											case "1":
												$result1 = "Yearly";
												break;
											case "2":
												$result1 = "24 Months";
												break;
											case "5":
												$result1 = "5 Yearly";
												break;
												
											default:
												$result1 = "Not Required";
										}
							?>
            
						    <div class="form-group col">
									<label>Frequency</label>
						    
									<select class="form-control form-control-sm" name="testTagFrequency" id="testTagFrequency"  >
											<option value =  "<?php  echo $row[0]['testTagFrequency'];?>"><?php  echo $result1;?></option>
													<option value="0">Not Required</option>
													<option value=".1">Every Month</option>
													<option value=".4">Every 3 Months</option>
													<option value=".6">Every 6 Months</option>
													<option value="1">Every 12 Months</option>
													<option value="2">Every 2 Years</option>
													<option value="5">Every 5 Years</option>
									</select>
						
								</div>
						
                <div class="form-group col">
                    <label for="otherField3b">Tested Date </label>
                    <input type="date" name="testTagDate" id="testTagDate" class="form-control form-control-sm" value ="<?php echo $row[0]['testTagDate']; ?>">
                </div>
               
                <div class="form-group col"> 
                  <label for="otherField4b">Tested By  </label>
                  <input type="text" name="testedBy" id="testedBy" class="form-control form-control-sm"  value ="<?php echo $row[0]['testedBy']; ?>">
              	</div>
            
                <div class="form-group col">
                    <label for="otherField5b">Date Next Test Due </label>
                    <input type="date" name="testTagNextDue" id="testTagDue" class="form-control form-control-sm" value ="<?php echo $row[0]['testTagNextDue']; ?>">
                </div>
						 
            </div>  						 
								 
            
            <div class="form-group form-row">
               	<div class="col-3">
                <label for= "datePurchased" >Aquired Date  </label>
								
							<input type="date" name="datePurchased" id="datePurchased" class="form-control form-control-sm" value="<?php echo $row[0]['datePurchased']; ?>"  >
							</div>
              
              
                <div class="form-group col"> 
									<label for warrantyEnd>Warranty End Date  </label>
                  <input type="date" name="warrantyEnd" id="warrantyEnd" class="form-control form-control-sm" value="<?php echo $row[0]['warrantyEnd']; ?>" placeholder="Warranty" required >
								</div>
            
						    <div class="form-group col">
                  <label>Budgeted Life End Date </label>
                  <input type="date" name="budgetEnd" id="budgetEnd" class="form-control form-control-sm" value="<?php echo $row[0]['budgetEnd']; ?>" placeholder="Lifespan" required >
						    </div>
              
                <div class="form-group col">
                    <label for = "aquiredCondition">Condition </label>
                  		<select class="form-control form-control-sm" name="aquiredCondition" id="aquiredCondition" <?php echo $row[0]['aquiredCondition']; ?>>
													<option value="New">New</option>
													<option value="Good">Good</option>
													<option value="Poor">Poor</option>
													<option value="Needs Repair">Needs Repair</option>
											</select>
							    </div>
              </div>
            
            
            
            <div class="form-group form-row">
                <div class="col-3"> 
                  <label>Supplier  </label>
                  <input type="text" name="supplier" id="supplier" class="form-control form-control-sm" value="<?php echo $row[0]['supplier']; ?>" placeholder="supplier"  >
              </div>
            
              <div class="form-group col">
                    <label>Purchase Order Number </label>
                    <input type="text" name="poNumber" id="poNumber" class="form-control form-control-sm" value="<?php echo $row[0]['poNumber']; ?>" placeholder="Purchase Order Number"  >
                </div>
              

						    <div class="form-group col">
                  <label>Delivery Note  </label>
                  <input type="text" name="deliveryNote" id="deliveryNote" class="form-control form-control-sm" value="<?php echo $row[0]['deliveryNote']; ?>" placeholder="Delivery Note"  >
						    </div>
              
                
              </div>
            
             <div class="form-group form-row">
                <div class="col-3"> 
                  <label>Invoice Number </label>
                  <input type="text" name="invoiceNo" id="invoiceNo" class="form-control form-control-sm" value="<?php echo $row[0]['invoiceNo']; ?>" placeholder="Supplier Invoice"  >
              </div>
            
						    <div class="form-group col">
                  <label>Invoice Reference  </label>
                  <input type="text" name="invoiceReference" id="invoiceReference" class="form-control form-control-sm" value="<?php echo $row[0]['invoiceReference']; ?>" placeholder="Invoice Reference"  >
						    </div>
              
                <div class="form-group col">
                    <label>Invoice Date </label>
                    <input type="date" name="invoiceDate" id="invoiceDate" class="form-control form-control-sm" value="<?php echo $row[0]['invoiceDate']; ?>" placeholder="Invoice Date"  >
                </div>



                <div class="form-group col">
                  <label>Cost Ex GST  </label>
                  <input type="text" name="costExGST" id="costExGST" class="form-control form-control-sm" value="<?php echo $row[0]['costExGST']; ?>" placeholder="Cost Ex GST"  >
              </div>
            
						    
              
                <div class="form-group col">
                    <label>Current Value </label>
                    <input type="text" name="value" id="value" class="form-control form-control-sm" value="<?php echo $row[0]['value']; ?>" placeholder="Value"  >
                </div>
                </div>  
            
        
            
				
				
			  <div class="form-group form-row">
                <div class="col-3"> 
           
							<label>Item Status </label>
	
									<select class="form-control form-control-sm" name="writtenOff" id="WrittenOff" value = value="<?php echo $row[0]['writtenOff'];?>"</selec>>
										<option value="Allocated">Allocated to a Site</option>		
										<option value="Unallocated">Unallocated - Held in Inventory</option>
											
									<option value="Written Off">Written Off</option>
									</select>	
									
						</div>
				
				      <div class="form-group">
							<label>Upload Documentation (Not setup as yet)</label>
							<input type="text" name="file_name" id="file_name" class="form-control" >
						</div>
			</div>
				 		<div class="form-group" >
                <label>Item Notes</label>
                <input  class="form-control" id="itemNotes" name="itemNotes"  rows="3" value="<?php echo $row[0]['itemNotes']; ?>"></input>
             </div>
            
		
            
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update Asset</button>
						</div>
			
			
			
					</form>
				</div>
			</div>
		</div>
</div>














    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
</body>
</html>