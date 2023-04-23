<?php
class PostProductMerchantView extends View{
	private $allpostproducts;
	private $no_of_all_records;
	private $start_from;
	public function __construct($allpostproducts,$no_of_all_records,$start_from){
		$this->allpostproducts=$allpostproducts;
		$this->no_of_all_records=$no_of_all_records;
		$this->start_from=$start_from;
	}
	public function displayBody(){?>
<script type="text/javascript">
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "./view/ajax_search.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 100px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
<style type="text/css">
.typeahead,.tt-query {
	border: 2px solid #CCCCCC;
	border-radius: 8px;
	font-size: 24px;
	height: 30px;
	line-height: 30px;
	outline: medium none;
	padding: 0px;
	width: 300px;
}

.typeahead {
	background-color: #FFFFFF;
}

.typeahead:focus {
	border: 2px solid #0097CF;
}

.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}

.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 0px;
	padding: 0px;
	width: 300px;
}
#country-list li {
	padding: 10px;
	background: #f0f0f0;
	border-bottom: #bbb9b9 1px solid;
}
#country-list li:hover {
	background: #ece3d2;
	cursor: pointer;
}
#search-box {
	padding: 10px;
	border: #a8d4b1 1px solid;
	border-radius: 4px;
}
#country-list {
	float: left;
	list-style: none;
	margin-top: -3px;
	padding: 0;
	width: 190px;
	position: absolute;
}
.jumbotron {
	padding: 2rem 2rem 0rem 0rem;
}
</style>
<form method="post" id="allProductForm">
<div class="jumbotron jumbotron-fluid">
	<div class="container-fluid">
		<div class="row justify-content-between">
			<div class="col-4">
				<div class="d-flex ml-5 pl-2">
                <div>
                    <img src="images/logo/avatar2.png" class="mb-3" alt="Avatar Image" style="width: 80px; height: 80px; border-radius: 50%;">
                </div>

                <div style="margin: 20px 0 0 15px; text-transform: uppercase;">
                    <span style="font-size: 20px; margin: 50px 0px 0px 0px" class="text-muted  border-bottom border-primary font-weight-bold"><?php echo $_SESSION['loginUser'][0]['name']?></span>
                </div>
            </div>
			</div>
			<div class="col-4">
				<div class="d-flex" style="margin: 15px 1px 1px 50px">
					<div>
						<input type="text" id="search-box" name="ajax" value="<?php echo @$_POST['ajax']; ?>" class="form-control" placeholder="Search Product">
							<div id="suggesstion-box"></div>
					</div>
					<div class="ml-3">
						<input type="submit" name="search" class="btn btn-outline-success" value="Search">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<h3 class="text-center mt-3 my-3">All Products</h3>
		<div class="container">
			<!-- <form method="post" id="allProductForm"> -->
				<input type="hidden" name="hddCustomerProductList" id="hddCustomerProductList">
				<div class="row">
					<?php foreach ($this->allpostproducts as $key=>$value){?>
			
					<div class="col-md-4">
						<div class="card">
							<img class="card-img-top" src="<?php  echo $value["image"]; ?>" width="100px" height="300px" alt="Card image cap">
							<div class="card-body">
								<p class="card-text">Product Name 
									<a href="index.php?usecase=<?php echo UC_Post_Product_Detail;?>&productId=<?php echo $value["product_id"];?>">
										<?php echo $value["product_name"]?>
									</a>
								</p>
								<p class="card-text">Category Name
									<span class=""><?php echo @$value["product_category_name"]; ?></span>
								</p>
							</div>
						</div>
					</div>
			
					<?php }?>
				</div>		
				<div class="text-center my-4">
					<!-- <a href="index.php?usecase=<?php echo UC_PRODUCT?>&page=<?php echo $_SESSION['page']-1 ?>"> Previous </a>/
					<a href="index.php?usecase=<?php echo UC_PRODUCT?>&page=<?php echo $_SESSION['page']+1 ?>"> Next </a>-->
					<input type="hidden" id="hddPage" value="<?php if(isset($_SESSION["page"]))echo $_SESSION["page"];else echo "";?>">
					<a id="previous" href="javascript:Previous();"> Previous </a>&nbsp;|&nbsp; 
					<a id="next" href="javascript:Next();"> Next </a>
				</div>				
			
		</div>
		</form>
		<script type="text/javascript">
	    function Next(){
		    var page=document.getElementById("hddPage").value;
		    document.getElementById("hddCustomerProductList").value=parseInt(page)+1;
		    document.forms["allProductForm"].submit();
	    }
	    function Previous(){
	    	 var page=document.getElementById("hddPage").value;
			 document.getElementById("hddCustomerProductList").value=parseInt(page)-1;
			 document.forms["allProductForm"].submit();
	    }
		</script>
<?php }
}
?>