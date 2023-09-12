<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageadminuserController;



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

Route::get('/',[App\Http\Controllers\Customer\HomeController::class,'home'])->name('customer.home');

Route::get('/register',[App\Http\Controllers\Auth\RegisterController::class,'showCustomerRegisterForm'])->name('register-view');
Route::post('/register',[App\Http\Controllers\Auth\RegisterController::class,'createCustomer'])->name('register');


Route::get('/customer',[App\Http\Controllers\Auth\LoginController::class,'showCustomerLoginForm'])->name('customer.login-view');
Route::post('/customer',[App\Http\Controllers\Auth\LoginController::class,'customerLogin'])->name('customer.login');

Route::get('/customer/register',[App\Http\Controllers\Auth\RegisterController::class,'showCustomerRegisterForm'])->name('customer.register-view');
Route::post('/customer/register',[App\Http\Controllers\Auth\RegisterController::class,'createCustomer'])->name('customer.register');

Route::group(['middleware' => ['web','auth:customer'], 'prefix' => 'customer','name' => 'customer'], function() {
    Route::get('/dashboard',[App\Http\Controllers\Customer\HomeController::class,'dashboard'])->name('customer.dashboard');
    Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'customerLogout'])->name('customer.logout');
    Route::resource('customer-details',App\Http\Controllers\Customer\CustomerDetailController::class,['as' => 'customer']);
    Route::post('/delete-customer-details', [App\Http\Controllers\Customer\CustomerDetailController::class,'destroy'])->name('customer.delete-customer-details');
    Route::post('/setPrimaryAddress',[App\Http\Controllers\Customer\CustomerDetailController::class,'setPrimaryAddress'])->name('customer.setPrimaryAddress');
    Route::post('/updateCustomer',[App\Http\Controllers\Customer\CustomerController::class,'updateCustomer'])->name('customer.updateCustomer');
    Route::get('/getOrderDetails/{order_id}',[App\Http\Controllers\Customer\OrderController::class,'getOrderDetails'])->name('customer.getOrderDetails');
});
    
Route::group(['middleware' => ['web','auth:customer']], function() {
    Route::get('/wishlist',[App\Http\Controllers\Customer\WishlistController::class,'wishlist'])->name('wishlist');
    Route::post('/addWishlist', [App\Http\Controllers\Customer\WishlistController::class, 'addWishlist'])->name('addWishlist');
    Route::post('/removeWatchlist',[App\Http\Controllers\Customer\WishlistController::class,'removeWatchlist'])->name('removeWatchlist');   
});

Route::get('/getProducts',[App\Http\Controllers\Customer\ProductController::class,'getProducts'])->name('getProducts');
Route::get('/viewProduct',[App\Http\Controllers\Customer\ProductController::class,'viewProducts'])->name('viewProduct');
Route::post('getvariat_id',[App\Http\Controllers\Customer\ProductController::class,'getvariat_id'])->name('getvariat_id');
Route::post('getvariat_imgid',[App\Http\Controllers\Customer\ProductController::class,'getvariat_imgid'])->name('getvariat_imgid');



Route::get('/cart', [App\Http\Controllers\Customer\CartController::class, 'cartList'])->name('cart.list');
Route::post('/cart', [App\Http\Controllers\Customer\CartController::class, 'addToCart'])->name('cart.store');
Route::post('/update-cart', [App\Http\Controllers\Customer\CartController::class, 'updateCart'])->name('cart.update');
Route::post('/updatecuponcode', [App\Http\Controllers\Customer\CartController::class, 'updatecuponcode'])->name('cart.update');
Route::post('/remove', [App\Http\Controllers\Customer\CartController::class, 'removeCart'])->name('cart.remove');
Route::post('/clear', [App\Http\Controllers\Customer\CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('/moveWishlistToCart', [App\Http\Controllers\Customer\CartController::class, 'moveWishlistToCart'])->name('moveWishlistToCart');
Route::post('/buy-now',[App\Http\Controllers\Customer\OrderController::class,'buyNow'])->name('buy-now');
Route::post('/loadCheckout',[App\Http\Controllers\Customer\OrderController::class,'loadCheckout'])->name('loadCheckout');
Route::get('/checkout',[App\Http\Controllers\Customer\OrderController::class,'checkout'])->name('checkout');
Route::post('/checkoutLogin',[App\Http\Controllers\Customer\OrderController::class,'checkoutLogin'])->name('checkoutLogin');
Route::post('/place-order',[App\Http\Controllers\Customer\OrderController::class,'placeOrder'])->name('placeOrder');
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

    Route::resource('categories',App\Http\Controllers\Admin\CategoryController::class);
    Route::post('/delete-category', [App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('delete-category');  
    Route::post('/update-featured', [App\Http\Controllers\Admin\CategoryController::class,'updateFeatured'])->name('update-featured');

    Route::resource('sub-categories',App\Http\Controllers\Admin\SubCategoryController::class);
    Route::post('/delete-sub-category', [App\Http\Controllers\Admin\SubCategoryController::class,'destroy'])->name('delete-sub-category');  
    Route::post('/update-featured-sub-category', [App\Http\Controllers\Admin\SubCategoryController::class,'updateFeatured'])->name('update-featured-sub-category');

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

    Route::post('approve-product',[App\Http\Controllers\Admin\ProductController::class,'approveProduct'])->name('approve-product');

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
Route::get('/vendor',[App\Http\Controllers\Auth\LoginController::class,'showVendorLoginForm'])->name('vendor.login-view');
Route::post('/vendor',[App\Http\Controllers\Auth\LoginController::class,'vendorLogin'])->name('vendor.login');
Route::get('/vendor/register',[App\Http\Controllers\Auth\RegisterController::class,'showVendorRegisterForm'])->name('vendor.register-view');
Route::post('/vendor/register',[App\Http\Controllers\Auth\RegisterController::class,'createVendor'])->name('vendor.register');

Route::group(['middleware' => ['web','auth:vendor'], 'prefix' => 'vendor'], function() {
    Route::get('/add_vendor_details', [App\Http\Controllers\Vendor\VendorDetailController::class, 'addVendorDetails'])->name('vendor.addVendorDetails');
    Route::post('/store_vendor_details', [App\Http\Controllers\Vendor\VendorDetailController::class, 'storeVendorDetails'])->name('vendor.storeVendorDetails');

    Route::get('/edit_vendor_details', [App\Http\Controllers\Vendor\VendorDetailController::class, 'edit_vendor_details'])->name('vendor.edit_vendor_details');
    Route::put('/update_vendor_details/{id}', [App\Http\Controllers\Vendor\VendorDetailController::class, 'updateVendorDetails'])->name('vendor.updateVendorDetails');

});

// Route::group(['middleware' => ['web','auth:vendor'], 'prefix' => 'vendor'], function() {
Route::group(['middleware' => ['web','auth:vendor','isAddedVendorDetails'], 'prefix' => 'vendor','name' => 'vendor'], function() {
    Route::get('/dashboard',[App\Http\Controllers\Vendor\HomeController::class,'index'])->name('vendor.dashboard');
    Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'vendorLogout'])->name('vendor.logout');
    Route::resource('users',App\Http\Controllers\Vendor\VendorController::class,['as' => 'vendor']);
    Route::post('/delete-user', [App\Http\Controllers\Vendor\VendorController::class,'destroy'])->name('vendor.delete-user');   
    Route::resource('categories',App\Http\Controllers\Vendor\CategoryController::class,['as' => 'vendor']);
    Route::post('/delete-category', [App\Http\Controllers\Vendor\CategoryController::class,'destroy'])->name('delete-category');
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

    Route::resource('brands',App\Http\Controllers\Admin\BrandController::class);
    Route::post('/delete-brand', [App\Http\Controllers\Admin\BrandController::class,'destroy'])->name('delete-brand');  
    Route::post('/update-brand-status', [App\Http\Controllers\Admin\BrandController::class,'updateBrandStatus'])->name('update-brand-status');

    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);

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

    Route::get('/product-import',[App\Http\Controllers\Admin\ProductController::class,'importView'])->name('product-import-view');
    Route::post('/import',[App\Http\Controllers\Admin\ProductController::class,'import'])->name('import');
    Route::get('/export-products',[App\Http\Controllers\Admin\ProductController::class,'exportProducts'])->name('export-products');
    Route::post('/getBrands', [App\Http\Controllers\Admin\ProductController::class, 'getBrands'])->name('getBrands');

    Route::resource('product_update', App\Http\Controllers\Product_updateController::class);
    Route::post('/getproduct_variant_sku', [App\Http\Controllers\Product_updateController::class, 'getproduct_variant_sku'])->name('getproduct_variant_sku');
    Route::post('/getproduct_variant', [App\Http\Controllers\Product_updateController::class, 'getproduct_variant'])->name('getproduct_variant');
    Route::post('product_update', [App\Http\Controllers\Product_updateController::class, 'product_update'])->name('product_update');

   
});
    

