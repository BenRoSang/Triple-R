<?php
class AllProductCategoryView extends AdminView{
    
    private $allCategory;
    private $no_of_all_records;
    private $start_from;    
    
    public function __construct($allcategory=null,$no_of_all_records=null,$start_from=null)
    {
        $this->allCategory = $allcategory;
        $this->no_of_all_records=$no_of_all_records;
        $this->start_from=$start_from;
      
    }
	public function displayBody(){
		
		?>
		<style type="text/css">
			th{text-align: center;}
		</style>
		<form method="post" id="productCategory">
		<input type="hidden" name="productCategory" value="productCategory">
	<div class="col-md-12">
 		<h3 class="text-center mb-4">Product Category</h3>
 	</div>
 	
 	<div class="text-right mb-4" style="margin-right:19px">
 		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal"><i class="fas fa-plus"></i>Add Product Category</button>
 	</div>
		<div class="modal fade"id="Modal" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-gradient-primary text-white">
						<h5>Add Product Category</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form">
							<div class="col-12">
								Product Category Name:<span style="color:red">***</span>
							</div>
							<div class="col-12">
								<input type="text" name="producttypename" id="producttypename"class="form-control">
								<p id="p"></p>
								<br>
							</div>
							
							<div class="col-12">
								Unit Type Name:<span style="color:red">***</span>
							</div>
							<div class="col-12">
								<input type="text" name="unittypename" id="unittypename"class="form-control">
								<p id="p1"></p>
								<br>
							</div>
							
							<div class="col-12">
								Minium Quantity:<span style="color:red">***</span>
							</div>
							<div class="col-12">
								<input type="text" name="minimumquantity" id="minimumquantity"class="form-control"><p id="p2"></p><br>
							</div>						
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary"  id="btnProductCategory" name="btnProductCategory">Add</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					</div>
				</div>
				
			</div>
		</div>
	</form>	
 	<div class="container">
 							<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<table class="table table-hover table-bordered" id="sampleTable">
				<thead class="bg-gradient-primary text-white">
					<tr>
						<th> No </th>						
						<th> Product Type Name</th>
						<th> Unit Type Name</th>
						<th> Minimum Quantity</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($this->allCategory as $key => $productcategory) {
						?>
						<tr>
							<td align="center"><?php echo ++$this->start_from;?></td>
							
							<td><?php echo $productcategory["product_category_name"]?></td>
							<td><?php echo $productcategory["unit_type_name"]?></td>
							<td><?php echo $productcategory["minimum_quantity"]?></td>  
							<td align="center"><?php echo ($productcategory["delete_status"]==0)?"Available":"Unavailable";?></td>      
							<td> 
								<button type="button" class="btn btn-primary CategoeyEdit" data-toggle="modal" data-target="#Modal1" data-productcategoryid="<?php  echo $productcategory["product_category_id"]?>"  data-productcategoryname="<?php  echo $productcategory["product_category_name"]?>"
									data-productcategoryunit="<?php  echo $productcategory["unit_type_name"]?>" data-productcategoryquantity="<?php echo $productcategory["minimum_quantity"]?>" data-deletestatus="<?php echo $productcategory["delete_status"]?>">
									<i class="fas fa-edit"></i>&nbsp;Edit	
								</button>
 		
            <div class="d-inline">					 
                <a class="product_category_delete btn btn-danger" href="index.php?usecase=<?php echo UC_PRODUCT_CAT ?>&prod_cat_id=<?= $productcategory['product_category_id'] ?>"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>                     
             </div>                
             <form  method="post" id="productCategoryEdit">
             	<input type="hidden" name="productCategoryEdit" value="productCategoryEdit">
             	<div class="modal fade" id="Modal1" aria-hidden="true">
             		<div class="modal-dialog">
             			<div class="modal-content">
             				<div class="modal-header bg-gradient-primary text-white">
             					<h5>Update Product Category</h5>
             					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
             						<span aria-hidden="true">&times;</span>
             					</button>
             				</div>             				
             				<div class="modal-body">
             					<div class="form">
             						<div class="col-12">
             							<input type="hidden" name="productid"
             							id="productid" class="form-control">				
             							<br>
             						</div>
             						<div class="col-12">
             							Product Category Name:<span style="color:red">***</span>
             						</div>
             						<div class="col-12">
             							<input type="text" name="producttype" id="producttype"class="form-control">
             							<p id="i"></p>
             							<br>
             						</div>

             						<div class="col-12">
             							Unit Type Name:<span style="color:red">***</span>
             						</div>
             						<div class="col-12">
             							<input type="text" name="unittype" id="unittype"class="form-control">
             							<p id="i1"></p>
             							<br>
             						</div>

             						<div class="col-12">
             							Minium Quantity:<span style="color:red">***</span>
             						</div>
             						<div class="col-12">
             							<input type="text" name="quantity" id="quantity"class="form-control"><p id="i2"></p><br>
             						</div>
             					</div>
             				</div>
             				<div class="modal-footer">
             					<button type="button" class="btn btn-primary" id="productUpdate"  name="productUpdate">Update</button>
             					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
             				</div>
             			</div> 
             		</div>
             	</div>	
             </form>
         </td>
     </tr>
 <?php }?>               

</tbody>
</table>
</div> 
</div>	
<a href="index.php?usecase=<?php echo UC_PRODUCT_CAT?>&page=<?php echo $_SESSION['page']-1 ?>"> Previous </a>&nbsp;|&nbsp; 
<a href="index.php?usecase=<?php echo UC_PRODUCT_CAT?>&page=<?php echo $_SESSION['page']+1 ?>"> Next </a>

<script type="text/javascript">
	document.getElementById("productUpdate").onclick=function(){
		var form=document.getElementById('productCategoryEdit');			
		var text=form.elements["producttype"].value;
		var text1=form.elements["unittype"].value;
		var text2=form.elements["quantity"].value;
		if(text && text1 && text2){
			this.disabled=true;				
			document.forms["productCategoryEdit"].submit();				
		}else{
			if(text=="")
				document.getElementById("i").innerHTML="Please Enter This Field";
			document.getElementById("i").style.color="red";
			if(text1=="")
				document.getElementById("i1").innerHTML="Please Enter This Field";
			document.getElementById("i1").style.color="red";
			if(text2=="")
				document.getElementById("i2").innerHTML="Please Enter This Field";
			document.getElementById("i2").style.color="red";
			return false;
		}
	};
	document.getElementById("btnProductCategory").onclick=function(){
		var form=document.getElementById('productCategory');			
		var text=form.elements["producttypename"].value;
		var text1=form.elements["unittypename"].value;
		var text2=form.elements["minimumquantity"].value;
		if(text && text1 && text2){
			this.disabled=true;				
			document.forms["productCategory"].submit();				
		}else{
			if(text=="")
				document.getElementById("p").innerHTML="Please Enter This Field";
			document.getElementById("p").style.color="red";

			if(text1=="")
				document.getElementById("p1").innerHTML="Please Enter This Field";
			document.getElementById("p1").style.color="red";

			if(text2=="")
				document.getElementById("p2").innerHTML="Please Enter This Field";
			document.getElementById("p2").style.color="red";
			return false;
		}
	};
	$(function () {
		$(".CategoeyEdit").click(function () {   		        	

			$(".modal-body #productid").val($(this).data('productcategoryid'));
			$(".modal-body #producttype").val($(this).data('productcategoryname'));
			$(".modal-body #unittype").val($(this).data('productcategoryunit'));		            	
			$(".modal-body #quantity").val($(this).data('productcategoryquantity'));		          
			$(".modal-body #status").val($(this).data('deletestatus'));
		})
	});
	$(document).ready(function(){
		$('.product_category_delete').on("click",function(){
			return confirm("are you sure you want to delete?");
		})
	});
</script>
<?php 		
	}
}