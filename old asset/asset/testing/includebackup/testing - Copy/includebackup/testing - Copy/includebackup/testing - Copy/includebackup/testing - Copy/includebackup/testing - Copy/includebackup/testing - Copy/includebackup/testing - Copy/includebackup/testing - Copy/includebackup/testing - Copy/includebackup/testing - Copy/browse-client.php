<?php include_once('../include/config.php');
include "../include/header.php" ;
include "../include/navigation.php"; 
?>

<?php
    $condition  =   '';
    if(isset($_REQUEST['username']) and $_REQUEST['username']!=""){
        $condition  .=  ' AND username LIKE "%'.$_REQUEST['username'].'%" ';
    }
    if(isset($_REQUEST['useremail']) and $_REQUEST['useremail']!=""){
        $condition  .=  ' AND useremail LIKE "%'.$_REQUEST['useremail'].'%" ';
    }
    if(isset($_REQUEST['userphone']) and $_REQUEST['userphone']!=""){
        $condition  .=  ' AND userphone LIKE "%'.$_REQUEST['userphone'].'%" ';
    }
     
    //Main queries
    $pages->default_ipp  =   15; //total records show on per page
    $sql    = $db->getRecFrmQry("SELECT * FROM users WHERE 1 ".$condition."");
    $pages->items_total  =   count($sql);
    $pages->mid_range    =   9;
    $pages->paginate(); 
      
    $userData   =   $db->getRecFrmQry("SELECT * FROM users WHERE 1 ".$condition." ORDER BY id DESC ".$pages->limit."");
 
?>

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
        $s  =   '';
        foreach($userData as $val){
            $s++;
        ?>
        <tr>
            <td><?php echo $s;?></td>
            <td><?php echo $val['username'];?></td>
            <td><?php echo $val['useremail'];?></td>
            <td><?php echo $val['userphone'];?></td>
            <td align="center">
                <a href="edit-users.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
                <a href="delete.php?delId=<?php echo $val['id'];?>" class="text-danger"><i class="fa fa-fw fa-trash"></i> Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>