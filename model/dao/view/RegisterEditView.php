<?php
class RegisterEditView extends View
{
	private $errors;
	public function __construct($errors=null)
	{
		$this->errors=$errors;
	}
	public function displayBody()
	{?>
		<form method="post">
			<table>
				<tr>
					<th>Name:</th>
					<td>
						<input type="text" name="regName" 
						value="<?php 
						if(isset($_SESSION["reg_user"]))
							echo $_SESSION["reg_user"]->getName();
						else
							echo @$_POST["regName"]?>">
						<font color="red">
						<?php
							if(isset($this->errors["name_null"]))
								echo $this->errors["name_null"];
						?>
					</font>
					</td>
				</tr>
				<tr>
					<th>Email:</th>
					<td>
						<input type="text" name="regEmail" 
						value="<?php 
						if(isset($_SESSION["reg_user"]))
							echo $_SESSION["reg_user"]->getEmail();
						else
							echo @$_POST["regEmail"]?>">
						<font color="green">***eg.(xxx@gmail.com)</font>
						<font color="red">
						<?php
							if(isset($this->errors["email_null"]))
								echo $this->errors["email_null"];
							if(isset($this->errors["invalid_email"]))
								echo $this->errors["invalid_email"];
						?>
					</font>
					</td>
				</tr>
				<tr>
					<th>User Name:</th>
					<td>
						<input type="text" name="regUserName" 
						value="<?php 
						if(isset($_SESSION["reg_user"]))
							echo $_SESSION["reg_user"]->getUsername();
						else
							echo @$_POST["regUserName"]?>">
						<font color="red">***
							<?php
							if(isset($this->errors["username_null"]))
								echo $this->errors["username_null"];
							?>
						</font>
					</td>
				</tr>
				<tr>
					<th>Password:</th>
					<td>
						<input type="password" name="regPass" 
						value="<?php 
						if(isset($_SESSION["reg_user"]))
							echo $_SESSION["reg_user"]->getPassword();
						else
							echo @$_POST["regPass"]?>">
						<font color="red">***
							<?php
							if(isset($this->errors["pass_null"]))
								echo $this->errors["pass_null"];
							?>
						</font>
					</td>
				</tr>
				<tr>
					<th>Confirm Password:</th>
					<td>
						<input type="password" name="regCPass" 
						value="<?php 
						if(isset($_SESSION["reg_user"]))
							echo $_SESSION["reg_user"]->getPassword();
						else
							echo @$_POST["regCPass"]?>">
						<font color="red">***
							<?php
							if(isset($this->errors["cpass_null"]))
								echo $this->errors["cpass_null"];
							if(isset($this->errors["pass_notMatched"]))
								echo $this->errors["pass_notMatched"];
							?>
						</font>
					</td>
				</tr>
				<tr>
					<th>Phone:</th>
					<td>
						<input type="text" name="regPhone" 
						value="<?php
						if(isset($_SESSION["reg_user"]))
							echo $_SESSION["reg_user"]->getTelephone();
						else	
							echo @$_POST["regPhone"]?>">
						<font color="green">eg-(09-xxxxxxx,01-xxxxx,067-xxxxx)
						</font>
						<font color="red">
						<?php 
							if(isset($this->errors["invalid_phone"]))
								echo $this->errors["invalid_phone"];
						?>
						</font>
					</td>
				</tr>
				<tr>
					<th>Address:</th>
					<td>
						<textarea name="regAddress" rows="5" cols="25">
						<?php 
						if(isset($_SESSION["reg_user"]))
							echo $_SESSION["reg_user"]->getAddress();
						else
							echo @$_POST["regAddress"]?></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="Register" name="btnRegister">
						<input type="submit" value="Cancel" name="btnBack">
						<?php if(isset($this->errors["all_null"]))
								echo $this->errors["all_null"];
								
							if(isset($this->errors["user_exist"]))
								echo $this->errors["user_exist"];
						?>
					</td>
				</tr>
			</table>
			
		</form>
	<?php }
}