<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login/login.php");
    exit;
}

$_SESSION['condition'] = "";
$_SESSION['typeasset'] = "";
$_SESSION['searchfield'] = "";
$_SESSION['parent'] = "browse-tools.php";

require_once("../includes/init.php");
require_once(INCLUDES_PATH . DS . "config.php");
require_once(INCLUDES_PATH . DS . 'header.php');
require_once(INCLUDES_PATH . DS . "navigation.php");



?>
<style>
/* unvisited link */
a:link {
  color: grey;
}

/* visited link */
a:visited {
  color: grey;
}

/* mouse over link */
a:hover {
  color: blue;
  text-decoration:none;
}

/* selected link */
a:active {
  color: grey;
}
</style>

	<?php
		$condition	=	'';
    if(isset($_REQUEST['assetNo']) and $_REQUEST['assetNo']!=""){
			$condition	.=	' AND assetNo LIKE "%'.$_REQUEST['assetNo'].'%" ';
		}
    if(isset($_REQUEST['division']) and $_REQUEST['division']!=""){
			$condition	.=	' AND division LIKE "%'.$_REQUEST['division'].'%" ';
		}
    if(isset($_REQUEST['site']) and $_REQUEST['site']!=""){
			$condition	.=	' AND site LIKE "%'.$_REQUEST['site'].'%" ';
		}
    if(isset($_REQUEST['assignedTo']) and $_REQUEST['assignedTo']!=""){
			$condition	.=	' AND assignedTo LIKE "%'.$_REQUEST['assignedTo'].'%" ';
		}
		if(isset($_REQUEST['brand']) and $_REQUEST['brand']!=""){
			$condition	.=	' AND brand LIKE "%'.$_REQUEST['brand'].'%" ';
		}
		if(isset($_REQUEST['modelNo']) and $_REQUEST['modelNo']!=""){
			$condition	.=	' AND modelNo LIKE "%'.$_REQUEST['modelNo'].'%" ';
		}
		if(isset($_REQUEST['equipmentType']) and $_REQUEST['equipmentType']!=""){
			$condition	.=	' AND equipmentType LIKE "%'.$_REQUEST['equipmentType'].'%" ';
		}
		if(isset($_REQUEST['serialNo']) and $_REQUEST['serialNo']!=""){
			$condition	.=	' AND serialNo LIKE "%'.$_REQUEST['serialNo'].'%" ';
		}
		if(isset($_REQUEST['equipmentID']) and $_REQUEST['equipmentID']!=""){
			$condition	.=	' AND equipmentID LIKE "%'.$_REQUEST['equipmentID'].'%" ';
		}
    if(isset($_REQUEST['mobileNumber']) and $_REQUEST['mobileNumber']!=""){
			$condition	.=	' AND mobileNumber LIKE "%'.$_REQUEST['mobileNumber'].'%" ';
		}
    if(isset($_REQUEST['simCard']) and $_REQUEST['simCard']!=""){
			$condition	.=	' AND simCard LIKE "%'.$_REQUEST['simCard'].'%" ';
		}
    if(isset($_REQUEST['client']) and $_REQUEST['client']!=""){
			$condition	.=	' AND client LIKE "%'.$_REQUEST['client'].'%" ';
		}
    if(isset($_REQUEST['costcode']) and $_REQUEST['costcode']!=""){
			$condition	.=	' AND costcode LIKE "%'.$_REQUEST['costcode'].'%" ';
		}


		//Main queries
		$pages->default_ipp	=	10;
		$sql 	= $db->getRecFrmQry("SELECT * FROM assetdata WHERE 1 ".$condition." AND assetType LIKE 'Small%' ");
		$pages->items_total	=	count($sql);
		$pages->mid_range	=	9;
		$pages->paginate(); 
		 
		$userData	=   $db->getRecFrmQry("SELECT * FROM assetdata WHERE 1 ".$condition." AND assetType LIKE 'Small%' ORDER BY id DESC ".$pages->limit."");


    $_SESSION['condition'] = $condition;
    $typeasset = "'Small Tools%'";
    $_SESSION['typeasset'] = $typeasset;
    $searchfield = "equipmentType LIKE '%' ";
    $_SESSION['searchfield'] = $searchfield;
	?>

   	<div class="container-fluid pt-3">

		<p class = "navleft">  <i class="fas fa-home">  </i> <a href="../main.php">Home </a> > <a href="../assets/asset-page.php">Asset Register Main </a>> Small Tools and Equipment Assets </p>

		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse Tools and Equipment</strong>
                <a href="../includes/print.php" target="_blank" class="float-sm-right btn btn-light btn-sm btn-space"><i class="fa fa-print"></i> Print Selection</a>
                <a href="../includes/exportexcel.php" target="_blank" class="float-sm-right btn btn-light btn-sm btn-space"><i class="fa fa-print"></i> Export to Excel </a>
                <a href="add-tools.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Asset</a></div>




			<div class="card-body">

				<?php

				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){

					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';

				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){

					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record updated successfully!</div>';

				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){

					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';

				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

				}

				?>

				<div class="col-sm-12">

					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find Asset</h5>

					<form method="get">

						<div class="row">

							<div class="col-sm-2">

								<div class="form-group">

									<label>Asset No</label>

									<input type="text" name="assetNo" id="assetNo" class="form-control" value="<?php echo isset($_REQUEST['assetNo'])?$_REQUEST['assetNo']:''?>" placeholder="Asset">

								</div>

							</div>

							<div class="col-sm-2">

								<div class="form-group">

									<label>Division</label>

									<input type="text" name="division" id="division" class="form-control" value="<?php echo isset($_REQUEST['division'])?$_REQUEST['division']:''?>" placeholder="Division">

								</div>

							</div>

							<div class="col-sm-2">
                  <div class="form-group">
                     <label>Site</label>
                     <input type="text" name="site" id="site" class="form-control" value="<?php echo isset($_REQUEST['site'])?$_REQUEST['site']:''?>" placeholder="Site">
								  </div>
							</div>
              
              <div class="col-sm-2">
                  <div class="form-group">
                     <label>Assigned To</label>
                     <input type="text" name="assignedTo" id="assignedTo" class="form-control" value="<?php echo isset($_REQUEST['assignedTo'])?$_REQUEST['assignedTo']:''?>" placeholder="Assigned To">
								  </div>
							</div>
              
              <div class="col-sm-2">
                  <div class="form-group">
                     <label>Brand</label>
                     <input type="text" name="brand" id="brand" class="form-control" value="<?php echo isset($_REQUEST['brand'])?$_REQUEST['brand']:''?>" placeholder="Brand">
								  </div>
							</div>
              
              <div class="col-sm-2">
                  <div class="form-group">
                     <label>Model</label>
                     <input type="text" name="modelNo" id="modelNo" class="form-control" value="<?php echo isset($_REQUEST['modelNo'])?$_REQUEST['modelNo']:''?>" placeholder="Model">
								  </div>
							</div>
							
              <div class="col-sm-2">
                  <div class="form-group">
                     <label>Type</label>
                     <input type="text" name="equipmentType" id="modelNo" class="form-control" value="<?php echo isset($_REQUEST['equipmentType'])?$_REQUEST['equipmentType']:''?>" placeholder="Equipment Type">
								  </div>
							</div>
							
              <div class="col-sm-2">
                  <div class="form-group">
                     <label>Serial No</label>
                     <input type="text" name="serialNo" id="serialNo" class="form-control" value="<?php echo isset($_REQUEST['serialNo'])?$_REQUEST['serialNo']:''?>" placeholder="Serial No">
								  </div>
							</div>
              
         
              <div class="col-sm-2">
                  <div class="form-group">
                     <label>Equipment ID</label>
                     <input type="text" name="equipmentID" id="equipmentID" class="form-control" value="<?php echo isset($_REQUEST['equipmentID'])?$_REQUEST['ID']:''?>" placeholder="ID">
								  </div>
							</div>
              
         

         
              
         <div class="col-sm-2">
                  <div class="form-group">
                     <label>Client</label>
                     <input type="text" name="client" id="client" class="form-control" value="<?php echo isset($_REQUEST['client'])?$_REQUEST['client']:''?>" placeholder="Client">
								  </div>
							</div>
             
              <div class="col-sm-2">
                  <div class="form-group">
                     <label>Cost Code</label>
                     <input type="text" name="costCode" id="costCode" class="form-control" value="<?php echo isset($_REQUEST['costCode'])?$_REQUEST['costCode']:''?>" placeholder="Cost Code">
								  </div>
							</div>
             
             

							<div class="col-sm-4">

								<div class="form-group">

									<label>&nbsp;</label>

									<div>

										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>

										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Reset</a>

									</div>

								</div>

							</div>

						</div>

					</form>

				</div>

			</div>

		</div>

		<hr>
		
		
		<div class="clearfix"></div>
     
		<div class="row marginTop">
			<div class="col-sm-12 paddingLeft pagerfwt">
				<?php if($pages->items_total > 0) { ?>
					<?php echo $pages->display_pages();?>
					<?php echo $pages->display_items_per_page();?>
					<?php echo $pages->display_jump_menu(); ?>
				<?php }?>
			</div>
			<div class="clearfix"></div>
		</div>
	 
		<div class="clearfix"></div>
		

		<div class="container-fluid">

			<table class="table display table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<th>Sr#</th>
						<th>Asset</th>
            <th>Asset Type</th>
            <th>Client</th>
            <th>Site</th>
						<th>Division</th>
            <th>Assigned To</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Equipment Type</th>
            <th>Serial NO</th>
            <th>Equipment ID</th>
            <th>Condtion</th>
           
            <th>Cost Code.</th>
            
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$s++;
					?>
					<tr style="color: blue; font-size: 12px;">
						<td><?php echo $s;?></td>
						<td><?php echo $val['assetNo'];?></td>
            <td class="text-nowrap"><?php echo $val['assetType'];?></td>
						<td><?php echo $val['client'];?></td>
            <td class="text-nowrap"><?php echo $val['site'];?></td>
            <td><?php echo $val['division'];?></td>
            <td><?php echo $val['assignedTo'];?></td>
            <td><?php echo $val['brand'];?></td>
            <td><?php echo $val['modelNo'];?></td>
            <td><?php echo $val['equipmentType'];?></td>
            <td><?php echo $val['serialNo'];?></td>
            <td><?php echo $val['equipmentID'];?></td>
            <td><?php echo $val['aquiredCondition'];?></td>
            
            <td><?php echo $val['costCode'];?></td>
            
						<td align="center" style="white-space:nowrap" >
							<a href="edit-tools.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a>| 
							<a href="delete.php?delId=<?php echo $val['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
						</td>

					</tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="5" align="center">No Record(s) Found!</td></tr>
					<?php } ?>
				</tbody>
			</table>
		</div> <!--/.col-sm-12-->
		
		<div class="clearfix"></div>
     
		<div class="row marginTop">
			<div class="col-sm-12 paddingLeft pagerfwt">
				<?php if($pages->items_total > 0) { ?>
					<?php echo $pages->display_pages();?>
					<?php echo $pages->display_items_per_page();?>
					<?php echo $pages->display_jump_menu(); ?>
				<?php }?>
			</div>
			<div class="clearfix"></div>
		</div>
	 
		<div class="clearfix"></div>
		
	</div>
	
	
	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    
    

</body>

</html>