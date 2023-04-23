<?php
abstract class View{
	private function displayHeader() {?>
	<!DOCTYPE html>
    <html>
	<head>
		<title><?php echo (isset($_SESSION["page_title"])?$_SESSION["page_title"]:"Home")?></title>
		<link rel = "icon" type = "image/png" href = "./images/logo/logo6.png">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css">
		<script type="text/javascript" src="./jquery/jquery.min.js"></script>
		<script src="./js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="css/custom.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">		
	</head>
	<body>
		<?php if(isset($_SESSION['loginUser'])){
		$supplierDao= new RegistrationDao();
		$all_supplier = $supplierDao->getAllSupplier();
		foreach ($all_supplier as $key => $value){
			if ($_SESSION['loginUser'][0]['name'] == $value['name']){?>
			
			<div class="container-fluid bg-primary" style="margin-bottom: 70px">
        <!-- Nav bar -->
        <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background: linear-gradient(to bottom right,#009999 0%, #00cc66 100%)">
            <div class="container-fluid">
                <div class="logo ml-5">
                    <a href="index.php?usecase=<?= UC_HOME ?>">
                        <img src="images/logo/logo7.png" alt="triple_r logo" width="253px" height="70px">
                    </a>
                </div>
                <button class="navbar-toggler bg-light" data-toggle="collapse" data-target="#mynav">
                    <span class="navbar-toggler-icon" id="nav"></span>
                </button>

                <!-- Sub Nav -->
                <div class="collapse navbar-collapse" id="mynav">
                    <ul class="unst navbar-nav ml-auto py-1 mr-5">

                        <li class="nav-item"><a href="index.php?usecase=<?php echo UC_HOME?>" class="nav-link text-white mr-3">Home</a></li>
                        
                        <li class="nav-item"><a href="index.php?usecase=<?php echo UC_PROGRAM?>" class="nav-link text-white mr-3">Program</a></li>

                        <li class="nav-item">
                            <!-- Dropdown Menu -->
                            <div class="btn-group">
                                <button type="button" class="btn dropdown-toggle text-white mr-3" data-toggle="dropdown" style="font-size: 20px;margin-top: 1px">Supplier</button>

                                <div class="dropdown-menu bg-dark text-white" style="margin-top: 26px; background: linear-gradient(to bottom right,#009999 0%, #00cc66 100%);">
                                    <a class="dropdown-item text-white" href="index.php?usecase=<?php echo UC_SUPPLIER?>">View All Product</a>
                                    <a class="dropdown-item text-white" href="index.php?usecase=<?php echo UC_CREATE_PRODUCT?>&user_type=1">Create New Product</a>
                                </div>
                            </div>
                        </li>
                        
                       <li class="nav-item"><a class="nav-link text-white mr-3" href="index.php?usecase=<?php echo UC_CONTACT_US?>">Contact Us</a></li>
                        
                        <li class="nav-item">
                        	<div class="dropdown">
								  <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <img src="./images/logo/avatar2.png" width="40" height="40" style="border-radius: 50%;"></a>
								  </a>
								
								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="margin: 17px 0px 0px -20px; background: linear-gradient(to bottom right,#009999 0%, #00cc66 100%);">
								    <form method="post" name="form1" id="form1">
										 <input type="hidden" value="form1" name="form1">
											<div class="modal-body py-0">
												<p>
					                                <?php
					                                    if(isset($_SESSION["loginUser"])){
					                                        echo "<span class='text-white'>".$_SESSION["loginUser"][0]["name"]."</span>";
					                                    }else{ 
					                                        echo "User Name";
					                                    }
					                                ?>
					                            </p>
												<a class="text-white" href="index.php?usecase=<?php echo UC_SUPPLIER_UPDATE?>">Update Profile(Supplier)</a></br>

					                         <button style="margin: 10px 0px" name="btnLogout" class="btn btn-danger">Logout</button>
										</div>
									</form>
								</div>
							</div>
                        </li>
                    </ul>
                </div>
            </div><!-- Container -->
        </nav>
    </div> <!-- Nav bar End -->	
				
			<?php }
		}//foreach end
		
		$marchantDao = new RegistrationDao();
		$all_merchant = $marchantDao->getAllMerchant();
		
		foreach ($all_merchant as $key=>$value){
			if($_SESSION['loginUser'][0]['name'] == $value['name']){?>
				
	<div class="container-fluid bg-primary" style="margin-bottom: 70px">
        <!-- Nav bar -->
        <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background: linear-gradient(to bottom right,#009999 0%, #00cc66 100%)">
            <div class="container-fluid">
                <div class="logo ml-5">
                    <a href="index.php?usecase=<?php echo UC_HOME ?>">
                        <img src="images/logo/logo7.png" alt="triple_r logo" width="253px" height="70px">
                    </a>
                </div>
                <button class="navbar-toggler bg-light" data-toggle="collapse" data-target="#mynav">
                    <span class="navbar-toggler-icon" id="nav"></span>
                </button>

                <!-- Sub Nav -->
                <div class="collapse navbar-collapse" id="mynav">
                    <ul class="unst navbar-nav ml-auto py-1 mr-5">

                        <li class="nav-item"><a href="index.php?usecase=<?php echo UC_HOME?>" class="nav-link text-white mr-3">Home</a></li>
                        
                        <li class="nav-item"><a href="index.php?usecase=<?php echo UC_PROGRAM?>" class="nav-link text-white mr-3">Program</a></li>

                        <li class="nav-item">
                        	<div class="btn-group">
								<a href="#" class="nav-link text-white dropdown-toggle mr-3" data-toggle="dropdown">Customer</a>
                                <div class="dropdown-menu bg-dark text-white" style="margin-top: 26px; background: linear-gradient(to bottom right,#009999 0%, #00cc66 100%);">
                                    <a class="dropdown-item text-white" href="index.php?usecase=<?php echo UC_MERCHANT_VIEW_POST_PRODUCT?>">View Post Product</a>
                                </div>
                            </div>
                        </li>
                        
                       <li class="nav-item"><a class="nav-link text-white mr-3" href="index.php?usecase=<?php echo UC_CONTACT_US?>">Contact Us</a></li>
                        
                        <li class="nav-item">
                        	<div class="dropdown">
								  <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <img src="./images/logo/avatar2.png" width="40" height="40" style="border-radius: 50%;"></a>
								  </a>
								
								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="margin: 17px 0px 0px -20px; background: linear-gradient(to bottom right,#009999 0%, #00cc66 100%);">
								    <form method="post" name="form1" id="form1">
										 <input type="hidden" value="form1" name="form1">
											<div class="modal-body py-0">
												<p>
					                                <?php
					                                    if(isset($_SESSION["loginUser"])){

					                                        echo "<span class='text-white'>".$_SESSION["loginUser"][0]["name"]."</span>";
					                                    }else{ 
					                                        echo "User Name";
					                                    }
					                                ?>
					                            </p>
												<a href="index.php?usecase=<?php echo UC_MERCHANT_UPDATE?>" class="text-white">Update Profile(Customer)</a></br>
					
					                         <button style="margin: 10px 0px" name="btnLogout" class="btn btn-danger">Logout</button>
										</div>
									</form>
								</div>
							</div>
                        </li>
                    </ul>
                </div>
            </div><!-- Container -->
        </nav>
    </div> <!-- Nav bar End -->
				
		<?php }//if end
		}//forloop end
		
	}else{ ?>	    
	<div class="container-fluid bg-primary" style="margin-bottom: 70px">
        <!-- Nav bar -->
        <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background: linear-gradient(to bottom right,#009999 0%, #00cc66 100%);
        ;">
            <div class="container-fluid">
                <div class="logo ml-5">
                    <span>
                    <img src="images/logo/logo7.png" alt="triple_r logo" width="253px" height="70px">
                </div>
                <button class="navbar-toggler bg-light" data-toggle="collapse" data-target="#mynav">
                    <span class="navbar-toggler-icon" id="nav"></span>
                </button>

                <!-- Sub Nav -->
                <div class="collapse navbar-collapse" id="mynav">
                    <ul class="unst navbar-nav ml-auto mr-5">

                        <li class="nav-item"><a class="nav-link text-white mr-3" href="index.php?usecase=<?php echo UC_HOME?>">Home</a></li>

                        <li class="nav-item"><a class="nav-link text-white mr-3" href="index.php?usecase=<?php echo UC_PROGRAM?>">Program</a></li>

                      
                        <li class="nav-item"><a class="nav-link text-white mr-3" href="index.php?usecase=<?php echo UC_CONTACT_US?>">Contact Us</a></li>
                        <li class="nav-item">
                            <!-- Dropdown Menu -->
                            <div class="btn-group">
                                <button type="button" class="btn dropdown-toggle text-white" data-toggle="dropdown" style="font-size: 19px;margin-top: 1px">Login</button>

                                <div class="dropdown-menu bg-dark text-white" style="margin-top: 25px; background: linear-gradient(to bottom right,#009999 0%, #00cc66 100%);">
                                	<a class="dropdown-item text-white" href="index.php?usecase=<?php echo UC_ADMIN_LOGIN?>">Admin</a>
                                    <a class="dropdown-item text-white" href="index.php?usecase=<?php echo UC_SUPPLIER_LOGIN?>&user_type=1">Supplier</a>
                                    <a class="dropdown-item text-white" href="index.php?usecase=<?php echo UC_MERCHANT_LOGIN?>&user_type=2">Customer</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <!-- Dropdown Menu -->
                            <div class="btn-group">
                                <button type="button" class="btn dropdown-toggle mr-3 text-white" data-toggle="dropdown" style="font-size: 19px;margin-top: 1px">Register</button>

                                <div class="dropdown-menu bg-dark text-white" style="margin-top: 25px; background: linear-gradient(to bottom right,#009999 0%, #00cc66 100%);">
                                    <a class="dropdown-item text-white" href="index.php?usecase=<?php echo UC_REGISTER_SUPPLIER?>">Supplier</a>
                                    <a class="dropdown-item text-white" href="index.php?usecase=<?php echo UC_REGISTER_MERCHANT?>">Customer</a>
                                </div>
                            </div>
                        </li>
                       
                        </li>
                    </ul>
                </div>
            </div><!-- Container -->
        </nav>
    </div> <!-- Nav bar End --><?php }?>


<div class="modal fade" id="myModal" tabindex="-1" style="position: absolute;
   top: 10%;
   right: 0;
   bottom: 0;
   left: 40%;
   z-index: 10040;
   overflow: auto;
   overflow-y: auto;">
			<div class="modal-dialog modal-sm">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
					<h4 class="modal-title">User Info:</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					</div>
					<form method="post" name="form1" id="form1">
					 <input type="hidden" value="form1" name="form1">
						<div class="modal-body">
							<p>
                                <?php
                                    if(isset($_SESSION["loginUser"])){
                                        echo $_SESSION["loginUser"][0]["name"];
                                    }else{ 
                                        echo "User Name";
                                    }
                                ?>
                            </p>
							<a href="index.php?usecase=<?php echo UC_SUPPLIER_UPDATE?>">Update Profile(Supplier)</a></br>

                            <button style="position: relative; left: 12px; top:4px;" name="btnLogout" class="btn btn-danger">Logout</button>
						</div>
					</form>
				</div>

			</div>
		</div>

	<?php }//end of display Header

	abstract protected function displayBody();

	private function displayFooter(){?>
	
		<div class="container-fluid">
			<div class="row justify-content-between bg-dark py-2">
			    <div class="col-4 ml-5">
			      	<p class="text-white mb-0" style="font-size: 1em;"><i class="fa fa-home info mr-2"></i>  Parami Road, Yangon, Myanmar </p>
					<p class="text-white mb-0" style="font-size: 1em;"><i class="fa fa-phone info mr-2"></i>  +95 9-794002963 </p>
					<p class="text-white mb-0" style="font-size: 1em;"><i class="fa fa-envelope-o info mr-2"></i>  www.ictti.site</p>
			    </div>
			    <div class="col-4">
			      <p class="eng text-white mt-3 pt-2" align="right" style="font-size: 1em;">Copy &copy; 2019 Develop and Maintain by ICTTI</p>
			    </div>
			  </div>
		</div>
		
		
        <style>
        .login-bg-img{
            width: 100%;
            height: 500px;
            background: url(assets/imgs/16.jpg) no-repeat center center ;       
        }
        p{
            margin: 0px 0 8px 0 !important;
        }

        .dropdown-item:hover{
        	 background: linear-gradient(to bottom right,#009999 0%, #00cc66 100%)!important;
        }
        
        .btn-color {
        	background: linear-gradient(to bottom right,#009999 0%, #00cc66 100%);
            color: #fff;	
        }
        </style>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="jquery/jquery.min.js"></script>
		
		
	</body>
</html>


	<?php }
	public function display() {
		$this->displayHeader();
		$this->displayBody();
		$this->displayFooter();
	}
}
