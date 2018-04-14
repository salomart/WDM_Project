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
		<div class="main text-center">
			<h1>Dashboard Settings</h1>
			Below are the settings related to your account.
			<div>
				<table class="settings-table text-left">
					<tbody>
						<tr>
							<td>Name:</td>
							<td>
								<input class="form-control" type="text" value="Dummy User">
							</td>
						</tr>
						<tr>
							<td>Username:</td>
							<td>
								<input class="form-control" type="text" value="dummy_user">
							</td>
						</tr>
						<tr>
							<td>E-mail:</td>
							<td>
								<input class="form-control" type="text" value="dummy@user.com">
							</td>
						</tr>
						<tr>
							<td>Household Name:</td>
							<td>
								<span class="right-pad">Test Household</span>
								<input id="householdCb" type="checkbox">
								<label for="householdCb" data-toggle="tooltip" data-html="true" title="Check this to remove yourself from this household."></label>
							</td>
						</tr>
						<tr>
							<td>Account Type:</td>
							<td>Household Admin</td>
						</tr>
						<tr>
							<td>Image URL:</td>
							<td>
								<input class="form-control" type="text" value="download.png">
							</td>
						</tr>
						<tr>
							<td>New Password:</td>
							<td>
								<input class="form-control" type="password">
							</td>
						</tr>
						<tr>
							<td>Confirm New Password:</td>
							<td>
								<input class="form-control" type="password">
							</td>
						</tr>
						<tr>
							<td>Current Password:</td>
							<td>
								<input class="form-control" type="password">
							</td>
						</tr>
						<tr>
							<td colspan="2" class="text-center">
								<input type="button" class="btn btn-primary" value="Apply Changes">
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
