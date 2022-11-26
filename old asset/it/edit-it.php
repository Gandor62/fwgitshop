<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$_SESSION['condition'] = "";
$_SESSION['typeasset'] = "";
$_SESSION['searchfield'] = "";
$goto= $_SESSION['parent'];
$user = $_SESSION["username"];


$itemNotes = 'Edit Asset';
$curyear= date('y');


//$goto = 'itstock.php';
//include_once('../includes/config.php');
//include "../includes/header.php" ;
//include "../includes/navigation.php";


require_once("../includes/init.php");
require_once(INCLUDES_PATH . DS . "config.php");
require_once(INCLUDES_PATH . DS . 'header.php');
require_once(INCLUDES_PATH . DS . "navigation.php");




if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
    $row	=	$db->getAllRecords('assetdata','*',' AND id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
    extract($_REQUEST);







    if($assetNo==""){
        header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
        exit;
    }

    if ($_POST["testTagRequired"] === "Not Required") {

        $testTagFrequency= NULL;
        $testTagDate= NULL;
        $testedBy= NULL;
        $testTagNextDue= NULL;
    }

    if (empty($_POST['costExGST'])) { $costExGST = 0.00; }


    if (empty($_POST["testTagDate"]))
    {
        $testTagDate = NULL;
    }

    if (empty($_POST["testTagNextDue"]))
    {
        $testTagNextDue = NULL;

    }
    if (empty($_POST["datePurchased"])){$datePurchased = NULL; }
    if (empty($_POST["warrantyEnd"])){$warrantyEnd = NULL; }
    if (empty($_POST["budgetEnd"])){$budgetEnd = NULL; }
    if (empty($_POST["invoiceDate"])){$invoiceDate = NULL; }
    if (empty($_POST["dateWrittenOff"])){$dateWrittenOff = NULL; }

//if $writtenOff = "Yes" {
//    $dateWrittenOff = date();
//}

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
        'aquiredCondition'=>$aquiredCondition,
        'datePurchased'=>$datePurchased,
        'costCode'=>$costCode, 
        'supplier'=>$supplier,
        'poNumber'=>$poNumber,
        'deliveryNote'=>$deliveryNote,
        'invoiceNo'=>$invoiceNo,
        'invoiceReference'=>$invoiceReference,
        'invoiceDate'=>$invoiceDate,
        'costExGST'=>$costExGST,
        'value'=>$value,
        'testTagRequired'=>$testTagRequired,
        'testTagFrequency'=>$testTagFrequency,
        'testTagDate'=>$testTagDate,
        'testedBy'=>$testedBy,
        'testTagNextDue'=>$testTagNextDue,
        'itemCondition'=>$itemCondition,
        // 					'repairsMaintenanceDate'=>$repairsMaintenanceDate,
        // 					'repairsMaintenanceDetails'=>$repairsMaintenanceDetails,
        // 					'repairer'=>$repairer,
        // 					'repairResult'=>$repairResult,
       'itemNotes'=>$itemNotes,
//        'file_name'=>$file_name,
        'writtenOff'=>$writtenOff,
        'dateWrittenOff'=>$dateWrittenOff,





    );





    $update	=	$db->update('assetdata',$data,array('id'=>$editId));

    if($update){

        include_once '../includes/logupdate.php';

        header("Location: $goto?msg=rus");

        exit;
    }else{
        header("Location: $goto?msg=rnu");
        exit;
    }

}
?>




<div class="container">
    <h1>Edit IT Asset Details</h1>
    <?php
    if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
        echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Field is mandatory field!</div>';
    }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
        echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Description is mandatory field!</div>';

    }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
        echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Cost Centre Data added successfully!</div>';
    }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
        echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Cost Centre Data not added <strong>Please try again!</strong></div>';
    }

    ?>





    <div class="card" style="width:100%;">
        <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Edit Asset</strong> <a href="<?php echo $goto;?>" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Asset</a>
        </div>

        <div class="card-body">

            <div class="col-sm-12">
                <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
            </div>


            <form method="post">

                <div class="form-group form-row ">
                    <div class="col-3">
                        <label>Asset Number <?php echo $row[0]['assetNo']; ?></label>
                        <input type="text" name="assetNo" id="assetNo" class="form-control form-control-sm" value="<?php echo $row[0]['assetNo']; ?>" >
                    </div>


                    <div class="form-group col">
                        <label>Asset Type  </label>
                        <?php
                        $sql = "SELECT type FROM assettype";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if ($stmt->rowCount() > 0) {
                            ?>
                            <select name="assetType" id="assetType" class="form-control form-control-sm">
                                <option value =  "<?php  echo $row[0]['assetType'];?>"><?php  echo $row[0]['assetType'];?></option>
                                <?php foreach ($results as $typerow) { ?>
                                    <option value="<?php echo $typerow['type']; ?>"><?php echo $typerow['type'];?></option>
                                <?php } ?>
                            </select>
                            <?php
                        }
                        ?>
                    </div>



                    <div class="form-group col">
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

                </div>


                <div class="form-group form-row ">
                    <div class="col-4">

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


                    <div class="form-group col">

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



                    <div class="form-group col">
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
                </div>


                <div class="form-group form-row">
                    <div class="col-3">
                        <label>Assigned To  </label>
                        <input type="text" name="assignedTo" id="assignedTo" class="form-control form-control-sm" value="<?php echo $row[0]['assignedTo']; ?>" placeholder="Assigned To"  >
                    </div>

                    <div class="form-group col">
                        <label>Position  </label>
                        <input type="text" name="position" id="position" class="form-control form-control-sm" value="<?php echo $row[0]['position']; ?>" placeholder="Position"  >
                    </div>


                    <div class="form-group col">
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
                    </div>

                </div>


                <div class="form-group form-row">
                    <div class="col-3">
                        <label>Brand  </label>
                        <input type="text" name="brand" id="brand" class="form-control form-control-sm" value="<?php echo $row[0]['brand']; ?>" placeholder="Brand"  >
                    </div>

                    <div class="form-group col">
                        <label>Model Number  </label>
                        <input type="text" name="modelNo" id="modelNo" class="form-control form-control-sm" value="<?php echo $row[0]['modelNo']; ?>" placeholder="Model"  >
                    </div>

                    <div class="form-group col">
                        <label>Serial No.  </label>
                        <input type="text" name="serialNo" id="serialNo" class="form-control form-control-sm" value="<?php echo $row[0]['serialNo']; ?>" placeholder="Serial No"  >
                    </div>

                    <div class="form-group col">
                        <label>Equipment ID / Code  </label>
                        <input type="text" name="equipmentID" id="equipmentID" class="form-control form-control-sm" value="<?php echo $row[0]['equipmentID']; ?>" placeholder="equipmentID"  >
                    </div>

                </div>


                <div class="form-group form-row">
                    <div class="col-3">
                        <label>SimCard  </label>
                        <input type="text" name="simCard" id="simCard" class="form-control form-control-sm" value="<?php echo $row[0]['simCard']; ?>" placeholder="Simcard Number"  >
                    </div>

                    <div class="form-group col">
                        <label>IMEI  </label>
                        <input type="text" name="imei" id="imei" class="form-control form-control-sm" value="<?php echo $row[0]['imei']; ?>" placeholder="IMEI"  >
                    </div>

<!--                    <div class="form-group col">-->
<!--                        <label>MEID  </label>-->
<!--                        <input type="text" name="meid" id="meid" class="form-control form-control-sm" value="--><?php //echo $row[0]['meid']; ?><!--" placeholder="MEID"  >-->
<!--                    </div>-->

                    <div class="form-group col">
                        <label>Mobile Number  </label>
                        <input type="text" name="mobileNumber" id="mobileNumber" class="form-control form-control-sm" value="<?php echo $row[0]['mobileNumber']; ?>" placeholder="Mobile Number"  >
                    </div>

                    <div class="form-group col">

                        <label>Communications Plan  </label>
                                            <select name ="mobilePlan" id=""mobilePlan">

                                            <option  value="value="<?php echo $row[0]['mobilePlan']; ?>"</option>
                                            <option  value="Voice Plan">Voice Plan</option>
                                            <option  value="Data Plan">Data Plan</option>
                                            </select>


                        <input type="text" name="mobilePlan" id="mobilePlan" class="form-control form-control-sm" value="<?php echo $row[0]['mobilePlan']; ?>" placeholder="Mobile Plan"  >
                    </div>







                </div>
<!--  Security -->
                              <!-- <div class="form-group form-row">
                                  <div class="col-3">
                                      <label>User Email  </label>
                                      <input type="text" name="emailAddress" id="emailAddress" class="form-control form-control-sm" value="<?php echo $row[0]['emailAddress']; ?>" placeholder="Email Address"  >
                                  </div>

                                  <div class="form-group col">
                                      <label>User Password  </label>
                                      <input type="text" name="emailPassword" id="emailPassword" class="form-control form-control-sm" value="<?php echo $row[0]['emailPassword']; ?>" placeholder="Email Password"  >
                                  </div>

                                  <div class="form-group col">
                                      <label>User Login</label>
                                      <input type="text" name="userLogin" id="userLogin" class="form-control form-control-sm" value="<?php echo $row[0]['userLogin']; ?>" placeholder="User Login"  >
                                  </div>
                                  <div class="form-group col">
                                      <label>User Password</label>
                                      <input type="text" name="userPassword" id="userPassword" class="form-control form-control-sm" value="<?php echo $row[0]['userPassword']; ?>" placeholder="User Password"  >
                                  </div>

                                  <div class="form-group col">
                                      <label>Admin Login  </label>
                                      <input type="text" name="adminLogin" id="adminLogin" class="form-control form-control-sm" value="<?php echo $row[0]['adminLogin']; ?>" placeholder="Admin Login"  >
                                  </div>

                                  <div class="form-group col">

                                      <label>Admin Password </label>
                                      <input type="text" name="adminPassword" id="adminPassword" class="form-control form-control-sm" value="<?php echo $row[0]['adminPassword']; ?>" placeholder="Admin Password"  >
                                  </div>

                              </div>

                              <div class="form-group form-row">
                                  <div class="col-3">
                                      <label>Device Pin Number</label>
                                      <input type="text" name="pinNumber" id="pinNumber" class="form-control form-control-sm" value="<?php echo $row[0]['pinNumber']; ?>" placeholder="Pin Number"  >
                                  </div>

                                  <div class="form-group col">
                                      <label>Other User</label>
                                      <input type="text" name="otherUser" id="otherUser" class="form-control form-control-sm" value="<?php echo $row[0]['otherUser']; ?>" placeholder="Other User Login"  >
                                  </div>

                                  <div class="form-group col">
                                      <label>Other User Password</label>
                                      <input type="text" name="otherPassword" id="otherPassword" class="form-control form-control-sm" value="<?php echo $row[0]['otherPassword']; ?>" placeholder="Password"  >
                                  </div>



                              </div> -->

                <!--End Security-->















                <div class="form-group form-row">
                    <div class="col-3">
                        <label for= "datePurchased" >Acquired Date  </label>
                        <input type="date" name="datePurchased" id="datePurchased" class="form-control form-control-sm" value="<?php echo $row[0]['datePurchased']; ?>" placeholder="Purchased"   >
                    </div>


                    <div class="form-group col">
                        <label for warrantyEnd>Warranty End Date  </label>
                        <input type="date" name="warrantyEnd" id="warrantyEnd" class="form-control form-control-sm" value="<?php echo $row[0]['warrantyEnd']; ?>" placeholder="Warranty"  >
                    </div>

                    <div class="form-group col">
                        <label>Budgeted Life End Date </label>
                        <input type="date" name="budgetEnd" id="budgetEnd" class="form-control form-control-sm" value="<?php echo $row[0]['budgetEnd']; ?>" placeholder="Lifespan"  >
                    </div>

                    <div class="form-group col">
                        <label for = "aquiredCondition">Condition </label>
                        <select class="form-control form-control-sm" name="aquiredCondition" id="aquiredCondition" <?php echo $row[0]['aquiredCondition']; ?>>
                            <option value="New">New</option>
                            <option value="Good">Good</option>
                            <option value="Poor">Poor</option>
                            <option value="Needs Repair">Needs Repair</option>
                        </select>
                    </div>
                </div>

                <div class="form-group form-row">


                    <div class="form-group col">
                        <label>Test and Tag </label>
                        <select type="text" name="testTagRequired" id="testTagRequired" class="form-control form-control-sm " value ="<?php echo $row[0]['testTagRequired']; ?>" >
                            <option value =  "<?php  echo $row[0]['testTagRequired'];?>"><?php  echo $row[0]['testTagRequired'];?></option>
                            <option value="Not Required" >Not Required</option>
                            <option value="Required" >Required</option>
                        </select>


                    </div>


                    <?php

                    $mf1 = $row[0]['testTagFrequency'];


                    switch ($mf1) {
                        case 0:
                            $result1 = "Not required";
                            break;
                        case 1:
                            $result1 = "Every Month";
                            break;
                        case 3:
                            $result1 = "Every Three Months";
                            break;

                        case 6:
                            $result1 = "Every 6 Months";
                            break;
                        case 12:
                            $result1 = "Yearly";
                            break;
                        case 24:
                            $result1 = "24 Months";
                            break;
                        case 60:
                            $result1 = "5 Yearly";
                            break;

                        default:
                            $result1 = "Not Required";
                    }
                    ?>

                    <div class="form-group col">
                        <label>Frequency</label>

                        <select class="form-control form-control-sm" name="testTagFrequency" id="testTagFrequency"  >
                            <option value =  "<?php  echo $row[0]['testTagFrequency'];?>"><?php  echo $result1;?></option>
                            <option value=0>Not Required</option>
                            <option value=1>Every Month</option>
                            <option value=3>Every 3 Months</option>
                            <option value=6>Every 6 Months</option>
                            <option value=12>Every 12 Months</option>
                            <option value=24>Every 2 Years</option>
                            <option value=60>Every 5 Years</option>
                        </select>

                    </div>
                    <div class="form-group col">
                        <label for="otherField3b">Tested Date </label>
                        <input type="date" name="testTagDate" id="testTagDate" class="form-control form-control-sm" value ="<?php echo $row[0]['testTagDate']; ?>">
                    </div>

                    <div class="form-group col">
                        <label for="otherField4b">Tested By  </label>
                        <input type="text" name="testedBy" id="testedBy" class="form-control form-control-sm"  value ="<?php echo $row[0]['testedBy']; ?>">
                    </div>

                    <div class="form-group col">
                        <label for="otherField5b">Date Next Test Due </label>
                        <input type="date" name="testTagNextDue" id="testTagDue" class="form-control form-control-sm" value ="<?php echo $row[0]['testTagNextDue']; ?>">
                    </div>

                </div>


                <div class="form-group form-row">
                    <div class="col-3">
                        <label>Supplier  </label>
                        <input type="text" name="supplier" id="supplier" class="form-control form-control-sm" value="<?php echo $row[0]['supplier']; ?>" placeholder="supplier"  >
                    </div>

                    <div class="form-group col">
                        <label>Purchase Order Number </label>
                        <input type="text" name="poNumber" id="poNumber" class="form-control form-control-sm" value="<?php echo $row[0]['poNumber']; ?>" placeholder="Purchase Order Number"  >
                    </div>

                    <div class="form-group col">
                        <label>Delivery Note  </label>
                        <input type="text" name="deliveryNote" id="deliveryNote" class="form-control form-control-sm" value="<?php echo $row[0]['deliveryNote']; ?>" placeholder="Delivery Note"  >
                    </div>
                </div>

                <div class="form-group form-row">
                    <div class="col-3">
                        <label>Invoice Number </label>
                        <input type="text" name="invoiceNo" id="invoiceNo" class="form-control form-control-sm" value="<?php echo $row[0]['invoiceNo']; ?>" placeholder="Supplier Invoice"  >
                    </div>

                    <div class="form-group col">
                        <label>Invoice Reference  </label>
                        <input type="text" name="invoiceReference" id="invoiceReference" class="form-control form-control-sm" value="<?php echo $row[0]['invoiceReference']; ?>" placeholder="Invoice Reference"  >
                    </div>

                    <div class="form-group col">
                        <label>Invoice Date </label>
                        <input type="date" name="invoiceDate" id="invoiceDate" class="form-control form-control-sm" value="<?php echo $row[0]['invoiceDate']; ?>" placeholder="Invoice Date"  >
                    </div>


                    <div class="form-group col"> 
                        <label>Cost Ex GST  </label>

                        <input type="number" name="costExGST" pattern="^\d*(\.\d{0,2})?$" id="costExGST" class="form-control form-control-sm" step="0.01"  value="<?php echo $row[0]['costExGST']; ?>"  >

                    </div>


                    <div class="form-group col">
                        <label>Current Value </label>
                        <input type="text" name="value" id="value" class="form-control form-control-sm" value="<?php echo $row[0]['value']; ?>"   >
                    </div>
                </div>

                <div class="form-group" >
                <label>* Item Notes - Reason For edit - Must be filled in</label>
                <input  class="form-control" id="itemNotes" name="itemNotes"  rows="3" value="<?php echo $row[0]['itemNotes']; ?>"></input>
              </div>





                <div class="form-group form-row">
                    <div class="col=4">
                        <label>Write Item Off </label>
                        <select class="form-control form-control" name="writtenOff" id="writtenOff"  >
                            <option value =  "<?php  echo $row[0]['writtenOff'];?>"><?php  echo$row[0]['writtenOff'];?></option>
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>


                </div>

                <div class="form-group">
                    <label>Document</label>
<!--                    <input type="text" name="file_name" id="file_name" class="form-control" value="--><?php //echo $row[0]['fileName']; ?><!--" placeholder="Here we will store Documents"  >-->
                </div>

                <div class="form-group">
                    <input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
                    <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update Asset</button>
                </div>










            </form>
        </div>
    </div>
    <div>
        <?php require_once(INCLUDES_PATH . DS . 'footer.php'); ?>
    </div>






