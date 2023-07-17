<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'guest'])->name('home');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerIndex'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/system-admin', [AuthController::class, 'index'])->name('system-admin');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin.home');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/regular/home', [HomeController::class, 'regular'])->name('regular.home');
});





Route::group(['prefix' => 'blogs', 'middleware' => ['auth']], function () {
   
    Route::get('/index', [BlogsController::class, 'index'])->name('blogs.index');
    Route::get('/create', [BlogsController::class, 'create'])->name('blogs.create');
    Route::post('/store', [BlogsController::class, 'store'])->name('blogs.store');
    Route::post('/ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.upload');

    Route::get('/{blog}/edit', [BlogsController::class, 'edit'])->name('blogs.edit');
    Route::put('/{blog}', [BlogsController::class, 'update'])->name('blogs.update');
    Route::delete('/{blog}', [BlogsController::class, 'destroy'])->name('blogs.destroy');

});

Route::get('/blogs/{id}',  [BlogsController::class, 'show'])->name('blogs.show');


