<?php
session_start();

$_SESSION['condition'] = "";
$_SESSION['typeasset'] = "";
$_SESSION['searchfield'] = "";
$goto = $_SESSION['parent'];

include_once('../includes/config.php');
include "../includes/header.php" ;
include "../includes/navigation.php";




if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
    extract($_REQUEST);
    if($assetNo==""){
        header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
        exit;

    }else{

        if (empty($_POST["testTagDate"])) {
            $testTagDate = NULL ;
        }
        if (empty($_POST["testTagNextDue"])) {
            $testTagNextDue = NULL ;
        }

        if (empty($_POST["datePurchased"])){$datePurchased = NULL; }
        if (empty($_POST["warrantyEnd"])){$warrantyEnd = NULL; }
        if (empty($_POST["budgetEnd"])){$budgetEnd = NULL; }


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
//          'aquiredCondition'=>$aquiredCondition,
                'datePurchased'=>$datePurchased,
//          'costCode'=>$costCode,
//          'supplier'=>$supplier,
//          'poNumber'=>$poNumber,
//          'deliveryNote'=>$deliveryNote,
//          'invoiceNo'=>$invoiceNo,
//          'invoiceReference'=>$invoiceReference,
//          'invoiceDate'=>$invoiceDate,
//          'costExGST'=>$costExGST,
//          'value'=>$value,
//					'testTagRequired'=>$testTagRequired,
//					'testTagFrequency'=>$testTagFrequency,
//					'testTagDate'=>$testTagDate,
//					'testedBy'=>$testedBy,
//					'testTagNextDue'=>$testTagNextDue,
//					'itemCondition'=>$itemCondition,
//// 					'repairsMaintenanceDate'=>$repairsMaintenanceDate,
//// 					'repairsMaintenanceDetails'=>$repairsMaintenanceDetails,
//// 					'repairer'=>$repairer,
//// 					'repairResult'=>$repairResult,
//          'itemNotes'=>$itemNotes,
//          'file_name'=>$file_name,
                'writtenOff'=>$writtenOff,
            );



            $insert	=	$db->insert('assetdata',$data);

            if($insert){

                header("location:". $goto."?msg=ras");
                exit;
            }else{
                header("location:". $goto."?msg=rna");
                exit;
            }
        }else{

            header('location:'.$_SERVER['PHP_SELF'].'?msg=dsd');
            exit;
        }
    }
}
?>



<div class="container-fluid">


    <h1>Add New ITb Equipment</h1>

    <?php

    if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){

        echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Asset Number is mandatory field!</div>';

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

    <div class="card" style = "width:100%;">

        <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add New Asset</strong> <a href="<?php echo $goto;?>" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse IT</a></div>

        <div class="card-body">



            <div class="col-sm-12" >

                <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
                <!-- 	  <label { color: #B4886B; font-weight: bold; } >Asset Type - IT Equipment </label> -->
                <form method="post">

                    <div class="form-group form-row ">


                        <style>

                            .assetstyle{
                                border:1px solid black;
                                background-color: #d2d2d2;
                                height:20px;
                                width:60px;}

                        </style>



                        <div class="col-3">
                            <label> Last Asset Number used</label>
                            <?php
                            $con = new PDO('mysql:host=localhost;dbname=asset','root','root');

                            $asset = $con->query("
									SELECT assetNo FROM assetdata
										ORDER BY id DESC LIMIT 1
										
									")	;
                            $asset = $asset->fetch(PDO::FETCH_ASSOC);


                            $newasset= $asset[assetNo] + 1;
                            echo $asset[assetNo];

                            ?>


                            <input type="text" name="assetNo" id="assetNo" class="form-control form-control-sm" value ="<?php echo $newasset ;?>">
                        </div>





                        <div class="form-group col-3">
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
                        <div class="col-3">

                            <label>Site Name </label>
                            <?php
                            $sql = "SELECT site FROM site";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            if ($stmt->rowCount() > 0) {
                                ?>
                                <select class="form-control form-control-sm" name="site" id="site" >
                                    <option value =  "<?php  echo $row[0]['site'];?>"><?php  echo $row[0]['site'];?></option>
                                    <?php foreach ($results as $siterow) { ?>
                                        <option value="<?php echo $siterow['site']; ?>"><?php echo $siterow['site'];?></option>
                                    <?php } ?>
                                </select>
                                <?php
                            }
                            ?>
                        </div>

                        <div class="form-group col-1">
                            <!-- 							  <label { color: #B4886B; font-weight: bold; display: block; width: 150px; float: center; } >Asset Type - IT Equipment </label> -->

                            <input type="hidden" name="assetType" id="assetType" class="form-control form-control-sm" value = "IT Equipment" placeholder="IT Equipment"  >


                        </div>
                    </div>


                    <div class="form-group form-row ">
                        <div class="col-3">

                            <label>Division/Department</label>
                            <?php
                            $sql = "SELECT department FROM department";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            if ($stmt->rowCount() > 0) {
                                ?>
                                <select name="division" id="division" class="form-control form-control-sm">
                                    <option value =  "<?php  echo $row[0]['division'];?>"><?php  echo $row[0]['division'];?></option>
                                    <?php foreach ($results as $departmentrow) { ?>
                                        <option value="<?php echo $departmentrow['department']; ?>"><?php echo $departmentrow['department'];?></option>
                                    <?php } ?>
                                </select>
                                <?php
                            }
                            ?>
                        </div>



                        <div class="form-group col-3">
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

                        <div class="col-3">
                            <label>Assigned To  </label>
                            <input type="text" name="assignedTo" id="assignedTo" class="form-control form-control-sm"  placeholder="Assigned To"  >

                        </div>


                        <div class="form-group col">
                            <label>Position  </label>
                            <input type="text" name="position" id="position" class="form-control form-control-sm"  placeholder="Position"  >
                        </div>

                    </div>

                    <div class="form-group form-row ">
                        <div class="col-2">
                            <label>Equipment Type  </label>


                            <?php
                            $sql = "SELECT type FROM itequip";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            if ($stmt->rowCount() > 0) {
                                ?>
                                <select name="equipmentType" id="equipmentType" class="form-control form-control-sm">
                                    <option value =  "<?php  echo $row[0]['equipmentType'];?>"><?php  echo $row[0]['equipmentType'];?></option>
                                    <?php foreach ($results as $itequiprow) { ?>
                                        <option value="<?php echo $itequiprow['type']; ?>"><?php echo $itequiprow['type'];?></option>
                                    <?php } ?>
                                </select>
                                <?php
                            }
                            ?>
                            <a href="../assettype/browse-itequip.php" class="float-left btn btn-light btn-sm">Add</a>
                        </div>


                        <div class="col-2">
                            <label>Brand  </label>
                            <input type="text" name="brand" id="brand" class="form-control form-control-sm"  placeholder="Brand"  >
                        </div>

                        <div class="form-group col">
                            <label>Model Number  </label>
                            <input type="text" name="modelNo" id="modelNo" class="form-control form-control-sm"  placeholder="Model"  >
                        </div>

                        <div class="form-group col">
                            <label>Serial No.  </label>
                            <input type="text" name="serialNo" id="serialNo" class="form-control form-control-sm"  placeholder="Serial No"  >
                        </div>

                        <div class="form-group col">
                            <label>Equipment ID / Code  </label>
                            <input type="text" name="equipmentID" id="equipmentID" class="form-control form-control-sm" placeholder="equipmentID" >
                        </div>

                    </div>




                    <div class="form-group form-row">

                        <div class="col-3">
                            <label >Aquired Date  </label>

                            <input type="date" name="datePurchased" id="datePurchased" class="form-control form-control-sm"  value="<?php echo date('Y-m-d');?>" >

                        </div>



                        <div class="form-group col">

                            <label for="warrantyEnd">Warranty End Date  </label>
                            <input type="date" name="warrantyEnd" id="warrantyEnd" class="form-control form-control-sm"    value="<?php $effectiveDate = strtotime("+12 months", strtotime(date("y-m-d")));
                            echo $time = date("Y-m-d", $effectiveDate);?>"  >
                        </div>





                        <div class="form-group col">
                            <label>Budgeted Life End Date </label>
                            <input type="date" name="budgetEnd" id="budgetEnd" class="form-control form-control-sm"  value="<?php $effectiveDate = strtotime("+36 months", strtotime(date("y-m-d")));
                            echo $time = date("Y-m-d", $effectiveDate);?>"  >
                        </div>

                        <div class="form-group col">
                            <label for = "aquiredCondition">Condition </label>
                            <select class="form-control form-control-sm" name="aquiredCondition" id="aquiredCondition" >
                                <option value="New">New</option>
                                <option value="Good">Good</option>
                                <option value="Poor">Poor</option>
                                <option value="Needs Repair">Needs Repair</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group form-row">
                        <div class=" a form-group col-2" >
                            <label class="a" for="seeAnotherFieldGroup">Mobile Service Required</label>
                            <select class="a form-control" id="seeAnotherFieldGroup">
                                <option value="no" >Not Required.</option>
                                <option value="yes" >Phone Plan Required</option>
                            </select>
                        </div>

                        <div class="form-group col" id="otherFieldGroupDiv">
                            <div class="row">

                                <div class="col-3">
                                    <label for="otherField1">Communications Plan</label>
                                    <input type="text" name="mobilePlan" id="otherField1" class="form-control form-control-sm" placeholder="Mobile Plan"  >
                                </div>

                                <div class="col-3">
                                    <label for="otherField2">Mobile Number</label>
                                    <input type="text" name="mobileNumber" id="otherField2" class="form-control form-control-sm"  placeholder="Mobile Number"  >
                                </div>

                                <div class="col-3">
                                    <label for="otherField3"> SimCard</label>
                                    <input type="text" name="simCard" id="otherField3" class="form-control form-control-sm"  placeholder="Simcard Number"  >
                                </div>

                                <div class="form-group col 3">
                                    <label for="otherField3">IMEI</label>
                                    <input type="text" name="imei" id="otherField4" class="form-control form-control-sm"  placeholder="IMEI"  >
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="form-group form-row">
                        <div class=" a form-group col-2" >
                            <label class="a" for="seeAnotherFieldGroupb">Test Tag Required</label>
                            <select class="a form-control" id="seeAnotherFieldGroupb">
                                <option value="no" >Not Required.</option>
                                <option value="yes" >Required</option>
                            </select>
                        </div>





                        <div class="form-group col" id="otherFieldGroupDivb">
                            <div class="row">

                                <div class="col-1">
                                    <label for="otherField1b">Test </label>
                                    <input type="text" name="testTagRequired" id="otherField1b" class="form-control form-control-sm " value ="Yes" >
                                </div>

                                <div class="col-3">
                                    <label for="otherField2b">Frequency</label>
                                    <!--                   <input type="text" name="testTagFrequency" id="otherField2b" class="form-control form-control-sm" placeholder="testTagFrequency"> -->

                                    <select class="form-control form-control-sm" name="testTagFrequency" id="otherField2b" >
                                        <option value=".1">Every Month</option>
                                        <option value=".4">Every 3 Months</option>
                                        <option value=".6">Every 6 Months</option>
                                        <option value="1">Every 12 Months</option>
                                        <option value="2">Every 2 Years</option>
                                        <option value="5">Every 5 Years</option>
                                    </select>

                                </div>

                                <div class="col-3">
                                    <label for="otherField3b">Tested Date </label>
                                    <input type="date" name="testTagDate" id="otherField3b" class="form-control form-control-sm" >
                                </div>

                                <div class="fcol-3">
                                    <label for="otherField4b">Tested By  </label>
                                    <input type="text" name="testedBy" id="otherField4b" class="form-control form-control-sm"  placeholder="Tested By">
                                </div>

                                <div class="col-3">
                                    <label for="otherField5b">Date Next Due </label>
                                    <input type="date" name="testTagNextDue" id="otherField5b" class="form-control form-control-sm">
                                </div>

                            </div>


                        </div>
                    </div>







                    <div class="form-group form-row">
                        <div class="col-3">
                            <label>Supplier  </label>
                            <input type="text" name="supplier" id="supplier" class="form-control form-control-sm" placeholder="supplier"  >
                        </div>

                        <div class="form-group col">
                            <label>Purchase Order Number </label>
                            <input type="text" name="poNumber" id="poNumber" class="form-control form-control-sm" placeholder="Purchase Order Number"  >
                        </div>


                        <div class="form-group col">
                            <label>Delivery Note  </label>
                            <input type="text" name="deliveryNote" id="deliveryNote" class="form-control form-control-sm"  placeholder="Delivery Note"  >
                        </div>


                    </div>

                    <div class="form-group form-row">
                        <div class="col-3">
                            <label>Invoice Number </label>
                            <input type="text" name="invoiceNo" id="invoiceNo" class="form-control form-control-sm" placeholder="Supplier Invoice"  >
                        </div>

                        <div class="form-group col">
                            <label>Invoice Reference  </label>
                            <input type="text" name="invoiceReference" id="invoiceReference" class="form-control form-control-sm"  placeholder="Invoice Reference"  >
                        </div>

                        <div class="form-group col">
                            <label>Invoice Date </label>
                            <input type="text" name="invoiceDate" id="invoiceDate" class="form-control form-control-sm"  placeholder="Invoice Date"  >
                        </div>



                        <div class="form-group col">
                            <label>Cost Ex GST  </label>
                            <!--                  <input type="text" name="costExGST" id="costExGST" class="form-control form-control-sm" placeholder="Cost Ex GST"  >-->
                            <input type="number" name="costExGST" id="costExGST" class="form-control form-control-sm"  step="any" value = "0.00" placeholder ="0.00">
                        </div>



                        <div class="form-group col">
                            <label>Current Value </label>
                            <input type="text" name="value" id="value" class="form-control form-control-sm"  placeholder="Value"  >
                        </div>
                    </div>







                    <div class="form-group" >
                        <label>Item Notes</label>
                        <input  class="form-control" id="itemNotes" name="itemNotes"  rows="3" ></input>
                    </div>

                    <div class="form-group form-row">
                        <div class="col-4">

                            <!-- 					<label>Item Status </label>
                                                        <input type="text" name="writtenOff" id="writtenOff" class="form-control" placeholder="Allocated"  >
                                                                <select class="form-control form-control-sm" name="writtenOff" id="WrittenOff" value = "Allocated">
                                                                    <option value="Allocated">Allocated to a Site</option>
                                                                    <option value="Unallocated">Unallocated - Held in Inventory</option>

                                                                <option value="Written Off">Defunct held on Site</option>
                                                                    <option value="Written Off">Returned to HO</option>
                                                                    <option value="Written Off">Written Off - Destroyed</option>
                                                                    <option value="Written Off">Written Off</option>

                                                            </select>



                                                        </div> -->

                            <div class="form-group">
                                <label>Upload Documentation (Not setup as yet)</label>
                                <!-- 							<input type="file" name="photo" id="photo" class="form-control" > -->
                            </div>

                        </div>


                        <div class="form-group">

                            <button type="submit"  name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Save New Asset</button>


                            <a href="browse-it.php"class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Cancel</a>
                        </div>






                </form>
            </div>
        </div>
    </div>
</div>





<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="./../include/js/hide-show-fields-form.js"></script>





</body>

</html>