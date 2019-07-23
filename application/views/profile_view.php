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
									<?php
									if($empty) {
										echo 'Oops .. You have not update your profile. Click the button to update your profile.';
									?>
										<br />
										<a class="btn btn-primary" href="<?php echo site_url('profile/update_profile'); ?>">Update Profile</a>
									<?php
									} else {
										echo 'Profile found';
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
			<!-- /page content -->

