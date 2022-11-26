<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$_SESSION['condition'] = "";
$_SESSION['typeasset'] = "";
$_SESSION['searchfield'] = "";
$_SESSION['parent'] = "browse-it.php";

include_once('../includes/config.php');

include "../includes/header.php" ;
include "../includes/navigation.php";



?>

<!--<link rel="stylesheet" type="text/css" href="../includes/css/styles2.css">-->

<?php
$condition	=	'';
if(isset($_REQUEST['assetNo']) and $_REQUEST['assetNo']!=""){
    $condition	.=	' AND assetNo LIKE "%'.$_REQUEST['assetNo'].'%" ';
}
if(isset($_REQUEST['site']) and $_REQUEST['site']!=""){
    $condition	.=	' AND site LIKE "%'.$_REQUEST['site'].'%" ';
}
if(isset($_REQUEST['brand']) and $_REQUEST['brand']!=""){
    $condition	.=	' AND brand LIKE "%'.$_REQUEST['brand'].'%" ';
}

if(isset($_REQUEST['model']) and $_REQUEST['model']!=""){
    $condition	.=	' AND model LIKE "%'.$_REQUEST['model'].'%" ';
}

if(isset($_REQUEST['serial']) and $_REQUEST['serial']!=""){
    $condition	.=	' AND serial LIKE "%'.$_REQUEST['serial'].'%" ';
}


//Main queries
$pages->default_ipp	=	10;
$sql 	= $db->getRecFrmQry("SELECT * FROM logfile WHERE 1 ".$condition."");
$pages->items_total	=	count($sql);
$pages->mid_range	=	9;
$pages->paginate();

$userData	=   $db->getRecFrmQry("SELECT * FROM logfile WHERE 1 ".$condition." ORDER BY logtime DESC ".$pages->limit."");

?>

<style>
    /* unvisited link */
    a:link {
        color: Grey;
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

    .btn-space {
        margin-right: 10px;
    }
</style>



<div class="container-fluid pt-3">

    <p class = "navleft"> <i class="fas fa-home">  </i><a href="../assets/asset-page.php"> Home > Log File</p>

    <div class="card">

        <div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse Log File / History</strong> <a href="../assets/asset-page.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Exit</a></div>

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

                <h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find Asset History</h5>

                <form method="get">

                    <div class="row">

                        <div class="col-sm-2">

                            <div class="form-group">

                                <label>Asset Number</label>

                                <input type="text" name="assetNo" id="assetNo" class="form-control" value="<?php echo isset($_REQUEST['assetNo'])?$_REQUEST['assetNo']:''?>" placeholder="Enter Asset Number">

                            </div>

                        </div>

                        <div class="col-sm-2">

                            <div class="form-group">

                                <label>Site</label>

                                <input type="text" name="site" id="site" class="form-control" value="<?php echo isset($_REQUEST['site'])?$_REQUEST['site']:''?>" placeholder="Site Name">

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

                                <label>Serial No.</label>

                                <input type="text" name="serial" id="serial" class="form-control" value="<?php echo isset($_REQUEST['serial'])?$_REQUEST['serial']:''?>" placeholder="Serial No.">

                            </div>

                        </div>

                        <div class="col-sm-2">

                            <div class="form-group">

                                <label>User Name</label>

                                <input type="text" name="user" id="user" class="form-control" value="<?php echo isset($_REQUEST['user'])?$_REQUEST['user']:''?>" placeholder="User Name">
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


    <div class="container-fluid">

        <table class="table display table-striped table-bordered">
            <thead>
            <tr class="bg-primary text-white">
                <th  style="white-space:nowrap">Sr#</th>
                <th style="white-space:nowrap">Asset Number</th>
                <th style="white-space:nowrap">Log Time</th>
                <th style="white-space:nowrap">Site</th>
                <th style="white-space:nowrap">Brand</th>
                <th style="white-space:nowrap">Model</th>
                <th style="white-space:nowrap">Serial</th>
                <th style="white-space:nowrap">Username</th>
                <th style="white-space:nowrap">Reason</th>
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
                        <td style="white-space:nowrap"><?php echo $s;?></td>
                        <td style="white-space:nowrap"><?php echo $val['assetNo'];?></td>
                        <td style="white-space:nowrap"><?php echo $val['logtime'];?></td>
                        <td style="white-space:nowrap"><?php echo $val['site'];?></td>
                        <td style="white-space:nowrap"><?php echo $val['brand'];?></td>
                        <td style="white-space:nowrap"><?php echo $val['model'];?></td>
                        <td style="white-space:nowrap"><?php echo $val['serial'];?></td>
                        <td style="white-space:nowrap"><?php echo $val['username'];?></td>
                        <td style="white-space:nowrap"><?php echo $val['reason'];?></td>
                        <td align="center" style="white-space:nowrap" >
<!--                            <a href="edit-it.php?editId=--><?php //echo $val['id'];?><!--" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a>|-->
                            <a href="delete.php?delId=<?php echo $val['id'];?>" class="text-danger" ><i class="fa fa-fw fa-trash"></i> Delete</a>
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