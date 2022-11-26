
<?php include "../../../includes/header.php" ;?>

<?php  include "../../../includes/navigation.php"; ?>




<?php
// Include config file
require_once "../../../includes/config.php";


 
// Define variables and initialize with empty values
$client = $site = $city = $state = $department = $costcentre = $active = "";
$client_err = $site_err = $city_err = $state_err = $department_err = $costcentre_err = $active_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    // Validate client
    $input_client = trim($_POST["client"]);
    if(empty($input_client)){
        $client_err = "Please enter a client.";
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
    $input_state = trim($_POST["state"]);
    if(empty($input_state)){
        $state_err = "Please enter the state .";     
    } else{
        $state = $input_state;
    }
  
  // Validate department
    $input_department = trim($_POST["department"]);
    if(empty($input_department)){
        $department_err = "Please enter .";     
    } else{
        $department = $input_department;
    }
  
   // Validate costcentre
    $input_costcentre = trim($_POST["costcentre"]);
    if(empty($input_costcentre)){
        $costcentre_err = "Please enter ";     
    } else{
        $costcentre = $input_costcentre;
    }
  
  // Validate active
    $input_active = trim($_POST["active"]);
    if(empty($input_active)){
        $active_err = "Please enter .";     
    } else{
        $active = $input_active;
    }
  
  

  
  
    // Check input errors before inserting in database
    if(empty($client_err) && empty($site_err) && empty($city_err) && empty($state_err) && empty($department_err) && empty($costcentre_err) && empty($active_err)){
        // Prepare an insert statement
     
        $sql = "INSERT INTO site (client, site, city, state, department, costcentre, active) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_client, $param_site, $param_city = $city, $param_state, $param_department, $param_costcentre, $param_active);
            
            // Set parameters
            $param_client = $client;
            $param_site = $site;
            $param_city = $city;
            $param_state = $state;
            $param_department = $department;
            $param_costcentre = $costcentre;
            $param_active = $active;
          
          
          
          
           
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
              
              
            
 
              
                // Records created successfully. Redirect to landing page
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
}
?>
 

    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
  <div class="header">
    <h2>Create Record</h2>           
    <p>Please fill this form and submit to add employee record to the database.</p>
  </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
              
                <div class="col-md-10">
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  
                      
                   <div class="form-group" >
                      <label>Select Client's Name</label><br>
                   <?php

                      $conn = new mysqli('localhost', 'root', '', 'asset') 
                      or die ('Cannot connect to db');

                          $result = $conn->query("select id, client from client");
 
                          echo "<select class='col-md-12' name='client'>";
                          while ($row = $result->fetch_assoc()) {

                                        unset($id, $client);
                                        $id = $row['id'];
                                        $client = $row['client']; 
                                        echo '<option value="'.$client.'">'.$client.'</option>';

                           }
                          echo "</select>";
                          
                        ?> 
                        </div>
                      
                      
                      
                        <div class="form-group <?php echo (!empty($site_err)) ? 'has-error' : ''; ?>">
                            <label>Site Name</label>
                           <input type="text" name="site" class="form-control" value="<?php echo $site; ?>">
                            <span class="help-block"><?php echo $site_err;?></span>
                        </div>
                      
                        <div class="form-group <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" value="<?php echo $city; ?>">
                            <span class="help-block"><?php echo $city_err;?></span>
                        </div>
                      
                      
                     
                        <div class="form-group  <?php echo (!empty($state_err)) ? 'has-error' : ''; ?>">
                           <br>
                        
                              <label for="state" >Select State</label>
                              <select  class="form-control" id="state" name= "state">
                                <option > Click to Select State</option> 
                                <option >ACT</option>
                                <option >NSW</option>
                                <option >NT</option>
                                <option >QLD</option>
                                <option >SA</option>
                                <option >TAS</option>
                                <option >VIC</option>
                                <option >WA</option> 
                              </select>
                           

                            <span class="help-block"><?php echo $state_err;?></span>
                        </div>
                      
              
                      
                       <div class="form-group" >
                      <label>Select Department Name</label><br>
                   <?php

                      $conn = new mysqli('localhost', 'root', '', 'asset') 
                      or die ('Cannot connect to db');

                          $result = $conn->query("select id, department from department");
 
                          echo "<select class='col-md-12' name='department'>";
                          while ($row = $result->fetch_assoc()) {

                                        unset($id, $department);
                                        $id = $row['id'];
                                        $department = $row['department']; 
                                        echo '<option value="'.$department.'">'.$department.'</option>';

                           }
                          echo "</select>";
                          
                        ?> 
                        </div>
                      
                      
                        <div class="form-group <?php echo (!empty($costcentre_err)) ? 'has-error' : ''; ?>">
                            <label>Costcode</label>
                            <input type="text" name="costcentre" class="form-control" value="<?php echo $costcentre; ?>">
                            <span class="help-block"><?php echo $costcentre_err;?></span>
                        </div>
                      
                      <div class="form-group <?php echo (!empty($active_err)) ? 'has-error' : ''; ?>">
                            <label>Site Active</label>
                            <input type="text" name="active" class="form-control" value="<?php echo $active; ?>">
                            <span class="help-block"><?php echo $active_err;?></span>
                        </div>
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="displaysite.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
  <?php include "../../../includes/footer.php" ;?>
