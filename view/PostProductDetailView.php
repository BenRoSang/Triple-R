<?php

class PostProductDetailView extends View{
	private $productDetails;
	public function __construct($productDetails=null){
		$this->productDetails=$productDetails;
	}
	public function displayBody() {?>

<div align="center" style="padding: 40px 0px 0px 0px">
	<h3 align="center">Product Detail</h3>
	<form action="" method="POST">


		<div class="col-md-4 px-3 my-3">
			<div class="card">
				<img class="card-img-top"
					src="<?php echo $this->productDetails[0]["image"];?>"
					 alt="Card image cap">
				<div class="card-body">
					<table width="100%">
						<tr>
							<th>Product Name</th>
							<td><?php echo $this->productDetails[0]["product_name"]; ?></td>
						</tr>
						<tr>
							<th>Quantity</th>
							<td><?php echo $this->productDetails[0]["quantity"]." "; ?><?php echo $this->productDetails[0]["unit_type_name"]; ?></td>
						</tr>
						<tr>
							<th>Category Name</th>
							<td><?php echo $this->productDetails[0]["product_category_name"]; ?>
							</td>
						</tr>
						<tr>
							<th>Owner</th>
							<td><?php echo $this->productDetails[0]["supplier_name"]; ?></td>
						</tr>
						<tr>
							<th>Contact</th>
							<td><?php echo $this->productDetails[0]["phone"]; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div align="center" class="my-3">
			<input type="submit" name="btnback" class="btn btn-primary" value="<<Back">
		</div>
	</form>
</div>

<?php }

}
?>