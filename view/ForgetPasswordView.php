<?php
class ForgetPasswordView extends View{
	public function displayBody(){?>
		<div class="container-fluid p-0">

		<div class="login-supplier-img">
			<div class="card merchant-card" style="width: 30rem;">
			  	<div class="card-body">
				    <h5 class="card-title">Admin Forget Password</h5>
				    <p class="card-text">
				    	<form class="m-2">
					  		<div class="form-group m-0">
					    		<label for="InputEmail1" class="text-muted">Name</label>
					    		<input type="text" name="l_email" class="form-control  form-control-sm rounded-pill" id="InputEmail1" aria-describedby="emailHelp" >
					 		</div>
					  		<div class="form-group">
					    		<label for="InputPassword" class="text-muted">Password</label>
					    		<input type="password" name="l_password" class="form-control  form-control-sm rounded-pill" id="InputPassword">
					  		</div>
					 		<div class="form-group">
					    		<label for="InputCnfPassword" class="text-muted">Confirm Password</label>
					    		<input type="password" name="l_password" class="form-control  form-control-sm rounded-pill" id="InputCnfPassword">
					  		</div>
					  		<button type="submit" class="btn btn-primary btn-block rounded-pill font-weight-bold">SIGN IN</button>
						</form>
				    </p>
			  </div>
			</div>
		</div>
		
	</div>
	
	<style>
		.login-supplier-img{
			width: 100%;
			height: 600px;
			background: url(images/login.jpg) no-repeat center center fixed;
	      	border-top: 600px solid #f5f4f2;
	      	border-right: 1200px solid transparent;		
		}
		.merchant-card{
			margin:-420px 0px 0px 460px !important;
			box-shadow: 2px 2px #ccc;
			border-radius: 20px;
		}
		/*label { font-size: 1.1em }*/

		.card-header { border-radius: 20px 20px 0px 0px !important; background:#0275d8}

		@media (min-width: 576px) {
		.merchant-card {
				margin:-475px 0px 0px 100px !important;
			}
		}

	    @media (min-width: 768px) {
	    	.merchant-card {
	    		margin:-490px 0px 0px 250px !important;
	    	}
	    }
	    @media (min-width: 992px) {
	    	.merchant-card {
	    		margin:-420px 0px 0px 460px !important;
	    	}
	    }
		</style>
<?php }
}
?>