<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


route::get('/home', [AuthController::class, 'home'])->name('showHome');
route::post('/home/post', [AuthController::class, 'sendForm'])->name('SendForm');
route::get('/gallery', [AuthController::class, 'gallery'])->name('showGallery');
route::get('/form/{id}', [AuthController::class, 'viewForm'])->name('view.form');

Route::get('/login', [AuthController::class, 'showLogin'])->name("login");
Route::post('/login/send', [AuthController::class, 'login'])->name("sendLogin");


Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', [AdminController::class, 'showAdmin'])->name("admin");
    Route::get('/admin/edit/{id}', [AdminController::class, 'showEdit'])->name("admin.edit");
    Route::put('/admin/edit/{id}/update', [AdminController::class, 'update'])->name("admin.update");
    Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name("delete.form");
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


