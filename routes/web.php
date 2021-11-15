<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CouresesController;

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
//routing page couses
Route::get('/Courses', [CouresesController::class, 'index'])->name('courses');
//find products by categories
Route::get('/Category/{slug}', [CouresesController::class, 'coursByCategory'])->name('category.find');
//routing get all categories pages
Route::get('/Categories', [CouresesController::class, 'allCategories'])->name('categories');
//routing get cours details
Route::get('/Cours-Details/{slug}', [CouresesController::class, 'coursDetails'])->name('cours.details');

//routing search pox
Route::get('/Courses/Searing', [CouresesController::class, 'search'])->name('cours.search');
 

 /** ===> Routing all page Admin and Controllers
    // ==> routing dashboured page  => whiting
    // ==> routing add ourses page => done
    // ==> routing add categories page => done
    --------------------------------------------------------
    ########################################################
    // ==> routing manager courses page => ????
    // ==> routing manager categories => ??
    // ==> routing upfdate cours => ??
    // ==> routing update category  => ??
    // ==> routing users page => 
    // ==> routing delete curs
    // ==> routing delete categorie
    // ==> styling page details cours
    // ==> styling page manager courses
    // styling page manager categories
  */

//return to admin dahsboard
Route::get('Admin/Dashboard', [AdminController::class, 'Dashboard'])->name('admin.Dashboard');
//return to admin add new cours
Route::get('/Admin/Add-New-Cours', [AdminController::class, 'addCoursePage'])->name('cours.create');
//return to store data in adatabase using method post
Route::post('/Admin/Add-New-Cours', [AdminController::class, 'storeCours'])->name('cours.store');
//routing add new category page
Route::get('/Admin/Add-New-Category', [AdminController::class, 'addCategory'])->name('category.add');
//routign store category in database backend
Route::post('/Admin/Add-New-Category', [AdminController::class, 'StoreCategory'])->name('category.store');
//routing page manager courses
Route::get('/Admin/Manage-Courses', [AdminController::class, 'manageCourses'])->name('courses.manage');
//routing page get all categories
Route::get('/Admin/Manage-Categories', [AdminController::class, 'manageCatgories'])->name('categories.manage');
//routing pqge shozing updating cours 
Route::get('/Admin/Cours/{slug}/Update', [AdminController::class, 'showUpdateCours'])->name('coursupdate.show');
//routing store updating data in database
Route::put('/Admin/Cours/{slug}/Update', [AdminController::class, 'updateCours'])->name('coursupdate.store');
//showing update categories form
Route::get('/Admin/{id}/Update-Category', [AdminController::class, 'updateCategoriesForm'])->name('category.showupdate');
//store new update  data in database
Route::put('/Admin/{id}/Update-Category', [AdminController::class, 'categoryUpdate'])->name('category.update');
//deleting courses
Route::delete('/Admin/{id}/Delete-cours', [AdminController::class, 'deleteCourses'])->name('cours.delete');