<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserApplicationController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/redirect', function(){
   
    if (auth()->check()) {
        if (auth()->user()->user_type == 'admin') {
            return redirect()->route('admin.home');
        }
        if (auth()->user()->user_type == 'regular') {
            return redirect()->route('regular.home');
        }

    };

    return redirect()->route('home');

})->name('redirect');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerIndex'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'registerStore']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/system-admin', [AuthController::class, 'index'])->name('system-admin')->middleware('guest');

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin.home');
});
Route::group(['middleware' => ['auth','regular']], function () {
    Route::get('/regular/home', [HomeController::class, 'regular'])->name('regular.home');
});





Route::group(['prefix' => 'blogs', 'middleware' => ['auth','admin']], function () {
   
    Route::get('/index', [BlogsController::class, 'index'])->name('blogs.index');
    Route::get('/create', [BlogsController::class, 'create'])->name('blogs.create');
    Route::post('/store', [BlogsController::class, 'store'])->name('blogs.store');
    Route::post('/ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.upload');

    Route::get('/{blog}/edit', [BlogsController::class, 'edit'])->name('blogs.edit');
    Route::put('/{blog}', [BlogsController::class, 'update'])->name('blogs.update');
    Route::delete('/{blog}', [BlogsController::class, 'destroy'])->name('blogs.destroy');

});

Route::group(['prefix' => 'application', 'middleware' => ['auth','regular']], function () {
  
    Route::get('/apply',  [UserApplicationController::class, 'index'])->name('apply');
    Route::post('/submit',  [UserApplicationController::class, 'submit'])->name('application.submit');
    Route::get('/my_applications',  [UserApplicationController::class, 'applicationList'])->name('application.lists');

    Route::get('/{id}/download', [UserApplicationController::class, 'downloadAcknowledgment'])->name('application.download');
    Route::delete('/applications/{id}', [UserApplicationController::class, 'destroy'])->name('application.delete');


});


Route::get('/blogs/{id}',  [BlogsController::class, 'show'])->name('blogs.show');


