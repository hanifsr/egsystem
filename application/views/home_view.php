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
												<th>Verified status</th>
												<th>Hash</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach($users as $user) {
											?>
												<tr>
													<td><?php echo $user->id; ?></td>
													<td><?php echo $user->email; ?></td>
													<td><?php echo $user->is_verified; ?></td>
													<td><?php echo $user->hash; ?></td>
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

