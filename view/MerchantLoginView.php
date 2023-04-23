<?php
class MerchantLoginView extends View
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
					<h5>Customer Sign In</h5>
				</div>
			  	<div class="card-body">
				    <p class="card-text">
				    	<form class="m-2" method="post">
					  		<div class="form-group m-0">
					    		<label for="InputEmail1" class="text-muted">Email address</label>
					    		<input type="text" name="m_email" class="form-control  form-control-sm rounded-pill" id="InputEmail1" aria-describedby="emailHelp" value="<?php echo @$_POST['m_email'];?>" >
					    		<font color="red">
									<?php
										if(isset($this->errors["memail_null"]))
											echo $this->errors["memail_null"];
									?>
								</font>
					 		</div>
					  		<div class="form-group">
					    		<label for="InputPassword" class="text-muted">Password</label>
					    		<input type="password" name="m_password" class="form-control  form-control-sm rounded-pill" id="InputPassword" value="<?php echo @$_POST['m_password'];?>">
					    		<font color="red">
									<?php
										if(isset($this->errors["pass_null"]))
											echo $this->errors["pass_null"];
										if(isset($this->errors["wrong_pass"]))
											echo $this->errors["wrong_pass"];
									?>
								</font>
					  		</div>

					  		<div class="text-center">
					  			<input type="submit" name="btnMerchantLogin" class="btn btn-color rounded-pill text-white" value="SIGN IN">
					  			<a href="index.php?usecase=<?= UC_HOME;?>" class="btn btn-secondary rounded-pill text-white">CANCEL</a>
					  		</div>

						</form>
				    </p>
				    <!-- <a href="index.php?usecase=<?php echo UC_REG;?>">Register</a> -->
				    <a class="text-muted" href="index.php?usecase=<?php echo UC_MERCHANT_FORGET_PASSWORD?>&user_type=1">Foget Password?</a>
				   
				    <?php 
						if(isset($this->errors["all_null"]))
							echo $this->errors["all_null"];
						if(isset($this->errors["invalid_email"]))
							echo $this->errors["invalid_email"];
					?>
			  </div>
			</div>
		</div>
		
	</div>
	
	<style>
		.login-supplier-img{
			width: 100%;
			height: 537px;
			background: url(images/login3.jpg) no-repeat center center fixed;
	      	border-top: 537px solid #f5f4f2;
	      	border-right: 1200px solid transparent;		
		}
		
		</style>	

	<?php }
}