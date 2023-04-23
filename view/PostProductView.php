<?php
class PostProductView extends View{
	public function displayBody(){?>
		
		<div class="container-fluid p-0">
		<div class="login-bg-img"></div>
    </div>
    <nav class="navbar navbar-expand-md navbar-light mt-3">
            <div class="container">
                <button class="navbar-toggler bg-light ml-3" data-toggle="collapse" data-target="#mynav">
                    <span class="navbar-toggler-icon" id="nav"></span>
                </button>

                <!-- Sub Nav -->
               <!--  <div class="collapse navbar-collapse" id="mynav">
                    <ul class="unst navbar-nav mr-auto py-1">

                        <li class="nav-item"><a href="index.html" class="btn btn-outline-secondary btn-sm mx-4" active>All Product</a></li>

                        <li class="nav-item"><a href="member.html" class="btn btn-outline-secondary btn-sm mx-4">something 1</a></li>

                        <li class="nav-item"><a href="#" class="btn btn-outline-secondary btn-sm mx-4">somethig2</a></li>

                        <li class="nav-item"><a href="#" class="btn btn-outline-secondary btn-sm mx-4">something3</a></li>
                        <li class="nav-item"><a href="#" class="btn btn-outline-secondary btn-sm mx-4">something4</a></li>
                        <li class="nav-item">
                            
                    </ul>
                </div> -->
            </div><!-- Container -->
        </nav>
    <div class="container">
        <form class="m-2" method="post">
        <div class="row">
            <div class="col-md-4 px-3  my-3">
                <div class="card">
                  <img class="card-img-top" src="images/login1.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <button type="submit" class="btn btn-sm btn-primary" name="btnUpdate">Update</button>
                    <button type="submit" class="btn btn-sm btn-danger" name="btnDelete">Delete</button>
                  </div>
                </div>
            </div>
            <div class="col-md-4 px-3 my-3">
                <div class="card">
                  <img class="card-img-top" src="images/login1.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <button type="submit" class="btn btn-sm btn-primary" name="btnUpdate">Update</button>
                    <button type="submit" class="btn btn-sm btn-danger" name="btnDelete">Delete</button>
                  </div>
                </div>
            </div>
            <div class="col-md-4 px-3 my-3">
                <div class="card">
                  <img class="card-img-top" src="images/login1.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <button type="submit" class="btn btn-sm btn-primary" name="btnUpdate">Update</button>
                    <button type="submit" class="btn btn-sm btn-danger" name="btnDelete">Delete</button>
                  </div>
                </div>
            </div>

            <div class="col-md-4 px-3  my-3">
                <div class="card">
                  <img class="card-img-top" src="images/login1.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <button type="submit" class="btn btn-sm btn-primary" name="btnUpdate">Update</button>
                    <button type="submit" class="btn btn-sm btn-danger" name="btnDelete">Delete</button>
                  </div>
                </div>
            </div>
            <div class="col-md-4 px-3 my-3">
                <div class="card">
                  <img class="card-img-top" src="images/login1.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <button type="submit" class="btn btn-sm btn-primary" name="btnUpdate">Update</button>
                    <button type="submit" class="btn btn-sm btn-danger" name="btnDelete">Delete</button>
                  </div>
                </div>
            </div>
        </div>
        </form>      
    </div>
		
<?php 	}
}