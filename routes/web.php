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

Route::get('/', function () {
    return view('home');
});

use App\Http\Controllers\Admin\PuddingController;
Route::controller(PuddingController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('pudding/create', 'add')->name('pudding.add');
    Route::post('pudding/create', 'create')->name('pudding.create');
    Route::get('pudding', 'index')->name('pudding.index'); //getの後indexとは書かないのが普通
    Route::post('pudding/edit', 'update')->name('pudding.update');
    Route::get('pudding/edit', 'edit')->name('pudding.edit');
    Route::get('pudding/delete', 'delete')->name('pudding.delete');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
