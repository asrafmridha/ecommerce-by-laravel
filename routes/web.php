<?php

use App\Http\Controllers\Backend\CategoryController;
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



  Route::group(['prefix'=>'/admin','middleware'=>['auth']],function(){

    //Category Routes
    Route::resource('category', CategoryController::class);
 
    






}); 
