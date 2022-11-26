<?php 
include_once('../include/config.php');

include "../include/header.php" ;
include "../include/navigation.php"; 



?>

<script>
        var hideCol1 = function () {
            var e = document.getElementsByClassName("col1");
            for (var i = 0; i < e.length; i++) {
                e[i].style.display = "none";
            }
        };

        var hideCol2 = function () {
            var e = document.getElementsByClassName("col2");
            for (var i = 0; i < e.length; i++) {
                e[i].style.display = "none";
            }
        };

        var hideBoth = function () {
            hideCol1();
            hideCol2();
        };

        var showAll = function () {
            var e = document.getElementsByClassName("col1");
            for (var i = 0; i < e.length; i++) {
                e[i].style.display = "table-cell";
            };
            e = document.getElementsByClassName("col2");
            for (var i = 0; i < e.length; i++) {
                e[i].style.display = "table-cell";
            };
        };

        (function () {
            document.getElementById("hideCol1").addEventListener("click", hideCol1);
            document.getElementById("hideCol2").addEventListener("click", hideCol2);
            document.getElementById("hideBoth").addEventListener("click", hideBoth);
            document.getElementById("showAll").addEventListener("click", showAll);
        })();

    </script>




	<?php
		$condition	=	'';
		if(isset($_REQUEST['siteLocation']) and $_REQUEST['siteLocation']!=""){
			$condition	.=	' AND siteLocation LIKE "%'.$_REQUEST['siteLocation'].'%" ';
		}
		if(isset($_REQUEST['equipmentType']) and $_REQUEST['equipmentType']!=""){
			$condition	.=	' AND equipmentType LIKE "%'.$_REQUEST['equipmentType'].'%" ';
		}
		if(isset($_REQUEST['serialNo']) and $_REQUEST['serialNo']!=""){
			$condition	.=	' AND serialNo LIKE "%'.$_REQUEST['serialNo'].'%" ';
		}
		if(isset($_REQUEST['brand']) and $_REQUEST['brand']!=""){
			$condition	.=	' AND brand LIKE "%'.$_REQUEST['brand'].'%" ';
		}
if(isset($_REQUEST['model']) and $_REQUEST['model']!=""){
			$condition	.=	' AND model LIKE "%'.$_REQUEST['model'].'%" ';
		}
if(isset($_REQUEST['equipmentID']) and $_REQUEST['equipmentID']!=""){
			$condition	.=	' AND equipmentID LIKE "%'.$_REQUEST['equipmentID'].'%" ';
		}

		//Main queries
		$pages->default_ipp	=	10;
		$sql 	= $db->getRecFrmQry("SELECT * FROM assetdata WHERE 1 ".$condition."");
		$pages->items_total	=	count($sql);
		$pages->mid_range	=	9;
		$pages->paginate(); 
		 
		$userData	=   $db->getRecFrmQry("SELECT * FROM assetdata WHERE 1 ".$condition." ORDER BY id DESC ".$pages->limit."");
	
	?>

   	<div class="container">

		<h1>Browse IT Phones</h1>

		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse IT Phones</strong> <a href="add-it.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Asset</a>
      
                        <button type="button"
                  onclick="document.getElementById('demo').innerHTML = Date()">
                  Date and Time.</button>
<p id="demo">
  </p>

     
      
      
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
                     <label>Brand</label>
                     <input type="text" name="brand" id="brand" class="form-control" value="<?php echo isset($_REQUEST['brand'])?$_REQUEST['brand']:''?>" placeholder="Brand">
								  </div>
							</div>
              
              <div class="col-sm-2">
                  <div class="form-group">
                     <label>Model</label>
                     <input type="text" name="model" id="model" class="form-control" value="<?php echo isset($_REQUEST['model'])?$_REQUEST['model']:''?>" placeholder="Model">
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
                     <input type="text" name="equipmentID" id="equipmentID" class="form-control" value="<?php echo isset($_REQUEST['equipmentID'])?$_REQUEST['equipmentID']:''?>" placeholder="EquipmentID">
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
						<th>Asset</th>
						<th>Division</th>
						<th>Site</th>
            	<th>Brand</th>
            	<th>Model</th>
            	<th>Serial NO</th>
            	<th>Equipment ID</th>
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
						<td><?php echo $val['division'];?></td>
						<td><?php echo $val['site'];?></td>
            <td><?php echo $val['brand'];?></td>
            <td><?php echo $val['modelNO'];?></td>
            <td><?php echo $val['serial'];?></td>
            <td><?php echo $val['equipmentID'];?></td>
            
						<td align="left">
							<a href="edit-it.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a>| 
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