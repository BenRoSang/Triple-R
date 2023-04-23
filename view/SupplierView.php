<?php 
class SupplierView extends View{
	public function displayBody(){
    $allProductDao = new ProductDao();
    $all_product = $allProductDao->getAllProduct();
    ?>

    <div class="jumbotron jumbotron-fluid mb-3">
        <div class="container-fluid">
            <div class="d-flex ml-5 pl-2">
                <div>
                    <img src="images/logo/avatar2.png" class="mb-3" alt="Avatar Image" style="width: 80px; height: 80px; border-radius: 50%;">
                </div>

                <div style="margin: 20px 0 0 15px; text-transform: uppercase;">
                    <span style="font-size: 20px; margin: 50px 0px 0px 0px" class="text-muted  border-bottom border-primary font-weight-bold"><?php echo $_SESSION['loginUser'][0]['name']?></span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <?php if(!empty($all_product)) { ?>
            <div class="text-center">
                <h2>Yours Product List</h2>
            </div>
        <div class="row">
            
            <?php foreach ($all_product as $key => $value) {?>
               
                <div class="col-md-4 px-3 my-3">
                    <div class="card">
                        <img class="card-img-top p-2" src="<?= $value['image'] ?>" width="250px" height="250px" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text" style="font-size: 18px">Product Name: <span class="text-muted"><?= $value['product_name'] ?></span></p>
                            <p class="card-text" style="font-size: 18px">Quantity: <span class="text-muted"><?php echo $value['quantity'];echo "&nbsp;".$value["unit_type_name"]; ?></span> </p>
                            <div class="text-right mt-4">
                                <a class="product_delete btn btn-danger" href="index.php?usecase=<?php echo UC_SUPPLIER ?>&p_id=<?= $value['product_id'] ?>"><i class="fa fa-trash mr-2" style="font-size: 20px"></i>Delete</a>
                                <a class="btn btn-primary mx-2" href="index.php?usecase=<?php echo UC_SUPPLIER_PRODUCT_EDT ?>&p_id=<?= $value['product_id'] ?>"><i class="fa fa-edit mr-2" style="font-size: 20px"></i>Edit</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
            
        </div>
        
        <?php }else{?>

            <div class="text-center" style="margin: 130px 0px">
                <h2>You don't have a post yet!</h2>
                <h5>Please <a href="index.php?usecase=<?php echo UC_CREATE_PRODUCT?>">create new post</a></h5>
            </div>

       <?php } ?>      
    </div>
</div>
	
    <script>
    
		$(document).ready(function(){
           $('.product_delete').click(function(){
                return confirm("are you sure you want to delete?");
           })
        })
        
    </script>

    <style>
        .jumbotron { padding: 2rem 2rem 0rem 0rem; }
        
        .banner-content {
            position: absolute;
            top: 30%;
            width: 100%;
            height: 100%;
        }
        .p_info{
        	position: absolute;
        	right: 20%;
        	top: 27%;
        }
        </style>
<?php }
}