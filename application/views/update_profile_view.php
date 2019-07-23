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
									<h2>Update Profile</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<form action="<?php echo site_url('profile/update_user_profile'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
										<div class="form-group">
											<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">First Name <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input type="text" name="first_name" class="form-control col-md-7 col-xs-12" required="required" />
											</div>
										</div>
										<div class="form-group">
											<label for="last-name" class="control-label col-md-3 col-sm-3 col-xs-12">Last Name <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input type="text" name="last_name" class="form-control col-md-7 col-xs-12" required="required" />
											</div>
										</div>
										<div class="form-group">
											<label for="profile-image" class="control-label col-md-3 col-sm-3 col-xs-12">Profile Image <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input type="file" name="profile_image" required="required" />
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="form-group">
											<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
												<button type="button" class="btn btn-danger">Cancel</button>
												<button type="reset" class="btn btn-default">Reset</button>
												<button type="submit" class="btn btn-success">Update</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
			<!-- /page content -->

