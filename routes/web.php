<?php

use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ThemeSettingController;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;

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
})->name('home');

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

Route::get('/dashboard', function () {
  return view('backend.admin.home');
})->middleware(['is_admin'])->name('dashboard');



Route::group(['prefix' => '/admin', 'middleware' => ['auth']], function () {
  //Category Routes
  Route::resource('category', CategoryController::class);

  //Category Mass Delete
  Route::get('category/mass/delete', [CategoryController::class, 'CategoryMassDelete'])->name('category.bulkDelete');

  //SubCategory Routes
  Route::resource('subcategory', SubCategoryController::class);

  //ChildCategory Routes
  Route::resource('childcategory', ChildCategoryController::class);
  //Brand route 
  Route::resource('brand', BrandController::class);

  //Theme Color
  Route::get('theme-color', [ThemeSettingController::class, 'color'])->name('theme.color');

  Route::get('theme-toggle', [ThemeSettingController::class, 'toggle'])->name('theme.toggle');

  //Profile Section
  Route::get('my/profile', [ProfileController::class, 'myprofile'])->name('myprofile');

  Route::post('admin/profile/update/{id}', [ProfileController::class, 'profile_update'])->name('admin.profile.update');

  Route::post('admin/update/{id}', [ProfileController::class, 'update'])->name('admin.update');

  Route::post('reset/password', [ProfileController::class, 'reset_password'])->name('reset-password');
});
