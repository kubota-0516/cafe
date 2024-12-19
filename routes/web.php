<?php

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


use App\Http\Controllers\Admin\PuddingController;
Route::controller(PuddingController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('pudding/create', 'add')->name('pudding.add');                //middleware('auth')はログインしていないとアクセス出来ないrouting
    Route::post('pudding/create', 'create')->name('pudding.create');
    Route::get('pudding', 'index')->name('pudding.index'); //getの後indexとは書かないのが普通
    Route::post('pudding/edit', 'update')->name('pudding.update');
    Route::get('pudding/edit', 'edit')->name('pudding.edit');
    Route::get('pudding/delete', 'delete')->name('pudding.delete');
});
Auth::routes();

use App\Http\Controllers\Admin\ToastController;
Route::controller(ToastController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('toast/create', 'add')->name('toast.add');
    Route::post('toast/create', 'create')->name('toast.create');
    Route::get('toast', 'index')->name('toast.index'); //getの後indexとは書かないのが普通
    Route::post('toast/edit', 'update')->name('toast.update');
    Route::get('toast/edit', 'edit')->name('toast.edit');
    Route::get('toast/delete', 'delete')->name('toast.delete');
});
Auth::routes();

use App\Http\Controllers\User\TopController;
Route::controller(TopController::class)->prefix('user')->name('user.')->group(function() {
    Route::get('pudding', 'index')->name('pudding.index');
    Route::get('toast', 'index')->name('toast.index');
    Route::get('top/choises', 'index')->name('choises.index');
});

use App\Http\Controllers\User\PuddingController as UserPuddingController;
Route::controller(UserPuddingController::class)->prefix('user')->name('user.')->group(function() {
    Route::get('pudding', 'index')->name('pudding.index'); //getの後indexとは書かないのが普通
    Route::get('pudding/{id}', 'show')->name('pudding.show');
});

use App\Http\Controllers\User\ToastController as UserToastController;
Route::controller(UserToastController::class)->prefix('user')->name('user.')->group(function() {
    Route::get('toast', 'index')->name('toast.index'); //getの後indexとは書かないのが普通
    Route::get('toast/{id}', 'show')->name('toast.show');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\User\TopController::class, 'index'])->name('top'); //namespaceに書いてある