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



/*
 * Routes to admin_user rol in this routes stay show, update, edit, create and delete a user.
 */


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(
    function () {
        Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
    }
);

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-products')->group(
    function () {
        Route::resource('/products', 'ProductController');
    }
);

Auth::routes(['verify' => true]);


Route::get('/', 'HomeController@welcome');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
