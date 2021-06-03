<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Master - Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">
	<link rel="stylesheet" href="../assets/css/loader.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
	<!-- Datetimepicker  -->
	<link rel="stylesheet" href="../assets/css/jquery.datetimepicker.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">

				<a href="../index.html" class="logo">
					<img src="../assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-bars"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar"><i class="fa fa-bars"></i></button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">

						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>

						<li style="display: none;" class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>Hizrian</h4>
												<p class="text-muted">hello@example.com</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>
										<a class="dropdown-item" href="#">My Balance</a>
										<a class="dropdown-item" href="#">Inbox</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<span class="user-level">Admin</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
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
					<ul class="nav nav-primary">
						<li class="nav-item" style="display: none;">
							<a id="getwork" href="#">
								<i class="fa fa-desktop"></i>
								<p>Dashboard</p>

							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#1">
								<i class="fa fa-laptop"></i>
								<p>Product</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="1">
								<ul class="nav nav-collapse">
									<li id="product_add">
										<a href="#">
											<span class="sub-item">Product Add</span>

										</a>

									</li>
									<li id="product_control">
										<a href="#">
											<span class="sub-item">Product Control</span>

										</a>

									</li>
									<li id="product_list" style="display: none;">
										<a href="#">
											<span class="sub-item">Product List</span>

										</a>

									</li>
									<li id="category_control">
										<a href="#">
											<span class="sub-item">Category List</span>

										</a>

									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#submenu">
								<i class="fa fa-gear"></i>
								<p>Store Element</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu">
								<ul class="nav nav-collapse">
									<li id="banner">
										<a href="#">
											<span class="sub-item">Banner</span>

										</a>

									</li>
									<li id="info">
										<a href="#">
											<span class="sub-item">Info</span>

										</a>

									</li>
									<li id="ongkir">
										<a href="#">
											<span class="sub-item">Ongkir</span>

										</a>

									</li>
									<li id="ongkir_kota">
										<a href="#">
											<span class="sub-item">Ongkir Kota</span>

										</a>

									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#info2">
								<i class="fa fa-line-chart"></i>
								<p>Information</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="info2">
								<ul class="nav nav-collapse">
									<li id="i-harian">
										<a href="#">
											<span class="sub-item">Penjualan Harian</span>

										</a>

									</li>
									<li id="i-bulanan">
										<a href="#">
											<span class="sub-item">Penjualan Bulanan</span>

										</a>

									</li>
									<li id="i-barang">
										<a href="#">
											<span class="sub-item">Penjualan Item </span>

										</a>

									</li>
								</ul>
							</div>
						</li>
						<li id="order" class="nav-item">
							<a href="#">
								<i class="fa fa-gear"></i>
								<p>Order</p>

							</a>
						</li>
						<li class="nav-item">
							<a href="logout">
								<i class="fa fa-sign-out"></i>
								<p>Logout</p>

							</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">

			</div>
		</div>
		<footer class="footer">
			<div class="container-fluid">
				<nav class="pull-left">

				</nav>
				<div class="copyright ml-auto">
					2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
				</div>
			</div>
		</footer>
	</div>


	</div>


	<!-- The Modal -->
	<div class="modal" id="myModal">
		<div class="modal-dialog" style="min-width: 70%;">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title"></h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					Modal body..
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" id="tutupmodal" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div>
	<!-- Modal End -->
	<!-- Loader -->
	<div class="loader-wrapper">
		<span class="loader"><span class="loader-inner"></span></span>
	</div>
	<!-- Loader End -->

	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>
	<!-- DatetimePicker JS -->
	<script src="../assets/js/jquery.datetimepicker.full.js"></script>

	<script type="text/javascript">
		function loadin() {
			$(".loader-wrapper").fadeIn("slow");
		}

		function loadout() {
			$(".loader-wrapper").fadeOut("slow");
		}

		function closemodal() {
			$("#tutupmodal").click();
		}
		$(window).on("load", function() {
			$(".loader-wrapper").fadeOut("slow");
		});
		$(document).ready(function() {
			$("#i-harian").click();
			$("#product_add").click(function() {
				$(".loader-wrapper").fadeIn("slow");
				$.ajax({
					url: "<?= base_url('/company/product_add') ?>",
					method: "post",
					success: function(data) {
						$(".content").html(data);
						$(".loader-wrapper").fadeOut("slow");
					}
				});


				return false;
			});
			$("#product_control").click(function() {
				$(".loader-wrapper").fadeIn("slow");
				$.ajax({
					url: "<?= base_url('/company/product_control') ?>",
					method: "post",
					success: function(data) {
						$(".content").html(data);
						$(".loader-wrapper").fadeOut("slow");
					}
				});


				return false;
			});
			$("#product_list").click(function() {
				$(".loader-wrapper").fadeIn("slow");
				$.ajax({
					url: "<?= base_url('/company/product_detail') ?>",
					method: "post",
					success: function(data) {
						$(".content").html(data);
						$(".loader-wrapper").fadeOut("slow");
					}
				});


				return false;
			});
			$("#category_control").click(function() {
				$(".loader-wrapper").fadeIn("slow");
				$.ajax({
					url: "<?= base_url('/company/category_control') ?>",
					method: "post",
					success: function(data) {
						$(".content").html(data);
						$(".loader-wrapper").fadeOut("slow");
					}
				});


				return false;
			});
			$("#banner").click(function() {
				$(".loader-wrapper").fadeIn("slow");
				$.ajax({
					url: "<?= base_url('/company/banner') ?>",
					method: "post",
					success: function(data) {
						$(".content").html(data);
						$(".loader-wrapper").fadeOut("slow");
					}
				});


				return false;
			});
			$("#info").click(function() {
				$(".loader-wrapper").fadeIn("slow");
				$.ajax({
					url: "<?= base_url('/company/info') ?>",
					method: "post",
					success: function(data) {
						$(".content").html(data);
						$(".loader-wrapper").fadeOut("slow");
					}
				});


				return false;
			});
			$("#order").click(function() {
				$(".loader-wrapper").fadeIn("slow");
				$.ajax({
					url: "<?= base_url('/company/order') ?>",
					method: "post",
					success: function(data) {
						$(".content").html(data);
						$(".loader-wrapper").fadeOut("slow");
					}
				});


				return false;
			});
			$("#ongkir").click(function() {
				$(".loader-wrapper").fadeIn("slow");
				$.ajax({
					url: "<?= base_url('/company/ongkir') ?>",
					method: "post",
					success: function(data) {
						$(".content").html(data);
						$(".loader-wrapper").fadeOut("slow");
					}
				});


				return false;
			});
			$("#ongkir_kota").click(function() {
				$(".loader-wrapper").fadeIn("slow");
				$.ajax({
					url: "<?= base_url('/company/ongkir_kota') ?>",
					method: "post",
					success: function(data) {
						$(".content").html(data);
						$(".loader-wrapper").fadeOut("slow");
					}
				});


				return false;
			});

			$("#i-barang").click(function() {
				$(".loader-wrapper").fadeIn("slow");
				$.ajax({
					url: "<?= base_url('/company/analisa_barang') ?>",
					method: "post",
					success: function(data) {
						$(".content").html(data);
						$(".loader-wrapper").fadeOut("slow");
					}
				});


				return false;
			});
			$("#i-harian").click(function() {
				$(".loader-wrapper").fadeIn("slow");
				$.ajax({
					url: "<?= base_url('/company/analisa_harian') ?>",
					method: "post",
					success: function(data) {
						$(".content").html(data);
						$(".loader-wrapper").fadeOut("slow");
					}
				});


				return false;
			});
			$("#i-bulanan").click(function() {
				$(".loader-wrapper").fadeIn("slow");
				$.ajax({
					url: "<?= base_url('/company/analisa_bulanan') ?>",
					method: "post",
					success: function(data) {
						$(".content").html(data);
						$(".loader-wrapper").fadeOut("slow");
					}
				});


				return false;
			});



		});
	</script>



</body>

</html>
