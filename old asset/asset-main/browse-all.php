<?php
include_once('include/config.php');

include "include/header.php" ;
include "include/navigation.php";



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
green
/* mouse over link */
a:hover {
  color: blue;
  text-decoration:none;
}

/* selected link */
a:active {
  color: grey;
}

/* body {
  padding: 15px;
} */

.table-hideable td,
.table-hideable th {
  width: auto;
  transition: width .5s, margin .5s;
}

.btn-condensed.btn-condensed {
  padding: 0 5px;
  box-shadow: none;
}


/* use class to have a little animation */
.hide-col {
  width: 0px !important;
  height: 0px !important;
  display: block !important;
  overflow: hidden !important;
  margin: 0 !important;
  padding: 0 !important;
  border: none !important;
}


.fa_custom {
	

		
		font-size: 12px;
		border-radius: 50%;
		border: 1px solid light-green;
		padding: 1px;
		background-color: light-green;
		color: black;
}

</style>

	<?php
		$condition	=	'';
    if(isset($_REQUEST['assetNo']) and $_REQUEST['assetNo']!=""){
			$condition	.=	' AND assetNo LIKE "'.$_REQUEST['assetNo'].'" ';
		}
	if(isset($_REQUEST['assetNo1']) and $_REQUEST['assetNo1']!=""){
			$condition	.=	' AND assetNo LIKE "%'.$_REQUEST['assetNo1'].'%" ';
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
		$pages->default_ipp  =   15; //total records show on per page
		$sql    = $db->getRecFrmQry("SELECT * FROM assetdata WHERE 1 ".$condition."");
		$pages->items_total  =   count($sql);
		$pages->mid_range    =   9;
		$pages->paginate(); 
		  
		$userData   =   $db->getRecFrmQry("SELECT * FROM assetdata WHERE 1 ".$condition." ORDER BY id ASC ".$pages->limit."");
	
	?>

   	<div class="container-fluid pt-3">

		<p class = "navleft">  <i class="fas fa-home">  </i> <a href="./../main.php">Home </a> > <a href="../assets/asset-page.php">Asset Register Main </a>> All Assets </p> 

		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse All Assets</strong> <a href="#" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> </a></div>

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

									<label>Asset No (single asset)</label>

									<input type="text" name="assetNo" id="assetNo" class="form-control" value="<?php echo isset($_REQUEST['assetNo'])?$_REQUEST['assetNo']:''?>" placeholder="Asset Number">

								</div>

								
							</div>
							<div class="col-sm-2">
							<div class="form-group">

									<label>Asset No (Partial Number Search)</label>

									<input type="text" name="assetNo1" id="assetNo1" class="form-control" value="<?php echo isset($_REQUEST['assetNo'])?$_REQUEST['assetNo']:''?>" placeholder="Asset number contains">

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
                     <label>Mobile</label>
                     <input type="text" name="mobileNumber" id="mobileNumber" class="form-control" value="<?php echo isset($_REQUEST['mobileNumber'])?$_REQUEST['mobileNumber']:''?>" placeholder="Mobile Number">
								  </div>
							</div>
              
         
              <div class="col-sm-2">
                  <div class="form-group">
                     <label>Sim Card</label>
                     <input type="text" name="simCard" id="simCard" class="form-control" value="<?php echo isset($_REQUEST['simCard'])?$_REQUEST['simCard']:''?>" placeholder="Sim Card Number">
								  </div>
							</div>
							
               <div class="col-sm-2">
                  <div class="form-group">
                     <label>MEID</label>
                     <input type="text" name="meid" id="meid" class="form-control" value="<?php echo isset($_REQUEST['meid'])?$_REQUEST['meid']:''?>" placeholder="Phone Identifier">
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

			<table class="table display table table-condensed table-hover table-bordered table-striped table-hideable">
				<thead>
					<tr class="bg-primary text-white">
						<th>Sr#<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
						<th>Asset <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
						<th>Asset Type <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
						<th>Client <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
						<th>Site <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
						<th>Division <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
						<th>Assigned To <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
						<th>Position <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
						
						<th>Area<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>

						<th>Asset Category<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
						

						<th>Brand <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>


						<th>Model <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
						<th>Equipment Type <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
						<th>Serial No. <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
						<th>Equipment ID <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
						<th>Year<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
						<th>Condition <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
					
						
						<th>Mobile Number <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
						<th>Sim Card No. <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
		
						<th>Cost Code<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>

		<th>Purchase Date<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
		
		<th>Registration<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
		<th>Registration ID <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>

		<th>Test Tag required<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>

		<th>Maintenence required<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>

		<th>Supplier<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>
		<th>Missing<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
          <i class="fa fa-eye-slash fa_custom" ></i>  
        </button></th>




















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
			<td><?php echo $val['position'];?></td>
			<td><?php echo $val['area'];?></td>
			<td><?php echo $val['assetCategory'];?></td>
		
            <td><?php echo $val['brand'];?></td>
            <td><?php echo $val['modelNo'];?></td>
            <td><?php echo $val['equipmentType'];?></td>
            <td><?php echo $val['serialNo'];?></td>
            <td><?php echo $val['equipmentID'];?></td>
			<td><?php echo $val['year'];?></td>
            <td><?php echo $val['aquiredCondition'];?></td>
            <td><?php echo $val['mobileNumber'];?></td>
			<td><?php echo $val['simCard'];?></td>
            <td><?php echo $val['costCode'];?></td>
			<td><?php echo $val['purchaseDate'];?></td>
			<td><?php echo $val['regoRequired'];?></td>
			<td><?php echo $val['regoNumber'];?></td>
			<td><?php echo $val['testTagRequired'];?></td>
			<td><?php echo $val['maintenanceRequired'];?></td>
			<td><?php echo $val['supplier'];?></td>
			<td><?php echo $val['missing'];?></td>

            
			<td align="center" style="white-space:nowrap" >
				<a href="#" class="text-primary" onClick="return confirm('This is Disabled for now - View Page will be in next upload');"><i class="fab fa-fw fa-readme"></i> View</a>| 
				<a href= "#" class="text-danger" onClick="return confirm('This is Disabled for now - View Page will be in next upload');"><i class="fa fa-fw fa-trash"></i> Delete</a>
			</td>

			</tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="5" align="center">No Record(s) Found!</td></tr>
					<?php } ?>
				</tbody>
				<tfoot class="footer-restore-columns">
    <tr>
      <th colspan="4"><a class="restore-columns" href="#">Some columns hidden - click to show all</a></th>
    </tr>
  </tfoot>



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

    <script>
	$(function() {
  // on init
  $(".table-hideable .hide-col").each(HideColumnIndex);

  // on click
  $('.hide-column').click(HideColumnIndex)

  function HideColumnIndex() {
    var $el = $(this);
    var $cell = $el.closest('th,td')
    var $table = $cell.closest('table')

    // get cell location - https://stackoverflow.com/a/4999018/1366033
    var colIndex = $cell[0].cellIndex + 1;

    // find and hide col index
    $table.find("tbody tr, thead tr")
      .children(":nth-child(" + colIndex + ")")
      .addClass('hide-col');
      
    // show restore footer
    $table.find(".footer-restore-columns").show()
  }

  // restore columns footer
  $(".restore-columns").click(function(e) {
    var $table = $(this).closest('table')
    $table.find(".footer-restore-columns").hide()
    $table.find("th, td")
      .removeClass('hide-col');

  })

  $('[data-toggle="tooltip"]').tooltip({
    trigger: 'hover'
  })

})

</script>
    

</body>

</html>