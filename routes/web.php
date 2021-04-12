<?php

use Illuminate\Support\Facades\Auth;
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

//Route::get('/g12', 'App\Http\Controllers\JobsController@index');

Auth::routes();

Route::get('/g12', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//for displaying all jobs
Route::get('/jobs', 'App\Http\Controllers\JobsController@index');
Route::get('/jobs', [App\Http\Controllers\JobsController::class,'index'])->name('jobs.show');
//route for creating jobs
Route::get('/jobs/create', [App\Http\Controllers\JobsController::class, 'create'])->name('jobs.new');
//route for storing form data in database, named route-> blogs-store
Route::post('/jobs/store', [App\Http\Controllers\JobsController::class, 'store'])->name('jobs.save');

//keep trashed routes
Route::get('/jobs/trash', [App\Http\Controllers\JobsController::class, 'trash'])->name('jobs.junk');
//send deleted job to trash
Route::get('/jobs/trash/{id}/restore', [App\Http\Controllers\JobsController::class, 'restore'])->name('jobs.restore');
//pernamentli delete job
Route::delete('/jobs/trash/{id}/permanent-delete', [App\Http\Controllers\JobsController::class, 'permanentDelete'])->name('jobs.permanent-delete');


//route for showing particular job with his id
Route::get('/jobs/{id}', [App\Http\Controllers\JobsController::class, 'show'])->name('jobs.display');
//for editing jobs
Route::get('/jobs/{id}/edit', [App\Http\Controllers\JobsController::class, 'edit'])->name('jobs.modify');
//for updating jobs
Route::patch('/jobs/{id}/update', [App\Http\Controllers\JobsController::class, 'update'])->name('jobs.store');
//route for deleting job list
Route::delete('/jobs/{id}/delete', [App\Http\Controllers\JobsController::class, 'delete'])->name('jobs.remove');


//-----------------ADMIN ROUTES--------
Route::get('/dashboard',  [App\Http\Controllers\AdminController::class,'index'])->name('admin.dashboard');

//rout label for admin middelware

//-category routes
//using route --resource
Route::resource('/categories', 'App\Http\Controllers\CategoryController');

Route::resource('/users', 'App\Http\Controllers\UserControler');

URL::forceRootUrl('http://studenti.sum.ba/projekti/fsre_rwa/2020/g12');
