<?php include "include/header.php" ;?>

<?php  include "include/navigation.php"; ?>
  
    <h1>Asset Register - Sites and Departments</h1>
    <h2>Add New Sites Page</h2>
    


<div class="container p-3 my-3 bg-dark text-white">
  <form action="/action_page.php">
    
    
   <div class="form-row">
     <div class="form-group col-md-4">
        <label for="client">Select Client</label>
        <select class="form-control" id="client">
          <option> Click to Select Client</option>
          <option>Retail First</option>
          <option>Leda</option>
          <option>Wynuum Retail</option>
          <option>QIC</option>
          <option>Lend Lease</option>
          <option>Aviation - Mackay</option>
          <option>Aviation - Cairns</option>
          <option>Aviation - Darwin</option>
          <option>Aviation - Darwin</option>    
        </select>
      </div>
    </div>
    
    <div class="form-row">
     <div class="form-group col-md-4">
      <label for="site">Site Name:</label>
      <input type="text" class="form-control" placeholder="Enter Site Name" id="site">
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
            <label for="postcode">Postcode:</label>
            <input type="text" class="form-control" placeholder="Enter Postcode" id="postcode">
          </div>
    </div>
    
    
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="dept">Select Department</label>
        <select class="form-control" id="dept">
          <option>Click to Select Department</option>
          <option>Cleaning</option>
          <option>Security</option>
          <option>Integrated Services</option>
        </select>
      </div>
   
      <div class="form-group col-md-4">
        <label for="name">Username:</label>
        <input type="text" class="form-control" placeholder="This Data entered by" id="username">
      </div>
    </div>
      
        
      
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="cancel" class="btn btn-primary">Cancel</button>
          <a class="btn btn-primary" href="../main.php" role="button">Home</a>
    
        
  </form>

</div>


    
  <?php include "../include/footer.php" ; ?>  