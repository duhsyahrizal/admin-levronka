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

Route::group(['middleware' => 'auth'], function() {
    Route::get('', 'AdminController@home')->name('home');
    Route::get('data/visitors', 'AjaxController@dataVisitors');
    Route::get('data/products', 'AjaxController@dataProducts');
    Route::get('category', 'AdminController@category');
    Route::get('category/create', 'AdminController@createCategory');
    Route::post('category/save', 'AdminController@saveCategory');
    Route::get('category/datatable', 'AjaxController@datatableCategory');

    Route::group(['prefix' => 'product'], function() {
        Route::get('', 'AdminController@product');
        Route::get('create', 'AdminController@createProduct');
        Route::post('save', 'AdminController@saveProduct');
        Route::get('edit/{id}', 'AdminController@editProduct');
        Route::post('update/{id}', 'AdminController@updateProduct');
        Route::get('delete/{id}', 'AdminController@deleteProduct');
        Route::get('datatable', 'AjaxController@datatableProduct');
    });

    Route::get('logout', 'AuthController@logout');
});

Route::get('login', 'AuthController@showLogin')->name('login');
Route::post('login', 'AuthController@login');
