<?php 
//Config
include "config/config.php";
include "config/define.php";

//Controller
include "controller/FrontController.php";
include "controller/HomeController.php";
include "controller/ProgramController.php";
include "controller/LoginController.php";
include "controller/LogoutController.php";
include "controller/SupplierController.php";
include "controller/MerchantController.php";
include 'controller/FogetPasswordController.php';
include 'controller/ProductCreateController.php';
include 'controller/ProductEditController.php';
include 'controller/ContactUsController.php';
include 'controller/DetailController.php';
include 'controller/ForgotPassController.php';
//Admin Start
include 'controller/AdminHomeController.php';
include 'controller/AdminLoginController.php';
include 'controller/AdminLogoutController.php';
include 'controller/AdminProductController.php';
include 'controller/AdminProgrammeController.php';
include 'controller/AdminSuggestionController.php';
include 'controller/DeleteProgrammeController.php';
include 'controller/ProductCategoryController.php';
include 'controller/UpdateProgrammeController.php';
include 'controller/ProgrammmeCategoryController.php';
include 'controller/_file_upload.php';
include 'controller/_img_upload.php';
include 'controller/_video_file_upload.php';
//admin end
//View
include "view/View.php";
include "view/HomeView.php";
include "view/ProgramView.php";
include "view/ProgramDetailView.php";
include "view/SupplierSaveView.php";
include "view/MerchantSaveView.php";
include 'view/LoginView.php';
include 'view/SupplierLoginView.php';
include "view/MerchantLoginView.php";
include 'view/ForgetPasswordView.php';
include 'view/SupplierForgetPasswordView.php';
include 'view/MerchantForgetPasswordView.php';
include 'view/MerchantConfirmView.php';
include 'view/SupplierConfirmView.php';
include 'view/SupplierUpdateProfileView.php';
include 'view/SupplierUpdateProfileConfirmView.php';
include 'view/MerchantUpdateProfileView.php';
include 'view/MerchantUpdateProfileConfirmView.php';
include 'view/SupplierView.php';
include 'view/ProductCreateView.php';
include 'view/ProductEditView.php';
include 'view/ContactUsSendView.php';
include 'view/ContactUsView.php';
include 'view/PostProductMerchantView.php';
include 'view/PostProductDetailView.php';
include 'view/ForgotPassView.php';
//admin view start
include 'view/ViewLogin.php';
include 'view/AdminView.php';
include 'view/AdminHomeView.php';
include 'view/AdminLoginView.php';
include 'view/AdminProductListView.php';
include 'view/AdminSuggestionView.php';
include 'view/AllMerchantView.php';
include 'view/AllProductCategoryView.php';
include 'view/AllProgrammeView.php';
include 'view/AllProgrammeDetailView.php';
include 'view/AllSupplierView.php';
include 'view/ProgrammeCategoryView.php';
//admin view end
//model
include 'model/dao/DAO.php';
include 'model/dao/RegistrationDao.php';
include 'model/dao/ProductCategoryDao.php';
include 'model/dao/ProductDao.php';
include 'model/dao/UserDao.php';
include 'model/dao/ProgramDao.php';
include 'model/dao/ProgramDetailDao.php';
include 'model/dao/SuggestionDao.php';
//admin start
include 'model/dao/AdminDao.php';
include 'model/dao/ProgrammeCategoryDao.php';
include 'model/dao/ProgrammeDao.php';
//admin end
include 'model/entity/Merchant.php';
include 'model/entity/Supplier.php';
include 'model/entity/Suggestion.php';

include 'phpmailer/PHPMailerAutoload.php';
//admin start
include 'model/entity/ProductCategory.php';
include 'model/entity/ProgrammeCategory.php';
include 'model/entity/admin.php';
//admin end
session_cache_limiter("none");
session_start();
$controller = new FrontController();
$page = $controller->execute();
$page->display();
