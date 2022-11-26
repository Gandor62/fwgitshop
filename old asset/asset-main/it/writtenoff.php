<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$_SESSION['condition'] = "";
$_SESSION['typeasset'] = "";
$_SESSION['searchfield'] = "";
$_SESSION['parent'] = "writtenoff.php";

require_once("../includes/init.php");
require_once(INCLUDES_PATH . DS . "config.php");
require_once(INCLUDES_PATH . DS . 'header.php');
require_once(INCLUDES_PATH . DS . "navigation.php");

date_default_timezone_set('Australia/Queensland');


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



if(isset($_REQUEST['startDate']) and $_REQUEST['startDate']!="") {

$from_date =($_REQUEST['startDate']);

$condition	.= "	AND dateWrittenOff >=  '$from_date' ";

}

if(isset($_REQUEST['endDate']) and $_REQUEST['endDate']!=""){

    $to_date =($_REQUEST['endDate']);
    $condition	.=	"	AND dateWrittenOff <=  '$to_date' ";
}


if(isset($_REQUEST['emei']) and $_REQUEST['emei']!=""){
    $condition	.=	' AND emei LIKE "%'.$_REQUEST['emei'].'%" ';
}

if(isset($_REQUEST['client']) and $_REQUEST['client']!=""){
    $condition	.=	' AND client LIKE "%'.$_REQUEST['client'].'%" ';
}
if(isset($_REQUEST['costcode']) and $_REQUEST['costcode']!=""){
    $condition	.=	' AND costcode LIKE "%'.$_REQUEST['costcode'].'%" ';
}
if(isset($_REQUEST['year']) and $_REQUEST['year']!=""){
    $condition	.=	' AND year LIKE "%'.$_REQUEST['year'].'%" ';
}

//Main queries
$pages->default_ipp	=	10;
$sql 	= $db->getRecFrmQry("SELECT * FROM assetdata WHERE 1 ".$condition." AND assetType LIKE 'IT%' AND writtenoff LIKE 'y%'");

$pages->items_total	=	count($sql);
$pages->mid_range	=	9;
$pages->paginate();

$userData	=   $db->getRecFrmQry("SELECT * FROM assetdata WHERE 1 " .$condition. " AND assetType LIKE 'IT%' AND writtenoff LIKE 'y%' ORDER by 'assetNo' ASC ".$pages->limit);

$_SESSION['condition'] = $condition;
$typeasset = "'IT%'";
$_SESSION['typeasset'] = $typeasset;
var_dump ($_SESSION['condition']);

//$searchfield = "(equipmentType LIKE '%computer%' OR equipmentType LIKE '%laptop%' OR equipmentType LIKE '%desktop%' OR equipmentType LIKE 'lap%' OR equipmentType LIKE '%radio%')";
$searchfield = "(assetType LIKE 'IT%' AND writtenoff LIKE 'y%')";
$_SESSION['searchfield'] = $searchfield;
?>

<div class="container-fluid pt-3">


    <p class = "navleft">  <i class="fas fa-home">  </i> <a href="../main.php">Home </a> > <a href="../assets/asset-page.php">Asset Register </a> > <a href="itselect.php"> IT Assets </a> > IT Inventory</p>

    <div class="card">

        <div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse IT Communication Equipment</strong>
            <a href="../includes/print.php" target="_blank" class="float-sm-right btn btn-light btn-sm btn-space"><i class="fa fa-print"></i> Print Selection</a>
            <a href="../includes/exportexcel.php" target="_blank" class="float-sm-right btn btn-light btn-sm btn-space"><i class="fa fa-print"></i> Export to Excel</a>
            <a href="add-it.php" class="float-right btn btn-dark btn-sm btn-space"><i class="fa fa-fw fa-plus-circle"></i> Add Asset</a>

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
                                <label>Start Date </label>
                                <input type="date" name="startDate" id="startDate" class="form-control" value="<?php echo isset($_REQUEST['startDate'])?$_REQUEST['startDate']:''?>" >
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>End Date</label>
                                <input type="date" name="endDate" id="endDate" class="form-control" value="<?php echo isset($_REQUEST['endDate'])?$_REQUEST['endDate']:''?>" >
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
                        <div class="col-sm-2">
                            <div class="form-group">

                                <label>Year of Supply</label>
                                <input type="text" name="year" id="year" class="form-control" value="<?php echo isset($_REQUEST['year'])?$_REQUEST['year']:''?>" placeholder="Year supplied to site">
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

        <table class="table display table-condensed table-hover table-bordered table-striped table-hideable table-bordered">
            <thead>
            <tr class="bg-primary text-white">

                <th>Sr#<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
                        <i class="fa fa-eye-slash fa_custom" ></i>
                    </button></th>
                <th>Asset No. <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
                        <i class="fa fa-eye-slash fa_custom" ></i>
                    </button></th>
                <th>Asset Type <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
                        <i class="fa fa-eye-slash fa_custom" ></i>
                    </button></th>
                <!--                <th>Client <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">-->
                <!--                        <i class="fa fa-eye-slash fa_custom" ></i>-->
                <!--                    </button></th>-->
                <th>Location <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
                        <i class="fa fa-eye-slash fa_custom" ></i>
                    </button></th>
                <th>Equipment Type <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
                        <i class="fa fa-eye-slash fa_custom" ></i>
                    </button></th>
                <!--                <th>Division <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">-->
                <!--                        <i class="fa fa-eye-slash fa_custom" ></i>-->
                <!--                    </button></th>-->
                <!--                <th>Assigned To <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">-->
                <!--                        <i class="fa fa-eye-slash fa_custom" ></i>-->
                <!--                    </button></th>-->

                <!--                        <th>Position <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">-->
                <!--                                <i class="fa fa-eye-slash fa_custom" ></i>-->
                <!--                            </button></th>-->

                <!--                        <th>Area<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">-->
                <!--                                <i class="fa fa-eye-slash fa_custom" ></i>-->
                <!--                            </button></th>-->
                <!--                        <th>Asset Category<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">-->
                <!--                                <i class="fa fa-eye-slash fa_custom" ></i>-->
                <!--                            </button></th>-->
                <th>Brand <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
                        <i class="fa fa-eye-slash fa_custom" ></i>
                    </button></th>
                <th>Model <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
                        <i class="fa fa-eye-slash fa_custom" ></i>
                    </button></th>

                <th>Serial No. <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
                        <i class="fa fa-eye-slash fa_custom" ></i>
                    </button></th>
                <th>Equipment ID <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
                        <i class="fa fa-eye-slash fa_custom" ></i>
                    </button></th>
                <!--                        <th>Year<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">-->
                <!--                                <i class="fa fa-eye-slash fa_custom" ></i>-->
                <!--                            </button></th>-->
                <th>Condition <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
                        <i class="fa fa-eye-slash fa_custom" ></i>
                    </button></th>
                <th>Written Off <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
                        <i class="fa fa-eye-slash fa_custom" ></i>
                    </button></th>
                <th>Date Written Off <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
                        <i class="fa fa-eye-slash fa_custom" ></i>
                    </button></th>

<!--                <th>IMEI <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">-->
<!--                        <i class="fa fa-eye-slash fa_custom" ></i>-->
<!--                    </button></th>-->

                <th>Cost Code<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
                        <i class="fa fa-eye-slash fa_custom" ></i>
                    </button></th>

                <th>Cost<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">
                        <i class="fa fa-eye-slash fa_custom" ></i>
                    </button></th>

                <!--                        <th>Purchase Date<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">-->
                <!--                                <i class="fa fa-eye-slash fa_custom" ></i>-->
                <!--                            </button></th>-->
                <!---->
                <!--                        <th>Registration<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">-->
                <!--                                <i class="fa fa-eye-slash fa_custom" ></i>-->
                <!--                            </button></th>-->
                <!--                        <th>Registration ID <button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">-->
                <!--                                <i class="fa fa-eye-slash fa_custom" ></i>-->
                <!--                            </button></th>-->
                <!---->
                <!--                        <th>Test Tag required<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">-->
                <!--                                <i class="fa fa-eye-slash fa_custom" ></i>-->
                <!--                            </button></th>-->
                <!---->
                <!--                        <th>Maintenence required<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">-->
                <!--                                <i class="fa fa-eye-slash fa_custom" ></i>-->
                <!--                            </button></th>-->
                <!---->
                <!--                        <th>Supplier<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">-->
                <!--                                <i class="fa fa-eye-slash fa_custom" ></i>-->
                <!--                            </button></th>-->
                <!--                        <th>Missing<button class="pull-right btn btn-primary btn-condensed hide-column" data-toggle="tooltip" data-placement="bottom" title="Hide Column">-->
                <!--                                <i class="fa fa-eye-slash fa_custom" ></i>-->
                <!--                            </button></th>-->















                <!--                <th>Sr#</th>-->
                <!--                <th>Asset</th>-->
                <!--                <th>Asset Type</th>-->
                <!--                <th>Client</th>-->
                <!--                <th>Site</th>-->
                <!--                <th>Division</th>-->
                <!--                <th>Assigned To</th>-->
                <!--                <th>Brand</th>-->
                <!--                <th>Model</th>-->
                <!--                <th>Equipment Type</th>-->
                <!--                <th>Serial NO</th>-->
                <!--                <th>Equipment ID</th>-->
                <!--                <th>Condtion</th>-->
                <!---->
                <!---->
                <!--                <th>Mobile Number</th>-->
                <!--                <th>Sim Card No.</th>-->
                <!--                <th>IMEI</th>-->
                <!--                <th>Cost Code</th>-->
                <!--                <th>Year</th>-->
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
                        <td class="text-nowrap"><?php echo $s;?></td>
                        <td class="text-nowrap"><?php echo $val['assetNo'];?></td>
                        <td class="text-nowrap"><?php echo $val['assetType'];?></td>
                        <!--                        <td class="text-nowrap">--><?php //echo $val['client'];?><!--</td>-->
                        <td class="text-nowrap"><?php echo $val['site'];?></td>
                        <td class="text-nowrap"><?php echo $val['equipmentType'];?></td>
                        <!--                        <td class="text-nowrap">--><?php //echo $val['division'];?><!--</td>-->
                        <!--                        <td class="text-nowrap">--><?php //echo $val['assignedTo'];?><!--</td>-->
                        <td class="text-nowrap"><?php echo $val['brand'];?></td>
                        <td class="text-nowrap"><?php echo $val['modelNo'];?></td>

                        <td class="text-nowrap"><?php echo $val['serialNo'];?></td>
                        <td class="text-nowrap"><?php echo $val['equipmentID'];?></td>
                        <td class="text-nowrap"><?php echo $val['aquiredCondition'];?></td>
                        <td class="text-nowrap"> <?php echo $val['writtenOff'];?></td>


                        <?php $wdate = $val["dateWrittenOff"]; $ddate = date("d/m/Y",strtotime($wdate)) ;?>
                        <td class="text-nowrap"><?php echo $ddate; ?></td>

<!--                        <td class="text-nowrap">--><?php //echo $val["dateWrittenOff"]; ?><!--</td>-->

                        <td class="text-nowrap"><?php echo $val['costCode'];?></td>
                        <td class="text-nowrap"><?php echo $val['costExGST'];?></td>



                        <td align="center" style="white-space:nowrap" >
                            <a href="edit-it.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a>|
                            <a href="delete.php?delId=<?php echo $val['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
                        </td>
                        <?php $total = $total + $val['costExGST']; ?>

                    </tr>
                    <?php
                }
            }else{
                ?>
                <tr><td colspan="12" align="right">No Record(s) Found!</td></tr>
            <?php } ?>


            </tbody>

            <tfoot class="footer-restore-columns">
            <tr>
                <th colspan="6"><a class="restore-columns" href="#">Some columns hidden - click to show all</a></th>
            </tr>

            </tfoot>

<!--            <th colspan="12" >Total Cost of Equipment Selected Ex GST $--><?php //echo $total;?><!--</th>-->
        </table>
    </div> <!--/.col-sm-12-->

    <div class="clearfix"><h6 style="text-align:center">Total Cost of Equipment Selected Ex GST $<?php echo $total;?></h6></div>

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