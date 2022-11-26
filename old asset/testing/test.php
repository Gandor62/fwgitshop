<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
 
  
  /* testing */
   <div class="form-group form-row">
               	
							 <div class="col-3">
                  <label >Aquired Date  </label>	
								
							<input type="date" name="datePurchased" id="datePurchased" class="form-control form-control-sm"  value="<?php echo date('Y-m-d');?>" onchange="myFunction()">
									
							</div>
							
                <div class="form-group col"> 
									
									
									
									
									<label for="warrantyEnd">Warranty End Date  </label>
                  
                  <input type="date" name="warrantyEnd" id="warrantyEnd" class="form-control form-control-sm"  value="<?php $effectiveDate = strtotime("+12 months", strtotime(date("y-m-d")));
echo $time = date("Y-m-d", $effectiveDate);?>"  >
								</div>
							 

							 
            
						    <div class="form-group col">
                  <label>Budgeted Life End Date </label>
                  <input type="date" name="budgetEnd" id="budgetEnd" class="form-control form-control-sm"  value="<?php $effectiveDate = strtotime("+36 months", strtotime(date("y-m-d")));
echo $time = date("Y-m-d", $effectiveDate);?>"  >
						    </div>
              
  
  
  
  
  
</body>
</html>
