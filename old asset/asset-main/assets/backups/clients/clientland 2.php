<?php include "../../../includes/header.php" ;?>



<?php  include "../../../includes/navigation.php"; ?>




    
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>


 <style type="text/css">
        .wrapper{
            width: 80%;
            margin: 0 auto;
        }
</style> 
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="header clearfix">
                        <h2 class="pull-left">Client Details</h2>
                       <br>
                    
                    </div>
                  <div class="center">
                     <a href="addclient.php" class="add btn btn-success ">Add New Client</a>
                     <a href="../../sites.php" class="btn btn-default">Back</a>
                  </div>
                  
                
                    <?php
                    // Include config file
                    require_once "../../../includes/config.php";
                  
                  
                  $per_page_record = 5;  // Number of entries to show in a page.   
                    // Look for a GET variable page if not found default is 1.        
                    if (isset($_GET["page"])) {    
                          $page  = $_GET["page"];    
                     }    
                     else {    
                           $page=1;    
                     }    
                  
                  
                   $start_from = ($page-1) * $per_page_record; 
                  
                  
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM client";
                    if($result = mysqli_query($link, $sql)){
                      
                        
            // Display each field of the records.    
                      
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='display table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Client Company Name</th>";
                                        echo "<th>Main Contact</th>";
                                        echo "<th>Head Office State</th>";
                                        echo "<th>Edit or Delete</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['client'] . "</td>";
                                        echo "<td>" . $row['contact'] . "</td>";
                                        echo "<td>" . $row['state'] . "</td>";
                                        echo "<td>";
                                            echo "<a  href='readclient.php?id=" . $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='far fa-eye'></span></a>";
                                            echo "<a  href='updateclient.php?id=" . $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class = 'fas fa-edit'></span></a>";
                                            echo "<a  href='deleteclient.php?id=" . $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class = 'fas fa-trash-alt'></span></a>";
                                  
                                  
                            
                                  
                                  
                                  
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
                  
                  
                    // Close connection
                    mysqli_close($link);
                  
                  
                  
                    ?>
                 
                  
                </div>
            </div>        
        </div>
    </div>
</body>
</html>