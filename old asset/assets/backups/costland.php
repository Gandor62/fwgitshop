

<?php include "../includes/header.php" ;?>



<?php  include "../includes/navigation.php"; ?>

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

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  
                    <div class="header">
                        <h2 class="pull-left">Cost Centre Details</h2>
                      
                        
                    </div>
                  
                    <?php
                    // Include config file
                    require_once "../../../includes/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM costcode";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Account Number</th>";
                                        echo "<th>Description</th>";
                                        
                                       
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['account'] . "</td>";
                                        echo "<td>" . $row['description'] . "</td>";
                                      
                                        echo "<td>";
                                           
                                            echo "<a href='updateclient.php?id=" . $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class = 'fas fa-edit'></span></a>";
                                            echo "<a href='deleteclient.php?id=" . $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class = 'fas fa-trash-alt'></span></a>";
                                  
                                  
                            
                                  
                                  
                                  
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