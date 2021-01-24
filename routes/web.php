<?php

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
    return view('master');
});

Route::get('admin/dashboard','Admin\AdminController@admin')->name('admin.dashboard');
Route::get('create/category','Admin\CategoryController@create')->name('create.category');
Route::post('store/category','Admin\CategoryController@store')->name('store.category');
Route::get('index/category','Admin\CategoryController@index')->name('index.category');
Route::get('edit/category/{id}','Admin\CategoryController@edit')->name('edit.category');
Route::get('delete/category/{id}','Admin\CategoryController@delete')->name('delete.category');
Route::post('update/category/{id}','Admin\CategoryController@update')->name('category.update');


//subcategory

Route::get('create/subcategory','Admin\SubCategoryController@create')->name('create.subcategory');
Route::post('store/subcategory','Admin\SubCategoryController@store')->name('store.subcategory');
Route::get('index/subcategory','Admin\SubCategoryController@index')->name('index.subcategory');
Route::get('edit/subcategory/{id}','Admin\SubCategoryController@edit')->name('edit.subcategory');
Route::get('delete/subcategory/{id}','Admin\SubCategoryController@delete')->name('delete.subcategory');
Route::post('update/subcategory/{id}','Admin\SubCategoryController@update')->name('update.subcategory');


//product details

Route::get('product_details/create','Admin\ProductController@create')->name('create.product.details');
Route::post('product_details/store','Admin\ProductController@store')->name('store.product.details');
Route::get('product_details/index','Admin\ProductController@index')->name('index.product.details');
Route::get('edit/details/{id}','Admin\ProductController@edit')->name('edit.details');
Route::get('edit/details/{id}','Admin\ProductController@edit')->name('edit.details');
Route::get('delete/details/{id}','Admin\ProductController@delete')->name('delete.details');
Route::post('update/details/{id}','Admin\ProductController@update')->name('details.update');

//product create
Route::get('product_create/create','Admin\ProductCreateController@create')->name('create.product');
Route::post('product_store/store','Admin\ProductCreateController@store')->name('store.product');
Route::get('product_index/index','Admin\ProductCreateController@index')->name('index.product');


