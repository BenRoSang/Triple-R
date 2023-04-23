<?php
abstract class AdminView{

public function displayHeader(){?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title><?php echo(isset($_SESSION["page_title"])?$_SESSION["page_title"]:"Home");?></title>
<link rel = "icon" type = "image/png" href = "./images/logo/logo6.png">
<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
	type="text/css">
<link
	href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
	rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/admin.css" rel="stylesheet">
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<style>
.frmSearch {
	border: 1px solid #a8d4b1;
	background-color: #c6f7d0;
	margin: 2px 0px;
	padding: 40px;
	border-radius: 4px;
}

#country-list {
	float: left;
	list-style: none;
	margin-top: -3px;
	padding: 0;
	width: 190px;
	position: absolute;
}

#country-list li {
	padding: 10px;
	background: #f0f0f0;
	border-bottom: #bbb9b9 1px solid;
}

#country-list li:hover {
	background: #ece3d2;
	cursor: pointer;
}

#search-box {
	padding: 10px;
	border: #a8d4b1 1px solid;
	border-radius: 4px;
}
span{color:white;font-weight: 700;font-size: 15px;}
</style>
<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
</head>
<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul
			class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
			id="accordionSidebar"
			>

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
				<div class="sidebar-brand-icon">
					<img alt="" src="images/logo/logo7.png"style="width:150px ; height:40px ;">
				</div>
				</a>
			<!-- product category -->
			<li class="nav-item"><a class="nav-link"
				href="index.php?usecase=<?php echo
					UC_CAT_PRODUCT?>"> <i class="fa fa-paper-plane"></i> <span>Product
						Category</span> </a>
			</li>
			<!-- Product List -->
			<li class="nav-item"><a class="nav-link"
				href="index.php?usecase=<?php echo
					UC_ADMIN_PRODUCT?>"> <i class="fa fa-paper-plane"></i> <span>Product List</span> </a>
			</li>
			<!-- Product List -->
			
			<!-- Program Category -->
			<li class="nav-item"><a class="nav-link collapsed"
				href="index.php?usecase=<?php echo
					UC_PROGRAM_CAT?>"> <i class="fa fa-paper-plane"></i> <span>
						Programme Category</span> </a>
			</li>
			<!-- Program Category -->
			
			<!-- Admin Program Table-->
			<li class="nav-item"><a class="nav-link collapsed"
				href="index.php?usecase=<?php echo
					UC_ADMIN_PROGRAM?>"> <i class="fa fa-paper-plane"></i> <span>Programme
						List</span> </a>
			</li>
			<!-- Admin Program Table-->
			
			<!-- Merchant Table -->
			<li class="nav-item"><a class="nav-link"
				href="index.php?usecase=<?php echo
					UC_MERCHANT?>"> <i class="fas fa-fw fa-table"></i> <span>Customer
						List</span> </a>
			</li>
			<!-- Suppliers Table -->
			<li class="nav-item"><a class="nav-link"
				href="index.php?usecase=<?php echo
					UC_SUP_TABLE?>"> <i class="fas fa-fw fa-table"></i> <span>Supplier
						List</span> </a>
			</li>
						
			<!-- Suggestion List -->
			<li class="nav-item">
				<a class="nav-link" href="index.php?usecase=<?php echo
					UC_SUGGESTION?>">
					<i class="fas fa-fw fa-table"></i>
					<span>Suggestion List</span></a>
			</li>
			<!-- Log out -->
			<li class="nav-item">
				<a class="nav-link" href="index.php?usecase=<?php echo
				UC_ADMIN_LOGOUT?>">
				<i class="fas fa-sign-out-alt"></i>
				<span>Logout</span></a>
			</li>

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav
					class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<div>
						<div>
							<h1 class="h3 mb-0 text-gray-800"><?php if(isset($_SESSION["loginUser"])) echo "Welcome ".@$_SESSION["loginUser"][0]["admin_name"];

							?></h1>
						</div>
					</div>
				</nav>
				<!-- End of Topbar -->


				<?php
	}
	abstract protected function displayBody();
	public function displayFooter(){?>
				<!-- Footer -->
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; Your Website 2019</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->
			</div>
			<!-- End of Content Wrapper -->

		</div>
		<!-- End of Page Wrapper -->


		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top"> <i
			class="fas fa-angle-up"></i> </a>

		<!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="js/sb-admin-2.min.js"></script>

		<!-- Page level plugins -->
		<script src="vendor/chart.js/Chart.min.js"></script>

		<!-- Page level custom scripts -->
		<script src="js/demo/chart-area-demo.js"></script>
		<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
	<?php
	}
	public function display(){
		$this->displayHeader();
		$this->displayBody();
		$this->displayFooter();
	}
}