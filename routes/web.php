<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');



/**
    // ==> routing page coursers
    // ==> routing categries page 
    // ==> routing serach page
 */

 /** ===> Routing all page Admin and Controllers
    // ==> routing dashboured page 
    // ==> routing add ourses page
    // ==> routing add categories page
    // ==> routing manager courses page
    // ==> routing manager categories
    // ==> routing upfdate cours
    // ==> routing update category 
    // ==> routing users page
  */

//return to admin dahsboard
Route::get('Admin/Dashboard', [AdminController::class, 'Dashboard'])->name('admin.Dashboard');
//return to admin add new cours
Route::get('/Admin/Add-New-Cours', [AdminController::class, 'addCoursePage'])->name('cours.create');
//return to store data in adatabase using method post
Route::post('/Admin/Add-New-Cours', [AdminController::class, 'storeCours'])->name('cours.store');