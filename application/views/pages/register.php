<div class="container vert-pad grow-container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="jumbotron vert-pad">
				<h2 class="text-center">Register</h2>
				<?php
				$name_extra = 'class="form-control field-space" placeholder="&#xf2bb; Name"';
				$username_extra = 'class="form-control field-space" placeholder="&#61447; Username"';
				$email_extra = 'class="form-control field-space" placeholder="&#xf0e0; E-mail"';
				$password_extra = 'class="form-control field-space" placeholder="&#xf023; Password"';
				$confirm_extra = 'class="form-control field-space" placeholder="&#xf023; Confirm Password"';
				$submit_extra = 'class="btn btn-primary"';
				
				if (form_error('name') != null) {
				    $name_extra = 'class="form-control field-space border-danger" placeholder="&#xf2bb; Name"';
				}
				
				if (form_error('username') != null) {
				    $username_extra = 'class="form-control field-space border-danger" placeholder="&#61447; Username"';
				}
				
				if (form_error('email') != null) {
				    $email_extra = 'class="form-control field-space border-danger" placeholder="&#xf0e0; E-mail"';
				}
				
				if (form_error('password') != null) {
				    $password_extra = 'class="form-control field-space border-danger" placeholder="&#xf023; Password"';
				}
				
				if (form_error('confirm') != null) {
				    $confirm_extra = 'class="form-control field-space border-danger" placeholder="&#xf023; Confirm Password"';
				}
				
				echo form_open('register');
				echo form_input('name', set_value('name'), $name_extra);
				echo form_error('name');
				echo form_input('username', set_value('username'), $username_extra);
				echo form_error('username');
				echo form_input('email', set_value('email'), $email_extra);
				echo form_error('email');
				echo form_password('password', set_value('password'), $password_extra);
				echo form_error('password');
				echo form_password('confirm', set_value('confirm'), $confirm_extra);
				echo form_error('confirm');
				?>
				<div class="text-center">
					<?php echo form_submit('submit', 'Register', $submit_extra); ?>
					<br>
					<a class="btn btn-default" href="login">Have an account? Login</a>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>
