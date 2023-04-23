<?php
/**
 *
 */
class AdminLoginView extends View
{

	private $errors;
	public function __construct($errors=null)
	{
		$this->errors=$errors;
	}
	public function displayBody()
	{?>
		<div class="container-fluid p-0">

		<div class="login-supplier-img">
			<div class="card login-card" style="width: 30rem;">
				<div class="card-header login-card-header text-center">
					<h5>Admin Sign In</h5>
				</div>
			  	<div class="card-body">
				    <p class="card-text">
				    	<form class="m-2" method="post">
					  		<div class="form-group m-0">
					    		<label for="username" class="text-muted">Username</label>
					    		<input type="text" name="adminName" class="form-control  form-control-sm rounded-pill" id="username" aria-describedby="emailHelp" value="<?php echo @$_POST['adminName']?>" >
					    		<font color="red">
					    			<?php if(isset($this->errors["name_null"]))
					    			echo $this->errors["name_null"];?> 
					    		</font>
					 		</div>
					  		<div class="form-group">
					    		<label for="password" class="text-muted">Password</label>
					    		<input type="password" name="adminPassword" class="form-control  form-control-sm rounded-pill" id="password" value="<?php echo @$_POST['adminPassword']?>">
					    		<font color="red">
					    			<?php 
					    			if(isset($this->errors["pass_null"]))
					    				echo $this->errors["pass_null"];
					    			if(isset($this->errors["Wrong"]))
					    				echo $this->errors["Wrong"];?>
								</font>
					  		</div>
					  		<div class="text-center">
					  			<input type="submit" name="adminLogin" class="btn btn-color rounded-pill text-white" value="SIGN IN">
					  			<a href="index.php?usecase=<?= UC_HOME;?>" class="btn btn-secondary rounded-pill text-white">CANCEL</a>
					  		</div>
						</form>
				    </p>
				    <!-- <a href="index.php?usecase=<?php echo UC_REG;?>">Register</a> -->
				    <a class="text-muted" href="index.php?usecase=<?php echo UC_FORGOT_PASS?>&user_type=1">Foget Password?</a>
				   
				    <font color="red"> <?php 
				    if(isset($this->errors["all_null"]))
				    	echo $this->errors["all_null"];
				    if(isset($this->errors["invalid"]))
				    	echo $this->errors["invalid"];?> </font>
			  </div>
			</div>
		</div>
		
	</div>
	
	<style>
		.login-supplier-img{
			width: 100%;
			height: 540px;
			background: url(images/login3.jpg) no-repeat center center fixed;
	      	border-top: 540px solid #f5f4f2;
	      	border-right: 1200px solid transparent;		
		}
		.merchant-card{
			position: absolute;
			box-shadow: 2px 2px #ccc;
			border-radius: 20px;
			top: 28%;
			left: 34%;
		}

		.card-header { border-radius: 20px 20px 0px 0px !important; background:#0275d8}

		
		</style>	

	<?php }
}