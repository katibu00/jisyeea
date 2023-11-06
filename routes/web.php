<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PreRegistrationController;
use App\Http\Controllers\ProgramCategoryController;
use App\Http\Controllers\ProgramQuestionController;
use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserApplicationController;
use App\Http\Controllers\UsersController;
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
Route::get('/about-us', [PagesController::class, 'about'])->name('about');
Route::get('/contact-us', [PagesController::class, 'contact'])->name('contact');
Route::get('/financial-report', [PagesController::class, 'financialReport'])->name('financial-report');

Route::get('/redirect', function () {

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

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin.home');
});
Route::group(['middleware' => ['auth', 'regular']], function () {
    Route::get('/regular/home', [HomeController::class, 'regular'])->name('regular.home');
});

Route::group(['prefix' => 'blogs', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/index', [BlogsController::class, 'index'])->name('blogs.index');
    Route::get('/create', [BlogsController::class, 'create'])->name('blogs.create');
    Route::post('/store', [BlogsController::class, 'store'])->name('blogs.store');
    Route::post('/ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.upload');

    Route::get('/{blog}/edit', [BlogsController::class, 'edit'])->name('blogs.edit');
    Route::put('/{blog}', [BlogsController::class, 'update'])->name('blogs.update');
    Route::delete('/{blog}', [BlogsController::class, 'destroy'])->name('blogs.destroy');

});
Route::group(['prefix' => 'users', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/regular', [UsersController::class, 'index'])->name('users.regular.index');
    Route::get('/admins', [UsersController::class, 'adminIndex'])->name('users.admin.index');
    Route::post('/admins', [UsersController::class, 'store']);

    Route::get('/applications', [ApplicationsController::class, 'index'])->name('applications.index');

});
Route::group(['prefix' => 'collections', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [CollectionController::class, 'index'])->name('collections.index');
    Route::get('/create', [CollectionController::class, 'create'])->name('collections.create');
    Route::post('/store', [CollectionController::class, 'store'])->name('collections.store');

    Route::get('/collections/{collection}/edit', [CollectionController::class, 'edit'])->name('collections.edit');

    Route::patch('/collections/{collection}', [CollectionController::class, 'update'])->name('collections.update');

    Route::delete('/collections/{collection}', [CollectionController::class, 'destroy'])->name('collections.destroy');

    Route::post('/collections/filter', [CollectionController::class, 'index'])->name('collections.filter');

});

Route::post('/applications/bulk-action', [ApplicationsController::class, 'bulkAction'])->name('applications.bulkAction');
Route::get('/applications/{application}', [ApplicationsController::class, 'show'])->name('applications.show');

Route::get('/pop_up_notification', [SettingsController::class, 'popup'])->name('pop_up_notification');
Route::post('/pop_up_notification', [SettingsController::class, 'savePopup']);

Route::group(['prefix' => 'programs', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/categories', [ProgramCategoryController::class, 'index'])->name('programs.categories.index');
    Route::get('/categories/create', [ProgramCategoryController::class, 'create'])->name('programs.categories.create');
    Route::post('/categories/store', [ProgramCategoryController::class, 'store'])->name('programs.categories.store');
    Route::get('/categories/edit/{id}', [ProgramCategoryController::class, 'edit'])->name('programs.categories.edit');
    Route::put('/categories/update/{id}', [ProgramCategoryController::class, 'update'])->name('programs.categories.update');
    Route::delete('/categories/destroy/{id}', [ProgramCategoryController::class, 'destroy'])->name('programs.categories.destroy');

    Route::get('/index', [ProgramsController::class, 'index'])->name('programs.index');
    Route::get('/create', [ProgramsController::class, 'create'])->name('programs.create');
    Route::post('/store', [ProgramsController::class, 'store'])->name('programs.store');
    Route::get('/{program}/edit', [ProgramsController::class, 'edit'])->name('programs.edit');
    Route::put('/{program}', [ProgramsController::class, 'update'])->name('programs.update');
    Route::delete('/{program}', [ProgramsController::class, 'destroy'])->name('programs.destroy');

    Route::get('/form-questions/create', [ProgramQuestionController::class, 'create'])->name('form-questions.create');
    Route::post('/form-questions/store', [ProgramQuestionController::class, 'store'])->name('form-questions.store');


});

Route::group(['prefix' => 'application', 'middleware' => ['auth', 'regular']], function () {

    Route::get('/new/application', [UserApplicationController::class, 'index'])->name('apply');
    Route::post('/submit', [UserApplicationController::class, 'submit'])->name('application.submit');
    Route::get('/my_applications', [UserApplicationController::class, 'applicationList'])->name('application.lists');

    Route::get('/{id}/download', [PreRegistrationController::class, 'downloadAcknowledgment'])->name('application.download');
    Route::delete('/applications/{id}', [UserApplicationController::class, 'destroy'])->name('application.delete');

});

Route::group(['prefix' => 'pre-registration', 'middleware' => ['auth', 'regular']], function () {

    Route::get('/', [PreRegistrationController::class, 'index'])->name('pre-registration');
    Route::post('/', [PreRegistrationController::class, 'submit']);

});

Route::get('/blogs/{slug}', [BlogsController::class, 'show'])->name('blogs.show');

Route::get('/programs/details/{slug}', [ProgramsController::class, 'show'])->name('programs.show');

Route::get('/programs/all', [ProgramsController::class, 'allPrograms'])->name('programs.all');
Route::get('/programs/register/{slug}', [ProgramsController::class, 'register'])->name('programs.register');

Route::get('/programs-by-category/{categoryId}', [UserApplicationController::class, 'getProgramsByCategory']);
