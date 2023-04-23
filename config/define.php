<?php 
//Home
define("UC_HOME", "home");
define("ACT_HOME", "home view");

//merchant login
define("UC_MERCHANT_LOGIN","merchant login");
define("ACT_MERCHANT_LOGIN", "merchant login action");
define("UC_MERCHANT_LOGIN_FIRST","merchant login first");
define("ACT_MERCHANT_LOGIN_CHECK","merchant login check");
//supplier login
define("UC_SUPPLIER_LOGIN","supplier login");
define("ACT_SUPPLIER_LOGIN", "supplier login action");
define("UC_SUPPLIER_LOGIN_FIRST","supplier login first");
define("ACT_SUPPLIER_LOGIN_CHECK","supplier login check");

//logout 
define("UC_LOGOUT","logout");
define("ACT_LOGOUT", "logout action");

//Supplier

define("UC_REGISTER_SUPPLIER", "create supplier");
define("ACT_CREATE_SUPPLIER", "create supplier action");

define("UC_CNF_SUPPLIER_REGISTER", "confirm supplier register");
define("ACT_CNF_SUPPLIER_REGISTER", "confirm supplier register view");

define("UC_SUPPLIER_SAVE", "supplier save");
define("ACT_SUPPLIER_SAVE", "supplier save action");

define("UC_SUPPLIER_UPDATE", "supplier update");
define("ACT_SUPPLIER_UPDATE", "supplier update view");

define("UC_CNF_SUPPLIER_UPDATE", "confirm supplier update");
define("ACT_CNF_SUPPLIER_UPDATE", "confirm supplier update view");

define("UC_SUPPLIER_UPDATE_SAVE", "supplier update save");
define("ACT_SUPPLIER_UPDATE_SAVE", "supplier update save action");

define("UC_SUPPLIER", "supplier product");
define("ACT_SUPPLIER", "supplier product view");

define("UC_CREATE_PRODUCT", "create supplier product");
define("ACT_CREATE_PRODUCT", "create supplier product action");
define("ACT_CREATE_PRODUCT_CHK", "create supplier product check");

//supplier product edit
define("UC_SUPPLIER_PRODUCT_EDT", "supplier product edit");
define("ACT_SUPPLIER_PRODUCT_EDT", "supplier product edit view");

define("ACT_SUPPLIER_PRODUCT_EDT_CHK", "supplier product edit check");


//Merchant
define("UC_REGISTER_MERCHANT", "create merchant");
define("ACT_CREATE_MERCHANT", "create merchant action");

define("UC_CNF_MERCHANT_REGISTER", "confirm merchant register");
define("ACT_CNF_MERCHANT_REGISTER", "confirm merchant register view");

define("UC_MERCHANT_SAVE", "merchant save");
define("ACT_MERCHANT_SAVE", "merchant save action");

define("UC_MERCHANT_UPDATE", "merchant update");
define("ACT_MERCHANT_UPDATE", "merchant update view");

define("UC_CNF_MERCHANT_UPDATE", "confirm merchant update");
define("ACT_CNF_MERCHANT_UPDATE", "confirm merchant update view");

define("UC_MERCHANT_UPDATE_SAVE", "merchant update save");
define("ACT_MERCHANT_UPDATE_SAVE", "merchant update save action");

define("UC_MERCHANT_VIEW_POST_PRODUCT", 'merchant');
define("ACT_MERCHANT_VIEW_POST_PRODUCT", "merchant view");

//post product merchant search 
define("UC_PRODUCT_SEARCH","product search");
define("ACT_PRODUCT_SEARCH","product search function");
define("ACT_PRODUCT_SEARCH_NAME","action product search name");

define("UC_PRODUCT", "product search");
define("ACT_PRODUCT", "product search view");

define("UC_Post_Product_Detail", "product detail");
define("ACT_Post_Product_Detail", "product detail view");

define("UC_Back", "back to merchant");
define("ACT_Back", "back to merchant view");

define("ACT_CUSTOMER_PRO_PAGE","customer product pagination");
//Forgot Password (MTN)
define("UC_FORGOT_PASS","forgot password");
define("ACT_FORGOT_PASS","action forgot password");
define("ACT_REQUEST_PASS","action password request");

//forget password
define("UC_SUPPLIER_FORGET_PASSWORD", "supplier forget password");
define("ACT_SUPPLIER_FORGET_PASSWORD","supplier forget password view");
define("ACT_SUPPLIER_REQUEST_PASSWORD","action supplier request password");

define("UC_MERCHANT_FORGET_PASSWORD", "merchant forget password");
define("ACT_MERCHANT_FORGET_PASSWORD","merchant forget password view");
define("ACT_MERCHANT_REQUEST_PASSWORD","action merchant request password");

//programme
define("UC_PROGRAM", "programme");
define("ACT_PROGRAM", "programme view");

//programme detail
define("UC_PROGRAM_DETAILS", "programme details");
define("ACT_PROGRAM_DETAILS", "programme details view");

//contact
define("UC_CONTACT_US", "contact us");
define("ACT_CONTACT_US","contact us view");
define("UC_CONTACT_US_FIRST", "contact us first");
define("ACT_CONTACT_US_FIRST","contact us view first");
define("UC_CONTACT_US_SAVE", "contact us save");
define("ACT_CONTACT_US_SAVE","contact us save action");
//Admin Start
define("UC_ADMIN_HOME", "Admin home");
define("ACT_ADMIN_HOME","act admin home");


//Image
define("IMAGE", "admin_programme_image");
define("VIDEO", "admin_programme_video");
define("UPDATE_VIDEO", "admin_programme_video_update");
define("UPDATE_IMAGE", "admin_programme_image_update");
//image


//supplier post
define("UC_SUP_POST","supplier post");
define('ACT_SUP_POST', 'action supplier post');
//ADMIN PROGRAM
define("UC_ADMIN_PROGRAM", "admin program");
define("ACT_ADMIN_PROGRAM", "Action admin program");

//product category
define("UC_CAT_PRODUCT", "product category");
define("ACT_CAT_PRODUCT", "action product category");
//program Category
//define("UC_PROGRAM_CAT", "program category");
//define("ACT_PROGRAM_CAT","action program category");
//ADMIN LOGIN
define("UC_ADMIN_LOGIN","admin login");
define("ACT_ADMIN_LOGIN","action admin login");
define("ACT_ADMIN_LOGIN_CHK","admin login check");
//admin logout
define("UC_ADMIN_LOGOUT","Admin logout");
define("ACT_ADMIN_LOGOUT","admin logout action");
//UPDATE PRODUCT
define("UC_PRODUCT_UPDATE", "update product");
define("ACT_PRODUCT_UPDATE","action update product");
//UPDATE PROGRAMME
define("UC_PROGRAMME_UPDATE", "update programme");
define("ACT_PROGRAMME_UPDATE","action update programme");
//admin update programme
define("UC_ADMIN_PROGRAM_UPDATE","update admin programme");
define("ACT_ADMIN_PROGRAM_UPDATE","action update admin programme");
//ADMIN PROGRAM DELETE
define("UC_ADMIN_PROGRAM_CAT_DELETE","delete admin programme");
define("ACT_ADMIN_PROGRAM_CAT_DELETE","delete action programme");
//programme delete
define("UC_PROGRAM_DELETE", "delete programme");
define("ACT_PROGRAM_DELETE","action delete programme");
//product category
define("UC_PRODUCT_CAT_DELETE", "delete product category");
define("ACT_PRODUCT_CAT_DELETE", "action delete product category");

//merchant (MTN)
define("UC_MERCHANT","admin merchant");
define("ACT_MERCHANT","admin merchant action");
define("ACT_MERCHANT_PAGE", "action merchant page");
//supplier table (MTN)
define("UC_SUP_TABLE","supplier table");
define("ACT_SUP_TABLE", "action supplier table");
define("ACT_SUPPLIER_PAGE", "action supplier page");
//merchant block (MTN)
define("UC_MERCHANT_BLOCK","merchant block");
define("ACT_MERCHANT_BLOCK","action merchant block");
//supplier block(MTN)
define("UC_SUPPLIER_BLOCK","supplier block");
define("ACT_SUPPLIER_BLOCK","action supplier block");
//merchant Search (MTN)
define("UC_MERCHANT_SEARCH","merchant search");
define("ACT_MERCHANT_SEARCH","action merchant search");
//Supplier Search (MTN)
define("UC_SUPPLIER_SEARCH","supplier search");
define("ACT_SUPPLIER_SEARCH","action supplier search");

//Hsu Myat Thwe start 2019/09/27
define("UC_ADMIN_PRODUCT","admin product list");
define("ACT_ADMIN_PRODUCT","admin product list view");
define("ACT_ADMIN_PRODUCT_SEARCH","admin product list search");
define("ACT_ADMIN_PRODUCT_APPROVE","admin product approve");
define("ACT_ADMIN_PRODUCT_DETAILS", "admin product details view");
define("ACT_ADMIN_STATUS_SEARCH", "admin product approved status search");
define("ACT_ADMIN_PAGE", "admin product page number");

define("UC_SUGGESTION","admin suggestion");
define("ACT_SUGGESTION","admin suggestion view");
define("LIMIT_ROWS", 5); 
define("ACT_ADMIN_PROGRAM_SEARCH", "admin program search");
define("ACT_ADMIN_PROGRAM_PAGE", "admin program page link");
//Hsu MyatThwe end 2019/09/27

//LMM
//program Category
define("UC_PROGRAM_CAT", "program category");
define("ACT_PROGRAM_CAT","action program category");

//programme category delete
define("ACT_PROGRAM_CAT_DEL", "action sprogramme category del");

//programme category upload
define("UC_PROGRAM_CAT_UPLOAD_SAVE", "programme category upload save");
define("ACT_PROGRAM_CAT_UPLOAD_SAVE", "action programme category upload save");

//programme category  edit
define("UC_PROGRAM_CAT_EDIT_SAVE", "programme category edit save");
define("ACT_PROGRAM_CAT_EDIT_SAVE", "action programme category edit save");

//PHYO ZAW


define("UC_ADMIN_PROGRAMME_ADD","add admin programme");
define("ACT_ADMIN_PROGRAMME_ADD","action add admin programme");

define("UC_VIEW_DETAIL","view detail");
define("ACT_VIEW_DETAIL","action view detail");

define("UC_ADMIN_PROG_UPDATE","programme update");
define("ACT_ADMIN_PROG_UPDATE","action programme update");

define("UC_PROGRAMME_SEARCH","programme search");
define("ACT_PROGRAMME_SEARCH","action programme search");

define("UC_ADMIN_PROGRAMME_SAVE", "admin program save");
define("ACT_ADMIN_PROGRAMME_SAVE", "admin program save action");
define("ACT_ADMIN_PROG_CAT", "admin programme category");
//PHYO ZAW

//LPO

define("UC_PRODUCT_CAT", "all procuct category");
define("ACT_PRODUCT_CAT", "ation all procuct category");
//Upload product category
define("UC_PRODUCT_CAT_ADD", "product category upload");
define("ACT_PRODUCT_CAT_ADD", "action  product category upload");
//product category delete
define("ACT_PRODUCT_CAT_DEL", "action product category delete");
//product category edit
define("UC_PRODUCT_CAT_EDIT", "procuct category edit");
define("ACT_PRODUCT_CAT_EDIT", "action procuct category edit");
//Admin End