<?php 
class FrontController{
	public function execute() {	
		if(!empty($_GET)){			
			if($_GET['usecase']==UC_SUPPLIER_LOGIN){
				$_POST['usecase'] = UC_SUPPLIER_LOGIN;
				$_POST['action'] = ACT_SUPPLIER_LOGIN;
			}
			if($_GET['usecase']==UC_MERCHANT_LOGIN){
				$_POST['usecase'] = UC_MERCHANT_LOGIN;
				$_POST['action'] = ACT_MERCHANT_LOGIN;
			}
			if($_GET["usecase"]==UC_ADMIN_LOGIN)
			{
				$_POST['usecase'] = UC_ADMIN_LOGIN;
				$_POST['action'] = ACT_ADMIN_LOGIN;
			}			
			if($_GET['usecase']==UC_REGISTER_SUPPLIER){
				$_POST['usecase'] = UC_REGISTER_SUPPLIER;
				$_POST['action'] = ACT_CREATE_SUPPLIER;
			}
			if($_GET['usecase']==UC_REGISTER_MERCHANT){
				$_POST['usecase'] = UC_REGISTER_MERCHANT;
				$_POST['action'] = ACT_CREATE_MERCHANT;
			}		
			//forgot Password Supplier
			if($_GET['usecase']==UC_SUPPLIER_FORGET_PASSWORD){
				$_POST['usecase'] = UC_SUPPLIER_FORGET_PASSWORD;
				$_POST['action'] = ACT_SUPPLIER_FORGET_PASSWORD;
			}			
			//forgot Password Merchant
			if($_GET['usecase']==UC_MERCHANT_FORGET_PASSWORD){
				$_POST['usecase'] = UC_MERCHANT_FORGET_PASSWORD;
				$_POST['action'] = ACT_MERCHANT_FORGET_PASSWORD;
			}
			if($_GET['usecase']==UC_PROGRAM){
				$_POST['usecase'] = UC_PROGRAM;
				$_POST['action'] = ACT_PROGRAM;
			}
			if($_GET['usecase']==UC_PROGRAM_DETAILS){
				$_POST['usecase']=UC_PROGRAM_DETAILS;
				$_POST['action']=ACT_PROGRAM_DETAILS;
			}
			if($_GET['usecase']==UC_CONTACT_US){
				$_POST['usecase'] = UC_CONTACT_US;
				$_POST['action'] = ACT_CONTACT_US;
			}
			if($_GET['usecase']==UC_SUPPLIER_UPDATE){
				$_POST['usecase'] = UC_SUPPLIER_UPDATE;
				$_POST['action'] = ACT_SUPPLIER_UPDATE;
			}
			if($_GET['usecase']==UC_MERCHANT_UPDATE){
				$_POST['usecase'] = UC_MERCHANT_UPDATE;
				$_POST['action'] = ACT_MERCHANT_UPDATE;
			}			
			if($_GET['usecase'] == UC_SUPPLIER) {
				$_POST['usecase'] = UC_SUPPLIER;
				$_POST['action'] = ACT_SUPPLIER;
			}			
			//New Product Create View
			if($_GET['usecase'] == UC_CREATE_PRODUCT) {
				$_POST['usecase'] = UC_CREATE_PRODUCT;
				$_POST['action'] = ACT_CREATE_PRODUCT;
			}			
			//Edit Product view
			if($_GET['usecase'] == UC_SUPPLIER_PRODUCT_EDT) {
				$_POST['usecase'] = UC_SUPPLIER_PRODUCT_EDT;
				$_POST['action'] = ACT_SUPPLIER_PRODUCT_EDT;
			}			
			//Merchant view
			if($_GET['usecase']==UC_MERCHANT_VIEW_POST_PRODUCT){
				$_POST['usecase'] = UC_MERCHANT_VIEW_POST_PRODUCT;
				$_POST['action'] = ACT_MERCHANT_VIEW_POST_PRODUCT;
			}			
			//for post product maerchant view
			if($_GET["usecase"]==UC_PRODUCT){
				$_POST["usecase"]=UC_PRODUCT;
				$_POST["action"]=ACT_PRODUCT;
			}			
			//to show details
			if($_GET["usecase"]==UC_Post_Product_Detail){
				$_POST["usecase"]=UC_Post_Product_Detail;
				$_POST["action"]=ACT_Post_Product_Detail;
			}
			if($_GET['usecase']==UC_FORGOT_PASS){
				$_POST['usecase'] = UC_FORGOT_PASS;
				$_POST['action'] = ACT_FORGOT_PASS;
			}
			//Admin start
			//Hsu Myat Thwe
			if ($_GET["usecase"]==UC_ADMIN_PRODUCT) {//admin post product view
				$_POST["usecase"]=UC_ADMIN_PRODUCT;
				$_POST["action"]=ACT_ADMIN_PRODUCT;
			}
			//Hsu Myat Thwe				
			if ($_GET["usecase"]==UC_ADMIN_PROGRAM) {
				$_POST["usecase"]=UC_ADMIN_PROGRAM;
				$_POST["action"]=ACT_ADMIN_PROGRAM;				
			}
			if ($_GET["usecase"]==UC_CAT_PRODUCT) {
				$_POST["usecase"]=UC_CAT_PRODUCT;
				$_POST["action"]=ACT_CAT_PRODUCT;
			}
			if ($_GET["usecase"]==UC_PROGRAM_CAT) {
				$_POST["usecase"]=UC_PROGRAM_CAT;
				$_POST["action"]=ACT_PROGRAM_CAT;
			}
			if ($_GET["usecase"]==UC_ADMIN_LOGOUT) {
				$_POST["usecase"]=UC_ADMIN_LOGOUT;
				$_POST["action"]=ACT_ADMIN_LOGOUT;
			}
			if ($_GET["usecase"]==UC_MERCHANT) {
				if(isset($_SESSION['page']))
				unset($_SESSION['page']);
				$_POST["usecase"]=UC_MERCHANT;
				$_POST["action"]=ACT_MERCHANT;
			}
			if ($_GET["usecase"]==UC_MERCHANT) {
				if(isset($_SESSION['page']))
				unset($_SESSION['page']);
				$_POST["usecase"]=UC_MERCHANT;
				$_POST["action"]=ACT_MERCHANT;
			}
			if ($_GET["usecase"]==UC_SUP_TABLE) {
				if(isset($_SESSION['page']))
				unset($_SESSION['page']);
				$_POST["usecase"]=UC_SUP_TABLE;
				$_POST["action"]=ACT_SUP_TABLE;
			}
			//Hsu Myat Thwe
			if($_GET["usecase"]==UC_SUGGESTION){
				$_POST["usecase"]=UC_SUGGESTION;
				$_POST["action"]=ACT_SUGGESTION;
			}
			//Hsu Myat Thwe			
			//LMM
            if ($_GET["usecase"] == UC_PROGRAM_CAT) {
                $_POST["usecase"] = UC_PROGRAM_CAT;
                $_POST["action"] = ACT_PROGRAM_CAT;
            }
            if ($_GET["usecase"] == UC_PROGRAM_CAT) {
                $_POST["usecase"] = UC_PROGRAM_CAT;
                $_POST["action"] = ACT_PROGRAM_CAT_DEL;
            }       
            //LMM
              //LPO           
            if ($_GET["usecase"] == UC_PRODUCT_CAT) {
                $_POST["usecase"] = UC_PRODUCT_CAT;
                $_POST["action"] = ACT_PRODUCT_CAT;
                $_POST["action"] = ACT_PRODUCT_CAT_DEL;
            }
            //LPO           
		/*Phyo zaw*/
			if ($_GET["usecase"]==UC_VIEW_DETAIL) {
				$_POST["usecase"]=UC_VIEW_DETAIL;
				$_POST["action"]=ACT_VIEW_DETAIL;
			}
			//admin end			
		}//End of Empty Get 
		if (empty($_POST)) {
			$_POST['usecase'] = UC_HOME;
			$_POST['action'] = ACT_HOME;
		}//Home Page View		
		if(!empty($_POST)){
			if(isset($_POST["btnMerchantLogin"]))
			{	
				$_POST["usecase"]=UC_MERCHANT_LOGIN_FIRST;
				$_POST["action"]=ACT_MERCHANT_LOGIN_CHECK;
			}
			if(isset($_POST["btnSupplierLogin"]))
			{	
				$_POST["usecase"]=UC_SUPPLIER_LOGIN_FIRST;
				$_POST["action"]=ACT_SUPPLIER_LOGIN_CHECK;
			}
			if(isset($_POST["adminLogin"]))
			{
				$_POST["usecase"]=UC_ADMIN_LOGIN;
				$_POST["action"]=ACT_ADMIN_LOGIN_CHK;
			}
			if(isset($_POST["btnMerchantRegister"])){
				$_POST["usecase"]=UC_CNF_MERCHANT_REGISTER;
				$_POST["action"]=ACT_CNF_MERCHANT_REGISTER;
			}
			if(isset($_POST["btnMerchantRegisterConfirm"])){
				$_POST["usecase"]=UC_MERCHANT_SAVE;
				$_POST["action"]=ACT_MERCHANT_SAVE;
			}
			if(isset($_POST["btnSupplierRegister"])){
				$_POST["usecase"]=UC_CNF_SUPPLIER_REGISTER;
				$_POST["action"]=ACT_CNF_SUPPLIER_REGISTER;
			}			
			if(isset($_POST["btnSupplierRegisterConfirm"])){
				$_POST["usecase"]=UC_SUPPLIER_SAVE;
				$_POST["action"]=ACT_SUPPLIER_SAVE;
			}
			if(isset($_POST["btnSupplierUpdate"])){
				$_POST["usecase"]=UC_CNF_SUPPLIER_UPDATE;
				$_POST["action"]=ACT_CNF_SUPPLIER_UPDATE;
			}
			if(isset($_POST["btnSupplierUpdateConfirm"])){
				$_POST["usecase"]=UC_SUPPLIER_UPDATE_SAVE;
				$_POST["action"]=ACT_SUPPLIER_UPDATE_SAVE;
			}		
			if(isset($_POST["btnMerchantUpdate"])){
				$_POST["usecase"]=UC_CNF_MERCHANT_UPDATE;
				$_POST["action"]=ACT_CNF_MERCHANT_UPDATE;
			}
			if(isset($_POST["btnMerchantUpdateConfirm"])){
				$_POST["usecase"]=UC_MERCHANT_UPDATE_SAVE;
				$_POST["action"]=ACT_MERCHANT_UPDATE_SAVE;
			}			
			if(isset($_POST["btnUpdate"])){
				$_POST["usecase"]=UC_UPDATE_POST_PRODUCT;
				$_POST["action"]=ACT_UPDATE_POST_PRODUCT;
			}
			if(isset($_POST["btnLogout"])){
				$_POST["usecase"]=UC_LOGOUT;
				$_POST["action"]=ACT_LOGOUT;
			}			
			//product create
			if (isset($_POST['btnProductCreate'])){
				$_POST['usecase'] = UC_CREATE_PRODUCT;
				$_POST['action'] = ACT_CREATE_PRODUCT_CHK;
			}			
			//product edit
			if (isset($_POST['btnProductEdit'])){
				$_POST['usecase'] = UC_SUPPLIER_PRODUCT_EDT;
				$_POST['action'] = ACT_SUPPLIER_PRODUCT_EDT_CHK;
			}
			if(isset($_POST["btnContactUsConfirm"])){
				$_POST["usecase"]=UC_CONTACT_US_FIRST;
				$_POST["action"]=ACT_CONTACT_US_FIRST;
			}			
			if(isset($_POST["btnContactUsSend"])){
				$_POST["usecase"]=UC_CONTACT_US_SAVE;
				$_POST["action"]=ACT_CONTACT_US_SAVE;
			}			
			//Ajax search by one data
			if(isset($_POST["search"])){
				$_POST["usecase"]=UC_PRODUCT_SEARCH;
				$_POST["action"]=ACT_PRODUCT_SEARCH_NAME;
			}			
			//back to post product merchant view
			if(isset($_POST["btnback"])){
				$_POST["usecase"]=UC_Back;
				$_POST["action"]=ACT_Back;
			}			
		//forgot password Supplier
			if(isset($_POST['btnRequestPassSuppplier'])){

			    $_POST['usecase'] = UC_SUPPLIER_FORGET_PASSWORD;
			    $_POST['action'] = ACT_SUPPLIER_REQUEST_PASSWORD;
			}
			////forgot password Merchant
			if(isset($_POST['btnRequestPassMer'])){
			    
			    $_POST['usecase'] = UC_MERCHANT_FORGET_PASSWORD;
			    $_POST['action'] = ACT_MERCHANT_REQUEST_PASSWORD;
			}
			//Admin Start
		if(isset($_POST["newModalForm"])){
				$_POST["usecase"]=UC_PRODUCT_UPDATE;
				$_POST["action"]=ACT_PRODUCT_UPDATE;
			}
			if(isset($_POST["programmeModalForm"])){
				$_POST["usecase"]=UC_PROGRAMME_UPDATE;
				$_POST["action"]=ACT_PROGRAMME_UPDATE;
			}
			if(isset($_POST["adminModalForm"])){
				$_POST["usecase"]=UC_ADMIN_PROGRAM_UPDATE;
				$_POST["action"]=ACT_ADMIN_PROGRAM_UPDATE;
			}
			if(isset($_POST["delProgrammeForm"])){
				$_POST["usecase"]=UC_PROGRAM_DELETE;
				$_POST["action"]=ACT_PROGRAM_DELETE;
			}
			if(isset($_POST["delProgrammeCategoryForm"])){
				$_POST["usecase"]=UC_ADMIN_PROGRAM_CAT_DELETE;
				$_POST["action"]=ACT_ADMIN_PROGRAM_CAT_DELETE;
			}
			if(isset($_POST["delProductCategoryForm"])){
				$_POST["usecase"]=UC_PRODUCT_CAT_DELETE;
				$_POST["action"]=ACT_PRODUCT_CAT_DELETE;
			}
			if(isset($_POST["btnMerchantBlock"])){
				$_POST["usecase"]=UC_MERCHANT_BLOCK;
				$_POST["action"]=ACT_MERCHANT_BLOCK;
			}
			if(isset($_POST["btnSupplierBlock"])){
				$_POST["usecase"]=UC_SUPPLIER_BLOCK;
				$_POST["action"]=ACT_SUPPLIER_BLOCK;
			}
			if(isset($_POST["btnMerchantSearch"])){				
				$_POST["usecase"]=UC_MERCHANT;
				$_POST["action"]=ACT_MERCHANT_SEARCH;
			}
			if(isset($_POST["btnSupplierSearch"])){
							
				$_POST["usecase"]=UC_SUPPLIER_SEARCH;
				$_POST["action"]=ACT_SUPPLIER_SEARCH;
			}
			//Hsu Myat Thwe
			if(isset($_POST["btnAdminProductSearch"])){
				$_POST["usecase"]=UC_ADMIN_PRODUCT;
				$_POST["action"]=ACT_ADMIN_PRODUCT_SEARCH;
			}
			if(isset($_POST["btnApproveStatus"])){
				$_POST["usecase"]=UC_ADMIN_PRODUCT;
				$_POST["action"]=ACT_ADMIN_PRODUCT_APPROVE;
			}
			if(isset($_POST["btnAdminProductDetails"]))
			{
				$_POST["usecase"]=UC_ADMIN_PRODUCT;
				$_POST["action"]=ACT_ADMIN_PRODUCT_DETAILS;
			}
			if(isset($_POST["productForm"]))
			{
				$_POST["usecase"]=UC_ADMIN_PRODUCT;
				$_POST["action"]=ACT_ADMIN_STATUS_SEARCH;
			}
			if(isset($_POST["selectedProductCategory"]))
			{
				$_POST["usecase"]=UC_ADMIN_PRODUCT;
				$_POST["action"]=ACT_ADMIN_STATUS_SEARCH;
			}
			if(isset($_POST["hddProductPageList"]) && @$_POST["hddProductPageList"] != "")
			{
				$_POST["usecase"]=UC_ADMIN_PRODUCT;
				$_POST["action"]=ACT_ADMIN_PAGE;
			}
			if(isset($_POST["hddSuggestionPageList"]) && @$_POST["hddSuggestionPageList"]!=""){
				$_POST["usecase"]=UC_SUGGESTION;
				$_POST["action"]=ACT_SUGGESTION;
			}
			if(isset($_POST["btnAdminSuggestionSearch"]))
			{
				$_POST["usecase"]=UC_SUGGESTION;
				$_POST["action"]=ACT_SUGGESTION;
			}
			if(isset($_POST["btnAdminProgrammeSearch"]))
			{
				$_POST["usecase"]=UC_ADMIN_PROGRAM;
				$_POST["action"]=ACT_ADMIN_PROGRAM_SEARCH;
			}
			//Hsu Myat Thwe
			//Pagination
			if(isset($_POST["hddMerchantPageList"]) && $_POST["hddMerchantPageList"]!=""){
				$_POST["usecase"]=UC_MERCHANT;
				$_POST["action"]=ACT_MERCHANT_PAGE;
			}
			if(isset($_POST["hddSupplierPageList"]) && $_POST["hddSupplierPageList"]!=""){
				$_POST["usecase"]=UC_SUP_TABLE;
				$_POST["action"]=ACT_SUPPLIER_PAGE;
			}
			if(isset($_POST["hddCustomerProductList"]) && $_POST["hddCustomerProductList"]!=""){
				$_POST["usecase"]=UC_PRODUCT;
				$_POST["action"]=ACT_CUSTOMER_PRO_PAGE;
			}
			//Pagination			
            //LMM
            if (isset($_POST["programmeCategoryForm"])) {               
                $_POST["usecase"] = UC_PROGRAM_CAT_UPLOAD_SAVE;
                $_POST["action"] = ACT_PROGRAM_CAT_UPLOAD_SAVE;
            }
            if (isset($_POST["programmeCategoryEdit"])) {                
                $_POST["usecase"] = UC_PROGRAM_CAT_EDIT_SAVE;
                $_POST["action"] = ACT_PROGRAM_CAT_EDIT_SAVE;
            }
            //LMM            
            //LPO
            if (isset($_POST["productCategory"])) {                  
                $_POST["usecase"] = UC_PRODUCT_CAT_ADD;
                $_POST["action"] = ACT_PRODUCT_CAT_ADD;               
            }
            if (isset($_POST["productCategoryEdit"])) {                
                $_POST["usecase"] = UC_PRODUCT_CAT_EDIT;
                $_POST["action"] = ACT_PRODUCT_CAT_EDIT;                
            }
            //LPO            
		//phyo zaw
			if(isset($_POST["btnAddProgramme"]))
			{
				$_POST["usecase"]=UC_ADMIN_PROGRAMME_ADD;
				$_POST["action"]=ACT_ADMIN_PROGRAMME_ADD;
			}
			if(isset($_POST["adminProgrammeSave"]))
			{
				$_POST["usecase"]=UC_ADMIN_PROGRAMME_SAVE;
				$_POST["action"]=ACT_ADMIN_PROGRAMME_SAVE;
			}
			if(isset($_POST["programme_cat_id"]))
			{
				$_POST["usecase"]=UC_ADMIN_PROGRAM;
				$_POST["action"]=ACT_ADMIN_PROG_CAT;
			}
			if(isset($_POST["adminUpdateProg"]) && $_POST["adminUpdateProg"]!="")
			{
				$_POST["usecase"]=UC_ADMIN_PROG_UPDATE;
				$_POST["action"]=ACT_ADMIN_PROG_UPDATE;
			}
			if(isset($_POST["hddProgrammePageList"]) && $_POST["hddProgrammePageList"]!=""){
				$_POST["usecase"]=UC_ADMIN_PROGRAM;
				$_POST["action"]=ACT_ADMIN_PROGRAM_PAGE;
			}
			//Admin End
		}
		switch ($_POST['usecase']) {
			case UC_HOME: 
				if ($_POST['action'] == ACT_HOME) {
					$ctl = new HomeController();
					return $ctl->renderHomePage();
				}
			case UC_PROGRAM: 
				if ($_POST['action'] == ACT_PROGRAM) {
					$ctl = new ProgramController();
					return $ctl->renderProgram();//programme
				}
			case UC_PROGRAM_DETAILS: 
				if ($_POST['action'] == ACT_PROGRAM_DETAILS) {
					$ctl = new ProgramController();
					return $ctl->renderProgramDetails();//programme details
				}
				
			case UC_SUPPLIER_LOGIN: 
				if ($_POST['action'] == ACT_SUPPLIER_LOGIN) {
					$ctl = new LoginController();
					return $ctl->renderLogin();
				}
			case UC_MERCHANT_LOGIN: 
				if ($_POST['action'] == ACT_MERCHANT_LOGIN) {
					$ctl = new LoginController();
					return $ctl->renderLogin();
				}
				//Admin Login
			case UC_ADMIN_LOGIN:$ctl=new AdminLoginController();
			if($_POST["action"]==ACT_ADMIN_LOGIN)
			return $ctl->renderAdminLogin();
			if($_POST["action"]==ACT_ADMIN_LOGIN_CHK)
			return $ctl->renderAdminLoginCheck();
			//Admin Login
			case UC_MERCHANT_LOGIN_FIRST:
				if($_POST["action"]==ACT_MERCHANT_LOGIN_CHECK)
							{
								$ctl=new LoginController();
								return $ctl->renderMerchantLoginCheck();
							}
			case UC_CONTACT_US: 
				if ($_POST['action'] == ACT_CONTACT_US) {
					$ctl = new ContactUsController();
					return $ctl->renderContactUs();//contact us
				}
			case UC_CONTACT_US_FIRST: 
				if ($_POST['action'] == ACT_CONTACT_US_FIRST) {
					$ctl = new ContactUsController();
					return $ctl->renderContactUsConfirm();//contact us
				}				
			case UC_CONTACT_US_SAVE: 
				if ($_POST['action'] == ACT_CONTACT_US_SAVE) {
					$ctl = new ContactUsController();
					return $ctl->renderContactUsSave();//contact us
				}
			case UC_SUPPLIER_LOGIN_FIRST:
				if($_POST["action"]==ACT_SUPPLIER_LOGIN_CHECK) {
					$ctl=new LoginController();
					return $ctl->renderSupplierLoginCheck();
				}				
			case UC_MERCHANT_VIEW_POST_PRODUCT: 
				if ($_POST["action"] == ACT_MERCHANT_VIEW_POST_PRODUCT) {
					$ctl = new MerchantController();
					return $ctl->renderMerchantPostProduct();//view post product
				}				
			case UC_REGISTER_SUPPLIER: 
				if ($_POST['action'] == ACT_CREATE_SUPPLIER) {
					$ctl = new SupplierController();
					return $ctl->renderSupplierView();//register supplier
				}				
			case UC_CNF_SUPPLIER_REGISTER: 
				if ($_POST['action'] == ACT_CNF_SUPPLIER_REGISTER) {
					$ctl = new SupplierController();
					return $ctl->renderSupplierConfirm();//confirm supplier
				}				
			case UC_SUPPLIER_SAVE: 
				if ($_POST['action'] == ACT_SUPPLIER_SAVE) {
					$ctl = new SupplierController();
					return $ctl->renderSupplierSave();//confirm supplier
				}				
			case UC_SUPPLIER_UPDATE: 
				if ($_POST['action'] == ACT_SUPPLIER_UPDATE) {
					$ctl = new SupplierController();
					return $ctl->renderSupplierUpdate();//update supplier
				}				
			case UC_CNF_SUPPLIER_UPDATE: 
				if ($_POST['action'] == ACT_CNF_SUPPLIER_UPDATE) {
					$ctl = new SupplierController();
					return $ctl->renderSupplierUpdateConfirm();//update confirm supplier
				}				
			case UC_SUPPLIER_UPDATE_SAVE: 
				if ($_POST['action'] == ACT_SUPPLIER_UPDATE_SAVE) {
					$ctl = new SupplierController();
					return $ctl->renderSupplierUpdateSave();//update save supplier
				}			
			//Supplier all product view
			case UC_SUPPLIER:
				if ($_POST['action'] == ACT_SUPPLIER) {
					$ctl = new SupplierController();
					return $ctl->renderSupplier();
				}			
			//Supplier product create
			case UC_CREATE_PRODUCT: $ctl = new ProductCreateController();
				if ($_POST['action'] == ACT_CREATE_PRODUCT) {
					return $ctl->renderProductCreate();
				}	
				if ($_POST['action'] == ACT_CREATE_PRODUCT_CHK) {
					return $ctl->renderProductCreateCheck();
				}
			//product edit view
			case UC_SUPPLIER_PRODUCT_EDT:
				if ($_POST['action'] == ACT_SUPPLIER_PRODUCT_EDT) {
					$ctl = new ProductEditController();
					return $ctl->renderProductEdit();
				}
				if ($_POST['action'] == ACT_SUPPLIER_PRODUCT_EDT_CHK) {
					$ctl = new ProductEditController();
					return $ctl->renderProductEditCheck();
				}				
			//ajax search
			case UC_PRODUCT_SEARCH : $ctl=new MerchantController();
				if($_POST["action"]==ACT_PRODUCT_SEARCH)
					return $ctl->renderMerchantPostProductSearch();
				if($_POST["action"]==ACT_PRODUCT_SEARCH_NAME)
					return $ctl->renderMerchantPostProduct();
					//return $ctl->renderSearch();				
			case UC_MERCHANT_UPDATE: 
				if ($_POST['action'] == ACT_MERCHANT_UPDATE) {
					$ctl = new MerchantController();
					return $ctl->renderMerchantUpdate();//update merchant profile
				}
			case UC_CNF_MERCHANT_UPDATE: 
				if ($_POST['action'] == ACT_CNF_MERCHANT_UPDATE) {
					$ctl = new MerchantController();
					return $ctl->renderMerchantUpdateConfirm();//update confirm merchant
				}
			case UC_MERCHANT_UPDATE_SAVE: 
				if ($_POST['action'] == ACT_MERCHANT_UPDATE_SAVE) {
					$ctl = new MerchantController();
					return $ctl->renderMerchantUpdateSave();//update save merchant
				}
			case UC_REGISTER_MERCHANT: 
				if ($_POST['action'] == ACT_CREATE_MERCHANT) {
					$ctl = new MerchantController();
					return $ctl->renderMerchantView();//register merchant 
				}
			case UC_CNF_MERCHANT_REGISTER: 
				if ($_POST['action'] == ACT_CNF_MERCHANT_REGISTER) {
					$ctl = new MerchantController();
					return $ctl->renderMerchantConfirm();//confirm supplier
				}
			case UC_MERCHANT_SAVE: 
				if ($_POST['action'] == ACT_MERCHANT_SAVE) {
					$ctl = new MerchantController();
					return $ctl->renderMerchantSave();//confirm supplier
				}
				
			case UC_FORGOT_PASS: $ctl = new ForgotPassController();
				if ($_POST['action'] == ACT_FORGOT_PASS) {
					return $ctl->renderForgotPass();//supplier foget password
				}
				if($_POST['action']==ACT_REQUEST_PASS){
						return $ctl->renderForgotPassRequest();
					}
			case UC_SUPPLIER_FORGET_PASSWORD:$ctl = new ForgotPassController();
			if ($_POST['action'] == ACT_SUPPLIER_FORGET_PASSWORD) {			  
			    return $ctl->renderForgotPass();//supplier foget password
			}
			if($_POST['action']==ACT_SUPPLIER_REQUEST_PASSWORD){
			    return $ctl->renderForgotPassRequest();
			}				
			case UC_MERCHANT_FORGET_PASSWORD: $ctl = new ForgotPassController();
			if ($_POST['action'] == ACT_MERCHANT_FORGET_PASSWORD) {
			    return $ctl->renderForgotPassMer();//supplier foget password
			}
			if($_POST['action']==ACT_MERCHANT_REQUEST_PASSWORD){
			    return $ctl->renderForgotPassRequestMer();
			}			
			case UC_LOGOUT: 
				if ($_POST['action'] == ACT_LOGOUT) {
					$ctl = new LogoutController();
					return $ctl->renderLogout();//programme details
				}				
			//Post Product Merchant
			case UC_PRODUCT : $ctl=new MerchantController();
				if($_POST["action"]==ACT_PRODUCT) 
					return $ctl->renderMerchantPostProduct();
				if($_POST["action"]==ACT_CUSTOMER_PRO_PAGE)
					return $ctl->renderMerchantPostProduct();
								
			//Detail
			case UC_Post_Product_Detail : $ctl=new DetailController();
				if($_POST["action"]==ACT_Post_Product_Detail) {
					return $ctl->renderPostProductDetail();
				}				
			//Back to PostProductMerchantView
			case UC_Back : $ctl=new DetailController();
				if($_POST["action"]==ACT_Back)
					return $ctl->renderBack();
			//Admin Start
		case UC_ADMIN_LOGOUT:if($_POST["action"]==ACT_ADMIN_LOGOUT){
				$ctl=new AdminLogoutController();
				return $ctl->renderAdminLogout();
			}
			case UC_ADMIN_HOME:if($_POST["action"]==ACT_ADMIN_HOME){
				$ctl=new AdminHomeController();
				return $ctl->renderAdminHome();
			}			
			case UC_SUP_POST:if($_POST["action"]==ACT_SUP_POST){
				$ctl=new ApprovePostController();
				return $ctl->renderAllPost();
			}
			case UC_ADMIN_PROGRAM:$ctl=new AdminProgrammeController();
			if($_POST["action"]==ACT_ADMIN_PROGRAM)				
				return $ctl->renderAllProgramme();
			if($_POST["action"]==ACT_ADMIN_PROGRAM_SEARCH)
				return $ctl->renderAllProgramme();
			if($_POST["action"]==ACT_ADMIN_PROGRAM_PAGE)
				return $ctl->renderAllProgramme();
			if($_POST["action"]==ACT_ADMIN_PROG_CAT)
				return $ctl->renderAllProgramme();
			case UC_CAT_PRODUCT:if($_POST["action"]==ACT_CAT_PRODUCT){					
				$ctl=new ProductCategoryController();
				return $ctl->renderAllProductCategory();
			}
			case UC_PROGRAM_CAT:if($_POST["action"]==ACT_PROGRAM_CAT){
				$ctl=new ProgrammmeCategoryController();
				return $ctl->renderAllProgrammeCategory();
			}
			case UC_ADMIN_LOGIN:if($_POST["action"]==ACT_ADMIN_LOGIN){
				$ctl=new AdminLoginController();
				return $ctl->renderAdminLogin();
			}
			case UC_PRODUCT_UPDATE:if($_POST["action"]==ACT_PRODUCT_UPDATE){
				$ctl=new ProductCategoryController();
				return $ctl->renderProductCategoryUpdate();
			}
			case UC_PROGRAMME_UPDATE:if($_POST["action"]==ACT_PROGRAMME_UPDATE){
				$ctl=new ProgrammmeCategoryController();
				return $ctl->renderProgrammeCategoryUpdate();
			}
			case UC_ADMIN_PROGRAM_UPDATE:if($_POST["action"]==ACT_ADMIN_PROGRAM_UPDATE){
				$ctl=new UpdateProgrammeController();
				return $ctl->renderUpdateProgram();
			}
			case UC_PROGRAM_DELETE:if($_POST["action"]==ACT_PROGRAM_DELETE){
				$ctl=new DeleteProgrammeController();
				return $ctl->renderDeleteProgram();
			}
			case UC_ADMIN_PROGRAM_CAT_DELETE:if($_POST["action"]==ACT_ADMIN_PROGRAM_CAT_DELETE){
				$ctl=new ProgrammmeCategoryController();
				return $ctl->renderProgrammeCategoryDelete();
			}
			case UC_PRODUCT_CAT_DELETE:if($_POST["action"]==ACT_PRODUCT_CAT_DELETE){
				$ctl=new ProductCategoryController();
				return $ctl->renderProductCategoryDelete();
			}
			//View All Merchant(MTN)
			case UC_MERCHANT:$ctl=new MerchantController();
				if($_POST["action"]==ACT_MERCHANT)				
					return $ctl->renderAllMerchant();
				if($_POST["action"]==ACT_MERCHANT_PAGE)
					return $ctl->renderAllMerchant();
				if($_POST["action"]==ACT_MERCHANT_SEARCH)
					return $ctl->renderAllMerchant();			
			//View All Supplier(MTN)
			case UC_SUP_TABLE:$ctl=new SupplierController();
				if($_POST["action"]==ACT_SUP_TABLE)				
					return $ctl->renderAllSupplier();
				if($_POST["action"]==ACT_SUPPLIER_PAGE)
					return $ctl->renderAllSupplier();			
			//Block merchant(MTN)
			case UC_MERCHANT_BLOCK:if($_POST["action"]==ACT_MERCHANT_BLOCK){
				$ctl=new MerchantController();
				return $ctl->renderMerchantBlock($_POST["btnMerchantBlock"]);
			}
			//Block Supplier(MTN)
			case UC_SUPPLIER_BLOCK:if($_POST["action"]==ACT_SUPPLIER_BLOCK){
				$ctl=new SupplierController();
				return $ctl->renderSupplierBlock($_POST["btnSupplierBlock"]);
			}
			case UC_MERCHANT_SEARCH:if($_POST["action"]==ACT_MERCHANT_SEARCH){
				$ctl=new MerchantController();
				return $ctl->renderMerchantSearchant($_POST["searchMerName"]);
			}
			case UC_SUPPLIER_SEARCH:if($_POST["action"]==ACT_SUPPLIER_SEARCH){
				$ctl=new SupplierController();
				return $ctl->renderSupplierSearch($_POST["searchSupName"]);
			}
			 //LMM  
           case UC_PROGRAM_CAT:
                if ($_POST["action"] == ACT_PROGRAM_CAT) {
                    $ctl = new ProgrammmeCategoryController();
                    return $ctl->renderAllProgrammeCategory();
                }
                if ($_POST["action"] == ACT_PROGRAM_CAT_DEL) {
                    $ctl = new ProgrammmeCategoryController();
                    return $ctl->renderProgrammeCategoryDeleteConfirm();
                }
                  //LMM			
			case UC_PROGRAM_CAT_UPLOAD_SAVE:
        if ($_POST["action"] == ACT_PROGRAM_CAT_UPLOAD_SAVE) {
            $ctl = new ProgrammmeCategoryController();
            return $ctl->renderProgrammeCategoryCreateSave();
        }			    
			case UC_PROGRAM_CAT_EDIT_SAVE:
			    if ($_POST["action"] == ACT_PROGRAM_CAT_EDIT_SAVE) {
			        $ctl = new ProgrammmeCategoryController();
			        return $ctl->renderProgrammeCategoryEditSave();
			    }		
             //LMM             
			  //phyo zaw
			case UC_ADMIN_PROGRAMME_ADD:if($_POST["action"]==ACT_ADMIN_PROGRAMME_ADD){
							$ctl=new AdminProgrammeController();
							return $ctl->renderAddProgrammeCategory();								
			}
			case UC_ADMIN_PROGRAMME_SAVE:$ctl=new AdminProgrammeController();{
										if($_POST["action"]==ACT_ADMIN_PROGRAMME_SAVE)								
											return $ctl->renderAdminProgrammeSave();			
			}
			case UC_ADMIN_PROG_UPDATE:if($_POST["action"]==ACT_ADMIN_PROG_UPDATE){				 
							$ctl=new AdminProgrammeController();
							return $ctl->renderUpdateProgrammeCategory();								
			}
			case UC_VIEW_DETAIL:if($_POST["action"]==ACT_VIEW_DETAIL){
							$ctl=new AdminProgrammeController();
							return $ctl->renderViewDetail();								
			}
			case UC_PRODUCT_CAT:
			    if ($_POST["action"] == ACT_PRODUCT_CAT) {
			        $ctl = new ProductCategoryController();
			        return $ctl->renderAllProductCategory();
			    }
			    if ($_POST["action"] == ACT_PRODUCT_CAT_DEL) {
			        $ctl = new ProductCategoryController();
			        return $ctl->renderAllProductCategoryDelete();
			    }
			case UC_PRODUCT_CAT_ADD:
			    if ($_POST["action"] == ACT_PRODUCT_CAT_ADD) {
			        $ctl = new ProductCategoryController();
			        return $ctl->renderAllProductCategoryUpload();
			    }
			case UC_PRODUCT_CAT_EDIT:
			    if ($_POST["action"] == ACT_PRODUCT_CAT_EDIT) {
			        $ctl = new ProductCategoryController();
			        return $ctl->renderAllProductCategoryEdit();
			    }
			    //LPO                
			//Hsu Myat THwe
			case UC_ADMIN_PRODUCT:$ctl=new AdminProductController();
								 if($_POST["action"]==ACT_ADMIN_PRODUCT)//hsu myat thwe admin post product							
									return $ctl->renderAdminProductList();
								 if($_POST["action"]==ACT_ADMIN_PRODUCT_SEARCH)
								 	return $ctl->renderAdminProductList();
								 	//return $ctl->renderAdminProductSearchList();
								 if($_POST["action"]==ACT_ADMIN_PRODUCT_APPROVE)
								 	return $ctl->renderAdminProductList();
								 if($_POST["action"]==ACT_ADMIN_PRODUCT_DETAILS)
								 	return $ctl->renderAdminProductList();
								 if($_POST["action"]==ACT_ADMIN_STATUS_SEARCH)
								 	return $ctl->renderAdminProductList();
								 if($_POST["action"]==ACT_ADMIN_PAGE)
								 	return $ctl->renderAdminProductList();
			case UC_SUGGESTION:$ctl=new AdminSuggestionController();
								if($_POST["action"]==ACT_SUGGESTION)	
									return $ctl->renderAdminSuggestion();	
			//Hsu Myat Thwe
			//Admin End		
			}//Switch End			
	}
}