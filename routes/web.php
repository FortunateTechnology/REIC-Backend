<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PackageController;



/* Route::get('/', function () {
    return view('home');
}); */

//Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    //Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    //Route::get('/roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit2');
    Route::put('/roles/save/{id}', [RoleController::class, 'update'])->name('roles.save');
    //Route::delete('/roles/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::post('/roles/destroy_all', [RoleController::class, 'destroy_all'])->name('roles.destroy_all');
    Route::resource('users', UserController::class);
    Route::get('/logout', [UserController::class, 'perform'])->name('logout.perform');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit2');
    Route::put('/users/save/{id}', [UserController::class, 'update'])->name('users.save');
    Route::post('/users/destroy_all', [UserController::class, 'destroy_all'])->name('users.destroy_all');
    Route::resource('roles', RoleController::class);
    Route::resource('products', ProductController::class);

    Route::get('/member', [MemberController::class, 'index'])->name('member.index');
    Route::post('/member/store', [MemberController::class, 'store'])->name('member.store');
    Route::get('/member/edit/{id}', [MemberController::class, 'edit'])->name('member.edit');
    Route::put('/member/save/{id}', [MemberController::class, 'update'])->name('member.save');
    Route::delete('/memaber/destroy', [MemberController::class, 'destroy'])->name('member.destroy');
    Route::post('/member/destroy_all', [MemberController::class, 'destroy_all'])->name('member.destroy_all');

    Route::get('/package', [PackageController::class, 'index'])->name('package.index');
    Route::post('/package/store', [PackageController::class, 'store'])->name('package.store');
    Route::get('/package/edit/{id}', [PackageController::class, 'edit'])->name('package.edit');
    Route::put('/package/save/{id}', [PackageController::class, 'update'])->name('package.save');
    Route::delete('/package/destroy', [PackageController::class, 'destroy'])->name('package.destroy');
    Route::post('/package/destroy_all', [PackageController::class, 'destroy_all'])->name('package.destroy_all');

    Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('faq');
    Route::post('/faq/store', [App\Http\Controllers\FaqController::class, 'store'])->name('faq.store');
    Route::get('/faq/edit/{id}', [App\Http\Controllers\FaqController::class, 'edit'])->name('faq.edit');
    Route::put('/faq/save/{id}', [App\Http\Controllers\FaqController::class, 'update'])->name('faq.save');
    Route::delete('/faq/destroy', [App\Http\Controllers\FaqController::class, 'destroy'])->name('faq.destroy');
    Route::post('/faq/destroy_all', [App\Http\Controllers\FaqController::class, 'destroy_all'])->name('faq.destroy_all');

    Route::get('/popup', [App\Http\Controllers\PopupController::class, 'index'])->name('popup');
    Route::post('/popup/store', [App\Http\Controllers\PopupController::class, 'store'])->name('popup.store');
    Route::get('/popup/edit/{id}', [App\Http\Controllers\PopupController::class, 'edit'])->name('popup.edit');
    Route::put('/popup/save/{id}', [App\Http\Controllers\PopupController::class, 'update'])->name('popup.save');
    Route::delete('/popup/destroy', [App\Http\Controllers\PopupController::class, 'destroy'])->name('popup.destroy');
    Route::post('/popup/destroy_all', [App\Http\Controllers\PopupController::class, 'destroy_all'])->name('popup.destroy_all');
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
