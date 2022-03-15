<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/home', [AuthController::class, 'home']);
Route::get('/setpassword', [AuthController::class, 'setPassword'])->name('setpassword');
Route::post('/setpassword', [AuthController::class, 'savePassword']);

Route::get('/', function () {
    return view('app');
});

Route::group(['middleware' => 'auth.role:all'], function () {
    Route::controller(PostController::class)->group(function(){
        Route::get('post', 'index');
        Route::post('post', 'postData')->name('post.store');
    });
});

Route::group(['middleware' => 'auth.role:1'], function () {
    Route::controller(RoleController::class)->group(function(){
        Route::get('roles', 'index');
        Route::post('role', 'store')->name('role.store');
        Route::get('role/{id}', 'view');
        Route::get('role/delete/{id}', 'delete');
    });
});

