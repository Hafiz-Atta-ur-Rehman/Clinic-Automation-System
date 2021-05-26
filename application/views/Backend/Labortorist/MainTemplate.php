<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Ready Bootstrap Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="<?= base_url('lab_assets/css/ready.css') ?>">
	<link rel="stylesheet" href="<?= base_url('lab_assets/css/demo.css') ?>">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/sc-2.0.3/sp-1.2.2/datatables.min.css"/>
	@provide(links)
</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="index.html" class="logo">
					Ready Dashboard
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">

					<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="Search ..." class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>
					</form>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-envelope"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification">3</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													New user registered
												</span>
												<span class="time">5 minutes ago</span>
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
											<div class="notif-content">
												<span class="block">
													Rahmad commented on Admin
												</span>
												<span class="time">12 minutes ago</span>
											</div>
										</a>
										<a href="#">
											<div class="notif-img">
												<img src="<?= base_url('lab_assets/img/profile2.jpg') ?>" alt="Img Profile">
											</div>
											<div class="notif-content">
												<span class="block">
													Reza send messages to you
												</span>
												<span class="time">12 minutes ago</span>
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-danger"> <i class="la la-heart"></i> </div>
											<div class="notif-content">
												<span class="block">
													Farrah liked Admin
												</span>
												<span class="time">17 minutes ago</span>
											</div>
										</a>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="<?= base_url('lab_assets/img/profile.jpg') ?>" alt="user-img" width="36" class="img-circle"><span>Hizrian</span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="<?= base_url('lab_assets/img/profile.jpg') ?>" alt="user"></div>
										<div class="u-text">
											<h4>Hizrian</h4>
											<p class="text-muted">hello@themekita.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
										</div>
									</div>
								</li>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
								<a class="dropdown-item" href="#"></i> My Balance</a>
								<a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?= site_url('index.php/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a>
							</ul>
							<!-- /.dropdown-user -->
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="sidebar">
			<div class="scrollbar-inner sidebar-wrapper">
				<div class="user">
					<div class="photo">
						<img src="<?= base_url('lab_assets/img/profile.jpg') ?>">
					</div>
					<div class="info">
						<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
							<span>
								Hizrian
								<span class="user-level">Administrator</span>
								<span class="caret"></span>
							</span>
						</a>
						<div class="clearfix"></div>

						<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
							<ul class="nav">
								<li>
									<a href="#profile">
										<span class="link-collapse">My Profile</span>
									</a>
								</li>
								<li>
									<a href="#edit">
										<span class="link-collapse">Edit Profile</span>
									</a>
								</li>
								<li>
									<a href="#settings">
										<span class="link-collapse">Settings</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<ul class="nav">
					<li class="nav-item @provide(dashboardselected)">
						<a href="<?= base_url('index.php/lab/dashboard');?>">
							<i class="la la-dashboard"></i>
							<p>Dashboard</p>
							<span class="badge badge-count">5</span>
						</a>
					</li>

					<li class="nav-item @provide(pathologyselected)">
						<a href="<?= base_url('index.php/lab/pathology_report');?>">
						<i class="la la-fonticons"></i>
							<p>Report</p>
							<span class="badge badge-count">5</span>
						</a>
					</li>

					<li class="nav-item @provide(payrolllistselected)">
						<a href="<?= base_url('index.php/lab/payroll');?>">
							<i class="la la-sellsy"></i>
							<p>Payroll</p>
							<span class="badge badge-count">5</span>
						</a>
					</li>

					<li class="nav-item @provide(profileselected)">
						<a href="<?= base_url('index.php/lab/profile');?>">
							<i class="la la-book"></i>
							<p>Profile</p>
							<span class="badge badge-count">5</span>
						</a>
					</li>
					
					<li class="nav-item @provide(bloodbankselected)">
						<a href="<?= base_url('index.php/lab/blood_bank');?>">
							<i class="la la-bank"></i>
							<p>Blood Bank</p>
							<span class="badge badge-success">3</span>
						</a>
					</li>
					<li class="nav-item @provide(blooddonorselected)">
						<a href="<?= base_url('index.php/lab/blood_donor');?>">
							<i class="la la-font"></i>
							<p>Blood Donor</p>
							<span class="badge badge-danger">25</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="main-panel">
			<div class="content">
				@provide(content)
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="http://www.themekita.com">
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2018, made with <i class="la la-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a>
					</div>
				</div>
			</footer>
		</div>
	</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
					<p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress development</p>
					<p>
						<b>We'll let you know when it's done</b>
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</body>
<script src=<?= base_url('lab_assets/js/core/jquery.3.2.1.min.js')?>></script>
<script src="<?= base_url('lab_assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') ?>"></script>
<script src="<?= base_url('lab_assets/js/core/popper.min.js') ?>"></script>
<script src="<?= base_url('lab_assets/js/core/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('lab_assets/js/ready.min.js') ?>"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/sc-2.0.3/sp-1.2.2/datatables.min.js"></script>
<script src="<?= base_url('lab_assets/js/plugin/chartist/chartist.min.js') ?>"></script>
<script src="<?= base_url('lab_assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') ?>"></script>
<script src="<?= base_url('lab_assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>
<script src="<?= base_url('lab_assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') ?>"></script>
<script src="<?= base_url('lab_assets/js/plugin/jquery-mapael/jquery.mapael.min.js') ?>"></script>
<script src="<?= base_url('lab_assets/js/plugin/jquery-mapael/maps/world_countries.min.js') ?>"></script>
<script src="<?= base_url('lab_assets/js/plugin/chart-circle/circles.min.js') ?>"></script>
<script src="<?= base_url('lab_assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>

<script src="<?= base_url('lab_assets/js/demo.js') ?>"></script>

@provide(scripts)
</html>