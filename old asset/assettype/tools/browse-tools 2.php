<?php 

include_once("../../include/config.php");

include "../../include/header.php" ;
include "../../include/navigation.php"; 





	

		$condition	=	'';
		if(isset($_REQUEST['tools']) and $_REQUEST['type']!=""){
			$condition	.=	' AND type LIKE "%'.$_REQUEST['type'].'%" ';
		}
	
		
		//Main queries
		$pages->default_ipp	=	10;
		$sql 	= $db->getRecFrmQry("SELECT * FROM tools WHERE 1 ".$condition."");
		$pages->items_total	=	count($sql);
		$pages->mid_range	=	9;
		$pages->paginate(); 
		 
		$userData	=   $db->getRecFrmQry("SELECT * FROM tools WHERE 1 ".$condition." ORDER BY id DESC".$pages->limit."");
	
	?>
<link rel="stylesheet" type="text/css" href="../../include/css/styles2.css">
   	<div class="container">

		
<p class = "navleft"> <a href="./../main.php">Home </a>><a href="../../assets/sysset.php"> System Settings  </a> ><a href="../equip-breakdown.php"> Asset Type Breakdown  </a></p> 
		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse Small Tools and Equipment</strong> <a href="add-tools.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Small Tools and Equipment Types</a></div>

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

					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find Small Tools and Equipment Type</h5>

					<form method="get">

						<div class="row">

							<div class="col-sm-2">

								<div class="form-group">

									<label>Type Name</label>

									<input type="text" name="type" id="type" class="form-control" value="<?php echo isset($_REQUEST['type'])?$_REQUEST['type']:''?>" placeholder="type">

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

			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<th>Sr#</th>
						<th>Small Tools and Equipment Type</th>
					
						
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
					<tr>
						<td><?php echo $s;?></td>
						<td><?php echo $val['type'];?></td>
					  
					
						<td align="center">
							<a href="edit-tools.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
							<a href="delete-tools.php?delId=<?php echo $val['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this Type?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
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
	
	
	

    

</body>

</html>