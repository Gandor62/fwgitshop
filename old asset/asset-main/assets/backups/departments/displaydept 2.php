<?php include "../includes/header.php" ; ?>

<?php include "../includes/navigation.php"; 

require_once "../includes/config.php";?>

    <title>Dashboard</title>
    
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 10px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>


              <div class="header">
                  <h2>Department Details</h2>
                  <p>Display Screen - Update any errors here</p>
              </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  
                 
                  
                  
                    <div class="page-header clearfix">
                      
                        <a href="createdept.php" class="btn btn-success pull-right">Add New Department</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "../../../includes/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM department";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Department Name</th>";
                                       
                                       
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['department'] . "</td>";
                                       
                                        echo "<td>";
//                                             echo "<a href='readdept.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='far fa-eye'></span></a>";
                                            echo "<a href='updatedept.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class = 'fas fa-edit'></span></a>";
                                            echo "<a href='deletedept.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class = 'fas fa-trash-alt'></span></a>";
                                  
                                
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