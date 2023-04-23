<?php
 class AdminProductListView extends AdminView{
 	private $productCategory;
 	private $product;
 	public function __construct($productCategory=NULL,$product=NULL){
 		$this->productCategory=$productCategory;
 		$this->product=$product; 		
 	}
 	public function displayBody(){?>
 	<script>
	$(document).ready(function(){

		$("#productSearch").keyup(function(){
			var productCategory=$("#selectedProductCategory").val();		
			$.ajax({
			type: "POST",
			url: "view/product_search.php",
		    data: {
		        'keyword': $(this).val(),
		        'productCategory': productCategory
		    },
			beforeSend: function(){
				$("#productSearch").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
			},
			success: function(data){
				$("#suggesstion-box").show();
				$("#suggesstion-box").html(data);
				$("#productSearch").css("background","#FFF");

			}
			});
		});
		$('#selectedProductCategory').on('change', function() {
			$("#productSearch").val("");
			$('#productForm').submit();
			});		
	});
	
	function selectCountry(val) {
	$("#productSearch").val(val);
	$("#suggesstion-box").hide();
	}
	</script>
<form method="post" name="product" id="productForm">
	<input type="hidden" name="hddProductPageList" id="hddPageList">
	<div class="col-md-12">
		<h3 class="text-center">Product List</h3>
	</div>
 	<div class="container">	 	
	 	<div class="row">
	 		<div class="col-md-2">
	 			<label for="selectedProductCategory">Product Category:</label>
	 		</div>
	 		<div class="form-group col-md-4">
		 		<select class="form-control" id="selectedProductCategory" name="selectedProductCategory">
		        	<option value="">--SELECT--</option>
		        	<?php 
                  	foreach ($this->productCategory as $key=>$value){   
                  		if($value["product_category_id"] == @$_POST["selectedProductCategory"])
                  		{?>
                  		<option value="<?php echo $value["product_category_id"]?>" selected="selected"><?php echo $value["product_category_name"]?></option>
                  		<?php } ?> 
                  	<?php if($value["product_category_id"]!= @$_POST["selectedProductCategory"]){
                  	?>
                  	<option value="<?php echo $value["product_category_id"]?>"><?php echo $value["product_category_name"]?></option>
                  <?php }}?>
		      	</select>
	 		</div>
	 		<div class="col-md-4 pl-0">
	 			<input type="text" name="txtAdminProductSearch" placeholder="Enter Product Name" class="form-control" value="<?php echo @$_POST['txtAdminProductSearch'];?>" id="productSearch">
	 			<div id="suggesstion-box"></div>
	 		</div>
	 		<div class="col-md-2">
	 			<button type="submit" name="btnAdminProductSearch" class="btn btn-primary" value="search"><i class="fas fa-search"></i>&nbsp;Search</button>
	 		</div>
	 	</div>
	 	<div class="row">
	 		<div class="col-md-2">
	 			<label for="selectedApprovedStatus">Approved Status:</label>
	 		</div>
	 		<div class="col-md-4">
		 		<select class="form-control" id="selectedApprovedStatus" name="selectedApprovedStatus" onchange="form.submit()">
		        	<option value="2" <?php	if(@$_POST["selectedApprovedStatus"]==2)echo "selected";else echo "";?>>All</option>
		        	<option value="1" <?php if(@$_POST["selectedApprovedStatus"]==1)echo "selected";else echo "";?>>Approved</option>      
		        	<option value="0" <?php if(@$_POST["selectedApprovedStatus"]==0 || !isset($_POST["selectedApprovedStatus"]))echo "selected";else echo "";?>>Unapproved</option>
		      	</select>
	 		</div>
	 	</div>
	 	<br>
	 	</div>
	 	<!--Hsu Myat Thwe Start-->
	 	<!-- Hsu Myat Thwe End-->
	 	<div class="container">
	 		<div class="">
				<table class="table table-striped table-hover table-bordered" width="100%">
                <thead class="bg-gradient-primary text-white">
                  <tr>
                    <th>No.</th>
                    <th>Product Name</th>
                    <th>Product Category Name</th>
                    <!-- <th>Quantity</th>  -->                   
                    <th>Image</th>
                    <th>Status</th>
                    <th>Details</th>
                  </tr>
                </thead>
                <tbody> 
                  <?php 
                  if(count($this->product)==0){
                  	?>
                  	<tr><td colspan="6" align="center">No data available</td></tr>
                  	<?php 
                  }else{
                  	$no=($_SESSION["page"]-1)*LIMIT_ROWS;                  	
                  foreach ($this->product as $key=>$product){
                  ?>     
                  <tr>
                  		<td><?php echo ($key+1)+$no;?></td>
                  		<td><?php echo $product["product_name"]?></td>
                  		<td><?php echo $product["product_category_name"]?></td>
                  		<!-- <td align="right"><?php echo $product["quantity"]?></td> -->
                  		<td align="center"><img src="<?php echo $product["image"]?>" width="30" height="30"></td>
                  		<td align="center">
                  			<?php if($product["approve_status"]==1)echo "Approved";else echo "Unapproved";?>                       	                       
                       </td>
                       <td align="center">
                       <button type="button" data-target="#Modal" data-toggle="modal" class="btn btn-primary approvedProduct"  data-id="<?php echo $product["product_id"];?>" <?php if($product["approve_status"]==1)echo "disabled";else echo "";?>><i class="fa fa-thumbs-o-up"></i>&nbsp;<?php if($product["approve_status"]==1)echo "Approved";else echo "Approve";?></button>
                       	<button type="button" data-target="#DetailsProductModals" data-toggle="modal" class="btn btn-primary detailsProduct" data-id="<?php echo $key+1;?>" data-productname="<?php echo $product["product_name"]?>" data-productcategory="<?php echo $product["product_category_name"]?>" data-quantity="<?php echo $product["quantity"]?>" data-supplier="<?php echo $product["name"],",",$product["email"],",",$product["phone"],",",$product["address"];?>" data-image="<?php echo $product["image"] ?>">
                            <i class="fa fa-info-circle"></i>&nbsp;Details</button> 
                       </td>
                  </tr>
                  <?php }}?>            
                </tbody>
              </table>
              <input type="hidden" id="hddPage" value="<?php if(isset($_SESSION["page"]))echo $_SESSION["page"];else echo "";?>">
			<a id="previous" href="javascript:Previous();"> Previous </a>&nbsp;|&nbsp; 
			<a id="next" href="javascript:Next();"> Next </a>
		</div> 
	 	</div>
	 	

		<!-- Modal -->
	 	<div class="modal fade"id="DetailsProductModals">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-gradient-primary text-white">
						<h5>Product Details</h5>
						<button type="button" class="close" data-dismiss="modal">
							<span>&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<div class="col-md-7">
								<img src="" width="100" height="100" id="detailsProductImage">
							</div>
							<div class="col-md-12"><label class="bold">No.&emsp;</label><label id="detailsProductId" class="text-muted"></label></div>
							<div class="col-md-12"><label class="bold">Product Name:&emsp;</label><label id="detailsProductName" class="text-muted"></label></div>
							<div class="col-md-12"><label class="bold">Product Category Name:&emsp;</label><label id="detailsProductCategory" class="text-muted"></label></div>							
							<div class="col-md-12"><label class="bold">Quantity:&emsp;</label><label id="detailsProductQuantity" class="text-muted"></label></div>		
							<div class="col-md-12">
								<label class="bold">Supplier Info:&emsp;</label>
								<label id="detailsProductSupplierName" class="text-muted"></label><br>
								<label class="bold">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</label>
								<label id="detailsProductSupplierEmail" class="text-muted"></label><br>
								<label class="bold">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</label>
								<label id="detailsProductSupplierPhone" class="text-muted"></label><br>
								<label class="bold">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</label>
								<label id="detailsProductSupplierAddress" class="text-muted"></label>
							</div>										
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
					</div>
				</div>
				
			</div>
		</div>
		<!-- Modal -->

		<!-- Modal -->
	 	<div class="modal fade"id="Modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-gradient-primary text-white">
						<h5>Product Approved Confirmation</h5>
						<button type="button" class="close" data-dismiss="modal">
							<span>&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form">
							<div class="col-12">
								<span class="text-dark">Are you sure to approve product?</span>
								<input type="hidden" name="approvedProductId" id="approvedProductId" value="">
							</div>							
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" name="btnApproveStatus">Approve</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					</div>
				</div>
				
			</div>
		</div>
		<!-- Modal -->
	 	</form>
		<style>
			th{
			text-align:center;
			}
		</style>
		<script type="text/javascript">
		    $(function () {
		        $(".approvedProduct").click(function () {
		            var productId = $(this).data('id');
		            $(".modal-body #approvedProductId").val(productId);
		        })
		    });
		    $(function () {
		        $(".detailsProduct").click(function () {
		        	var images=$(this).data('image');
		        	var supplier=$(this).data('supplier');
		        	var res = supplier.split(",");
		            $(".modal-body #detailsProductId").text($(this).data('id'));
		            $(".modal-body #detailsProductName").text($(this).data('productname'));
		            $(".modal-body #detailsProductCategory").text($(this).data('productcategory'));
		            $(".modal-body #detailsProductSupplierName").text(res[0]);
		            $(".modal-body #detailsProductSupplierEmail").text(res[1]);
		            $(".modal-body #detailsProductSupplierPhone").text(res[2]);
		            $(".modal-body #detailsProductSupplierAddress").text(res[3]);
		            $(".modal-body #detailsProductQuantity").text($(this).data('quantity'));
		           	$(".modal-body #detailsProductImage").prop("src",images);
		        })
		    });
		    function Next(){
			    var page=document.getElementById("hddPage").value;
			    document.getElementById("hddPageList").value=parseInt(page)+1;
			    document.forms["productForm"].submit();
		    }
		    function Previous(){
		    	 var page=document.getElementById("hddPage").value;
				 document.getElementById("hddPageList").value=parseInt(page)-1;
				 document.forms["productForm"].submit();
		    }
		</script>
		<style>
		.bold{
		font-weight:800;
		}
		</style>
 <?php		
 	}
 }