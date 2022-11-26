<?php
// Include config file
require_once "../../../includes/config.php";
 
// Define variables and initialize with empty values
$client = $site = $city = $state = $department = $costcentre = $active = "";
$client_err = $site_err = $city_err = $state_err = $department_err = $costcentre_err = $active_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate client
    $input_client = trim($_POST["client"]);
    if(empty($input_client)){
        $client_err = "Please enter a client.";
    } elseif(!filter_var($input_client, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $client_err = "Please enter a valid client.";
    } else{
        $client = $input_client;
    }
    
    // Validate site 
    $input_site = trim($_POST["site"]);
    if(empty($input_site)){
        $site_err = "Please enter an site.";     
    } else{
        $site = $input_site;
    }
    
    // Validate city
    $input_city = trim($_POST["city"]);
    if(empty($input_city)){
        $city_err = "Please enter the city.";     
    } else{
        $city = $input_city;
    }
  
  // Validate state
    $input_city = trim($_POST["state"]);
    if(empty($input_city)){
        $city_err = "Please enter the State.";     
    } else{
        $state = $input_state;
    }
  
  // Validate department
    $input_department = trim($_POST["department"]);
    if(empty($input_department)){
        $department_err = "Please enter the department.";     
    } else{
        $department = $input_department;
    }
  
  // Validate costcentre
    $input_costcentre = trim($_POST["costcentre"]);
    if(empty($input_costcentre)){
        $costcentre_err = "Please enter the costcentre.";     
    } else{
        $costcentre = $input_costcentre;
    }
  
  
  // Validate active
    $input_active = trim($_POST["active"]);
    if(empty($input_city)){
        $active_err = "Please enter if Active.";     
    } else{
        $active = $input_active;
    }
    
    // Check input errors before inserting in database
    if(empty($client_err) && empty($site_err) && empty($city_err) && empty($state_err) && empty($department_err) && empty($costcentre_err) && empty($active_err)){
        // Prepare an update cityment
        $sql = "UPDATE site SET client=?, site=?, city=?, state=?, department=?, costcentre=?, active=?, WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssi", $param_client, $param_site, $param_city, $param_state, $param_department, $param_costcentre, $param_active, $param_id);
            
            // Set parameters
            $param_client = $client;
            $param_site = $site;
            $param_city = $city;
            $param_state = $state;
            $param_department = $department;
            $param_costcentre = $costcentre;
            $param_active = $active;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: displaysite.php");
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM client WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
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
                    // URL doesn't contain valid id. Redirect to error page
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
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
                      
                       <h2>Update Record</h2>
                    
                    <p>Please edit the input values and submit to update the record.</p>
                      </div>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($client_err)) ? 'has-error' : ''; ?>">
                            <label>Site Details</label>
                            <input type="text" name="client" class="form-control" value="<?php echo $client; ?>">
                            <span class="help-block"><?php echo $client_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($site_err)) ? 'has-error' : ''; ?>">
                            <label>site</label>
                            <input type="text" name="site" class="form-control" value = "<?php echo $site; ?>">
                            <span class="help-block"><?php echo $site_err;?></span>
                        </div>
                      
                        <div class="form-group <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">
                            <label>city</label>
                            <input type="text" name="city" class="form-control" value="<?php echo $city; ?>">
                            <span class="help-block"><?php echo $city_err;?></span>
                        </div>
                      
                      <div class="form-group <?php echo (!empty($state_err)) ? 'has-error' : ''; ?>">
                            <label>State</label>
                            <input type="text" name="state" class="form-control" value="<?php echo $state; ?>">
                            <span class="help-block"><?php echo $state_err;?></span>
                        </div>
                      
                      <div class="form-group <?php echo (!empty($department_err)) ? 'has-error' : ''; ?>">
                            <label>Department</label>
                            <input type="text" name="department" class="form-control" value="<?php echo $department; ?>">
                            <span class="help-block"><?php echo $department_err;?></span>
                        </div>
                      
                      <div class="form-group <?php echo (!empty($costcentre_err)) ? 'has-error' : ''; ?>">
                            <label>Costcentre</label>
                            <input type="text" name="costcentre" class="form-control" value="<?php echo $costcentre; ?>">
                            <span class="help-block"><?php echo $costcentre_err;?></span>
                        </div>
                      
                      <div class="form-group <?php echo (!empty($active_err)) ? 'has-error' : ''; ?>">
                            <label>Active Site</label>
                            <input type="text" name="active" class="form-control" value="<?php echo $active; ?>">
                            <span class="help-block"><?php echo $active_err;?></span>
                        </div>
                      
                      
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="displaysite.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
