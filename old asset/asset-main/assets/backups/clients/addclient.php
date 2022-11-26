<?php
// Include config file
require_once "../../../includes/config.php";

include "../../../includes/header.php" ;

include "../../../includes/navigation.php"; 


 
// Define variables and initialize with empty values
$client = $contact = $state = "";
$client_err = $contact_err = $state_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_client = trim($_POST["client"]);
    if(empty($input_client)){
        $client_err = "Please enter a name.";
    } elseif(!filter_var($input_client, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $client_err = "Please enter a valid name.";
    } else{
        $client = $input_client;
    }
    
    // Validate Contact
    $input_contact = trim($_POST["contact"]);
    if(empty($input_contact)){
        $contact_err = "Please enter an contact.";     
    } else{
        $contact = $input_contact;
    }
    
    // Validate State
    $input_state = trim($_POST["state"]);
    if(empty($input_state)){
        $state_err = "Please enter the State.";     
    } else{
        $state = $input_state;
    }
    
    // Check input errors before inserting in database
    if(empty($client_err) && empty($contact_err) && empty($state_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO client (client, contact, state) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_client, $param_contact, $param_state);
            
            // Set parameters
            $param_client = $client;
            $param_contact = $contact;
            $param_state = $state;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: clientland.php");
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
                        <h2>Create Client Record</h2>
                    </div>
                    <p>Please fill this form and submit to add Client record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($client_err)) ? 'has-error' : ''; ?>">
                            <label>Client Name</label>
                            <input type="text" name="client" class="form-control" value="<?php echo $client; ?>">
                            <span class="help-block"><?php echo $client_err;?></span>
                        </div>
                      
                        <div class="form-group <?php echo (!empty($contact_err)) ? 'has-error' : ''; ?>">
                            <label>Contact Name</label>
                            <textarea name="contact" class="form-control"><?php echo $contact; ?></textarea>
                            <span class="help-block"><?php echo $contact_err;?></span>
                        </div>
                      
                        <div class="form-group <?php echo (!empty($state_err)) ? 'has-error' : ''; ?>">
                            <label>State</label>
                            <input type="text" name="state" class="form-control" value="<?php echo $state; ?>">
                            <span class="help-block"><?php echo $state_err;?></span>
                        </div>
                      
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="clientland.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>