<div class="container vert-pad grow-container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="jumbotron vert-pad">
				<h2 class="text-center">Login</h2>
				<?php
				$username_extra = 'class="form-control field-space" placeholder="&#61447; Username"';
				$password_extra = 'class="form-control field-space" placeholder="&#xf023; Password"';
				$submit_extra = 'class="btn btn-primary"';
				
				if (form_error('username') != null) {
				    $username_extra = 'class="form-control field-space border-danger" placeholder="&#61447; Username"';
				}
				
				if (form_error('password') != null) {
				    $password_extra = 'class="form-control field-space border-danger" placeholder="&#xf023; Password"';
				}
				
				echo form_open('login');
				echo form_input('username', set_value('username'), $username_extra);
				echo form_error('username');
				echo form_password('password', set_value('password'), $password_extra);
				echo form_error('password');
				echo $login_error;
				?>
				<div class="text-center">
					<?php echo form_submit('submit', 'Login', $submit_extra); ?>
					<br>
					<a class="btn btn-default" href="register">Don't have an account? Register</a>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>
