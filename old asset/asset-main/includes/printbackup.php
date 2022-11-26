<!DOCTYPE html>
<?php
require 'conn.php';
?>
<html lang="en">
<head>
    <style>

        .UpperTitle
        {
            text-align: center;
            padding: 20px 0;
            background-color: #CEDEF4;
            font-weight:bold;
            color: #224499;
            border-radius: 10px;
            position: relative;
        }
        .UpperTitle img { position: absolute; left: 15px; top: 15px; }
        .table {
            width: 100%;
            margin-bottom: 10px;


        }

        .table-striped tbody > tr:nth-child(odd) > td,
        .table-striped tbody > tr:nth-child(odd) > th {
            background-color: lightgrey;

        }

        @media print{
            #print {
                display:none;
            }
        }
        @media print {
            #PrintButton {
                display: none;
            }
        }

        @page {
            size: auto;   /* auto is the initial value */
            margin: 0;  /* this affects the margin in the printer settings */
        }

        table {
            border-collapse: collapse;
        }

        img {
            max-width:100px;
        }

        td,tr {
            border-bottom: 1px solid darkgrey;

        }
        th {
            border-bottom: 3px double darkgrey;
        }


    </style>
</head>
<body>
<div class ="UpperTitle">
    <img src="images/TridentLogo.jpg" alt="" class="print"/> <h2>Asset Register - Check List</h2>


    <b style="color:blue;">Date Prepared:</b>
    <?php
    $date = date("d-m-Y", strtotime("+10 HOURS"));
    echo $date;
    ?>
</div>

<table class="table table-striped" style="text-align:left ">
    <thead>
    <tr>
        <th>Asset Number</th>
        <th>Equipment Type</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Serial Number</th>
        <th>Asset Checked</th>

    </tr>

    </thead>

    <tbody>
    <hr>
    <?php
    require 'conn.php';

    //    $query = $conn->query("SELECT * FROM `assetdata`");
    //    while($fetch = $query->fetch_array()){
    $query = $conn->query("SELECT * FROM assetdata WHERE site LIKE 'Sunnybank%' AND assetType LIKE 'IT%' ORDER BY id DESC");
    while($fetch = $query->fetch_array()){
        ?>

        <tr>

            <td style="text-align:left;"><?php echo $fetch['assetNo']?></td>
            <td style="text-align:left;"><?php echo $fetch['equipmentType']?></td>
            <td style="text-align:left;"><?php echo $fetch['brand']?></td>
            <td style="text-align:left;"><?php echo $fetch['model']?></td>
            <td style="text-align:left;"><?php echo $fetch['serialNo']?></td>
            <td style="text-align:center;"><?php echo "_______ Initial"?></td>
        </tr>

        <?php
    }
    ?>
    </tbody>
</table>
<center><button id="PrintButton" onclick="PrintPage()">Print</button></center>
</body>
<script type="text/javascript">
    function PrintPage() {
        window.print();
    };
    // window.addEventListener('DOMContentLoaded', (event) => {
    //     PrintPage()
    //     setTimeout(function(){ window.close() },750)
    // });
</script>
</html>