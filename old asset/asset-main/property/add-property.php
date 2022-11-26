<?php
session_start();


if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}


include_once('../includes/config.php');
include "../includes/header.php" ;
include "../includes/navigation.php";

header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Pragma: no-cache"); // HTTP/1.0
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");




if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($assetNo==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	
	
	}else{
		
		
		if (empty($_POST["repairsMaintenanceDate"])) {
        $repairsMaintenanceDate = NULL ;
    } 
		
		if (empty($_POST["regoExpiryDate"])) {
        $testTagDate = NULL ;
    } 
		
		
		
		$userCount	=	$db->getQueryCount('assetdata','id');
		if($userCount[0]['total']<40000){
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

                'warrantyEnd'=>$warrantyEnd,
                'budgetEnd'=>$budgetEnd,
                'aquiredCondition'=>$aquiredCondition,
                'datePurchased'=>$datePurchased,
////
                'costCode'=>$costCode,
                'supplier'=>$supplier,
                'poNumber'=>$poNumber,
                'deliveryNote'=>$deliveryNote,
                'invoiceNo'=>$invoiceNo,
                'invoiceReference'=>$invoiceReference,
                'invoiceDate'=>$invoiceDate,
                'costExGST'=>$costExGST,
                'value'=>$value,

                'itemCondition'=>$itemCondition,
                'repairsMaintenanceDate'=>$repairsMaintenanceDate,
                'maintfrequency'=>$maintFrequency,
                'repairsMaintenanceDetails'=>$repairsMaintenanceDetails,
                'repairer'=>$repairer,
                'repairResult'=>$repairResult,
                'itemNotes'=>$itemNotes,
                'file_name'=>$file_name,
                'writtenOff'=>$writtenOff,
					);
  
      
      
			$insert	=	$db->insert('assetdata',$data);
			if($insert){
				header('location:browse-property.php?msg=ras');
				exit;
			}else{
				header('location:browse-property.php?msg=rna');
				exit;
			}
		}else{
			header('location:'.$_SERVER['PHP_SELF'].'?msg=dsd');
			exit;
		}
	}
}
?>




	

   	<div class="container-fluid">

		<h1>Add New Property</h1>

		<?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Asset Number is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="dsd"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Please delete a user and then try again <strong>We set limit for security reasons!</strong></div>';

		}

		?>

		<div class="card" style = "width:100%;">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add New Property</strong> <a href="browse-property.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> View Land and Buildings </a></div>

			<div class="card-body">

				

				<div class="col-sm-12" >

					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>

					<form method="post">

						
						 
							
					
						
				
				<div class="form-group form-row ">
					
								 <div class="form-group col-1">

									<input type="hidden" name="assetType" id="assetType" class="form-control form-control-sm" value = "Land and Buildings">
														
               	</div>  
						

                    <?php
				        $query = "SELECT assetNo FROM assetdata ORDER BY ID DESC LIMIT 1";
                        $result = $mysqli->query($query);
                        while ($row = $result->fetch_assoc()) {
//                            echo "Last asset number Used " . $row[assetNo];
                            $newasset = $row[assetNo] + 1;
                            $passet = $row[assetNo];
                        }
                    ?>

					
					 			
				</div>	
						
					<div class="form-group form-row ">
							
                
              <div class="form-group col-2">
						 			<label> Asset Numbers <?php echo "(Last no. used " . $passet .")";?></label>
                  <input type="text" name="assetNo" id="assetNo" class="form-control form-control-sm" value ="<?php echo $newasset ;?>" >
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
						
           		 <div class="form-group col"> 
                  
									<label>Sites Name </label>
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
				 </div> 
							 
						 <div class="form-group form-row ">
						
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
							 
							 	<div class="col-3"> 
                  <label>Assigned To  </label>
                  <input type="text" name="assignedTo" id="assignedTo" class="form-control form-control-sm"  placeholder="Assigned To"  >
                 
                </div>
	
                
                <div class="form-group col">
                   <label>Address </label>
                  <input type="text" name="position" id="position" class="form-control form-control-sm"  placeholder="Address"  >
                </div>
							 
            
									<div class="form-group col">
									<?php
												$sql = "SELECT type FROM property";
												$stmt = $pdo->prepare($sql);
												$stmt->execute();
												$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
												if ($stmt->rowCount() > 0) {
										 ?>
												<select name="equipmentType" id="equipmentType" class="form-control form-control-sm">
														<option value =  "<?php  echo $row[0]['equipmentType'];?>"><?php  echo $row[0]['equipmentType'];?></option>
														<?php foreach ($results as $itequiprow) { ?>
														<option value="<?php echo $itequiprow['type']; ?>"><?php echo $itequiprow['type'];?></option>
														<?php } ?>
												</select>
													<?php
															} 
													?>
             			 </div>
									
				</div>
           
            
		
						
						 <div class="form-group form-row">
               	
							 <div class="col-3">
                  <label >Acquired Date  </label>
								
							<input type="date" name="datePurchased" id="datePurchased" class="form-control form-control-sm"  value="<?php echo date('Y-m-d');?>" >
									
							</div>
							 
				 
            
						    <div class="form-group col">
                  <label>End of Lease </label>
                  <input type="date" name="budgetEnd" id="budgetEnd" class="form-control form-control-sm"  value="<?php $effectiveDate = strtotime("+36 months", strtotime(date("y-m-d")));
echo $time = date("Y-m-d", $effectiveDate);?>"  >
						    </div>
              
							 
							 
                <div class="form-group col">
                    <label for = "aquiredCondition">Status </label>
                  		<select class="form-control form-control-sm" name="aquiredCondition" id="aquiredCondition" >
													<option value="Leased">Leased</option>
													<option value="Rented">Rented</option>
													<option value="Purchased">Purchased</option>
													<option value="Leased Out">Leased Out</option>
											</select>
							    </div>
              </div>
          
					
						
						
      
		
								 
								 
			 				<div class="form-group form-row">
					
				
                <div class="form-group col"> 
                  <label>Agent  </label>
                  <input type="text" name="supplier" id="supplier" class="form-control form-control-sm" placeholder="supplier"  >
              	</div>
						 
					
						
            
              	<div class="form-group col">
                    <label>Document ID </label>
                    <input type="text" name="poNumber" id="poNumber" class="form-control form-control-sm" placeholder="Document ID"  >
                </div>
              

						    <div class="form-group col">
                  <label>Delivery Note  </label>
                  <input type="text" name="deliveryNote" id="deliveryNote" class="form-control form-control-sm"  placeholder=""  >
						    </div>
              
                <div class="form-group col"> 
                  <label>Invoice Number </label>
                  <input type="text" name="invoiceNo" id="invoiceNo" class="form-control form-control-sm" placeholder="Supplier Invoice"  >
              </div>
								
						</div>
					
					
						<div class="form-group form-row">
						    <div class="form-group col">
                  <label>Invoice Reference  </label>
                  <input type="text" name="invoiceReference" id="invoiceReference" class="form-control form-control-sm"  placeholder="Invoice Reference"  >
						    </div>
              
                <div class="form-group col">
                    <label>Invoice Date </label>
                    <input type="text" name="invoiceDate" id="invoiceDate" class="form-control form-control-sm"  placeholder="Invoice Date"  >
                </div>
               
            
              
                <div class="form-group col"> 
                  <label>Cost Ex GST  </label>
                  <input type="number" name="costExGST" id="costExGST" class="form-control form-control-sm"  step="any" value = "0.00" placeholder ="0.00">
              </div>
            
						    
              
                <div class="form-group col">
                    <label>Current Value </label>
                    <input type="text" name="value" id="value" class="form-control form-control-sm"  placeholder="Value"  >
                </div>
              </div>  
            
          
         
             
					
					
					
              <div class="form-group" >
                <label>Item Notes</label>
                <input  class="form-control" id="itemNotes" name="itemNotes"  rows="3" ></input>
              </div>
          
         <div class="form-group form-row">
                <div class="col-4"> 
           
							<label>Item Status </label>
<!-- 							<input type="text" name="writtenOff" id="writtenOff" class="form-control" placeholder="Allocated"  > -->
									<select class="form-control form-control-sm" name="writtenOff" id="WrittenOff" value = "Allocated">
										<option value="Leased">Allocated to a Site</option>		
										<option value="Purchased">Unallocated - Held in Inventory</option>
										<option value="Rented">Written Off</option>
										<option value="Disposed">Desposed of</option>
								</select>
						
									
									
						</div>
				      <div class="form-group">
							<label>Upload Documentation (Not setup as yet)</label>
							<input type="file" name="photo" id="photo" class="form-control" >
						</div>
            
					</div> 
            
            
						<div class="form-group">
							
							<button type="submit"  name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Save New Asset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="./../include/js/hide-show-fields-form.js"></script>

   

    

</body>

</html>