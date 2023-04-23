<?php
	
	class AllSupplierView extends AdminView
	{
	/*private $supplier;
	public function __construct($supplier){
		$this->supplier=$supplier;
	}*/
	private $allsupplier;
	private $no_of_all_records;
	private $start_from;
	public function __construct($allsupplier,$no_of_all_records,$start_from){
		$this->allsupplier=$allsupplier;
		$this->no_of_all_records=$no_of_all_records;
		$this->start_from=$start_from;
	}
	public function displayBody(){?>
		<style type="text/css">
			th{text-align: center;}
		</style>
	<script>

//SupplierSearchBox
$(document).ready(function(){
	$("#search-boxSupplier").keyup(function(){
		$.ajax({
		type: "POST",
		url: "view/readSupplierName.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-boxSupplier").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-boxSupplier").css("background","#FFF");
		}
		});
	});
});

function selectSupplier(val) {
$("#search-boxSupplier").val(val);
$("#suggesstion-box").hide();
}
function Next(){
    var page=document.getElementById("hddPage").value;
    document.getElementById("hddPageList").value=parseInt(page)+1;
    document.forms["supplierForm"].submit();
}
function Previous(){
	 var page=document.getElementById("hddPage").value;
	 document.getElementById("hddPageList").value=parseInt(page)-1;
	 document.forms["supplierForm"].submit();
}
</script>
<div class="col-md-12">
	<h3 class="text-center ">Supplier List</h3>
</div>

<div class="container">
<form action="" method="post" class="mt-sm d-inline" id="supplierForm">
<input type="hidden" name="hddSupplierPageList" id="hddPageList">
<div class="row">
	<div class="col-md-4">
		<input type="text" id="search-boxSupplier" class="form-control" placeholder="Enter Name" name="searchSupName" value="<?php echo @$_POST["searchSupName"]?>"  />
		<div id="suggesstion-box"></div>
	</div>
	<div class="col-md-2">
		<button type="submit" class="btn btn-primary" name="btnSupplierSearch"><i class="fas fa-search"></i>&nbsp;Search</button>
	</div>	
	</div>
	<br>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">

		<table class="table table-hover table-bordered" id="sampleTable">
			<thead class="bg-gradient-primary text-white">
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			if(count($this->allsupplier)>0){				
			foreach ($this->allsupplier as $key=>$sup){?>
			<tr>
					<td><?php echo $sup["supplier_id"]?></td>
					<td><?php echo $sup["name"]?></td>
					<td><?php echo $sup["email"]?></td>
					<td><?php echo $sup["phone"]?></td>
					<td><?php echo $sup["address"]?></td>
					<td align="center"><?php if($sup["delete_status"]!=1)echo "Available"; else echo "Unavailable"; ?></td>
					<td align="center">
							<input type="hidden" name="SupplierBlockId"
								value="<?php echo $sup["supplier_id"]?>"></input>
							<button type="submit"
								name="btnSupplierBlock" class="<?php if($sup["delete_status"]!=1) echo "btn btn-danger btn-sm"; else echo "btn btn-primary btn-sm"; ?>" value="<?php echo $sup["supplier_id"]?>">
								<?php if($sup["delete_status"]!=1)
								echo "Block";
								else echo "Unblock";?></button>
						</td>
			</tr>
			<?php }
			}else {?>
			<tr>
				<td colspan="7" align="center">No data available</td>
			</tr>
			<?php } ?>
		</tbody>
		</table>
	</div>
	<input type="hidden" id="hddPage" value="<?php if(isset($_SESSION["page"]))echo $_SESSION["page"];else echo "";?>"> 
	<a id="previous" href="javascript:Previous();">Previous</a>&nbsp;|&nbsp; 
	<a id="next" href="javascript:Next();">Next</a>
</form>
</div>
				<?php
			}
	}
