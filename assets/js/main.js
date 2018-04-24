$(document).ready(function() {
	var selected_members = [];
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
	
	$("input[name='memberCb']").click(function() {
		var value = $(this).attr("value");
		
		if ($(this).is(":checked")) {
			selected_members.push(value);
		} else {
			selected_members.splice($.inArray(value, selected_members), 1);
		}
		
		if (selected_members.length == 1) {
			document.getElementById("updateMember").disabled = false;
		} else {
			document.getElementById("updateMember").disabled = true;
		}
		
		if (selected_members.length > 0) {
			document.getElementById("removeMembers").disabled = false;
		} else {
			document.getElementById("removeMembers").disabled = true;
		}
	});
	
	$("#addMember").click(function() {
		var accountOpts = '<option value="">(Select One)</option>';
		
		for (i=0; i<user_type_ids.length; i++) {
			accountOpts = accountOpts + '<option value="' + user_type_ids[i] + '">' + user_type_names[i] + '</options>';
		}
		
		var modal_title = 'Add A Member';
		var modal_body = '<table class="modal-table"><tbody><tr><td>Username:</td><td>' +
			'<input type="text" name="username" class="form-control"></td></tr>' +
			'<tr id="usernameErr"></tr><tr><td>Account Type:</td><td>' +
			'<select name="accountType" class="form-control">' + accountOpts + '</select>' +
			'</td></tr><tr id="accountTypeErr"></tr></tbody></table>' +
			'<input type="hidden" name="householdId" value="' + household_id + '">';
		var modal_footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
			'<input type="submit" name="submit" value="Add Member" class="btn btn-primary">';
		
		$("#dashboardModal .modal-dialog .modal-content .modal-header .modal-title").html(modal_title);
		$("#dashboardModal .modal-dialog .modal-content .modal-body").html(modal_body);
		$("#dashboardModal .modal-dialog .modal-content .modal-footer").html(modal_footer);
	});
	
	$("#updateMember").click(function() {
		var accountOpts = '';
		var accountType = $('.' + selected_members[0] + ' td:nth-child(2)').text();
		var name = $('.' + selected_members[0] + ' td:nth-child(1)').text();
		
		for (i=0; i<user_type_ids.length; i++) {
			if (accountType == user_type_names[i]) {
				accountOpts = accountOpts + '<option value="' + user_type_ids[i] + '" selected>' + user_type_names[i] + '</options>';
			} else {
				accountOpts = accountOpts + '<option value="' + user_type_ids[i] + '">' + user_type_names[i] + '</options>';
			}
		}
		
		var modal_title = 'Update A Member';
		var modal_body = '<table class="modal-table"><tbody><tr><td>Name:</td><td>' +
			name + '</td></tr><tr id="usernameErr"></tr><tr><td>Account Type:</td><td>' +
			'<select name="accountType" class="form-control">' + accountOpts + '</select>' +
			'</td></tr><tr id="accountTypeErr"></tr></tbody></table>' +
			'<input type="hidden" name="username" value="' + selected_members[0] + '">';
		var modal_footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
			'<input type="submit" name="submit" value="Update Member" class="btn btn-primary">';
		
		$("#dashboardModal .modal-dialog .modal-content .modal-header .modal-title").html(modal_title);
		$("#dashboardModal .modal-dialog .modal-content .modal-body").html(modal_body);
		$("#dashboardModal .modal-dialog .modal-content .modal-footer").html(modal_footer);
	});
	
	$("#removeMembers").click(function() {
		var names = "";
		
		for (i=0; i<selected_members.length; i++) {
			if (i > 0) {
				names = names + ", " + $('.' + selected_members[i] + ' td:nth-child(1)').text();
			} else {
				names = names + $('.' + selected_members[i] + ' td:nth-child(1)').text();
			}
		}
		
		var modal_title = 'Remove Member(s)';
		var modal_body = '<p>Remove the following members for your household?</p>' +
			'<p>' + names + '</p><input type="hidden" name="usernames" ' +
			'value="' + selected_members.toString() + '">';
		var modal_footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
			'<input type="submit" name="submit" value="Delete Member(s)" class="btn btn-danger">';
		
		$("#dashboardModal .modal-dialog .modal-content .modal-header .modal-title").html(modal_title);
		$("#dashboardModal .modal-dialog .modal-content .modal-body").html(modal_body);
		$("#dashboardModal .modal-dialog .modal-content .modal-footer").html(modal_footer);
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
		} else if (document.forms["modalForm"]["submit"].value == "Add Member") {
			var input = document.forms["modalForm"]["username"];
			
			if (input.classList.contains("border-danger")) {
				input.classList.remove("border-danger");
			}
			
			$("#usernameErr").html("");
			
			if (input.value) {
				var regex = /^[a-zA-Z0-9-_]+$/;
				
				if (!regex.test(input.value)) {
					input.classList.add("border-danger");
					$("#usernameErr").html('<td colspan="2" class="text-danger">The username may only contain alpha-numeric characters, underscores, and dashes.</td>');
					event.preventDefault();
				}
			} else {
				input.classList.add("border-danger");
				$("#usernameErr").html('<td colspan="2" class="text-danger">Username is required.</td>');
				event.preventDefault();
			}
			
			input = document.forms["modalForm"]["accountType"];
			
			if (input.classList.contains("border-danger")) {
				input.classList.remove("border-danger");
			}
			
			$("#accountTypeErr").html("");
			
			if (!input.value) {
				input.classList.add("border-danger");
				$("#accountTypeErr").html('<td colspan="2" class="text-danger">Account Type is required.</td>');
				event.preventDefault();
			}
		} else if (document.forms["modalForm"]["submit"].value == "Update Member") {
			var input = document.forms["modalForm"]["accountType"];
			
			if (input.classList.contains("border-danger")) {
				input.classList.remove("border-danger");
			}
			
			$("#accountTypeErr").html("");
			
			if (!input.value) {
				input.classList.add("border-danger");
				$("#accountTypeErr").html('<td colspan="2" class="text-danger">Account Type is required.</td>');
				event.preventDefault();
			}
		} else if (document.forms["modalForm"]["submit"].value == "Delete Member(s)") {
			
		} else {
			event.preventDefault();
		}
	});
});
