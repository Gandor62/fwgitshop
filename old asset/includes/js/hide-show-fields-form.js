$("#seeAnotherField").change(function() {
			if ($(this).val() == "yes") {
				$('#otherFieldDiv').show();
				$('#otherField').attr('required','');
				$('#otherField').attr('data-error', 'This field is required.');
			} else {
				$('#otherFieldDiv').hide();
				$('#otherField').removeAttr('required');
				$('#otherField').removeAttr('data-error');				
			}
		});
		$("#seeAnotherField").trigger("change");
		
$("#seeAnotherFieldGroup").change(function() {
			if ($(this).val() == "yes") {
				$('#otherFieldGroupDiv').show();
				$('#otherField1').attr('required','');
				$('#otherField1').attr('data-error', 'This field is required.');
        $('#otherField2').attr('required','');
				$('#otherField2').attr('data-error', 'This field is required.');
				$('#otherField3').attr('required','');
				$('#otherField3').attr('data-error', 'This field is required.');
        $('#otherField4').attr('required','');
				$('#otherField4').attr('data-error', 'This field is required.');
				$('#otherField5').attr('required','');
				$('#otherField5').attr('data-error', 'This field is required.');
			} else {
				$('#otherFieldGroupDiv').hide();
				$('#otherField1').removeAttr('required');
				$('#otherField1').removeAttr('data-error');
        $('#otherField2').removeAttr('required');
				$('#otherField2').removeAttr('data-error');	
				$('#otherField3').removeAttr('required');
				$('#otherField3').removeAttr('data-error');	
				$('#otherField4').removeAttr('required');
				$('#otherField4').removeAttr('data-error');	
				$('#otherField5').removeAttr('required');
				$('#otherField5').removeAttr('data-error');	
			}
		});
		$("#seeAnotherFieldGroup").trigger("change");


$("#seeAnotherFieldGroupb").change(function() {
			if ($(this).val() == "yes") {
				$('#otherFieldGroupDivb').show();
				$('#otherField1b').attr('required','');
				$('#otherField1b').attr('data-error', 'This field is required.');
        $('#otherField2b').attr('required','');
				$('#otherField2b').attr('data-error', 'This field is required.');
				$('#otherField3b').attr('required','');
				$('#otherField3b').attr('data-error', 'This field is required.');
        $('#otherField4b').attr('required','');
				$('#otherField4b').attr('data-error', 'This field is required.');
				$('#otherField5b').attr('required','');
				$('#otherField5b').attr('data-error', 'This field is required.');
			} else {
				$('#otherFieldGroupDivb').hide();
				$('#otherField1b').removeAttr('required');
				$('#otherField1b').removeAttr('data-error');
        $('#otherField2b').removeAttr('required');
				$('#otherField2b').removeAttr('data-error');	
				$('#otherField3b').removeAttr('required');
				$('#otherField3b').removeAttr('data-error');	
				$('#otherField4b').removeAttr('required');
				$('#otherField4b').removeAttr('data-error');	
				$('#otherField5b').removeAttr('required');
				$('#otherField5b').removeAttr('data-error');	
			}
		});
		$("#seeAnotherFieldGroupb").trigger("change");