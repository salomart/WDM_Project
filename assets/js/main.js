$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip();
	
	$("#createHousehold").click(function() {
		modal_title = 'Create A Household';
		modal_body = '<table class="modal-table"><tbody><tr><td>Household Name:</td><td>' +
			'<input type="text" name="householdName" class="form-control"></td></tr>' +
			'<tr id="householdNameErr"></tr></tbody></table>';
		modal_footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
			'<input type="submit" name="submit" value="Create Household" class="btn btn-primary">';
		
		$("#dashboardModal .modal-dialog .modal-content .modal-header .modal-title").html(modal_title);
		$("#dashboardModal .modal-dialog .modal-content .modal-body").html(modal_body);
		$("#dashboardModal .modal-dialog .modal-content .modal-footer").html(modal_footer);
	});
	
	$("#dashboardModal").submit(function(event) {
		if (document.forms["modalForm"]["householdName"] != null) {
			var input = document.forms["modalForm"]["householdName"];
			
			if (input.classList.contains("border-danger")) {
				input.classList.remove("border-danger");
			}
			
			$("#householdNameErr").html("");
			
			if (input.value) {
				var regex = /^[a-zA-Z ]*$/;
				
				if (!regex.test(input.value)) {
					input.classList.add("border-danger");
					$("#householdNameErr").html('<td colspan="2" class="text-danger">Household Name may only contain letters and spaces.</td>');
					event.preventDefault();
				}
			} else {
				input.classList.add("border-danger");
				$("#householdNameErr").html('<td colspan="2" class="text-danger">Household Name is required.</td>');
				event.preventDefault();
			}
		} else {
			event.preventDefault();
		}
	});
});
