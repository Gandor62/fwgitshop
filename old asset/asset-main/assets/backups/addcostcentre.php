<?php
// Include config file
require_once "../includes/config.php";



 
// Define variables and initialize with empty values
$account = $descrition  = "";
$accountt_err = $description_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_account = trim($_POST["account"]);
    if(empty($input_account)){
        $account_err = "Please enter an Account name.";
    } elseif(!filter_var($input_account, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $account_err = "Please enter a valid Account name.";
    } else{
        $account = $input_account;
    }
    
    // Validate description
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Please enter an description.";     
    } else{
        $description = $input_description;
    }
    
    
    // Check input errors before inserting in database
    if(empty($account_err) && empty($description_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO costcode (account, description) VALUES (?,  ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_account, $param_description);
            
            // Set parameters
            $param_account = $account;
            $param_description = $description;
          
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: costland.php");
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
 
<?php
include "../../../includes/header.php" ;

include "../../../includes/navigation.php"; 
?>

   




    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  
                  <div class="header">
                        <h2 class="pull-left">Create Cost Centre Account Code</h2>
                    <p>Please fill this form and submit to add an Account record to the database.</p>
                        <a href="addcostcentre.php" class="btn btn-success pull-right">Add New Cost Centre</a>
                    </div>
                  
                  
                   
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($account_err)) ? 'has-error' : ''; ?>">
                            <label>Account Name</label>
                            <input type="text" name="account" class="form-control" value="<?php echo $account; ?>">
                            <span class="help-block"><?php echo $account_err;?></span>
                        </div>
                      
                        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                            <label>Account Description</label>
                            <input name="description" class="form-control"><?php echo $description; ?></input>
                            <span class="help-block"><?php echo $description_err;?></span>
                        </div>
                      
                        
                      
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="costland.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>