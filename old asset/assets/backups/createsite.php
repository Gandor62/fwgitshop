<?php
// Include config file
require_once "config.php";

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
 
// Define variables and initialize with empty values
$client = $site = $street = $city = $state = $postcode = $department = $costcentre = $active = "";
$client_err = $site_err = $street_err = $city_err = $state_err = $postcode_err = $department_err = $costcentre_err = $active_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    // Validate client
    $input_client = trim($_POST["client"]);
    if(empty($input_client)){
        $client_err = "Please enter Clients Name or Code.";
    } else{
        $client = $input_client; 
    }
    
    
  // Validate site
    $input_site = trim($_POST["site"]);
    if(empty($input_site)){
        $site_err = "Please enter Site Name.";
    } else{
        $site = $input_site;
    }
  
  // Validate street
    $input_street = trim($_POST["street"]);
    if(empty($input_street)){
        $street_err = "Please enter street.";
    } else{
        $street = $input_street;
    }
  
   // Validate city
    $input_city = trim($_POST["city"]);
    if(empty($input_city)){
        $city_err = "Please enter city.";
    } else{
        $city = $input_city;
    }
  
 // Validate state
    $input_state = trim($_POST["state"]);
    if(empty($input_state)){
        $state_err = "Please enter city.";
    } else{
        $state = $input_state;
    }
  
  
  
  // Validate postcode
    $input_postcode = trim($_POST["postcode"]);
    if(empty($input_postcode)){
        $postcode_err = "Please enter postcode.";
    } else{
        $postcode = $input_postcode;
    }
  
  
  
  // Validate Department
    $input_department = trim($_POST["department"]);
    if(empty($input_department)){
        $department_err = "Please enter Department.";
    } else{
        $department = $input_department;
    }
  
  // Validate costcentre
    $input_costcentre = trim($_POST["costcentre"]);
    if(empty($input_costcentre)){
        $costcentre_err = "Please enter Costcode.";
    } else{
        $costcentre= $input_costcentre;
    }
  
  // Validate site active
    $input_active = trim($_POST["active"]);
    if(empty($input_active)){
        $active_err = "Please enter active.";
    } else{
        $active= $input_active;
    }
    
    
    // Check input errors before inserting in database
 
  
if(empty($client_err) && empty($site_err) && empty($street_err) && empty($city_err) && empty($state_err) && empty($postcode_err) && empty($department_err)  && empty($costcentre_err) && empty($active_err)){
       
      // Prepare an insert statement
        $sql = "INSERT INTO site (client, site, street, city, state, postcode, department, costcentre, active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_client, $param_site, $param_street,$param_city, $param_state, $param_postcode,$param_department, $param_costcentre, $param_active);
            
            // Set parameters
            $param_client = $client;
            $param_site = $site;
            $param_street = $street;
            $param_city = $city;
            $param_state = $state;
            $param_postcode = $postcode;
            $param_department = $department;
            $param_costcentre = $costcentre;
            $param_active = $active;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
          
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>


 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Site</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create New Site Record</h2>
                    </div>
                    <p>Please fill this form and submit to add client record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                     
                     
                      
                      <div class="form-group <?php echo (!empty($site_err)) ? 'has-error' : ''; ?>">
                       <label>client Name</label>
                            <textarea name="client" class="form-control"><?php echo $client; ?></textarea>
                              <span class="help-block"><?php echo $client_err;?></span>
                      </div>
                        
                
                
                      
                        <div class="form-group <?php echo (!empty($site_err)) ? 'has-error' : ''; ?>">
                            <label>Site Name</label>
                            <textarea name="site" class="form-control"><?php echo $site; ?></textarea>
                            <span class="help-block"><?php echo $site_err;?></span>
                        </div>
                      
                        <div class="form-group <?php echo (!empty($street_err)) ? 'has-error' : ''; ?>">
                            <label>Number and Street</label>
                            <input type="text" name="street" class="form-control" value="<?php echo $street; ?>">
                            <span class="help-block"><?php echo $street_err;?></span>
                        </div>
                      
                      <div class="form-group <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" value="<?php echo $city; ?>">
                            <span class="help-block"><?php echo $city_err;?></span>
                        </div>
                      
                        <div class="form-group <?php echo (!empty($state_err)) ? 'has-error' : ''; ?>">
                            <label>State</label>
                            <input type="text" name="state" class="form-control" value="<?php echo $state; ?>">
                            <span class="help-block"><?php echo $state_err;?></span>
                        </div>
                      
                      
                      
                        <div class="form-group <?php echo (!empty($postcode_err)) ? 'has-error' : ''; ?>">
                            <label>Postcode</label>
                            <textarea name="postcode" class="form-control"><?php echo $postcode; ?></textarea>
                            <span class="help-block"><?php echo $postcode_err;?></span>
                        </div>
                     
                       
                      <div class="form-group <?php echo (!empty($department_err)) ? 'has-error' : ''; ?>">
                            <label>Department</label>
                            <textarea name="department" class="form-control"><?php echo $department; ?></textarea>
                            <span class="help-block"><?php echo $department_err;?></span>
                        </div>
                      
                      
                        <div class="form-group <?php echo (!empty($costcentre_err)) ? 'has-error' : ''; ?>">
                            <label>Cost Centre</label>
                            <textarea name="costcentre" class="form-control"><?php echo $costcentre; ?></textarea>
                            <span class="help-block"><?php echo $costcentre_err;?></span>
                        </div>
                      
                      <div class="form-group <?php echo (!empty($active_err)) ? 'has-error' : ''; ?>">
                            <label>Active</label>
                            <textarea name="active" class="form-control"><?php echo $active; ?></textarea>
                            <span class="help-block"><?php echo $active_err;?></span>
                        </div>
                      
                        
                      
                      
                      
                        <input type="submit" class="btn btn-primary" value="Submit">
                       
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    
                  
                  
                  
                  
                  
                  
                  </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>