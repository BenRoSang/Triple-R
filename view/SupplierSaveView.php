<?php
class SupplierSaveView extends View
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
				   	<h3 class="text-center text-white">Supplier Registration</h3>
				  </div>
				  <div class="card-body">
				    <form class="m-2" method="post">
					 <div class="form-group">
					    <label for="lblmerchantname" class="text-muted">Supplier Name</label>
					    <font color="red">***</font>
					    <input type="text" name="regSupplierName" class="form-control form-control-lg rounded-pill" id="lblsuppliername" value="<?php 
						if(isset($_SESSION["reg_Suser"]))
							echo $_SESSION["reg_Suser"]->getSupplierName();
						else
							echo @$_POST["regSupplierName"]?>">
						<font color="red">
						<?php
							if(isset($this->errors["name_null"]))
								echo $this->errors["name_null"];
							if(isset($this->errors["nameSupplierLen_null"]))
								echo $this->errors["nameSupplierLen_null"];
						?>
					</font>
					  </div>
					<div class="form-group">
					    <label for="lbladdress" class="text-muted">Email address</label>
					    <font color="red">***</font>
					    <input type="text" name="regSupplierEmail" class="form-control form-control-lg rounded-pill" id="lbladdress" value="<?php 
						if(isset($_SESSION["reg_Suser"]))
							echo $_SESSION["reg_Suser"]->getSupplierEmail();
						else
							echo @$_POST["regSupplierEmail"]?>">
						<font color="green">eg.(xxx@gmail.com)</font>
						<font color="red">
						<?php
							if(isset($this->errors["email_null"]))
								echo $this->errors["email_null"];
							if(isset($this->errors["emailSupplierLen_null"]))
								echo $this->errors["emailSupplierLen_null"];
							if(isset($this->errors["invalid_email"]))
								echo $this->errors["invalid_email"];
						?>
					</font>
					  </div>
					<div class="form-group">
					    <label for="lblphone" class="text-muted">Password</label>
					    <font color="red">***</font>
					    <input type="password" name="regSupplierPass" maxlength="30" class="form-control form-control-lg rounded-pill" id="lblphone" value="<?php 
						if(isset($_SESSION["reg_Suser"]))
							echo $_SESSION["reg_Suser"]->getSupplierPassword();
						else
							echo @$_POST["regSupplierPass"]?>">
						<font color="red">
							<?php
							if(isset($this->errors["pass_null"]))
								echo $this->errors["pass_null"];
							if(isset($this->errors["passSupplierLen_null"]))
								echo $this->errors["passSupplierLen_null"];
							?>
						</font>
					  </div>
					  <div class="form-group">
					    <label for="lblemail" class="text-muted">Confirm Password</label>
					    <font color="red">***</font>
					    <input type="password" name="regSupplierCPass" class="form-control form-control-lg rounded-pill" id="lblemail" aria-describedby="emailHelp" value="<?php 
						if(isset($_SESSION["reg_Suser"]))
							echo $_SESSION["reg_Suser"]->getSupplierPassword();
						else
							echo @$_POST["regSupplierCPass"]?>">
						<font color="red">
							<?php
							if(isset($this->errors["cpass_null"]))
								echo $this->errors["cpass_null"];
							if(isset($this->errors["cpassSupplierLen_null"]))
								echo $this->errors["cpassSupplierLen_null"];
							if(isset($this->errors["pass_notMatched"]))
								echo $this->errors["pass_notMatched"];
							?>
						</font>
					  </div>
					  <div class="form-group">
					    <label for="lblpassword" class="text-muted">Phone</label>
					    <input type="text" name="regSupplierPhone" class="form-control form-control-lg rounded-pill" id="lblpassword" value="<?php
						if(isset($_SESSION["reg_Suser"]))
							echo $_SESSION["reg_Suser"]->getSupplierPhone();
						else	
							echo @$_POST["regSupplierPhone"]?>">
						<font color="green">eg-(09-xxxxxxx,01-xxxxx,067-xxxxx)
						</font>
						<font color="red">
						<?php 
							if(isset($this->errors["invalid_phone"]))
								echo $this->errors["invalid_phone"];
						?>
						</font>
					  </div>
					 <div class="form-group">
					    <label for="lblcnfpassword" class="text-muted">Address</label>
					    <!-- <input type="password" name="regAddress" class="form-control form-control-lg rounded-pill" id="lblcnfpassword"> -->
					    <textarea name="regSupplierAddress" rows="3" cols="20" class="form-control" id="lblcnfpassword"><?php 
						if(isset($_SESSION["reg_Suser"]))
							echo $_SESSION["reg_Suser"]->getSupplierAddress();
						else
							echo @$_POST["regSupplierAddress"]?></textarea>
					  </div>
					  <div class="form-group">
					  	<input type="hidden" name="regSupplierStatus" value="<?php echo @$_POST["regStatus"]=0; ?>">
					  </div>


					  <!-- <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill font-weight-bold" name="btnMerchantRegister">REGISTER</button> -->
					<div class="text-center">
						<input type="submit" name="btnSupplierRegister" class="btn btn-color rounded-pill" value="REGISTER">
						<a href="index.php?usecase=<?= UC_HOME;?>" class="btn btn-secondary rounded-pill">CANCEL</a>
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
<?php 	}
}