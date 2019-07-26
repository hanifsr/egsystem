			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Home</h3>
						</div>
					</div>

					<div class="clearfix"></div>

					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>User</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<table id="datatable" class="table table-stripped table-bordered">
										<thead>
											<tr>
												<th>ID</th>
												<th>E-mail</th>
												<th>First Name</th>
												<th>Last Name</th>
												<th>Profile Image</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach($users as $_user) {
											?>
												<tr>
													<td><?php echo $_user->id; ?></td>
													<td><?php echo $_user->email; ?></td>
													<td><?php echo $_user->first_name; ?></td>
													<td><?php echo $_user->last_name; ?></td>
													<td><img src="<?php echo base_url(); ?>uploads/<?php echo $_user->profile_image; ?>" alt="Profile image" class="avatar"></td>
												</tr>
											<?php
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
			<!-- /page content -->

