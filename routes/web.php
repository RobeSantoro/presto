<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//HOME
Route::get('/', 'GuestController@home_function')->name('home_route');
//SEARCH
Route::get('/search', 'GuestController@search_function' )->name('search');

/////////////////////////////// PRODUCT CRU ////////////////////////////////
// PRODUCT INDEX
Route::get('/products', 'GuestController@index_products_function')->name('index_products_route');
// PRODUCT CREATE
Route::get('/create/product', 'UserController@create_product_function')->name('create_product_route');
//      ADD IMAGES TO DROPZONE
Route::post('/create/product/images/upload', 'UserController@upload_product_images')->name('create_product_images_route');
//      DELETE IMAGES IN DROPZONE
Route::delete('/product/images/remove', 'UserController@remove_product_images')->name('remove_product_images_route');
//      SAVE IMAGE FOR VALIDATION ERRORS
Route::get('/create/product/images/', 'UserController@get_product_images')->name('product_images_route');


// PRODUCT SHOW
Route::get('/product/{id}', 'GuestController@show_product_function')->name('show_product_route');
// PRODUCT STORE
Route::post('/add_product/publish', 'UserController@store_product_function')->name('store_product_route');
//THANKYOU
Route::get('/thankyou/publish', 'UserController@thankyou_publish_function')->name('thankyou_publish_route');

// CATEGORIES
Route::get('/categories/{name}/{category_id}', 'GuestController@productByCategory_function')->name('productByCategory_route');


////////////////////////////////// REVISOR /////////////////////////////////
// INDEX
Route::get('/revisor/home', 'RevisorController@index')->name('revisor.home');
// APPROVE
Route::post('/revisor/product/{id}/accept', 'RevisorController@accept')->name('revisor.accept');
// REJECT
Route::post('/revisor/product/{id}/reject', 'RevisorController@reject')->name('revisor.reject');


///////////////////////////////// REVISOR MANAGEMENT ///////////////////////
// REVISORS INDEX
Route::get('/revisors', 'GuestController@index_revisors_function')->name('revisors_index_route');
// REVISOR CREATE
Route::get('/create/revisor', 'GuestController@create_revisor_function')->name('revisors_create_route');
// REVISOR STORE 
Route::post('/store/revisor', 'GuestController@submit_function')->name('revisors_store_route');


// THANKYOU
Route::get('/thankyou', 'GuestController@thankyou_function')->name('thankyou_route');
