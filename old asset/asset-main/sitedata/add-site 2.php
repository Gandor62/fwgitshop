<?php include_once('../include/config.php');
include "../include/header.php" ;
include "../include/navigation.php"; 





if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
  
	if($client==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}elseif($site==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');
		exit;
	}elseif($city==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=rna');
		exit;
    
    }elseif($state==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=us');
		exit;
    
    }elseif($department==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ud');
		exit;
    
    }elseif($costcentre==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ucc');
		exit;
    
     }elseif($active==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ua');
		exit;
    
	}else{
		
		$userCount	=	$db->getQueryCount('site','id');
		if($userCount[0]['total']<2000){
			$data	=	array(
        
				'client'=>$client,
              	'site'=>$site,
              	'city'=>$city,
              	'state'=>$state,
              	'department'=>$department,
              	'costcentre'=>$costcentre,
              	'active'=>$active,
        
						);
			$insert	=	$db->insert('site',$data);
			if($insert){
				header('location:browse-site.php?msg=ras');
				exit;
			}else{
				header('location:browse-site.php?msg=rna');
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

		<h1>Add New Site</h1>

		<?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Client name is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Missing data Trty again!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> City name is mandatory field!</div>';
      
      }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="us"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> State is mandatory field!</div>';
      
       }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ud"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Department is mandatory field!</div>';
      
       }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="uc"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Costcentre is mandatory field!</div>';
      
       }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ucc"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Costcenter is mandatory field!</div>';
      

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="dsd"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Please delete a user and then try again <strong>We set limit for security reasons!</strong></div>';

		}

		?>

		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add Site Data</strong> <a href="browse-site.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Sites</a></div>

			<div class="card-body">

				

				<div class="col-sm-6">

					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>

					<form method="post">

<!-- 						<div class="form-group"> -->
              
              
              <div class="form-group">
                
               
			  <label>Site Name <span class="text-danger">*</span></label>
							<input type="text" name="site" id="site" class="form-control"  placeholder="Site Name" required>
			  </div>
							
							<div class="form-group">		
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
						
	
						
						
            
						
						
						
            
            <div class="form-group">
							<label>City <span class="text-danger"></span></label>
							<input type="text" name="city" id="city" class="form-control"  placeholder="City name">
						</div>
              
              
						<div class="form-group">
							
						
						
							<label for = "state">State</label>
                  		<select class="form-control form-control-sm" name="state" id="state" >
						  <option value="QLD">QLD</option>
													<option value="QLD">QLD</option>
													<option value="ACT">ACT</option>
													<option value="NSW">NSW</option>
													<option value="NT">NT</option>
													<option value="QLD">QLD</option>
													<option value="SA">SA</option>
													<option value="VIC">VIC</option>
													<option value="WA">WA</option>
													
											</select>
						
						
						
						
						
						</div>
						
							
             <div class="form-group">
							
						
							<label>Division/Department</label>
                 <?php
                    $sql = "SELECT department FROM department";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($stmt->rowCount() > 0) {
                 ?>
										<select name="departmen" id="departmen" class="form-control form-control-sm">
												<option value =  "<?php  echo $row[0]['departmen'];?>"><?php  echo $row[0]['department'];?></option>
												<?php foreach ($results as $departmentrow) { ?>
												<option value="<?php echo $departmentrow['department']; ?>"><?php echo $departmentrow['department'];?></option>
												<?php } ?>
										</select>
										<?php
												} 
										?>
						
						
						
						
						
						
						
						
						
						
						</div>








            
						<div class="form-group">
							<!-- <label>Costcenter <span class="text-danger">*</span></label>
							<input type="text" name="costcentre" id="costcentre" class="form-control" placeholder="Costcenter" required>
						 -->
						
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
						
							
            <div class="form-group">
							
						
							<label for = "active">Site Active </label>
                  		<select class="form-control form-control-sm" name="active" id="active" <?php echo $row[0]['active']; ?>>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
													
											</select>
						
						
						
						
						
						</div>
						
							

							

						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add Site Data</button>

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
	
    

</body>

</html>