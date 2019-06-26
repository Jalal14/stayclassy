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

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/product-list/{cat}', 'HomeController@list')->name('home.list');

Route::get('/products}', 'HomeController@search')->name('home.search');

Route::get('/new-arrivals', 'HomeController@newArrival')->name('home.newArrival');

Route::get('/offers', 'HomeController@offers')->name('home.offers');

Route::get('/details/{code}', 'HomeController@details')->name('home.details');

Route::get('/checkout/{code}', 'HomeController@checkout')->name('home.checkout');
Route::post('/checkout/{code}', 'HomeController@order')->name('home.order');

Route::get('/policy/{key}', 'HomeController@policy')->name('home.policy');

//Route::get('/confirm-order', 'HomeController@confirmconfirm')->name('home.confirm');

/*---------------- admin section ----------------*/

Route::get('/admin/login', 'AdminController@login')->name('admin.login');
Route::post('/admin/login', 'AdminController@validateLogin')->name('admin.validateLogin');

Route::get('/admin/recover-password', 'AdminController@forgotPassword')->name('admin.forgotPassword');
Route::post('/admin/recover-password', 'AdminController@recoverPassword')->name('admin.recoverPassword');

Route::get('/admin/password/{token}/{id}', 'PasswordController@passToken')->name('password.passToken');

Route::get('/admin/password/recover', 'PasswordController@resetPassword')->name('password.resetPassword');
Route::post('/admin/password/recover', 'PasswordController@setPassword')->name('password.setPassword');

Route::group(['middleware' => ['adminSess']], function () {

    Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

    Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');

    Route::get('/admin/stuff-list', 'StuffController@index')->name('stuff.index');

    Route::get('/admin/add-stuff', 'StuffController@create')->name('stuff.create');
    Route::post('/admin/add-stuff', 'StuffController@store')->name('stuff.store');

    Route::get('/admin/update', 'StuffController@edit')->name('stuff.edit');
    Route::post('/admin/update', 'StuffController@update')->name('stuff.update');

    Route::get('/admin/editPassword', 'StuffController@editPassword')->name('stuff.editPassword');
    Route::post('/admin/editPassword', 'StuffController@updatePassword')->name('stuff.updatePassword');

    Route::get('/admin/add-product', 'ProductController@create')->name('product.create');
    Route::post('/admin/add-product', 'ProductController@store')->name('product.store');

    Route::get('/admin/product-list', 'ProductController@index')->name('product.index');

    Route::get('/admin/update-product/{code}', 'ProductController@edit')->name('product.edit');
    Route::post('/admin/update-product/{code}', 'ProductController@update')->name('product.update');

    Route::get('/admin/product-details', 'ProductController@show')->name('product.show');

    Route::get('/admin/add-quantity/{code}', 'ProductController@newAdd')->name('product.newAdd');
    Route::post('/admin/add-quantity/{code}', 'ProductController@newStore')->name('product.newStore');

    Route::get('/admin/product-status/{code}', 'ProductController@statusAction')->name('product.statusAction');

    Route::get('/admin/search-by-category', "ProductController@searchByCategory");

    Route::get('/admin/all-orders', 'OrderController@index')->name('order.index');

    Route::get('/admin/all-pendings', 'OrderController@pending')->name('order.pending');

    Route::get('/admin/all-returns', 'OrderController@returns')->name('order.returned');

    Route::get('/admin/all-delivered', 'OrderController@delivered')->name('order.delivered');

    Route::get('/admin/all-cancelled', 'OrderController@cancelled')->name('order.cancelled');

    Route::get('/admin/order-details/{id}', 'OrderController@show')->name('order.show');

    Route::get('/admin/deliver-order/{id}', 'OrderController@deliver')->name('order.deliver');

    Route::get('/admin/return-order/{id}', 'OrderController@return')->name('order.return');

    Route::get('/admin/cancel-order/{id}', 'OrderController@cancel')->name('order.cancel');

    Route::get('/admin/slider', 'LayoutController@slider')->name('layout.slider');
    Route::post('/admin/slider', 'LayoutController@sliderStore')->name('layout.sliderStore');

    Route::get('/admin/left-image', 'LayoutController@leftImage')->name('layout.leftImage');
    Route::post('/admin/left-image', 'LayoutController@leftImageStore')->name('layout.leftImageStore');

    Route::get('/admin/right-image', 'LayoutController@rightImage')->name('layout.rightImage');
    Route::post('/admin/right-image', 'LayoutController@rightImageStore')->name('layout.rightImageStore');

    Route::get('/admin/icon', 'LayoutController@icon')->name('layout.icon');
    Route::post('/admin/icon', 'LayoutController@iconStore')->name('layout.iconStore');

    Route::get('/admin/social', 'FooterController@social')->name('footer.social');
    Route::post('/admin/social', 'FooterController@socialUpdate')->name('footer.socialUpdate');

    Route::get('/admin/shipping', 'FooterController@shipping')->name('footer.shipping');
    Route::post('/admin/shipping', 'FooterController@shippingUpdate')->name('footer.shippingUpdate');

    Route::get('/admin/quality', 'FooterController@quality')->name('footer.quality');
    Route::post('/admin/quality', 'FooterController@qualityUpdate')->name('footer.qualityUpdate');

    Route::get('/admin/return', 'FooterController@return')->name('footer.return');
    Route::post('/admin/return', 'FooterController@returnUpdate')->name('footer.returnUpdate');

    Route::get('/admin/service', 'FooterController@service')->name('footer.service');
    Route::post('/admin/service', 'FooterController@serviceUpdate')->name('footer.serviceUpdate');

    Route::get('/admin/contact', 'FooterController@contact')->name('footer.contact');
    Route::post('/admin/contact', 'FooterController@contactUpdate')->name('footer.contactUpdate');

    Route::get('/admin/policy', 'FooterController@policy')->name('footer.policy');
    Route::post('/admin/policy', 'FooterController@policyUpdate')->name('footer.policyUpdate');

    Route::get('/admin/about', 'FooterController@about')->name('footer.about');
    Route::post('/admin/about', 'FooterController@aboutUpdate')->name('footer.aboutUpdate');
});