$(document).ready(function() {
	var selected_members = [];
	var selected_rooms = [];
	var selected_storage_places = [];
	var selected_items = [];
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
	
	$("input[name='roomCb']").click(function() {
		var value = $(this).attr("value");
		
		if ($(this).is(":checked")) {
			selected_rooms.push(value);
		} else {
			selected_rooms.splice($.inArray(value, selected_rooms), 1);
		}
		
		if (selected_rooms.length > 0) {
			document.getElementById("removeroom").disabled = false;
		} else {
			document.getElementById("removeroom").disabled = true;
		}
	});
	
	$("input[name='storagePlaceCb']").click(function() {
		var value = $(this).attr("value");
		
		if ($(this).is(":checked")) {
			selected_storage_places.push(value);
		} else {
			selected_storage_places.splice($.inArray(value, selected_storage_places), 1);
		}
		
		if (selected_storage_places.length > 0) {
			document.getElementById("removeplace").disabled = false;
		} else {
			document.getElementById("removeplace").disabled = true;
		}
	});
	
	$("input[name='itemCb']").click(function() {
		var value = $(this).attr("value");
		
		if ($(this).is(":checked")) {
			selected_items.push(value);
		} else {
			selected_items.splice($.inArray(value, selected_items), 1);
		}
		
		if (selected_items.length > 0) {
			document.getElementById("removeitem").disabled = false;
		} else {
			document.getElementById("removeitem").disabled = true;
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
	$("#addroom").click(function() {		
		
		var modal_title = 'Add A new room';
		var modal_body = '<table class="modal-table"><tbody><tr><td>Room Name:</td><td>' +
		'<input type="text" name="roomname" class="form-control"></td></tr>' +
		'<tr id="unameErr"></tr></tbody></table>' ;
		var modal_footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
		'<input type="hidden" name="householdId" value="' + household_id + '">'+
		'<input type="submit" name="submit" value="Add Room" class="btn btn-primary">';
			
		$("#dashboardModal .modal-dialog .modal-content .modal-header .modal-title").html(modal_title);
		$("#dashboardModal .modal-dialog .modal-content .modal-body").html(modal_body);
		$("#dashboardModal .modal-dialog .modal-content .modal-footer").html(modal_footer);
	});
	$("#addplace").click(function() {

		var accountOpts = '<option value="">(Select One)</option>';
		for (i=0; i<js_array.length; i++) {
			accountOpts = accountOpts + '<option value="'+js_array[i].roomName+'">' + js_array[i].roomName + '</options>';
		}

		var modal_title = 'Add A Place';
		var modal_body = '<table class="modal-table"><tbody><tr><td>Place Name:</td><td>' +
		'<input type="text" name="placename" class="form-control"></td></tr>' +
		'<tr id="usernameErr"></tr><tr><td>Room Name:</td><td>' +
		'<select name="accountType" class="form-control">' + accountOpts + '</select>' +
		'</td></tr><tr id="accountTypeErr"></tr></tbody></table>' +
		'<input type="hidden" name="householdId" value="' + household_id + '">';
		var modal_footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
		'<input type="submit" name="submit" value="Add Place" class="btn btn-primary">';
		
		$("#dashboardModal .modal-dialog .modal-content .modal-header .modal-title").html(modal_title);
		$("#dashboardModal .modal-dialog .modal-content .modal-body").html(modal_body);
		$("#dashboardModal .modal-dialog .modal-content .modal-footer").html(modal_footer);
	});
		$("#additem").click(function() {

		

		var modal_title = 'Add A item';
		var modal_body = '<table class="modal-table"><tbody><tr><td>Item Name:</td><td>' +
		'<input type="text" name="itemname" class="form-control"></td></tr>' +
		'<tr id="usernameErr"></tr><tr><td>Room Name:</td><td>' +
		'<input type="text" name="roomName" class="form-control"></td></tr><tr><td>Place Name:</td><td>' +
		'<input type="text" name="placename" class="form-control"></td></tr></tbody></table>'+
		'<input type="hidden" name="householdId" value="' + household_id + '">';
		var modal_footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
		'<input type="submit" name="submit" value="Add Item" class="btn btn-primary">';
		
		$("#dashboardModal .modal-dialog .modal-content .modal-header .modal-title").html(modal_title);
		$("#dashboardModal .modal-dialog .modal-content .modal-body").html(modal_body);
		$("#dashboardModal .modal-dialog .modal-content .modal-footer").html(modal_footer);
	});
		
		$("#removeroom").click(function() {
			var rooms = "";
			
			for (i=0; i<selected_rooms.length; i++) {
				if (i > 0) {
					rooms = rooms + ", " + $('.Room' + selected_rooms[i] + ' td:nth-child(1)').text();
				} else {
					rooms = rooms + $('.Room' + selected_rooms[i] + ' td:nth-child(1)').text();
				}
			}
			
			var modal_title = 'Delete Rooms(s)';
			var modal_body = '<p>Delete the following rooms in your household?</p>' +
				'<p>' + rooms + '</p><input type="hidden" name="rooms" ' +
				'value="' + selected_rooms.toString() + '">';
			var modal_footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
				'<input type="submit" name="submit" value="Delete Rooms(s)" class="btn btn-danger">';
			
			$("#dashboardModal .modal-dialog .modal-content .modal-header .modal-title").html(modal_title);
			$("#dashboardModal .modal-dialog .modal-content .modal-body").html(modal_body);
			$("#dashboardModal .modal-dialog .modal-content .modal-footer").html(modal_footer);
		});
		
		$("#removeplace").click(function() {
			var storagePlaces = "";
			
			for (i=0; i<selected_storage_places.length; i++) {
				if (i > 0) {
					storagePlaces = storagePlaces + ", " + $('.Place' + selected_storage_places[i] + ' td:nth-child(1)').text();
				} else {
					storagePlaces = storagePlaces + $('.Place' + selected_storage_places[i] + ' td:nth-child(1)').text();
				}
			}
			
			var modal_title = 'Delete Storage Place(s)';
			var modal_body = '<p>Delete the following storage places in your household?</p>' +
				'<p>' + storagePlaces + '</p><input type="hidden" name="storagePlaces" ' +
				'value="' + selected_storage_places.toString() + '">';
			var modal_footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
				'<input type="submit" name="submit" value="Delete Storage Place(s)" class="btn btn-danger">';
			
			$("#dashboardModal .modal-dialog .modal-content .modal-header .modal-title").html(modal_title);
			$("#dashboardModal .modal-dialog .modal-content .modal-body").html(modal_body);
			$("#dashboardModal .modal-dialog .modal-content .modal-footer").html(modal_footer);
		});
		
		$("#removeitem").click(function() {
			var items = "";
			
			for (i=0; i<selected_items.length; i++) {
				if (i > 0) {
					items = items + ", " + $('.Item' + selected_items[i] + ' td:nth-child(1)').text();
				} else {
					items = items + $('.Item' + selected_items[i] + ' td:nth-child(1)').text();
				}
			}
			
			var modal_title = 'Delete Item(s)';
			var modal_body = '<p>Delete the following items in your household?</p>' +
				'<p>' + items + '</p><input type="hidden" name="items" ' +
				'value="' + selected_items.toString() + '">';
			var modal_footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>' +
				'<input type="submit" name="submit" value="Delete Item(s)" class="btn btn-danger">';
			
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
		}///
		else if (document.forms["modalForm"]["submit"].value == "Add Place") {
			var input = document.forms["modalForm"]["placename"];
			
			if (input.classList.contains("border-danger")) {
				input.classList.remove("border-danger");
			}
			
			$("#placenameerr").html("");
			
			if (input.value) {
				var regex = /^[a-zA-Z0-9-_]+$/;
				
				if (!regex.test(input.value)) {
					input.classList.add("border-danger");
					$("#placenameerr").html('<td colspan="2" class="text-danger">The username may only contain alpha-numeric characters, underscores, and dashes.</td>');
					event.preventDefault();
				}
			} else {
				input.classList.add("border-danger");
				$("#placenameerr").html('<td colspan="2" class="text-danger">Username is required.</td>');
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
		} 
		///
				else if (document.forms["modalForm"]["submit"].value == "Add Item") {
			var input = document.forms["modalForm"]["itemname"];
			
			if (input.classList.contains("border-danger")) {
				input.classList.remove("border-danger");
			}
			
			$("#placenameerr").html("");
			
			if (input.value) {
				var regex = /^[a-zA-Z0-9-_]+$/;
				
				if (!regex.test(input.value)) {
					input.classList.add("border-danger");
					$("#placenameerr").html('<td colspan="2" class="text-danger">The username may only contain alpha-numeric characters, underscores, and dashes.</td>');
					event.preventDefault();
				}
			} else {
				input.classList.add("border-danger");
				$("#placenameerr").html('<td colspan="2" class="text-danger">Username is required.</td>');
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
		} 
		///
		 else if (document.forms["modalForm"]["submit"].value == "Update Member") {
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
		} else if (document.forms["modalForm"]["submit"].value == "Delete Member(s)"
			|| document.forms["modalForm"]["submit"].value == "Delete Rooms(s)"
			|| document.forms["modalForm"]["submit"].value == "Delete Storage Place(s)"
			|| document.forms["modalForm"]["submit"].value == "Delete Item(s)") {
			
		} else if (document.forms["modalForm"]["submit"].value == "Add Room")
		{var input = document.forms["modalForm"]["roomname"];

		if (input.classList.contains("border-danger")) {
			input.classList.remove("border-danger");
		}
		$("#unameErr").html("");

	}
	else {
		event.preventDefault();
	}
});
});
