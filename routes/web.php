<?php

use App\Http\Controllers\Admin\SpecialOfferController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\CuponController;
use App\Http\Controllers\Backend\DynamicPageController;
use App\Http\Controllers\Backend\PickupController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SmtpController;
use App\Http\Controllers\Backend\ThemeSettingController;
use App\Http\Controllers\Backend\WarehouseController;
use App\Http\Controllers\StatusController;
use App\Models\ChildCategory;
use App\Models\Pickuppoint;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

//   For Admin or user check

Route::get('/', function () {
  return view('frontend.home');
})->name('home');

// for localization 
Route::get('locale/{locale}', function ($locale) {
  Session::put('locale', $locale);
  return back();
})->name('locale');





Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'is_admin']], function () {

  Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
  //Category Routes
  Route::resource('category', CategoryController::class);

  //Category Mass Delete
  Route::post('category/mass/delete', [CategoryController::class, 'CategoryMassDelete'])->name('category.bulkDelete');
  Route::post('category/import', [CategoryController::class, 'category_import'])->name('category-import');

  Route::post('category/export', [CategoryController::class, 'category_export'])->name('category.export');

  Route::get('/categoryDateFilter', [CategoryController::class, 'categoryDateFilter'])->name('category.dateFilter');

  Route::get('/category-search', [CategoryController::class, 'category_search'])->name('category.search');
  Route::post('/productcategory/search/{id?}', [ProductController::class, 'product_category_search'])->name('product-category-seach');

  //All Status

  Route::get('featured/status{id}', [StatusController::class, 'featured'])->name('featured.status');
  Route::get('todaydeal/status{id}', [StatusController::class, 'today_deal'])->name('deal.status');
  Route::get('status{id}', [StatusController::class, 'status'])->name('status.update');


  //SubCategory Routes
  Route::resource('subcategory', SubCategoryController::class);

  //ChildCategory Routes
  Route::resource('childcategory', ChildCategoryController::class);
  //Brand route 
  Route::resource('brand', BrandController::class);

  //  Warehouse Route 
  Route::resource('warehouse', WarehouseController::class);

  //Cupon Route
  Route::resource('cupon', CuponController::class);

  // Pickpoint Route 

  Route::resource('pickuppoint', PickupController::class);
  //Product Route 

  Route::resource('product', ProductController::class);

  //Theme Color
  Route::get('theme-color', [ThemeSettingController::class, 'color'])->name('theme.color');

  Route::get('theme-toggle', [ThemeSettingController::class, 'toggle'])->name('theme.toggle');

  //Seo Setting
  Route::get('/seo', [SettingController::class, 'index'])->name('seo.index');

  Route::post('/seo-update/{id}', [SettingController::class, 'update'])->name('seo.update');

  // Smtp  
  Route::get('/smtp', [SmtpController::class, 'index'])->name('smtp.index');
  Route::post('/smtp/{id}', [SmtpController::class, 'update'])->name('smtp.update');

  // Global Route 
  Route::get('/childcategory/join/{id?}', [ChildCategoryController::class, 'Getchildcategory'])->name('childcategory-join');


  //Dynamic Page

  Route::get('/pages', [DynamicPageController::class, 'index'])->name('page.index');

  Route::get('/pages/create', [DynamicPageController::class, 'create'])->name('page.create');

  Route::post('/pages/store', [DynamicPageController::class, 'store'])->name('page.store');
  Route::delete('/pages/destroy/{id}', [DynamicPageController::class, 'destroy'])->name('page.destroy');

  Route::post('/pages/update/{id}', [DynamicPageController::class, 'update'])->name('page.update');

  //Profile Section
  Route::get('my/profile', [ProfileController::class, 'myprofile'])->name('myprofile');

  Route::post('admin/profile/update/{id}', [ProfileController::class, 'profile_update'])->name('admin.profile.update');

  Route::post('admin/update/{id}', [ProfileController::class, 'update'])->name('admin.update');

  Route::post('reset/password', [ProfileController::class, 'reset_password'])->name('reset-password');
});
