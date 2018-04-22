<div class="container-fluid grow-container">
	<div class="row">
		<div class="sidebar">
			<nav class="navbar navbar-expand-sm bg-secondary">
				<a class="nav-link" href="dashboard">
					<i class="fa fa-home"></i>
					Dashboard Home
				</a>
				<a class="nav-link" href="settings">
					<i class="fa fa-cog"></i>
					Settings
				</a>
			</nav>
		</div>
		<div class="grow-container text-center">
			<h1>Dashboard Settings</h1>
			<div>Below are the settings related to your account.</div>
			<?php
			$form_extra = 'class="settings-form"';
			$name_extra = 'class="form-control"';
			$username_extra = 'class="form-control"';
			$email_extra = 'class="form-control"';
			// $image_extra = 'class="form-control"';
			$household_extra = 'id="household"';
			$password_extra = 'class="form-control"';
			$confirm_extra = 'class="form-control"';
			$submit_extra = 'class="btn btn-primary"';
			
			if (form_error('name') != null) {
			    $name_extra = 'class="form-control border-danger" data-toggle="tooltip" title="' . form_error('name') . '"';
			}
			
			if (form_error('username') != null) {
			    $username_extra = 'class="form-control border-danger" data-toggle="tooltip" title="' . form_error('username') . '"';
			}
			
			if (form_error('email') != null) {
			    $email_extra = 'class="form-control border-danger" data-toggle="tooltip" title="' . form_error('email') . '"';
			}
			
			if (form_error('password') != null) {
			    $password_extra = 'class="form-control border-danger" data-toggle="tooltip" title="' . form_error('password') . '"';
			}
			
			if (form_error('confirm') != null) {
			    $confirm_extra = 'class="form-control border-danger" data-toggle="tooltip" title="' . form_error('confirm') . '"';
			}
			
			echo form_open('settings', $form_extra);
			if ($update_success):
			?>
			<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Changes were applied successfully.
			</div>
			<?php elseif($update_fail): ?>
			<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Changes were apllied successfully.
			</div>
			<?php endif; ?>
			<div class="form-row">
				<span>Name:</span>
				<?php echo form_input('name', set_value('name') != null ? set_value('name') : $user_data[0]["name"], $name_extra); ?>
				
			</div>
			<div class="form-row">
				<span>Username:</span>
				<?php echo form_input('username', set_value('username') != null ? set_value('username') : $user_data[0]["username"], $username_extra); ?>
			</div>
			<div class="form-row">
				<span>E-mail:</span>
				<?php echo form_input('email', set_value('email') != null ? set_value('email') : $user_data[0]["email"], $email_extra); ?>
			</div>
			<div class="form-row">
				<span>Household Name:</span>
				<span><?php echo $user_data[0]["householdName"] != null ? $user_data[0]["householdName"] : "N/A"; ?></span>
				<?php echo form_checkbox('removeHousehold', 'remove', FALSE, 'id="removeHousehold"'); ?>
				<label for="removeHousehold" data-toggle="tooltip" data-html="true" title="Check this to remove yourself from this household."></label>
			</div>
			<div class="form-row">
				<span>Account Type:</span>
				<span><?php echo $user_data[0]["typeName"] != null ? $user_data[0]["typeName"] : "N/A"; ?></span>
			</div>
			<!-- <div class="form-row">
				<span>User Image:</span>
				<?php echo form_upload('image', '', $image_extra); ?>
				<?php echo form_checkbox('deleteImage', 'remove', FALSE, 'id="deleteImage"'); ?>
				<label for="deleteImage" data-toggle="tooltip" data-html="true" title="Check this to remove a saved image."></label>
			</div> -->
			<div class="form-row">
				<span>New Password:</span>
				<?php echo form_password('password', '', $password_extra); ?>
			</div>
			<div class="form-row">
				<span>Confirm New Password:</span>
				<?php echo form_password('confirm', '', $confirm_extra); ?>
			</div>
			<div class="form-row text-center">
				<?php echo form_submit('submit', 'Apply Changes', $submit_extra); ?>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
