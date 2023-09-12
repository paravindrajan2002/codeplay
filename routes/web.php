<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterAdmin\LoginController as MasterAdminLoginController;
use App\Http\Controllers\MasterAdmin\ForgotPasswordController as MasterAdminForgotPasswordController;
use App\Http\Controllers\MasterAdmin\HomeController as MasterAdminHomeController;
use App\Http\Controllers\MasterAdmin\RolesController as MasterAdminRolesController;
use App\Http\Controllers\MasterAdmin\UsersController as MasterAdminUsersController;
use App\Http\Controllers\MasterAdmin\SellersController as MasterAdminSellersController;
use App\Http\Controllers\MasterAdmin\CategoryController as MasterAdminCategoryController;




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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/master-admin', [MasterAdminLoginController::class, 'showLogin'])->name('master-admin');
Route::post('/master-admin', [MasterAdminLoginController::class, 'login'])->name('master-admin');
Route::get('/master-reset-password/{id}', [MasterAdminLoginController::class, 'showResetForm'])->name('master.reset.password.get');
Route::post('master-reset-password', [MasterAdminLoginController::class, 'submitResetForm'])->name('master.reset.password.post');

Route::group(['prefix' => 'master', 'as' => 'master.','middleware' => ['is_master']], function () {
    Route::post('/logout', [MasterAdminHomeController::class, 'logout'])->name('logout');
    Route::get('/home', [MasterAdminHomeController::class, 'dashboard'])->name('home');
    Route::get('/dashboardFilterSales', [MasterAdminHomeController::class, 'dashboardFilterSales']);
    Route::get('/dashboardFilterOrders', [MasterAdminHomeController::class, 'dashboardFilterOrders']);
    Route::get('/dashboardFilterPendingOrders', [MasterAdminHomeController::class, 'dashboardFilterPendingOrders']);
    Route::get('/dashboardFilterDeliveredOrders', [MasterAdminHomeController::class, 'dashboardFilterDeliveredOrders']);
    Route::get('/dashboardFilterVendors', [MasterAdminHomeController::class, 'dashboardFilterVendors']);
    Route::get('/dashboardFilterCustomers', [MasterAdminHomeController::class, 'dashboardFilterCustomers']);
    Route::get('/dashboardFilterPopularProduct', [MasterAdminHomeController::class, 'dashboardFilterPopularProduct']);
    Route::get('/dashboardFilterOrderStatus', [MasterAdminHomeController::class, 'dashboardFilterOrderStatus']);
    Route::get('/dashboardFiltergraph', [MasterAdminHomeController::class, 'dashboardFiltergraph']);
    Route::get('/roles', [MasterAdminRolesController::class, 'roles'])->name('roles');
    Route::post('/role-edit', [MasterAdminRolesController::class, 'rolesEditView'])->name('roles.edit');
    Route::post('/role-view', [MasterAdminRolesController::class, 'rolesview'])->name('roles.view');
    Route::get('/role-view', [MasterAdminRolesController::class, 'rolesview'])->name('roles.view');
    Route::post('/rolesStore', [MasterAdminRolesController::class, 'rolesStore'])->name('rolesStore');
    Route::post('/rolesEdit', [MasterAdminRolesController::class, 'rolesEdit'])->name('rolesEdit');
  
    Route::get('/users', [MasterAdminUsersController::class, 'users'])->name('users');
    Route::post('/add-users', [MasterAdminUsersController::class, 'addUsers'])->name('add.users');
    Route::post('/edit-users', [MasterAdminUsersController::class, 'editUsers'])->name('edit.users');
    Route::post('/delete-user', [MasterAdminUsersController::class, 'deleteUser'])->name('users.delete');

    Route::get('/sellers', [MasterAdminSellersController::class, 'sellers'])->name('sellers');
    Route::post('/view-seller', [MasterAdminSellersController::class, 'viewSeller'])->name('view.seller');
    Route::post('/channge-seller-status', [MasterAdminSellersController::class, 'changeSellerStatus'])->name('change.seller.status');
    Route::get('/newSellerSearch', [MasterAdminSellersController::class, 'newSellerSearch']);

    Route::post('/seller-details', [MasterAdminSellersController::class, 'sellerDetails'])->name('seller.details');
    Route::get('/sellerFiltergraph', [MasterAdminSellersController::class, 'sellerFiltergraph']);


    Route::get('/permissions', [MasterAdminRolesController::class, 'permissions'])->name('permissions');
    Route::get('/rolesandpermissions', [MasterAdminRolesController::class, 'rolesandpermissions'])->name('rolesandpermissions');


    Route::get('/master-category', [MasterAdminCategoryController::class, 'masterCategory'])->name('category');
    Route::post('/add-matser-category', [MasterAdminCategoryController::class, 'addMasterCategory'])->name('add.masterCategory');
    Route::post('/edit-matser-category', [MasterAdminCategoryController::class, 'editMasterCategory'])->name('edit.masterCategory');
    Route::post('/delete-matser-category', [MasterAdminCategoryController::class, 'deleteMasterCategory'])->name('mastercategory.delete');   
    Route::post('/order-update-category', [MasterAdminCategoryController::class, 'updateOrderNumber'])->name('mastercategory.orderUpdate');

    Route::get('/master-SubCategory', [MasterAdminCategoryController::class, 'masterSubCategory'])->name('subcategory');
    Route::post('/add-sub-category', [MasterAdminCategoryController::class, 'addSubCategory'])->name('add.subCategory');
    Route::post('/delete-sub-category', [MasterAdminCategoryController::class, 'deleteSubCategory'])->name('subcategory.delete');
    Route::post('/edit-sub-category', [MasterAdminCategoryController::class, 'editSubCategory'])->name('edit.subCategory');
    Route::post('/order-update-subcategory', [MasterAdminCategoryController::class, 'updateOrderNumbersub'])->name('subcategory.orderUpdate'); 

    Route::get('/master-SubCategory-list', [MasterAdminCategoryController::class, 'masterSubCategorylist'])->name('subcategorylist');
    Route::post('/delete-sub-category-list', [MasterAdminCategoryController::class, 'deleteSubCategoryList'])->name('subcategorylist.delete');
    Route::post('/order-update-subcategorylist', [MasterAdminCategoryController::class, 'updateOrderNumbersublist'])->name('subcategorylist.orderUpdate');
    Route::post('/allsubcategorylist', [MasterAdminCategoryController::class, 'allsubcategorylist'])->name('allsubcategorylist');
    Route::post('/add-sub-category-list', [MasterAdminCategoryController::class, 'addSubCategorylist'])->name('add.subCategorylist');
    Route::post('/edit-sub-category-list', [MasterAdminCategoryController::class, 'editSubCategorylist'])->name('edit.subCategorylist');



});


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
     Artisan::call('config:clear');
     Artisan::call('config:cache');
     Artisan::call('view:clear');
     
  
     return "Cleared!";
  });