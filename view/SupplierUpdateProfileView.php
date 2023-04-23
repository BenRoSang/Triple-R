<?php
class SupplierUpdateProfileView extends View{
	private $errors;
	public function __construct($errors=null)
	{
		$this->errors=$errors;
	}
	public function displayBody(){?>
		<div class="container-fluid p-0" style="display:inline-block;">
			
		    <div class="col-md-6 offset-md-3">
		    	<div class="card my-3 reg-card">
				  <div class="card-header login-card-header">
				   	<h3 class="text-center text-white">Update Profile</h3>
				  </div>
				  <div class="card-body">
				    <form class="m-2" method="post">
					 <div class="form-group">
					    <label for="InputUsername" class="text-muted">Supplier Name</label>
					    <input type="text" name="updSName" value="<?php 
							if(isset($_POST["updSName"]))
								echo $_POST["updSName"];
							//elseif (isset($_SESSION["update_user"]))
							//	echo $_SESSION["update_user"][0]["name"];
							else
								echo $_SESSION['loginUser'][0]['name']?>" class="form-control form-control-lg rounded-pill" id="InputUsername">
							<font color="red">***
								<?php
								if(isset($this->errors["name_null"]))
									echo $this->errors["name_null"];
								if(isset($this->errors["nameSupplierUpdateLen_null"]))
									echo $this->errors["nameSupplierUpdateLen_null"];
								?>
							</font>
							 
					  </div>
					<div class="form-group">
					    <label for="InputEmail1" class="text-muted">Email address</label>
					    <input type="text" name="updSEmail" value="<?php 
							if(isset($_POST["updSEmail"]))
								echo $_POST["updSEmail"];
							else
								echo $_SESSION['loginUser'][0]['email']?>" class="form-control form-control-lg rounded-pill" id="InputAddress">
							<font color="red">***
								<?php
								if(isset($this->errors["email_null"]))
									echo $this->errors["email_null"];
								if(isset($this->errors["emailSupplierUpdateLen_null"]))
									echo $this->errors["emailSupplierUpdateLen_null"];
								if(isset($this->errors["invalid_email"]))
									echo $this->errors["invalid_email"];
								?>
							</font>
					  </div>
					  <!-- Default unchecked disabled -->
					<!-- <div class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" id="defaultUncheckedDisabled2" onclick="myfunction()">
					  <label class="custom-control-label" for="defaultUncheckedDisabled2">Change Password</label>
					  </div>
					  	<script type="text/javascript">
					  		function myfunction	(){
					  			var checkbox=document.getElementById("defaultUncheckedDisabled2");
					  			var text1=document.getElementById("showpwd");
					  			var text2=document.getElementById("showcfmpwd");
					  			if(checkbox.checked == true){
					  				text1.style.display= "block";
					  				text2.style.display="block";
					  			}
					  			else{
					  				text1.style.display="none";
					  				text2.style.display="none";
					  			}
					  			
					  		}
					  	</script> --> 
					  <div class="form-group">
					    <label for="Inputpass" class="text-muted">Password</label>
					    <input type="password" name="updSPass" value="<?php 
							if(isset($_POST["updSPass"]))
								echo $_POST["updSPass"];
							else
								echo $_SESSION['loginUser'][0]['password'];?>" class="form-control form-control-lg rounded-pill" id="InputPhone">
							<font color="red">***
								<?php
								if(isset($this->errors["pass_null"]))
									echo $this->errors["pass_null"];
								?></font>
					  </div>
					  <div class="form-group">
					    <label for="Input Confirm Password" class="text-muted">Confirm Password</label>
					    <input type="password" name="updSCPass" value="<?php 
							if(isset($_POST["updSCPass"]))
								echo $_POST["updSCPass"];
							else
								echo $_SESSION['loginUser'][0]['password']?>" class="form-control form-control-lg rounded-pill" id="InputEmail1" aria-describedby="emailHelp" >
							<font color="red">***								
								<?php
								if(isset($this->errors["cpass_null"]))
									echo $this->errors["cpass_null"];
								if(isset($this->errors["pass_notMatched"]))
									echo $this->errors["pass_notMatched"];
								?>
							</font>
					  </div> 

						
				
					  
					 <div class="form-group">
					    <label for="InputAddress" class="text-muted">Address</label>
					     <textarea name="updSAddress" rows="3" cols="20" class="form-control" id="address"><?php 
						if(isset($_POST["updSAddress"]))
								echo $_POST["updSAddress"];
							else
								echo $_SESSION['loginUser'][0]['address']?></textarea>
					   
							<font color="red">***
								<?php
								if(isset($this->errors["name_null"]))
									echo $this->errors["name_null"];
								?>
							</font>
					  </div>

					  <div class="text-center">
					  		<button type="submit" class="btn btn-color rounded-pill" name="btnSupplierUpdate" style="width: 120px">UPDATE</button>
					  <a href="index.php?usecase=<?= UC_HOME;?>" class="btn btn-secondary rounded-pill text-white" style="width: 120px">CANCEL</a>
					  </div>
					</form>
				  </div>
				</div>
		   	 </div>
		   	 </div>
		   	 </div>
<?php }
}
?>