<?php
class RegisterSaveView extends View
{
	public function displayBody()
	{?>
		<h3>Successfully saved...</h3>
		<form method="post">
			<input type="submit" value="Back" name="btnBack">
		</form>
	<?php }
}