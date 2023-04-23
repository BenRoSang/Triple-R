<?php
class MerchantSaveView extends View
{
	private $errors;
	public function __construct($errors=null)
	{
		$this->errors=$errors;
	}
public function displayBody(){?>
<div class="container-fluid p-0">	
		<div class="col-md-6 offset-md-3">
		    <div class="card reg-card">
				<div class="card-header login-card-header">
				   	<h2 class="text-center text-white">Customer Registration</h2>
				</div>
				<div class="card-body">
				    <form class="m-2" method="post">
					 	<div class="form-group">
					    	<label for="lblmerchantname" class="text-muted">Customer Name</label>
					    	<font color="red">***</font>
					    	<input type="text" name="regName" class="form-control form-control-lg rounded-pill" id="lblsuppliername" value="<?php 
							if(isset($_SESSION["reg_user"]))
								echo $_SESSION["reg_user"]->getMerchantName();
							else
								echo @$_POST["regName"]?>">
							<font color="red">
							<?php
							if(isset($this->errors["name_null"]))
								echo $this->errors["name_null"];
							if(isset($this->errors["nameLen_null"]))
								echo $this->errors["nameLen_null"];
							?>
							</font>
					  	</div>
						<div class="form-group">
						    <label for="lbladdress" class="text-muted">Email address</label>
						    <font color="red">***</font>
						    <input type="text" name="regEmail" class="form-control form-control-lg rounded-pill" id="lbladdress" value="<?php 
							if(isset($_SESSION["reg_user"]))
								echo $_SESSION["reg_user"]->getMerchantEmail();
							else
								echo @$_POST["regEmail"]?>">
							<font color="green">eg.(xxx@gmail.com)</font>
							<font color="red">
							<?php
								if(isset($this->errors["email_null"]))
									echo $this->errors["email_null"];
									if(isset($this->errors["emailLen_null"]))
									echo $this->errors["emailLen_null"];
								if(isset($this->errors["invalid_email"]))
									echo $this->errors["invalid_email"];
							?>
							</font>
						</div>
						<div class="form-group">
						    <label for="lblphone" class="text-muted">Password</label>
						    <font color="red">***</font>
						    <input type="password" name="regPass" class="form-control form-control-lg rounded-pill" id="lblphone" value="<?php 
							if(isset($_SESSION["reg_user"]))
								echo $_SESSION["reg_user"]->getMerchantPassword();
							else
								echo @$_POST["regPass"]?>">
							<font color="red">
								<?php
								if(isset($this->errors["pass_null"]))
									echo $this->errors["pass_null"];
								if(isset($this->errors["passLen_null"]))
									echo $this->errors["passLen_null"];
								?>
								</font>
						</div>

					  	<div class="form-group">
					    	<label for="lblemail" class="text-muted">Confirm Password</label>
					    	<font color="red">***</font>
					    	<input type="password" name="regCPass" class="form-control form-control-lg rounded-pill" id="lblemail" aria-describedby="emailHelp" value="<?php 
							if(isset($_SESSION["reg_user"]))
								echo $_SESSION["reg_user"]->getMerchantPassword();
							else
								echo @$_POST["regCPass"]?>">
							<font color="red">
								<?php
								if(isset($this->errors["cpass_null"]))
									echo $this->errors["cpass_null"];
								if(isset($this->errors["cpassLen_null"]))
									echo $this->errors["cpassLen_null"];
								if(isset($this->errors["pass_notMatched"]))
									echo $this->errors["pass_notMatched"];
								?>
							</font>
					  	</div>
					 	<div class="form-group">
					    	<label for="lblpassword" class="text-muted">Phone</label>
					    	<input type="text" name="regPhone" class="form-control form-control-lg rounded-pill" id="lblpassword" value="<?php
							if(isset($_SESSION["reg_user"]))
								echo $_SESSION["reg_user"]->getMerchantPhone();
							else	
								echo @$_POST["regPhone"]?>">
							<font color="green">eg-(09-xxxxxxx,01-xxxxx,067-xxxxx)</font>
							<font color="red">
							<?php 
								if(isset($this->errors["invalid_phone"]))
									echo $this->errors["invalid_phone"];
							?>
							</font>
					  	</div>

					 	<div class="form-group">
					    	<label for="lblcnfpassword" class="text-muted">Address</label>
					    	<textarea name="regAddress" rows="3" cols="20" class="form-control" id="lblcnfpassword"><?php if(isset($_SESSION["reg_user"])) echo $_SESSION["reg_user"]->getMerchantAddress();else echo @$_POST["regAddress"]?></textarea>
					 	</div>
					  	<div class="form-group">
					  		<input type="hidden" name="regStatus" value="<?php echo @$_POST["regStatus"]=0; ?>">
					  	</div>

						<div class="text-center">
							<input type="submit" name="btnMerchantRegister" class="btn btn-color rounded-pill" value="REGISTER">
							<a href="index.php?usecase=<?= UC_HOME; ?>" class="btn btn-secondary text-white rounded-pill">CANCEL</a>
						</div>

						<?php if(isset($this->errors["all_null"]))
								echo $this->errors["all_null"];
								
							if(isset($this->errors["user_exist"]))
								echo $this->errors["user_exist"];
						?>
					</form>
				</div>
			</div>
		</div>
</div>

<?php }
}