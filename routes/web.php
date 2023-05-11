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
Route::namespace('Worker')->group(function () {
    Route::group(['middleware' => 'guest:worker'], function () {
        Route::get('/login', 'LoginController@getLogin')->name('login');
        Route::post('/login', 'LoginController@login')->name('post.login');
    });
    Route::group(['middleware' => 'auth:worker'], function () {
    Route::group(['middleware' => 'can'], function () {
        Route::get('/', 'dashboardController@index')->name('index');
        ##############################house1##############################################
        Route::group(['prefix' => 'house1'], function () {
            Route::get('/create', 'House1Controller@create')->name('get.house1.create');
            Route::post('/create', 'House1Controller@store')->name('post.house1.create');
            Route::get('/edit/{id}', 'House1Controller@edit')->name('get.house1.edit');
            Route::post('/edit/{id}', 'House1Controller@update')->name('post.house1.edit');
        });
        ##############################house4##############################################
        Route::group(['prefix' => 'house4'], function () {
            Route::get('/create', 'House4Controller@create')->name('get.house4.create');
            Route::post('/create', 'House4Controller@store')->name('post.house4.create');
            Route::get('/edit/{id}', 'House4Controller@edit')->name('get.house4.edit');
            Route::post('/edit/{id}', 'House4Controller@update')->name('post.house4.edit');
        });
        ##############################build4##############################################
        Route::group(['prefix' => 'build4'], function () {
            Route::get('/create', 'Build4Controller@create')->name('get.build4.create');
            Route::post('/create', 'Build4Controller@store')->name('post.build4.create');
            Route::get('/edit/{id}', 'Build4Controller@edit')->name('get.build4.edit');
            Route::post('/edit/{id}', 'Build4Controller@update')->name('post.build4.edit');
        });
        ##############################open-house##############################################
        Route::group(['prefix' => 'open-house'], function () {
            Route::get('/create', 'OpenHouseController@create')->name('get.open-house.create');
            Route::post('/create', 'OpenHouseController@store')->name('post.open-house.create');
            Route::get('/edit/{id}', 'OpenHouseController@edit')->name('get.open-house.edit');
            Route::post('/edit/{id}', 'OpenHouseController@update')->name('post.open-house.edit');
        });
        ##############################jops##############################################
        Route::group(['prefix' => 'jops'], function () {
            Route::get('/', 'JopController@index')->name('get.jops.index');
            Route::get('/done/{id}', 'JopController@done')->name('get.jops.done');
            Route::post('/cancel/{id}', 'JopController@cancel')->name('post.jops.cancel');
        });

        Route::get('/logout', 'LoginController@logout')->name('logout');
    });
    });
});
