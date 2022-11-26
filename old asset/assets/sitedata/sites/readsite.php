<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "../../../includes/config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM site WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
               
                    $client = $row["client"];
                    $site = $row["site"];
                    $city = $row["city"];
                    $state = $row["state"];
                    $department = $row["department"];
                    $costcentre = $row["coastcentre"];
                    $active = $row["actve"];
                  
              
              
              
              
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}

include "../../../includes/header.php" ;

include "../../../includes/navigation.php"; 
?>

    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Client Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Client</label>
                        <p class="form-control-static"><?php echo $row["client"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Site</label>
                        <p class="form-control-static"><?php echo $row["site"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <p class="form-control-static"><?php echo $row["City"]; ?></p>
                    </div> 
                  
                  <div class="form-group">
                        <label>State</label>
                        <p class="form-control-static"><?php echo $row["state"]; ?></p>
                    </div> 
                  <div class="form-group">
                        <label>Department</label>
                        <p class="form-control-static"><?php echo $row["department"]; ?></p>
                    </div> 
                  <div class="form-group">
                        <label>Costcentre</label>
                        <p class="form-control-static"><?php echo $row["costcentre"]; ?></p>
                    </div> 
                  <div class="form-group">
                        <label>Active</label>
                        <p class="form-control-static"><?php echo $row["active"]; ?></p>
                    </div> 
                  
                  <h3>This area for future data display about the Site or Client contact details</h3>
                  
                    <p><a href="displaysite.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>