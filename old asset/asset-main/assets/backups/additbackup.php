<?php 
include_once('../include/config.php');
include "../include/header.php" ;
include "../include/navigation.php"; 








if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($client==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}elseif($division==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');
		exit;
	
	}else{
		
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
//           'equipmentCategory'=>$equipmentCategory,  (Not used)
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
          'photo'=>$photo,   
          'writtenOff'=>$writtenOff,
					);
  
      
      
			$insert	=	$db->insert('assetdata',$data);
			if($insert){
				header('location:browse-it.php?msg=ras');
				exit;
			}else{
				header('location:browse-it.php?msg=rna');
				exit;
			}
		}else{
			header('location:'.$_SERVER['PHP_SELF'].'?msg=dsd');
			exit;
		}
	}
}
?>




	

   	<div class="container">

		<h1>Add New IT Equipment</h1>

		<?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';

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

		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add New IT</strong> <a href="browse-it.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse IT</a></div>

			<div class="card-body">

				

				<div class="col-sm-6">

					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>

					<form method="post">

						<div class="form-group form-row ">
              <div class="col-3"> 
                <label>Asset Number</label>
								
                <input type="text" name="assetNo" id="assetNo" class="form-control form-control-sm" placeholder="Enter Asset Number" >
						  </div>
            
							
							
              <div class="form-group col">
							  <label>Asset Type  </label>
							  <input type="text" name="assetCategory" id="assetCategory" class="form-control form-control-sm" placeholder="Enter user name"   >
						  </div>
          
						  <div class="form-group col">
							  <label>Client Name</label>
                 <input type="text" name="client" id="client" class="form-control form-control-sm" placeholder="Enter user name"  >
              </div>   
              
            </div>
   
              
            
            <div class="form-group form-row">
                <div class="col-3"> 
                  <label>Division  </label>
                  <input type="text" name="division" id="division" class="form-control form-control-sm" placeholder="Enter user name"  >
                </div>

                <div class="form-group col">
                  <label>Site Name  </label>
                  <input type="text" name="site" id="site" class="form-control form-control-sm" placeholder="Enter user name"  >
                </div>
              

                <div class="form-group col">
                  <label>Costcenter  </label>
                  <input type="text" name="costCode" id="costCode" class="form-control form-control-sm" placeholder="Enter user name"  >
						    </div>
             </div>
              
            
            
              <div class="form-group form-row">
                <div class="col-3"> 
                  <label>Assigned To  </label>
                  <input type="text" name="assignedTo" id="assignedTo" class="form-control form-control-sm" vplaceholder="Enter user name"   >
                 
                </div>
	
                
                <div class="form-group col">
                   <label>Position  </label>
                  <input type="text" name="position" id="position" class="form-control form-control-sm" placeholder="Enter user name"  >
                </div>
						   
            
	
                <div class="form-group col">
                  <label>Equipment Category  </label>
                  <input type="text" name="equipmentCategory" id="equipmentCategory" class="form-control form-control-sm" placeholder="Enter user name"   >
						    </div>
            
						    <div class="form-group col">
                  <label>Equipment Type  </label>
                  <input type="text" name="equipmentType" id="equipmentType" class="form-control form-control-sm" placeholder="Enter user name"  >
						    </div>
              </div>
            
            
            <div class="form-group form-row">
                <div class="col-3"> 
                  <label>Brand  </label>
                  <input type="text" name="brand" id="brand" class="form-control form-control-sm" placeholder="Enter user name"  >
                </div>
	
                <div class="form-group col">
                  <label>Model Number  </label>
                  <input type="text" name="modelNo" id="modelNo" class="form-control form-control-sm" placeholder="Enter user name"  >
						    </div>
            
						    <div class="form-group col">
                  <label>Serial No.  </label>
                  <input type="text" name="serialNo" id="serialNo" class="form-control form-control-sm" placeholder="Enter user name"  >
						    </div>
              
                <div class="form-group col">
                  <label>Equipment ID  </label>
                  <input type="text" name="equipmentID" id="equipmentID" class="form-control form-control-sm" placeholder="Enter user name"   >
						    </div>
          
              </div>
            
            
               <div class="form-group form-row">
                <div class="col-3"> 
                  <label>SimCard  </label>
                  <input type="text" name="simCard" id="simCard" class="form-control form-control-sm" placeholder="Enter user name"  >
                </div>
	
                <div class="form-group col">
                  <label>IMEI  </label>
                  <input type="text" name="imei" id="imei" class="form-control form-control-sm" placeholder="Enter user name" >
						    </div>
            
						    <div class="form-group col">
                  <label>Mobile Number  </label>
                  <input type="text" name="mobileNumber" id="mobileNumber" class="form-control form-control-sm" placeholder="Enter user name"  >
						    </div>
              
                <div class="form-group col">
                  
                  <label>Communications Plan  </label>
                  <input type="text" name="mobilePlan" id="mobilePlan" class="form-control form-control-sm" placeholder="Enter user name"   >
						    </div>
          
              </div>            
            
            <div class="form-group form-row">
               <div class="col-3">
                  <label>Warranty End Date  </label>
                  <input type="text" name="warranty" id="warranty" class="form-control form-control-sm"   >
						    </div>
              
              
                <div class="form-group col"> 
                  <label>Aquired Date  </label>
                  <input type="text" name="year" id="year" class="form-control form-control-sm"  >
              </div>
            
						    <div class="form-group col">
                  <label>Budgeted Life  </label>
                  <input type="text" name="budgetlife" id="budgetlife" class="form-control form-control-sm"  >
						    </div>
              
                <div class="form-group col">
                    <label>Condition </label>
                    <input type="text" name="aquiredCondition" id="aquiredCondition" class="form-control form-control-sm"   >
                </div>
              </div>
            
            
            
            <div class="form-group form-row">
                <div class="col-3"> 
                  <label>Supplier  </label>
                  <input type="text" name="supplier" id="supplier" class="form-control form-control-sm"  >
              </div>
            
              <div class="form-group col">
                    <label>Purchase Order Number </label>
                    <input type="text" name="poNumber" id="poNumber" class="form-control form-control-sm"   >
                </div>
              

						    <div class="form-group col">
                  <label>Delivery Note  </label>
                  <input type="text" name="deliveryNote" id="deliveryNote" class="form-control form-control-sm"   >
						    </div>
              
                
              </div>
            
             <div class="form-group form-row">
                <div class="col-3"> 
                  <label>Invoice Number </label>
                  <input type="text" name="invoiceNo" id="invoiceNo" class="form-control form-control-sm"  >
              </div>
            
						    <div class="form-group col">
                  <label>Invoice Reference  </label>
                  <input type="text" name="invoiceReference" id="invoiceReference" class="form-control form-control-sm"  >
						    </div>
              
                <div class="form-group col">
                    <label>Invoice Date </label>
                    <input type="text" name="invoiceDate" id="invoiceDate" class="form-control form-control-sm"   >
                </div>
               
            
              
                <div class="form-group col"> 
                  <label>Cost Ex GST  </label>
                  <input type="text" name="costExGST" id="costExGST" class="form-control form-control-sm"   >
              </div>
            
						    
              
                <div class="form-group col">
                    <label>Current Value </label>
                    <input type="text" name="value" id="value" class="form-control form-control-sm"   >
                </div>
                </div>  
            
           </div>
            
              <div class="form-group" >
                <label>Item Notes</label>
                <input  class="form-control" id="itemNotes" name="itemNotes"  rows="3" >
              </div>
          
         
            <div class="form-group">
							<label>Is Written Off </label>
							<input type="text" name="writtenOff" id="writtenOff" class="form-control"  >
						</div>
				      <div class="form-group">
							<label>Photo of Item </label>
							<input type="text" name="photo" id="photo" class="form-control"  placeholder="Upload Photo"  >
						</div>
            
            
            
            
						

						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add New IT Equipment</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>

    

	

	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script>
		$(document).ready(function() {
		jQuery(function($){
			  var input = $('[type=tel]')
			  input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
			  input.bind('country.mobilePhoneNumber', function(e, country) {
				$('.country').text(country || '')
			  })
			 });
		});
	</script>

    

</body>

</html>