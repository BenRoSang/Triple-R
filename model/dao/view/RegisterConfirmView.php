<?php
class RegisterConfirmView extends  View
{
	public function displayBody()
	{?>
		<h3>Are you sure to register?</h3>
		<form method="post">
			<table>
				<tr>
					<th>Name:</th>
					<td>
						<input type="text" name="regName" value="<?php echo $_POST["regName"]?>" disabled="disabled">
					</td>
				</tr>
				<tr>
					<th>Email:</th>
					<td>
						<input type="text" name="regEmail" value="<?php echo @$_POST["regEmail"]?>" disabled="disabled">
						<font color="green">***eg.(xxx@gmail.com)</font>
					</td>
				</tr>
				<tr>
					<th>User Name:</th>
					<td>
						<input type="text" name="regUserName" value="<?php echo @$_POST["regUserName"]?>" disabled="disabled">
					</td>
				</tr>
				<tr>
					<th>Password:</th>
					<td>
						<input type="password" name="regPass" value="<?php echo @$_POST["regPass"]?>" disabled="disabled">
					</td>
				</tr>
				<tr>
					<th>Confirm Password:</th>
					<td>
						<input type="password" name="regCPass" value="<?php echo @$_POST["regCPass"]?>" disabled="disabled">
					</td>
				</tr>
				<tr>
					<th>Phone:</th>
					<td>
						<input type="tRegisterConfirmView.phpext" name="regPhone" value="<?php echo @$_POST["regPhone"]?>" disabled="disabled">
						<font color="green">eg-(09-xxxxxxx,01-xxxxx,067-xxxxx)
						</font>
					</td>
				</tr>
				<tr>
					<th>Address:</th>
					<td>
						<textarea name="regAddress" rows="5" cols="25" disabled="disabled"><?php echo @$_POST["regAddress"]?></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="Confirm" name="btnRegisterConfirm">
						<input type="submit" value="Cancel">
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