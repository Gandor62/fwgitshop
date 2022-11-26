<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$_SESSION['condition'] = "";
$_SESSION['typeasset'] = "";
$_SESSION['searchfield'] = "";
$_SESSION['parent'] = "viewcomms.php";

require_once("../includes/init.php");
require_once(INCLUDES_PATH . DS . "config.php");
require_once(INCLUDES_PATH . DS . 'header.php');
require_once(INCLUDES_PATH . DS . "navigation.php");



?>


<?php

if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('department','*',' AND id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($department==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
		exit;
	
	}
	$data	=	array(
					'department'=>$department,
					
					
					);
	$update	=	$db->update('department',$data,array('id'=>$editId));
	if($update){
		header('location: browse-department.php?msg=rus');
		exit;
	}else{
		header('location: browse-department.php?msg=rnu');
		exit;
	}
}
?>

	
	
	
   	<div class="container">
		<h1>Edit Department Details</h1>
		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Costcode is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Description is mandatory field!</div>';
		
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Cost Centre Data added successfully!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Cost Centre Data not added <strong>Please try again!</strong></div>';
		}
		?>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Edit Costcodes</strong> <a href="browse-department.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Departments</a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
					
          <form method="post">
						<div class="form-group">
							<label>Department Code <span class="text-danger">*</span></label>
							<input type="text" name="department" id="department" class="form-control" value="<?php echo $row[0]['department']; ?>" placeholder="Department Code" required>
						</div>
					
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update Department</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php require_once(INCLUDES_PATH . DS . 'footer.php'); ?>