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
		<div class="grow-container">
			<h1>Dashboard Home</h1>
			Below are the items, storage places, rooms, and members in your household.
			<?php if ($action_success != null): ?>
			<div class="alert alert-success alert-dismissible alert-mrg">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php echo $action_success; ?>
			</div>
			<?php elseif ($action_fail != null): ?>
			<div class="alert alert-danger alert-dismissible alert-mrg">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php echo $action_fail; ?>
			</div>
			<?php endif; ?>
			<?php if ($user_data[0]["accountType"] == 5): ?>
			<div class="row">
				<div class="col-md-12">
					<div class="jumbotron field-space vert-pad-less">
						<span>You aren't associated with a household. Create a new household or have a household admin add you to their household.</span>
						<br>
						<button type="button" id="createHousehold" class="btn btn-primary field-space" data-toggle="modal" data-target="#dashboardModal">Create A Household</button>
					</div>
				</div>
			</div>
			<?php else: ?>
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header" data-toggle="collapse" href="#collapseItems">
							Items
							<i class="fa fa-chevron-up pull-right"></i>
						</div>
						<div id="collapseItems" class="collapse show">
							<div class="card-body">
								<div class="h-item-options">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Item</button>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal">Update Item</button>
									<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete Item(s)</button>
								</div>
								<img src="assets/images/scissors.jpg" class="h-item" data-toggle="tooltip" data-html="true" title="Item name: Scissors<br />Last Used: 4/7/2018<br />Last Used By: Dhirish<br />Location: Table">
								<img src="assets/images/cell.jpg" class="h-item" data-toggle="tooltip" data-html="true" title="Item name: Cell Phone<br />Last Used On: 4/7/2018<br />Last Used By: Dhirish<br />Location: Table">
								<img src="assets/images/bottle.jpg" class="h-item" height="150px" data-toggle="tooltip" data-html="true" title="Item name: Bottle<br />Last Used On: 4/7/2018<br />Last Used By: Dhirish<br />Location: Table">
								<img src="assets/images/pen.jpg" class="h-item" height="150px" data-toggle="tooltip" data-html="true" title="Item name: Pen<br />Last Used On: 4/7/2018<br />Last Used By: Dhirish<br />Location: Table">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header" data-toggle="collapse" href="#collapseStorage">
							Storage Places
							<i class="fa fa-chevron-up pull-right"></i>
						</div>
						<div id="collapseStorage" class="collapse show">
							<div class="card-body">
								<div class="h-item-options">
									<button type="button" class="btn btn-primary">Add Place</button>
									<button type="button" class="btn btn-primary">Update Place</button>
									<button type="button" class="btn btn-danger">Delete Place(s)</button>
								</div>
								<table class="table table-striped">
									<tbody>
										<tr>
											<th>Name</th>
											<th>Room Location</th>
										</tr>
										<tr>
											<td>Table</td>
											<td>Kitchen</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header" data-toggle="collapse" href="#collapseRooms">
							Rooms
							<i class="fa fa-chevron-up pull-right"></i>
						</div>
						<div id="collapseRooms" class="collapse show">
							<div class="card-body">
								<div class="h-item-options">
									<button type="button" class="btn btn-primary">Add Room</button>
									<button type="button" class="btn btn-primary">Update Room</button>
									<button type="button" class="btn btn-danger">Delete Room(s)</button>
								</div>
								<table class="table table-striped">
									<tbody>
										<tr>
											<th>Name</th>
										</tr>
											<tr>
											<td>Kitchen</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header" data-toggle="collapse" href="#collapseMembers">
							Household Members
							<i class="fa fa-chevron-up pull-right"></i>
						</div>
							<div id="collapseMembers" class="collapse show">
							<div class="card-body">
								<div class="h-item-options">
									<button type="button" class="btn btn-primary">Add User</button>
									<button type="button" class="btn btn-danger">Remove User(s)</button>
								</div>
								<table class="table table-striped">
									<tbody>
										<tr>
											<th>Name</th>
											<th>Access Type</th>
										</tr>
										<tr>
											<td>Dummy User</td>
											<td>Household Admin</td>
										</tr>
										<tr>
											<td>Dhirish</td>
											<td>Household Member</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<!-- Modal -->
<?php echo form_open('dashboard', 'class="modal fade" id="dashboardModal" name="modalForm"'); ?>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Item</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
<?php echo form_close(); ?>
