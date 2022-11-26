<?php
// Include config file
require_once "../../../includes/config.php";
 
// Define variables and initialize with empty values
$department = "";
$dept_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate department name
    $input_department = trim($_POST["department"]);
    if(empty($input_department)){
        $dept_err = "Please enter a Department.";
    } elseif(!filter_var($input_department, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $dept_err = "Please enter a valid name.";
    } else{
        $department = $input_department;
    }
    
    
    
    // Check input errors before inserting in database
    if(empty($dept_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO department (department) VALUES (?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_department);
            
            // Set parameters
            $param_department = $department;
          
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: displaydept.php");
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
                        <h2>Create Department Record</h2>
                    </div>
                    <p>Please fill this field and submit to add Department record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($dept_err)) ? 'has-error' : ''; ?>">
                            <label>Department Name</label>
                            <input type="text" name="department" class="form-control" value="<?php echo $department; ?>">
                            <span class="help-block"><?php echo $department_err;?></span>
                        </div>
                      
                       
                      
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="displaydept.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>