$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip();
	
	$("#createHousehold").click(function() {
		var modal_title = 'Create A Household';
		var modal_body = '<table class="modal-table"><tbody><tr><td>Household Name:</td><td>' +
			'<input type="text" name="householdName" class="form-control"></td></tr>' +
			'<tr id="householdNameErr"></tr></tbody></table>';
		var modal_footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
			'<input type="submit" name="submit" value="Create Household" class="btn btn-primary">';
		
		$("#dashboardModal .modal-dialog .modal-content .modal-header .modal-title").html(modal_title);
		$("#dashboardModal .modal-dialog .modal-content .modal-body").html(modal_body);
		$("#dashboardModal .modal-dialog .modal-content .modal-footer").html(modal_footer);
	});
	
	$(".card-header").click(function() {
		if ($(this).children("i:first").hasClass("fa-chevron-up")) {
			$(this).children("i:first").removeClass("fa-chevron-up");
			$(this).children("i:first").addClass("fa-chevron-down");
		} else {
			$(this).children("i:first").removeClass("fa-chevron-down");
			$(this).children("i:first").addClass("fa-chevron-up");
		}
	});
	
	$("#dashboardModal").submit(function(event) {
		if (document.forms["modalForm"]["submit"].value == "Create Household") {
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
