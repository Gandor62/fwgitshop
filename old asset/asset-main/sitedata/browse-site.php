<?php
ob_start();
session_start();

//Need to add a field dropdown to select ative or not


if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$_SESSION['condition'] = "";
$_SESSION['typeasset'] = "";
$_SESSION['searchfield'] = "";
$_SESSION['parent'] = "browse-site.php";

require_once("../includes/init.php");
require_once(INCLUDES_PATH . DS . "config.php");
require_once(INCLUDES_PATH . DS . 'header.php');
require_once(INCLUDES_PATH . DS . "navigation.php");




		$condition	=	'';
		if(isset($_REQUEST['client']) and $_REQUEST['client']!=""){
			$condition	.=	' AND client LIKE "%'.$_REQUEST['client'].'%" ';
		}
		if(isset($_REQUEST['site']) and $_REQUEST['site']!=""){
			$condition	.=	' AND site LIKE "%'.$_REQUEST['site'].'%" ';
		}
		if(isset($_REQUEST['city']) and $_REQUEST['city']!=""){
			$condition	.=	' AND city LIKE "%'.$_REQUEST['city'].'%" ';
		}
        if(isset($_REQUEST['active']) and $_REQUEST['active']!=""){
            $condition	.=	' AND active LIKE "%'.$_REQUEST['active'].'%" ';
        }
		

		//Main queries
		$pages->default_ipp	=	20;
		$sql 	= $db->getRecFrmQry("SELECT * FROM site WHERE 1 ".$condition."");
		$pages->items_total	=	count($sql);
		$pages->mid_range	=	9;
		$pages->paginate(); 
		 
		$userData	=   $db->getRecFrmQry("SELECT * FROM site WHERE 1 ".$condition." ORDER BY site ASC ".$pages->limit."");


$_SESSION['condition'] = $condition;
$typeasset = "'IT%'";
$_SESSION['typeasset'] = $typeasset;

$searchfield = "(equipmentType LIKE '%computer%' OR equipmentType LIKE '%laptop%' OR equipmentType LIKE '%desktop%' OR equipmentType LIKE 'lap%' OR equipmentType LIKE '%radio%')";

$_SESSION['searchfield'] = $searchfield;


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

        .btn-space {
            margin-right: 10px;
        }
    </style>

   	<div class="container">

			<p class = "navleft"> <a href="./../main.php">Home </a>><a href="../assets/sysset.php"> System Settings  </a> > <a href="../assets/sites.php">Site and Dept Settings </a> > Site Data</p> 
			
		<div class="card">

<!--			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse Site</strong> <a href="add-site.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Site</a></div>-->


<!--            Headline *********************-->
            <div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse Sites</strong>
                <a href="print-sites.php" target="_blank" class="float-sm-right btn btn-light btn-sm btn-space"><i class="fa fa-print"></i> Print Selection</a>
                <a href="exportexcel.php" target="_blank" class="float-sm-right btn btn-light btn-sm btn-space"><i class="fa fa-print"></i> Export to Excel</a>
                <a href="add-site.php" class="float-right btn btn-dark btn-sm btn-space"><i class="fa fa-fw fa-plus-circle"></i> Add Site</a>
            </div>






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

					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find Site</h5>

					<form method="get">

						<div class="row">

							<div class="col-sm-2">

								<div class="form-group">

									<label>Client Name</label>

									<input type="text" name="client" id="client" class="form-control" value="<?php echo isset($_REQUEST['client'])?$_REQUEST['client']:''?>" placeholder="Client name">

								</div>

							</div>

							<div class="col-sm-2">

								<div class="form-group">

									<label>Site Name</label>

									<input type="text" name="site" id="site" class="form-control" value="<?php echo isset($_REQUEST['site'])?$_REQUEST['site']:''?>" placeholder="Site Name">

								</div>

							</div>

							<div class="col-sm-2">

								<div class="form-group">

									<label>City</label>

									<input type="text" name="city" id="city" class="form-control" value="<?php echo isset($_REQUEST['city'])?$_REQUEST['city']:''?>" placeholder="Enter City">
								</div>

							</div>
                            <div class="col-sm-2">

                                <div class="form-group">

                                    <label>Site in Contract</label>

                                    <input type="text" name="active" id="active" class="form-control" value="<?php echo isset($_REQUEST['active'])?$_REQUEST['active']:''?>" placeholder="Site Active">
                                </div>

                            </div>

							<div class="col-sm-4">

								<div class="form-group">

									<label>&nbsp;</label>

									<div>

										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>

										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>

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
		

		<div>

			<table class="table display table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<th>Sr#</th>

						<th>Site</th>
						<th>City</th>
            	        <th>State</th>
            	        <th>Department</th>
                        <th>Client</th>
            	        <th>Costcentre</th>
            	        <th>Active</th>
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

						<td><?php echo $val['site'];?></td>
						<td><?php echo $val['city'];?></td>
                        <td><?php echo $val['state'];?></td>
                        <td><?php echo $val['department'];?></td>
                        <td><?php echo $val['client'];?></td>
                         <td><?php echo $val['costcentre'];?></td>
                        <td><?php echo $val['active'];?></td>
            
						<td align="left">
							<a href="edit-site.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a>| 
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



<?php require_once(INCLUDES_PATH . DS . 'footer.php'); ?>