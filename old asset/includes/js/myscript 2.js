
// Data Picker Initialization
$('.datepicker').datepicker({
  inline: true
});



/*Add below code for showing column name accordingly to select box change 
 */

window.addEventListener('keydown', function(event) {
  //set default value for variable that will hold the status of keypress
  pressedEnter = false;

  //if user pressed enter, set the variable to true
  if (event.keyCode == 13)
    pressedEnter = true;

  //we want forms to disable submit for a tenth of a second only
  setTimeout(function() {
    pressedEnter = false;
  }, 100)

})

//find all forms
var forms = document.getElementsByTagName('form')

//loop through forms
for (i = 0; i < forms.length; i++) {
  //listen to submit event
  forms[i].addEventListener('submit', function(e) {
    //if user just pressed enter, stop the submit event
    if (pressedEnter == true) {
      updateLog('Form prevented from submit.')
      e.preventDefault();
      return false;
    }

    updateLog('Form submitted.')
  })
}

var log = document.getElementById('log')
updateLog = function(msg) {
  log.innerText = msg
}


$( "#myTextField" ).datepicker({
     onClose: function(){
        validate($(this).val());
     }
});

function validate(dateText){
     try {
         alert("You selected is : "+ $.datepicker.parseDate('dd/mm/yy',dateText));
         } 
     catch (e) {
         alert("invalid date");
      }
    }

function copyTextValue() {

    if(document.getElementById('purchasedDate').checked){
        let text1 = document.getElementById('purchasedDate').value;        
        document.getElementById('warrantyEnd').value = text1;
        document.getElementById('budgetEnd').value = text1;
    }
    else{
        document.getElementById('warrantyEnd').value = "";
        document.getElementById('budgetEnd').value = "";
    }    
}