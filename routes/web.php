<?php

use Illuminate\Support\Facades\Auth;
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
    // return view('welcome');
    return redirect('/front');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('user','UserController@index');
    Route::get('edit/{id}','UserController@edit');
    Route::post('edit/update/{id}','UserController@update');
    Route::delete('delete/{id}','UserController@delete');
    Route::get('create','UserController@create');
    Route::post('create/store','UserController@store');

    Route::prefix('product')->group(function(){
        //Type_class
        Route::get('class','TypeClassController@index');
        Route::get('class/edit/{id}','TypeClassController@edit');
        Route::post('class/edit/update/{id}','TypeClassController@update');
        Route::delete('class/delete/{id}','TypeClassController@delete');
        Route::get('class/create','TypeClassController@create');
        Route::post('class/create/store','TypeClassController@store');
        //productType
        Route::get('type','ProductTypeController@index');
        Route::get('type/edit/{id}','ProductTypeController@edit');
        Route::post('type/edit/update/{id}','ProductTypeController@update');
        Route::delete('type/delete/{id}','ProductTypeController@delete');
        Route::get('type/create','ProductTypeController@create');
        Route::post('type/create/store','ProductTypeController@store');
        //protucd
        Route::get('/','ProductController@index');
        Route::get('edit/{id}','ProductController@edit');
        Route::post('edit/update/{id}','ProductController@update');
        Route::delete('delete/{id}','ProductController@delete');
        Route::get('create','ProductController@create');
        Route::post('create/store','ProductController@store');

        Route::post('deleteimg','ProductController@deleteImg');
    });

    // Route::prefix('contactus')->group(function(){
    //     Route::get('/','ContactusController@index');
    //     Route::get('edit/{id}','ContactusController@edit');
    //     Route::delete('delete/{id}','ContactusController@delete');
    // });
});
Route::prefix('front')->group(function(){
    Route::get('/','FrontController@index');
    Route::middleware(['shopping'])->group(function(){
        Route::get('/shoppingstep1','FrontController@ShoppingStep1');
        Route::post('/update','FrontController@update');
        Route::get('/shoppingstep2','FrontController@ShoppingStep2');
        Route::post('/shoppingstep2/check','FrontController@Step2_Check');
    });
    Route::delete('cart/delete/{id}','FrontController@delete');
    Route::get('/shoppingstep3','FrontController@ShoppingStep3');

    Route::prefix('product')->group(function(){
        Route::get('/','FrontController@product_index');
        Route::get('/detail/{id}','FrontController@product_detail');


        Route::post('/add','FrontController@add');
        Route::get('/content','FrontController@content');
        Route::get('/clear','FrontController@clear');

    });
    Route::prefix('user')->group(function(){
        Route::get('/','FrontController@user_index');
        Route::post('/update','FrontController@user_update');
        Route::get('/passwordModify','FrontController@user_password_modify');
        Route::post('/passwordModify/update','FrontController@user_password_update');
        Route::post('/logout', 'Auth\LoginController@logout')->name('user_logout');
    });
    Route::prefix('login')->group(function(){
        Route::get('/','FrontController@login');
        // Route::get('/sigin', 'Auth\LoginController@showLoginForm');
        Route::post('/sigin', 'Auth\LoginController@login')->name('signin');
        // Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
        Route::post('/register', 'Auth\RegisterController@register')->name('login_register');
    });
    Route::prefix('shose')->group(function(){
        Route::get('/','FrontController@shose');
    });
});
