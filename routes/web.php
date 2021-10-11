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
Auth::routes();


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'namespace' => 'Dashboard',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::post('/forget', 'Auth\ResetController@SendEmail')->name('post.forget');
    Route::post('/reset', 'Auth\ResetController@resetPassword')->name('post.reset');
    Route::get('/login', 'Auth\LoginController@index')->name('index.login');
    Route::get('/reset/{token}', 'Auth\ResetController@resetPasswordView');
    Route::post('/login', 'Auth\LoginController@login')->name('post.login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('post.logout');

    // Dashboard Content Middleware

    Route::group(['middleware' => 'userAuth'] ,function (){

        Route::get('/', 'DashboardController@index')->name('dashboard.index');
        Route::resource('product','ProductController')->except(['create','show']);
        Route::resource('User','UserController')->except(['create','show']);
        Route::resource('service','ServiceController')->except(['create','show']);
        Route::resource('client','ClientController')->except(['create','store', 'edit' , 'update']);
        Route::resource('contact','ContactController')->except(['create','store','edit' , 'update']);
        Route::resource('testimonial','TestimonialController')->except(['create','show']);
        Route::resource('user','UserController')->except(['create','show']);

    });


});




