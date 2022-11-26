<?php 

include_once('../include/config.php');

include "../include/header.php" ;
include "../include/navigation.php"; 
?>

	

	<?php
		$condition	=	'';
		if(isset($_REQUEST['clientname']) and $_REQUEST['clientname']!=""){
			$condition	.=	' AND clientname LIKE "%'.$_REQUEST['clientname'].'%" ';
		}
		if(isset($_REQUEST['contact']) and $_REQUEST['contact']!=""){
			$condition	.=	' AND contact LIKE "%'.$_REQUEST['contact'].'%" ';
		}
		if(isset($_REQUEST['clientemail']) and $_REQUEST['clientemail']!=""){
			$condition	.=	' AND clientemail LIKE "%'.$_REQUEST['clientemail'].'%" ';
		}
		
		//Main queries
		$pages->default_ipp	=	10;
		$sql 	= $db->getRecFrmQry("SELECT * FROM client WHERE 1 ".$condition."");
		$pages->items_total	=	count($sql);
		$pages->mid_range	=	9;
		$pages->paginate(); 
		 
		$userData	=   $db->getRecFrmQry("SELECT * FROM client WHERE 1 ".$condition." ORDER BY id DESC ".$pages->limit."");
	
	?>

   	<div class="container">

		<h1>Browse Clients</h1>

		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse Client</strong> <a href="add-client.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Users</a></div>

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

					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find Client</h5>

					<form method="get">

						<div class="row">

							<div class="col-sm-2">

								<div class="form-group">

									<label>Client Name</label>

									<input type="text" name="clientname" id="clientname" class="form-control" value="<?php echo isset($_REQUEST['clientname'])?$_REQUEST['clientname']:''?>" placeholder="Enter client name">

								</div>

							</div>

							<div class="col-sm-2">

								<div class="form-group">

									<label>User Contact</label>

									<input type="text" name="contact" id="contact" class="form-control" value="<?php echo isset($_REQUEST['contact'])?$_REQUEST['contact']:''?>" placeholder="Enter contact">

								</div>

							</div>

							<div class="col-sm-2">

								<div class="form-group">

									<label>Contact Email</label>

									<input type="email" name="clientemail" id="clintemail" class="form-control" value="<?php echo isset($_REQUEST['clientemail'])?$_REQUEST['clientemail']:''?>" placeholder="Enter Email">
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
						<th>User Name</th>
						<th>User Email</th>
						<th>User Phone</th>
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
						<td><?php echo $val['clientname'];?></td>
						<td><?php echo $val['contact'];?></td>
						<td><?php echo $val['clientemail'];?></td>
						<td align="center">
							<a href="edit-client.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
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