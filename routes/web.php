<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\System\ConfigController;
use App\Http\Controllers\System\UserController;
use App\Http\Controllers\System\RoleController;
use App\Http\Controllers\System\ProfileController;
use App\Http\Controllers\System\PageController;
use App\Http\Controllers\System\PostCategoryController;
use App\Http\Controllers\System\PostController;
use App\Http\Controllers\System\SliderController;


//Route::get('/', function () {
//    return view('index');
//});
Route::get('/', [\App\Http\Controllers\Public\IndexController::class, 'index'])->name('index');


Auth::routes();
Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::prefix(getSystemPrefix())->middleware(['auth', 'permission.routes'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::get('/admin', [HomeController::class, 'index'])->name('home.index');
    Route::get('/login', [HomeController::class, 'index'])->name('home.index');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('/profile', ProfileController::class)->except(['show']);
    Route::get('/change-password', [ProfileController::class,'changePassword'])->name('change.password');
    Route::put('/change-password', [ProfileController::class,'changePasswordUpdate'])->name('change.password.update');
    Route::resource('/configs', ConfigController::class)->except(['show']);//configs.index, configs.create, configs.store, configs.show, configs.edit, configs.update, configs.destroy
    Route::resource('/users', UserController::class, ['except' => ['show']]);
    Route::resource('/roles', RoleController::class, ['except' => ['show']]);
    Route::resource('/pages', PageController::class, ['except' => ['show']]);
    Route::resource('/post-categories', PostCategoryController::class, ['except' => ['show']]);
    Route::resource('/posts', PostController::class, ['except' => ['show']]);
    Route::resource('/sliders', SliderController::class, ['except' => ['show']]);
});
