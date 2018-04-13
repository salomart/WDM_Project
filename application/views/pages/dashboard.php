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
		<div class="main">
			<h1>Dashboard Home</h1>
			Below are the items, storage places, rooms, and members in your household.
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header" data-toggle="collapse" href="#collapseItems">
							Items
							<i class="fa fa-chevron-up pull-right"></i>
						</div>
						<div id="collapseItems" class="collapse show">
							<div class="card-body">
								<div class="h-item-top-bar">
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
								<div class="h-item-top-bar">
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
								<div class="h-item-top-bar">
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
								<div class="h-item-top-bar">
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
		</div>
	</div>
</div>
<!-- Modals -->
<div class="modal fade" id="addModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Item</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<table class="modal-table">
					<tbody>
						<tr>
							<td>Item Name:</td>
							<td>
								<input class="form-control" type="text">
							</td>
						</tr>
						<tr>
							<td>Storage Place:</td>
							<td>
								<select class="form-control">
									<option></option>
									<option>Table</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Access Type:</td>
							<td>
								<select class="form-control">
									<option></option>
									<option>Everyone</option>
									<option>Household Members</option>
									<option>Household Admins</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Image URL:</td>
							<td>
								<input class="form-control" type="text">
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Add</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="updateModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Update Item</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<table class="modal-table">
					<tbody>
						<tr>
							<td>Item Name:</td>
							<td>
								<input class="form-control" type="text" value="Scissors">
							</td>
						</tr>
						<tr>
							<td>Storage Place:</td>
							<td>
								<select class="form-control">
									<option></option>
									<option selected>Table</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Access Type:</td>
							<td>
								<select class="form-control">
									<option></option>
									<option selected>Everyone</option>
									<option>Household Members</option>
									<option>Household Admins</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Image URL:</td>
							<td>
								<input class="form-control" type="text" value="scissors.jpg">
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Update</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="deleteModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Delete Item(s)</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				Delete The Following Items?
				<ul>
					<li>Scissors</li>
					<li>Pen</li>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
			</div>
		</div>
	</div>
</div>
