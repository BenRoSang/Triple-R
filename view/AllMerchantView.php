<?php
class AllMerchantView extends AdminView{
	
	private $allmerchants;
	private $no_of_all_records;
	private $start_from;
	public function __construct($allmerchants,$no_of_all_records,$start_from){
		$this->allmerchants=$allmerchants;
		$this->no_of_all_records=$no_of_all_records;
		$this->start_from=$start_from;
	}
	public function displayBody(){?>
		<style type="text/css">
			th{text-align: center;}
		</style>
	<script type="text/javascript">

//MerchantSearchbox
$(document).ready(function(){
	$("#search-boxMerchant").keyup(function(){
		$.ajax({
		type: "POST",
		url: "view/readName.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-boxMerchant").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-boxM").show();
			$("#suggesstion-boxM").html(data);
			$("#search-boxMerchant").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#search-boxMerchant").val(val);
$("#suggesstion-boxM").hide();
}
function Next(){
    var page=document.getElementById("hddPage").value;
    document.getElementById("hddPageList").value=parseInt(page)+1;
    document.forms["merchantForm"].submit();
}
function Previous(){
	 var page=document.getElementById("hddPage").value;
	 document.getElementById("hddPageList").value=parseInt(page)-1;
	 document.forms["merchantForm"].submit();
}

</script>
<div class="col-md-12">
	<h3 class="text-center ">Customer List</h3>
</div>

<div class="container">
<form action="" method="post" class="mt-sm d-inline" id="merchantForm">
	<input type="hidden" name="hddMerchantPageList" id="hddPageList">
	<div class="row">
		<div class="col-md-4">
			<input type="text" placeholder="Enter Name"
			name="searchMerName" class="form-control" value="<?php echo @$_POST["searchMerName"];?>" id="search-boxMerchant"/>
			<div id="suggesstion-boxM"></div> 
		</div>
		<div class="col-md-2">
			<button type="submit" class="btn btn-primary"
				name="btnMerchantSearch"><i class="fas fa-search"></i>&nbsp;Search</button>
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
			if(count($this->allmerchants)>0){
				
			foreach ($this->allmerchants as $key=>$mer){?>
				<tr>
					<td><?php echo $mer["merchant_id"]?></td>
					<td><?php echo $mer["name"]?></td>
					<td><?php echo $mer["email"]?></td>
					<td><?php echo $mer["phone"]?></td>
					<td><?php echo $mer["address"]?></td>
					<td align="center"><?php if($mer["delete_status"]!=1)echo "Available"; else echo "Unavailable";?></td>
					<td align="center"><input type="hidden" name="MerBlockId"
								value="<?php echo $mer["merchant_id"]?>"></input>
							<button type="submit"
								name="btnMerchantBlock" class="<?php if($mer["delete_status"]!=1) echo "btn btn-danger btn-sm";else echo "btn btn-primary btn-sm" ?>" value="<?php echo $mer["merchant_id"]?>">
								<?php if($mer["delete_status"]!=1)
								echo "Block";
								else echo "Unblock";?>
							</button></td>
				</tr>
				<?php } }else {?>
					<tr>
						<td colspan="7" align="center">No data available</td>
					</tr>
				<?php }?>
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