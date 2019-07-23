<body class="login">
	<a class="hiddenanchor" id="signup"></a>
	<a class="hiddenanchor" id="signin"></a>

	<div class="login_wrapper">
		<div class="animate form login_form">
			<section class="login_content">
				
				<form method="POST" action="<?php echo site_url('login/login_check') ?>">
					<h1>Login Form</h1>		
					<?php echo validation_errors(); ?>
					<p style="color: red;"><?php echo $this->session->flashdata('message'); ?></p>
					<div>
						<input type="email" name="email_login" placeholder="E-mail" class="form-control" required="required" />
					</div>
					<div>
						<input type="password" name="password_login" placeholder="Password" class="form-control" required="required" />
					</div>
					<div>
						<button type="submit" name="login" class="btn btn-default"><i class="fa fa-sign-in"></i> Login</button>
						<a class="reset_pass" href="#">Lost your password?</a>
					</div>
					
					<div class="clearfix"></div>

					<div class="separator">
						<p class="change_link">Don't have an account?
							<a href="#signup" class="to_register"> Create Account </a>
						</p>

						<div class="clearfix"></div>
						<br />

						<div>
							<h1><i class="fa fa-spin fa-spinner"></i> E.G System</h1>
							<p><i class="fa fa-copyright"></i> 2019 All Rights Reserved</p>
						</div>
					</div>
				</form>
			</section>
		</div>
		
		<div id="register" class="animate form registration_form">
			<section class="login_content">
				<form method="POST" action="<?php echo site_url('login/register') ?>">
					<h1>Create Account</h1>
					<?php echo validation_errors(); ?>
					<p style="color: red;"><?php echo $this->session->flashdata('message'); ?></p>
					<div>
						<input type="email" name="email_register" placeholder="E-mail" class="form-control" required="required" />
					</div>
					<div>
						<input type="password" name="password_register" placeholder="Password" class="form-control" minlength="8" maxlength="32" required="required" />
					</div>
					<div>
						<input type="password" name="password_confirm" placeholder="Confirm Password" class="form-control" minlength="8" maxlength="32" required="required" />
					</div>
					<div>
						<button type="submit" name="register" class="btn btn-default"><i class="fa fa-user"></i> Submit</button>
					</div>

					<div class="clearfix"></div>

					<div class="separator">
						<p class="change_link">Already a member?
							<a href="#signin" class="to_register"> Log in</a>
						</p>

						<div class="clearfix"></div>
						<br />

						<div>
							<h1><i class="fa fa-spin fa-spinner"></i> E.G System</h1>
							<p><i class="fa fa-copyright"></i> 2019 All Rights Reserved</p>
						</div>
					</div>
				</form>
			</section>
		</div>
	</div>