<?php 
include_once('../include/config.php');
include "../include/header.php" ;
include "../include/navigation.php";

?>

<style>
/* unvisited link */
a:link {
  color: white;
}

/* visited link */
a:visited {
  color: White;
}

/* mouse over link */
a:hover {
  color: grey;
  text-decoration:none;
}

/* selected link */
a:active {
  color: grey;
}
</style>

<div class="container">
    
<p class = "navleft"> <i class="fas fa-home">  </i> <a href="./../main.php">Home </a>><a href="../assets/sysset.php"> System Settings  </a> > Asset Register - Company Settings </a> </p>
    <h5>Add Basic Company data - to be Built - Does Nothing yet</h5>
    


<div class="container p-3 my-3 bg-dark text-white">
  <form action="/action_page.php">
    
    
   <div class="form-row">
       <div class="form-group col-md-4">
          <label for="owner">Company Name:</label>
          <input type="text" class="form-control" placeholder="Enter Site Name" id="owner">
       </div>
    
       <div class="form-group col-md-2">
          <label for="Logo">Company Logo:</label>
          <input type="text" class="form-control" placeholder="logo" id="logo">
       </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="account">Account Number:</label>
          <input type="text" class="form-control" placeholder="Account Key" id="account">
        </div>
    </div>
    
     <div class="form-row">
       <div class="form-group col-md-4">
          <label for="industry">Industry:</label>
          <input type="text" class="form-control" placeholder="Industry" id="industry">
      </div>
    </div>
    
     <div class="form-row">
        <div class="form-group col-md-4">
          <label for="country">Country:</label>
          <input type="text" class="form-control" placeholder="Country" id="country">
        </div>
    </div>
    
    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="address1">Street:</label>
      <input type="text" class="form-control" placeholder="Enter Street" id="address1">
    </div>
    </div>
    
    <div class="form-row">
           <div class="form-group col-md-4">
              <label for="address2">City</label>
              <input type="text" class="form-control" id="address2">
           </div>

           <div class="form-group col-md-2">
                <label for="state">Select State</label>
                <select class="form-control" id="state">
                  <option> Click to Select State</option> 
                  <option>ACT</option>
                  <option>NSW</option>
                  <option>NT</option>
                  <option>QLD</option>
                  <option>SA</option>
                  <option>TAS</option>
                  <option>VIC</option>
                  <option>WA</option> 
                </select>
            </div>

            <div class="form-group col-md-2">
                <label for="postcode">postcode:</label>
                <input type="text" class="form-control" placeholder="Enter Postcode" id="postcode">
            </div>
     </div>
    
     <div class="form-row">
       <div class="form-group col-md-4">
          <label for="timezone">Time Zone:</label>
          <input type="text" class="form-control" placeholder="Timezone" id="timezone">
       </div>
      </div>
    
     <div class="form-row">
       <div class="form-group col-md-4">
          <label for="contact">Primary Contact:</label>
          <input type="text" class="form-control" placeholder="Contact" id="contact">
       </div>
     </div>
    
     <div class="form-row">
       <div class="form-group col-md-4">
          <label for="phone">Phone Number:</label>
          <input type="text" class="form-control" placeholder="Timezone" id="phone">
       </div>
     </div>
    
     <div class="form-row">
       <div class="form-group col-md-4">
          <label for="email">Email Address:</label>
          <input type="text" class="form-control" placeholder="email" id="email">
       </div>
     </div>
    
     <div class="form-row">
       <div class="form-group col-md-4">
          <label for="startdate">Onboarded Date:</label>
          <input type="text" class="form-control" placeholder="startdate" id="startdate">
       </div>
     </div>
     
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="website">Company Website:</label>
          <input type="text" class="form-control" placeholder="website" id="website">
        </div>
    </div>
        
      
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="cancel" class="btn btn-primary">Cancel</button>
          <a class="btn btn-primary" href="../main.php" role="button">Home</a>
        
  </form>

</div>
</div>

    
  <?php include "../include/footer.php" ; ?>  