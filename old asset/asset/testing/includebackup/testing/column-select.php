<?php 
include_once('../include/config.php');

include "../include/header.php" ;
include "../include/navigation.php"; 



?>



<script>
$(".checkbox-menu").on("change", "input[type='checkbox']", function() {
   $(this).closest("li").toggleClass("active", this.checked);
});

$(document).on('click', '.allow-focus', function (e) {
  e.stopPropagation();
});


</script>



<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" 
          id="dropdownMenu1" data-toggle="dropdown" 
          aria-haspopup="true" aria-expanded="true">
    <i class="glyphicon glyphicon-cog"></i>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu checkbox-menu allow-focus" aria-labelledby="dropdownMenu1">
  
    <li >
      <label>
        <input type="checkbox"> Cheese
      </label>
    </li>
    
    <li >
      <label>
        <input type="checkbox"> Pepperoni
      </label>
    </li>
    
    <li >
      <label>
        <input type="checkbox"> Peppers
      </label>
    </li>
    
  </ul>
</div>