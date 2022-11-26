<?php


/*******EDIT LINES 5-10*******/
$DB_Server = "localhost"; //MySQL Server
$DB_Username = "root"; //MySQL Username
$DB_Password = "root";             //MySQL Password
$DB_DBName = "asset";         //MySQL Database Name
$DB_TBLName = "assetdata"; //MySQL Table Name
$filename = "asset";         //File Name

/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/

$con = mysqli_connect($DbServer, $DB_Username, $DB_Password, $DB_DBName);
mysqli_select_db ($con, $DB_TBLName);
// Change character set to utf8
mysqli_set_charset($con,"utf8");

$sql = "Select * from $DB_TBLName";


//execute query
$result = @mysqli_query($con, $sql) or die("Couldn't execute query:<br>" . mysqli_error($con));
$file_ending = "xls";
//header info for browser
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$filename.xls");
header("Pragma: no-cache");
header("Expires: 0");
/*******Start of Formatting for Excel*******/
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
for ($i = 0; $i < mysqli_num_fields($result); $i++) {
    echo mysqli_fetch_field($result,$i) . "\t";
}
print("\n");
//end of printing column names
//start while loop to get data
while($row = mysqli_fetch_row($result))
{
    $schema_insert = "";
    for($j=0; $j<mysqli_num_fields($result);$j++)
    {
        if(!isset($row[$j]))
            $schema_insert .= "NULL".$sep;
        elseif ($row[$j] != "")
            $schema_insert .= "$row[$j]".$sep;
        else
            $schema_insert .= "".$sep;
    }
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
}
?>