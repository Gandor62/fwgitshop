<?php  include "includes/db.php"; ?>

<?php require "includes/header.php" ;?>

<?php  include "includes/navigation.php"; ?>
    
    
 <?php if($connection) {

echo "We are connected to the Asset Database";

}
?>   
    
    
    <h1>Asset Register - Mobility</h1>
    <h2>Mobility Data</h2>
    <p>Bootstrap mobility system goes in here</p>


<div class="container">

    <a href='../assets/newmobile.php' class="btn btn-primary btn-lg title-button">New Mobility Data </a>
    <button type="button" class="btn btn-primary btn-lg title-button">Reports </button>
   <a href='../assets/sysset.php' class="btn btn-primary btn-lg title-button">System Settings </a>
    <button type="button" class="btn btn-primary btn-lg title-button disabled">Not used yet </button>
    <p style="clear:both"></p>
    
</div>


    
  <?php include "includes/footer.php" ; ?>  