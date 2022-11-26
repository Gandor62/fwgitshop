<?php
ob_start();
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once("../includes/init.php");
require_once(INCLUDES_PATH . DS . "config.php");
require_once(INCLUDES_PATH . DS . 'header.php');
require_once(INCLUDES_PATH . DS . "navigation.php");





if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('site','*',' AND id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
  
	if($client==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
		exit;
	}elseif($site==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
		exit;
	}elseif($city==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
    
    }elseif($state==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
    
    }elseif($department==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
    
    
    }elseif($costcentre==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
    
    }elseif($active==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
    
	}
  
  
  
  
  
  
  
  
  
  
	$data	=	array(
					'client'=>$client,
					'site'=>$site,
					'city'=>$city,
                    'state'=>$state,
					'department'=>$department,
					'costcentre'=>$costcentre,
                    'active'=>$active,
					);
	$update	=	$db->update('site',$data,array('id'=>$editId));
	if($update){
		header('location: browse-site.php?msg=rus');
		exit;
	}else{
		header('location: browse-site.php?msg=rnu');
		exit;
	}
}
?>

	
	
	
   	<div class="container">
		<h1>Edit Client Details</h1>
		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Client name is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Site Name is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Data is mandatory!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Client Data added successfully!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Client Data not added <strong>Please try again!</strong></div>';
		}
		?>
      
      
      
      
      
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Edit Site</strong> <a href="browse-site.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Sites</a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
					
          
                    <form method="post">
            
						<div class="form-group">
							<label>Client Name <span class="text-danger">*</span></label>
							<input type="text" name="client" id="client" class="form-control" value="<?php echo $row[0]['client']; ?>" placeholder="Client name" required>
						</div>
            
						<div class="form-group">
							<label>Site Name <span class="text-danger">*</span></label>
							<input type="text" name="site" id="site" class="form-control" value="<?php echo $row[0]['site']; ?>" placeholder="Site Name" required>
						</div>
						
            
                        <div class="form-group">
							<label>City <span class="text-danger">*</span></label>
							<input type="text" name="city" id="city" class="form-control" value="<?php echo $row[0]['city']; ?>" placeholder="City name" required>
						</div>
              
              
						<div class="form-group">

                            <label>State <span class="text-danger">*</span></label>

                            <select type="text" name="state" id="state" class="form-control form-control-sm " >
                                <option value =  "<?php  echo $row[0]['state'];?>"><?php  echo $row[0]['state'];?></option>
                                <option value="QLD" >QLD</option>
                                <option value="NSW" >NSW</option>
                                <option value="VIC" >VIC</option>
                                <option value="TAS" >TAS</option>
                                <option value="SA" >SA</option>
                                <option value="WA" >WA</option>
                                <option value="NT" >NT</option>
                                <option value="ACT" >ACT</option>
                            </select>
						</div>



                        <div class="form-group">
							<label>Department <span class="text-danger">*</span></label>


                            <?php
                            $sql = "SELECT department FROM department";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            if ($stmt->rowCount() > 0) {
                                ?>
                                <select name="department" id="department" class="form-control form-control-sm">
                                    <option value =  "<?php  echo $row[0]['department'];?>"><?php  echo $row[0]['department'];?></option>
                                    <?php foreach ($results as $departmentrow) { ?>
                                        <option value="<?php echo $departmentrow['department']; ?>"><?php echo $departmentrow['department'];?></option>
                                    <?php } ?>
                                </select>
                                <?php
                            }
                            ?>

                        </div>















						<div class="form-group">
							<label>Costcenter <span class="text-danger">*</span></label>
<!--							<input type="text" name="costcentre" id="costcentre" class="form-control" value="--><?php //echo $row[0]['costcentre']; ?><!--" placeholder="Costcenter" required>-->

                        <?php
                        $sql = "SELECT account, description FROM costcode";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if ($stmt->rowCount() > 0) {
                            ?>
                            <select name="costcentre" id="costcentre" class="form-control form-control-sm">
                                <option value =  "<?php  echo $row[0]['costcentre'];?>"><?php  echo $row[0]['costcentre'];?></option>
                                <?php foreach ($results as $costrow) { ?>
                                    <option value="<?php echo $costrow['account']; ?>"><?php echo $costrow['account'];?> <?php echo $costrow['description'];?></option>
                                <?php } ?>
                            </select>
                            <?php
                        }
                        ?>

                        </div>

                        <div class="form-group">
							<label>Site Active<span class="text-danger">*</span></label>



                          <select type="text" name="active" id="active" class="form-control form-control-sm " >
                              <option value =  "<?php  echo $row[0]['active'];?>"><?php  echo $row[0]['active'];?></option>
                              <option value="Yes" >Yes</option>
                              <option value="No" >No</option>
                         </div>
            
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
                            <br>
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update Site Data</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php require_once(INCLUDES_PATH . DS . 'footer.php'); ?>