			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Profile</h3>
						</div>
					</div>

					<div class="clearfix"></div>

					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Personal Information</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
										<div class="profile_img">
											<div id="crop-avatar">
												<!-- Current avatar -->
												<img class="img-responsive avatar-view" src="<?php echo base_url(); ?>uploads/<?php echo $user->profile_image; ?>" alt="Avatar">
											</div>
										</div>
										<br />
										<a class="btn btn-success" href="<?php echo site_url('profile/update_profile'); ?>"><i class="fa fa-edit m-right-xs"></i> Update Profile</a>
									</div>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<label for="first-name">First Name</label>
										<p><?php echo $user->first_name; ?></p>
										<label for="last-name">Last Name</label>
										<p><?php echo $user->last_name; ?></p>
										<label for="email">E-mail</label>
										<p><?php echo $user->email; ?></p>
										<label for="profile-image-name">Profile Image</label>
										<p><?php echo $user->profile_image; ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
			<!-- /page content -->

