<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageadminuserController;
use App\Http\Controllers\MasterAdmin\LoginController as MasterAdminLoginController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Customer Routes
// Route::get('/', function () {
//     return view('customer.home');
// });

Route::get('/banners',[App\Http\Controllers\BannerController::class,'index'])->name('banners.index');   

Route::post('/saveBanners',[App\Http\Controllers\BannerController::class,'store'])->name('banners.store');   

Route::post('/saveBannerImages',[App\Http\Controllers\BannerController::class,'imagesStore'])->name('banners.Imgstore');   

Route::any('/saveStatus',[App\Http\Controllers\BannerController::class,'saveStatus'])->name('banners.saveStatus'); 
  
Route::any('/deleteBanner',[App\Http\Controllers\BannerController::class,'deleteBanner'])->name('banners.deleteBanner');   

Route::get('/reviews',[App\Http\Controllers\ReviewController::class,'reviews'])->name('reviews'); 
  
Route::get('/viewReviews',[App\Http\Controllers\ReviewController::class,'viewReviews'])->name('viewReviews');   

Route::get('/addReview',[App\Http\Controllers\ReviewController::class,'addReview'])->name('addReview');   

Route::post('/saveReview',[App\Http\Controllers\ReviewController::class,'saveReview'])->name('saveReview');   

Route::get('/product-details-add',[App\Http\Controllers\Admin\ProductController::class,'productDet'])->name('product-details-add');

Route::get('/add-product-details',[App\Http\Controllers\Admin\ProductController::class,'addProductDet'])->name('products.add-product-details');

Route::post('/save-product-details',[App\Http\Controllers\Admin\ProductController::class,'saveProductDet'])->name('save-product-details');

Route::post('/getproduct_details',[App\Http\Controllers\Admin\ProductController::class,'getProductDet'])->name('getproduct_details');

Route::get('/sendAlertMail',[App\Http\Controllers\MailController::class,'sendAlertMail'])->name('sendAlertMail');

Route::get('/',[App\Http\Controllers\Customer\HomeController::class,'home'])->name('customer.home');

Route::get('/register',[App\Http\Controllers\Auth\RegisterController::class,'showCustomerRegisterForm'])->name('register-view');
Route::post('/register',[App\Http\Controllers\Auth\RegisterController::class,'createCustomer'])->name('register');
Route::post('/login_otp',[App\Http\Controllers\Auth\RegisterController::class,'createCustomer'])->name('register');


Route::get('/customer',[App\Http\Controllers\Auth\LoginController::class,'showCustomerLoginForm'])->name('customer.login-view');
Route::post('customer_mobile_email_otp_sent',[App\Http\Controllers\Auth\LoginController::class,'customer_mobile_email_otp_sent'])->name('customer_mobile_email_otp_sent');
Route::post('/customer',[App\Http\Controllers\Auth\LoginController::class,'customerLogin'])->name('customer.login');

Route::get('/customer/register',[App\Http\Controllers\Auth\RegisterController::class,'showCustomerRegisterForm'])->name('customer.register-view');
Route::post('/customer/register',[App\Http\Controllers\Auth\RegisterController::class,'createCustomer'])->name('customer.register');

// Route::group(['middleware' => ['web','auth:customer'], 'prefix' => 'customer','name' => 'customer'], function() {
    Route::get('/dashboard',[App\Http\Controllers\Customer\HomeController::class,'dashboard'])->name('customer.dashboard');

    Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'customerLogout'])->name('customer.logout');
    Route::resource('customer-details',App\Http\Controllers\Customer\CustomerDetailController::class,['as' => 'customer']);
    Route::post('/delete-customer-details', [App\Http\Controllers\Customer\CustomerDetailController::class,'destroy'])->name('customer.delete-customer-details');
    Route::post('/setPrimaryAddress',[App\Http\Controllers\Customer\CustomerDetailController::class,'setPrimaryAddress'])->name('customer.setPrimaryAddress');
    Route::post('/updateCustomer',[App\Http\Controllers\Customer\CustomerController::class,'updateCustomer'])->name('customer.updateCustomer');
    Route::get('/getOrderDetails/{order_id}',[App\Http\Controllers\Customer\OrderController::class,'getOrderDetails'])->name('customer.getOrderDetails');
// });
    
Route::group(['middleware' => ['web','auth:customer']], function() {
    Route::get('/wishlist',[App\Http\Controllers\Customer\WishlistController::class,'wishlist'])->name('wishlist');
    Route::post('/addWishlist', [App\Http\Controllers\Customer\WishlistController::class, 'addWishlist'])->name('addWishlist');
    Route::post('/removeWatchlist',[App\Http\Controllers\Customer\WishlistController::class,'removeWatchlist'])->name('removeWatchlist'); 
});

Route::get('/getProducts',[App\Http\Controllers\Customer\ProductController::class,'getProducts'])->name('getProducts');
Route::get('/viewProduct',[App\Http\Controllers\Customer\ProductController::class,'viewProducts'])->name('viewProduct');
Route::post('getvariat_id',[App\Http\Controllers\Customer\ProductController::class,'getvariat_id'])->name('getvariat_id');
Route::post('getvariat_imgid',[App\Http\Controllers\Customer\ProductController::class,'getvariat_imgid'])->name('getvariat_imgid');
Route::get('/wishlist',[App\Http\Controllers\Customer\WishlistController::class,'wishlist'])->name('wishlist');
Route::post('/addWishlist', [App\Http\Controllers\Customer\WishlistController::class, 'addWishlist'])->name('addWishlist');
Route::post('/removeWatchlist',[App\Http\Controllers\Customer\WishlistController::class,'removeWatchlist'])->name('removeWatchlist'); 


Route::get('/cart', [App\Http\Controllers\Customer\CartController::class, 'cartList'])->name('cart.list');
Route::get('/shopping_cart',[App\Http\Controllers\Customer\CartController::class,'shoppingcartList'])->name('cart.shoppinglist');
Route::post('/cart', [App\Http\Controllers\Customer\CartController::class, 'addToCart'])->name('cart.store');
Route::post('/update-cart', [App\Http\Controllers\Customer\CartController::class, 'updateCart'])->name('cart.update');
Route::post('/updatecuponcode', [App\Http\Controllers\Customer\CartController::class, 'updatecuponcode'])->name('cart.update');
Route::post('/remove', [App\Http\Controllers\Customer\CartController::class, 'removeCart'])->name('cart.remove');
Route::post('/clear', [App\Http\Controllers\Customer\CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('/moveWishlistToCart', [App\Http\Controllers\Customer\CartController::class, 'moveWishlistToCart'])->name('moveWishlistToCart');
Route::post('/buy-now',[App\Http\Controllers\Customer\OrderController::class,'buyNow'])->name('buy-now');
Route::post('/loadCheckout',[App\Http\Controllers\Customer\OrderController::class,'loadCheckout'])->name('loadCheckout');
Route::get('/checkout',[App\Http\Controllers\Customer\OrderController::class,'checkout'])->name('checkout');
Route::get('/check_out',[App\Http\Controllers\Customer\OrderController::class,'check_out'])->name('check_out');
Route::post('check_out_address_add',[App\Http\Controllers\Customer\OrderController::class,'check_out_address_add'])->name('check_out_address_add');
Route::post('check_out_address_edit',[App\Http\Controllers\Customer\OrderController::class,'check_out_address_edit'])->name('check_out_address_edit');
Route::post('check_out_address_remove',[App\Http\Controllers\Customer\OrderController::class,'check_out_address_remove'])->name('check_out_address_remove');
Route::get('payment_informations',[App\Http\Controllers\Customer\OrderController::class,'payment_informations'])->name('payment_informations');
Route::get('shipping_method',[App\Http\Controllers\Customer\OrderController::class,'shipping_method'])->name('shipping_method');
Route::post('/checkoutLogin',[App\Http\Controllers\Customer\OrderController::class,'checkoutLogin'])->name('checkoutLogin');
Route::post('/place-order',[App\Http\Controllers\Customer\OrderController::class,'placeOrder'])->name('placeOrder');
Route::get('/order_conformed',[App\Http\Controllers\Customer\OrderController::class,'order_conformed'])->name('order_conformed');
Route::get('/home_humtum', [App\Http\Controllers\Humtum_AuthController::class, 'index'])->name('home_humtum');

Route::get('/shop',[App\Http\Controllers\Customer\ProductController::class,'productListing'])->name('shop');
Route::post('/viewProductModal',[App\Http\Controllers\Customer\ProductController::class,'viewProductModal'])->name('viewProductModal');

//super admin Routes
Route::get('/superadmin',[App\Http\Controllers\Auth\LoginController::class,'showSuperAdminLoginForm'])->name('auth.superadminlogin');
Route::post('/superadmin',[App\Http\Controllers\Auth\LoginController::class,'SuperAdminLogin'])->name('superadmin.login');
Route::get('/superadmin/dashboard',[App\Http\Controllers\SuperAdmin\HomeController::class,'index'])->name('superadmin.dashboard');
Route::get('/superadmin/all_user',[App\Http\Controllers\SuperAdmin\HomeController::class,'all_user'])->name('superadmin.all_user'); 
Route::get('/superadmin/add_user',  [App\Http\Controllers\SuperAdmin\HomeController::class, 'add_user'])->name('superadmin.add_user');
Route::post('/superadmin/store_adduser',  [App\Http\Controllers\SuperAdmin\HomeController::class, 'store'])->name('superadmin.store_adduser');
Route::get('/superadmin/edit/{id}',  [App\Http\Controllers\SuperAdmin\HomeController::class, 'edit'])->name('superadmin.edit');
Route::put('/superadmin/update_adduser/{id}',  [App\Http\Controllers\SuperAdmin\HomeController::class, 'update'])->name('superadmin.update_adduser');
Route::get('/superadmin/userdelete/{id}', [App\Http\Controllers\SuperAdmin\HomeController::class,'destroy'])->name('superadmin.userdelete');  
Route::get('/admin/logout', [App\Http\Controllers\Auth\LogoutController::class, 'adminLogout'])->name('admin.logout');


//Admin Routes
Route::group(['middleware' => ['web','auth:admin']], function() {
    Route::get('/home',  [HomeController::class, 'index'])->name('home');
    Route::resource('change_password',App\Http\Controllers\Admin\ChangePasswordController::class);
    Route::post('/change-password', [App\Http\Controllers\Admin\ChangePasswordController::class, 'update'])->name('update');
    Route::resource('categories',App\Http\Controllers\Admin\CategoryController::class);
    Route::post('/delete-category', [App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('delete-category');  
    Route::post('/update-featured', [App\Http\Controllers\Admin\CategoryController::class,'updateFeatured'])->name('update-featured');

    Route::resource('sub-categories',App\Http\Controllers\Admin\SubCategoryController::class);
    Route::post('/delete-sub-category', [App\Http\Controllers\Admin\SubCategoryController::class,'destroy'])->name('delete-sub-category');  
    Route::post('/update-featured-sub-category', [App\Http\Controllers\Admin\SubCategoryController::class,'updateFeatured'])->name('update-featured-sub-category');

    Route::resource('sub-categories-list',App\Http\Controllers\Admin\SubCategoryListController::class);
    Route::post('/delete-sub-category-list', [App\Http\Controllers\Admin\SubCategoryListController::class,'destroy'])->name('delete-sub-category-list');  
    Route::post('/update-featured-sub-category-list', [App\Http\Controllers\Admin\SubCategoryListController::class,'updateFeatured'])->name('update-featured-sub-category-list');

   //Commission
   Route::resource('commission', App\Http\Controllers\SuperAdmin\CommissionController::class);
   //colors
   Route::post('/delete_commission',[App\Http\Controllers\SuperAdmin\CommissionController::class,'destroy'])->name('delete_commission');

   Route::resource('product_discounds', App\Http\Controllers\Vendor\Product_discound_Controller::class,['as'=>'vendor']);
    Route::post('/delete_discount_product',[App\Http\Controllers\Vendor\Product_discound_Controller::class,'destroy'])->name('delete_discount_product');
    Route::post('/updateDiscountStatus', [App\Http\Controllers\Vendor\Product_discound_Controller::class, 'updateDiscountStatus'])->name('updateDiscountStatus');
    Route::post('/getProductSku', [App\Http\Controllers\Vendor\Product_discound_Controller::class, 'getProductSku'])->name('getProductSku');

    Route::resource('product_offers', App\Http\Controllers\Vendor\Product_offers_Controller::class,['as'=>'vendor']);
    Route::post('/delete_product_offers',[App\Http\Controllers\Vendor\Product_offers_Controller::class,'destroy'])->name('delete_product_offers');
    Route::post('/updateOffersStatus', [App\Http\Controllers\Vendor\Product_offers_Controller::class, 'updateOffersStatus'])->name('updateOffersStatus');
    Route::post('/getProductSkuoffers', [App\Http\Controllers\Vendor\Product_offers_Controller::class, 'getProductSkuoffers'])->name('getProductSkuoffers');

    Route::resource('colors', App\Http\Controllers\Admin\ColorsController::class);
    Route::post('/delete-color', [App\Http\Controllers\Admin\ColorsController::class, 'destroy'])->name('delete-color');
    Route::post('/update-color-status', [App\Http\Controllers\Admin\ColorsController::class, 'updateColorStatus'])->name('update-color-status');

    //Variants

    Route::resource('variants', App\Http\Controllers\Admin\VariantController::class);
    Route::post('/delete-variants', [App\Http\Controllers\Admin\VariantController::class, 'destroy'])->name('delete-variants');
    Route::post('/update-variants-status', [App\Http\Controllers\Admin\VariantController::class, 'updateVariantsStatus'])->name('update-variants-status');

    Route::post('approveproduct',[App\Http\Controllers\Admin\ProductController::class,'approveproduct'])->name('approveproduct');

    Route::resource('vendors',App\Http\Controllers\Admin\VendorController::class);
    Route::post('/delete-vendor', [App\Http\Controllers\Admin\VendorController::class,'destroy'])->name('delete-vendor');

    Route::resource('orders',App\Http\Controllers\Admin\OrderController::class);
    Route::post('/delete-order', [App\Http\Controllers\Admin\OrderController::class,'destroy'])->name('delete-order');
    Route::post('/order/update-status',[App\Http\Controllers\Admin\OrderController::class,'updateStatus'])->name('order.update-status');
    Route::get('generate-pdf', [App\Http\Controllers\Admin\OrderController::class, 'generatePDF']);

    Route::resource('customers',App\Http\Controllers\Admin\CustomerController::class);
    Route::post('/delete-customer', [App\Http\Controllers\Admin\CustomerController::class,'destroy'])->name('delete-customer');
    Route::post('/admin/customer/all-orders/',[App\Http\Controllers\Admin\CustomerController::class,'allOrders'])->name('admin.customer.all-orders');
    Route::post('/admin/customer/processing-orders/',[App\Http\Controllers\Admin\CustomerController::class,'processingOrders'])->name('admin.customer.processing-orders');
    Route::post('/admin/customer/completed-orders/',[App\Http\Controllers\Admin\CustomerController::class,'completedOrders'])->name('admin.customer.completed-orders');
    Route::post('/admin/customer/cancelled-orders/',[App\Http\Controllers\Admin\CustomerController::class,'cancelledOrders'])->name('admin.customer.cancelled-orders');
    //this product
    // Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    
    // Route::post('products/product-imagestep2', [App\Http\Controllers\Admin\ProductController::class, 'FormSteptwo'])->name('products.product-imagestep2');
    // Route::post('products/step3', [App\Http\Controllers\Admin\ProductController::class, 'FormStepthree'])->name('products.step3');
    // Route::post('products/step4', [App\Http\Controllers\Admin\ProductController::class, 'FormStepfour'])->name('products.step4');
    // Route::post('products/step5', [App\Http\Controllers\Admin\ProductController::class, 'FormStepfive'])->name('products.step5');
    // Route::post('products/step6', [App\Http\Controllers\Admin\ProductController::class, 'FormStepsix'])->name('products.step6');
    // Route::post('products/product-details', [App\Http\Controllers\Admin\ProductController::class, 'products.product-details']);
    // Route::post('store_produc_details',[App\Http\Controllers\Admin\ProductController::class, 'store_produc_details']);

    // Route::post('products/editproduct-imagestep2', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('products.editproduct-imagestep2');
    // Route::post('products/editstep3', [App\Http\Controllers\Admin\ProductController::class, 'editFormStepthree'])->name('products.editstep3');

    // Route::post('products/editstep4', [App\Http\Controllers\Admin\ProductController::class, 'editFormStepfour'])->name('products.editstep4');
    // Route::post('products/editstep5', [App\Http\Controllers\Admin\ProductController::class, 'editFormStepfive'])->name('products.editstep5');
    // Route::post('products/editstep6', [App\Http\Controllers\Admin\ProductController::class, 'editFormStepsix'])->name('products.editstep6');
    // Route::post('products/editproduct-details', [App\Http\Controllers\Admin\ProductController::class, 'products.editproduct-details']);
    // Route::post('store_produc_details',[App\Http\Controllers\Admin\ProductController::class, 'store_produc_details']);
   

});


//Vendor Routes
Route::get('vendorindex',[App\Http\Controllers\Auth\LoginController::class,'showVendorindex'])->name('vendor.index');
Route::get('/vendor',[App\Http\Controllers\Auth\LoginController::class,'showVendorLoginForm'])->name('vendor.login-view');
Route::post('/vendor',[App\Http\Controllers\Auth\LoginController::class,'vendorLogin'])->name('vendor.login');
Route::post('vendor_mobile_email_otp_sent',[App\Http\Controllers\Auth\LoginController::class,'vendor_mobile_email_otp_sent'])->name('vendor_mobile_email_otp_sent');
Route::get('/vendor/register',[App\Http\Controllers\Auth\RegisterController::class,'showVendorRegisterForm'])->name('vendor.register-view');
Route::get('become_a_seller',[App\Http\Controllers\Auth\RegisterController::class,'become_a_seller'])->name('vendor.become_a_seller');
// Route::post('/vendor/register',[App\Http\Controllers\Auth\RegisterController::class,'createVendor'])->name('vendor.register');
Route::get('/vendor/sendOTP',[App\Http\Controllers\Auth\RegisterController::class,'sendOTP'])->name('vendor.sendOTP');
Route::get('/vendor/sendOTPEmail',[App\Http\Controllers\Auth\RegisterController::class,'sendOTPEmail'])->name('vendor.sendOTPEmail');
Route::post('/vendor/addVendor',[App\Http\Controllers\Auth\RegisterController::class,'addVendor'])->name('vendor.addVendor');

Route::group(['middleware' => ['web','auth:vendor'], 'prefix' => 'vendor'], function() {
    Route::get('/add_vendor_details', [App\Http\Controllers\Vendor\VendorDetailController::class, 'addVendorDetails'])->name('vendor.addVendorDetails');
    
    Route::post('/store_vendor_details', [App\Http\Controllers\Vendor\VendorDetailController::class, 'storeVendorDetails'])->name('vendor.storeVendorDetails');

    Route::get('/edit_vendor_details', [App\Http\Controllers\Vendor\VendorDetailController::class, 'edit_vendor_details'])->name('vendor.edit_vendor_details');
    Route::put('/update_vendor_details/{id}', [App\Http\Controllers\Vendor\VendorDetailController::class, 'updateVendorDetails'])->name('vendor.updateVendorDetails');


});
Route::get('become_a_vendor',[App\Http\Controllers\Vendor\VendorDetailController::class,'become_a_vendor'])->name('become_a_vendor');
    Route::get('vendor/get_vendor_details', [App\Http\Controllers\Vendor\VendorDetailController::class, 'getVendorDetails'])->name('vendor.getVendorDetails');
    Route::get('vendor/bank_details', [App\Http\Controllers\Vendor\VendorDetailController::class, 'bankDetails'])->name('vendor.bankDetails');
    Route::post('vendor/addBankDetail', [App\Http\Controllers\Vendor\VendorDetailController::class, 'saveBankDetail'])->name('vendor.addBankDetail');
    Route::get('vendor/easy_ship_setting', [App\Http\Controllers\Vendor\VendorDetailController::class, 'easyShip'])->name('vendor.easyShip');
    Route::post('vendor/saveShipAddress', [App\Http\Controllers\Vendor\VendorDetailController::class, 'saveShipAddress'])->name('vendor.saveShipAddress');
    Route::any('vendor/shipping_setting', [App\Http\Controllers\Vendor\VendorDetailController::class, 'shippingSetting'])->name('vendor.shippingSetting');
    Route::any('vendor/update_time', [App\Http\Controllers\Vendor\VendorDetailController::class, 'update_time'])->name('vendor.update_time');
    Route::any('vendor/update_holidays', [App\Http\Controllers\Vendor\VendorDetailController::class, 'update_holidays'])->name('vendor.update_holidays');
    Route::any('vendor/update_days', [App\Http\Controllers\Vendor\VendorDetailController::class, 'update_days'])->name('vendor.update_days');
    Route::any('vendor/return_address', [App\Http\Controllers\Vendor\VendorDetailController::class, 'return_address'])->name('vendor.return_address');
    Route::any('vendor/update_email', [App\Http\Controllers\Vendor\VendorDetailController::class, 'update_email'])->name('vendor.update_email');
    Route::any('vendor/update_rules', [App\Http\Controllers\Vendor\VendorDetailController::class, 'update_rules'])->name('vendor.update_rules');
    Route::any('vendor/update_rma', [App\Http\Controllers\Vendor\VendorDetailController::class, 'update_rma'])->name('vendor.update_rma');
    Route::any('vendor/update_return_address', [App\Http\Controllers\Vendor\VendorDetailController::class, 'update_return_address'])->name('vendor.update_return_address');
    Route::any('vendor/vendor_dashboard', [App\Http\Controllers\Vendor\VendorDetailController::class, 'dashboard'])->name('vendor.dashboard');
    Route::any('vendor/check_status', [App\Http\Controllers\Vendor\VendorDetailController::class, 'check_status'])->name('vendor.check_status');
    Route::get('vendor/logout', [App\Http\Controllers\Auth\LogoutController::class, 'vendorLogout'])->name('vendor.logout');

// Route::group(['middleware' => ['web','auth:vendor'], 'prefix' => 'vendor'], function() {
Route::group(['middleware' => ['web','auth:vendor','isAddedVendorDetails'], 'prefix' => 'vendor','name' => 'vendor'], function() {
    Route::any('Vendordashboard',[App\Http\Controllers\Auth\LoginController::class,'showVendordashboard'])->name('vendor.showdashboard');
    Route::get('/dashboard',[App\Http\Controllers\Vendor\HomeController::class,'index'])->name('vendor.dashboard');
    Route::post('/dashboard',[App\Http\Controllers\Vendor\HomeController::class,'index'])->name('vendor.dashboard');
    Route::resource('vendor-change-password',App\Http\Controllers\Vendor\VendorChangePasswordController::class);
    Route::post('/vendor-change-password', [App\Http\Controllers\Vendor\VendorChangePasswordController::class, 'update'])->name('vendor.update');
    Route::resource('users',App\Http\Controllers\Vendor\VendorController::class,['as' => 'vendor']);
    Route::post('/delete-user', [App\Http\Controllers\Vendor\VendorController::class,'destroy'])->name('vendor.delete-user');   
    Route::resource('categories',App\Http\Controllers\Vendor\CategoryController::class,['as' => 'vendor']);
    
    Route::resource('order-items',App\Http\Controllers\Vendor\OrderItemController::class,['as'=>'vendor']); 
    Route::get('orderaccept', [App\Http\Controllers\Vendor\OrderItemController::class, 'orderaccept'])->name('vendor.order-items.orderaccept'); 
    Route::post('orderaccept_approval', [App\Http\Controllers\Vendor\OrderItemController::class, 'orderaccept_approval'])->name('orderaccept_approval'); 
    Route::post('orderaccept_reject', [App\Http\Controllers\Vendor\OrderItemController::class, 'orderaccept_reject'])->name('orderaccept_reject'); 
 
    
    Route::resource('coupons',App\Http\Controllers\Vendor\promoteController::class,['as'=>'vendor']);
    Route::post('/updatecouponsStatus', [App\Http\Controllers\Vendor\promoteController::class,'updatecouponsStatus'])->name('updatecouponsStatus'); 
   
  //  Route::resource('order-accepts',App\Http\Controllers\Vendor\OrderItemController::class,['as'=>'vendor']);  
  
    // Route::resource('brands',App\Http\Controllers\Vendor\BrandController::class,['as' => 'vendor']);
    // Route::post('/delete-brand', [App\Http\Controllers\Vendor\BrandController::class,'destroy'])->name('vendor.delete-brand');  
    // Route::post('/update-brand-status', [App\Http\Controllers\Vendor\BrandController::class,'updateBrandStatus'])->name('vendor.update-brand-status');
    
    
    
});

//Common
Route::post('/getStateList',[App\Http\Controllers\CommonController::class,'getStateList'])->name('getStateList');
Route::post('/getCityList',[App\Http\Controllers\CommonController::class,'getCityList'])->name('getCityList');
Route::get('/download-pdf-order/{id}', [App\Http\Controllers\Admin\OrderController::class,'downloadPdf'])->name('download-pdf-order');
Route::get('/send-order-notification', [App\Http\Controllers\NotificationController::class, 'sendOrderNotification']);

Route::group(['middleware' => ['web','auth:vendor,admin','adminOrVendor']], function() {
    Route::post('/getSubCategory', [App\Http\Controllers\Admin\ProductController::class, 'getSubCategory'])->name('getSubCategory');
    Route::post('/getsubcategorylist', [App\Http\Controllers\Admin\ProductController::class, 'getsubcategorylist'])->name('getsubcategorylist');
    Route::get('manage_image_trackers',[App\Http\Controllers\Admin\ProductController::class,'manage_image_trackers'])->name('manage_image_trackers');
    Route::post('post_image_trackers',[App\Http\Controllers\Admin\ProductController::class,'post_image_trackers'])->name('post_image_trackers');
    Route::resource('brands',App\Http\Controllers\Admin\BrandController::class);
    Route::post('/delete-brand', [App\Http\Controllers\Admin\BrandController::class,'destroy'])->name('delete-brand');  
    Route::post('/update-brand-status', [App\Http\Controllers\Admin\BrandController::class,'updateBrandStatus'])->name('update-brand-status');

    Route::resource('sizes',App\Http\Controllers\Admin\SizeController::class);
    Route::post('/delete-size', [App\Http\Controllers\Admin\SizeController::class,'destroy'])->name('delete-size');  
    Route::post('/update-size-status', [App\Http\Controllers\Admin\SizeController::class,'updateSizeStatus'])->name('update-size-status');

    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::any('vendor_list',[App\Http\Controllers\Admin\ProductController::class,'vendor_list'])->name('products.vendor_list');
    Route::get('kyc_verification',[App\Http\Controllers\Admin\ProductController::class,'kyc_verification'])->name('products.kyc_verification');
    Route::post('kyc_rejected',[App\Http\Controllers\Admin\ProductController::class,'kyc_rejected'])->name('products.kyc_rejected');
    Route::post('kyc_completed',[App\Http\Controllers\Admin\ProductController::class,'kyc_completed'])->name('products.kyc_completed');
    Route::post('vendors_data',[App\Http\Controllers\Admin\ProductController::class,'vendors_data'])->name('products.vendors_data');
    Route::post('products/product-imagestep2', [App\Http\Controllers\Admin\ProductController::class, 'FormSteptwo'])->name('products.product-imagestep2');
    Route::post('products/step3', [App\Http\Controllers\Admin\ProductController::class, 'FormStepthree'])->name('products.step3');
    Route::post('products/step4', [App\Http\Controllers\Admin\ProductController::class, 'FormStepfour'])->name('products.step4');
    Route::post('products/step5', [App\Http\Controllers\Admin\ProductController::class, 'FormStepfive'])->name('products.step5');
    Route::post('products/step6', [App\Http\Controllers\Admin\ProductController::class, 'FormStepsix'])->name('products.step6');
    Route::post('products/product-details', [App\Http\Controllers\Admin\ProductController::class, 'products.product-details']);
    Route::post('store_produc_details',[App\Http\Controllers\Admin\ProductController::class, 'store_produc_details']);

    Route::post('products/editproduct-imagestep2', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('products.editproduct-imagestep2');
    Route::post('products/editstep3', [App\Http\Controllers\Admin\ProductController::class, 'editFormStepthree'])->name('products.editstep3');

    Route::post('products/editstep4', [App\Http\Controllers\Admin\ProductController::class, 'editFormStepfour'])->name('products.editstep4');
    Route::post('products/editstep5', [App\Http\Controllers\Admin\ProductController::class, 'editFormStepfive'])->name('products.editstep5');
    Route::post('products/editstep6', [App\Http\Controllers\Admin\ProductController::class, 'editFormStepsix'])->name('products.editstep6');
    Route::post('products/editproduct-details', [App\Http\Controllers\Admin\ProductController::class, 'products.editproduct-details']);
 Route::resource('coupons',App\Http\Controllers\Vendor\promoteController::class,['as'=>'vendor']);
    Route::post('/updatecouponsStatus', [App\Http\Controllers\Vendor\promoteController::class,'updatecouponsStatus'])->name('updatecouponsStatus'); 
   
    Route::get('/product-import',[App\Http\Controllers\Admin\ProductController::class,'importView'])->name('product-import-view');
    Route::get('/product-imageupload',[App\Http\Controllers\Admin\ProductController::class,'imageupload'])->name('product-image-upload');
    Route::post('storebulkimageupload', [App\Http\Controllers\Admin\ProductController::class, 'bulkimageupload'])->name('storebulkimageupload');
    Route::post('/import',[App\Http\Controllers\Admin\ProductController::class,'import'])->name('import');
    Route::get('/export-products',[App\Http\Controllers\Admin\ProductController::class,'exportProducts'])->name('export-products');
    Route::post('/getBrands', [App\Http\Controllers\Admin\ProductController::class, 'getBrands'])->name('getBrands');
    Route::get('/export-categorys',[App\Http\Controllers\Admin\ProductController::class,'exportcategorys'])->name('export-categorys');
    Route::get('/export-subcategorys',[App\Http\Controllers\Admin\ProductController::class,'exportsubcategorys'])->name('export-subcategorys');
    Route::get('/export-subcategorylist',[App\Http\Controllers\Admin\ProductController::class,'exportsubcategoryslist'])->name('export-subcategorylist');
    Route::resource('product_update', App\Http\Controllers\Product_updateController::class);
    Route::post('/getproduct_variant_sku', [App\Http\Controllers\Product_updateController::class, 'getproduct_variant_sku'])->name('getproduct_variant_sku');
    Route::post('/getproduct_variant', [App\Http\Controllers\Product_updateController::class, 'getproduct_variant'])->name('getproduct_variant');
    Route::post('product_update', [App\Http\Controllers\Product_updateController::class, 'product_update'])->name('product_update');

   
});


// Master Route  Start

Route::get('/master-admin', [MasterAdminLoginController::class, 'showLogin'])->name('master-admin');


//Master Route End






    

