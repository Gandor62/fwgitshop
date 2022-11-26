<?php
    include("config.php");
?>

<div class="container">
    <div>
        <strong>Checked the Checkbox for Hide column</strong>
        <input type="checkbox" class="hidecol" value="name" id="col_2" />&nbsp;Name&nbsp;
        <input type="checkbox" class="hidecol" value="salary" id="col_3" />&nbsp;Salary
        <input type="checkbox" class="hidecol" value="gender" id="col_4" />&nbsp;Gender
        <input type="checkbox" class="hidecol" value="city" id="col_5" />&nbsp;City
        <input type="checkbox" class="hidecol" value="email" id="col_6" />&nbsp;Email
    </div>
    <table width="100%" id="emp_table" border="0">
        <tr class="tr_header">
            <th>S.no</th>
            <th>Name</th>
            <th>Salary</th>
            <th>Gender</th>
            <th>City</th>
            <th>Email</th>
        </tr>
        <?php

        // selecting rows
        $sql = "SELECT * FROM employee ORDER BY ID ASC";
        $result = mysqli_query($con,$sql);
        $sno = 1;

        while($fetch = mysqli_fetch_array($result)){
            $name = $fetch['emp_name'];
            $salary = $fetch['salary'];
            $gender = $fetch['gender'];
            $city = $fetch['city'];
            $email = $fetch['email'];
            ?>
            <tr>
                <td align='center'><?php echo $sno; ?></td>
                <td align='center'><?php echo $name; ?></td>
                <td align='center'><?php echo $salary; ?></td>
                <td align='center'><?php echo $gender; ?></td>
                <td align='center'><?php echo $city; ?></td>
                <td align='center'><?php echo $email; ?></td>
            </tr>
            <?php
            $sno ++;
        }
        ?>
    </table>

</div>
Script
$(document).ready(function(){

    // Checkbox click
    $(".hidecol").click(function(){

        var id = this.id;
        var splitid = id.split("_");
        var colno = splitid[1];
        var checked = true;
         
        // Checking Checkbox state
        if($(this).is(":checked")){
            checked = true;
        }else{
            checked = false;
        }
        setTimeout(function(){
            if(checked){
                $('#emp_table td:nth-child('+colno+')').hide();
                $('#emp_table th:nth-child('+colno+')').hide();
            } else{
                $('#emp_table td:nth-child('+colno+')').show();
                $('#emp_table th:nth-child('+colno+')').show();
            }

        }, 1500);

    });
});