<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="<?php echo site_url('home'); ?>" class="site_title"><i class="fa fa-spin fa-spinner"></i> <span>E.G System</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="<?php echo base_url(); ?>uploads/<?php echo $user->profile_image; ?>" alt="User profile image" class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2><?php echo $user->first_name; ?></h2>
						</div>
						<div class="clearfix"></div>
					</div>
					<!-- /menu profile quick info -->
					
					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>Menu</h3>
							<ul class="nav side-menu">
								<li><a href="<?php echo site_url('home'); ?>"><i class="fa fa-home"></i> Home</a></li>
								<li><a href="<?php echo site_url('profile'); ?>"><i class="fa fa-user"></i> Profile</a></li>
								<li><a href="<?php echo site_url('login/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
							</ul>
						</div>
					</div>
					<!-- /sidebar menu -->
				</div>
			</div>

