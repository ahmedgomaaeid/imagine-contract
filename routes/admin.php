<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group.
|
*/

Route::namespace('Admin')->group(function () {
    #################################login##############################################
    Route::group(['middleware' => 'guest:admin'], function () {
        Route::get('/login', 'LoginController@getLogin')->name('get.admin.login');
        Route::post('/login', 'LoginController@login')->name('admin.login');
    });
    Route::group(['middleware' => 'auth:admin'], function () {
        ##############################logout##############################################
        Route::get('/logout', 'LoginController@logout')->name('admin.logout');


        ##############################dashboard##############################################
        Route::get('/', 'dashboardController@index')->name('get.admin.dashboard');

        ##############################showphotos##############################################
        Route::get('/showphotos/{id}', 'dashboardController@showPhotos')->name('get.admin.show.photos');
        ##############################send-money##############################################
        Route::get('/send-money/{id}', 'dashboardController@sendMoney')->name('get.admin.send.money');
        ##############################excel-export##############################################
        Route::post('/export', 'dashboardController@export')->name('export');

        ##############################worker##############################################
        Route::group(['prefix' => 'worker'], function () {
            Route::get('/', 'WorkerController@index')->name('get.admin.worker');
            Route::get('/create', 'WorkerController@create')->name('get.admin.worker.create');
            Route::post('/create', 'WorkerController@store')->name('post.admin.worker.create');
            Route::get('/edit/{id}', 'WorkerController@edit')->name('get.admin.worker.edit');
            Route::post('/edit/{id}', 'WorkerController@update')->name('post.admin.worker.edit');
            Route::get('/delete/{id}', 'WorkerController@destroy')->name('get.admin.worker.delete');
        });
        ##############################wprker_tool##############################################
        Route::group(['prefix' => 'worker-tool'], function () {
            Route::get('/{id}', 'WorkerToolController@index')->name('get.admin.worker.tool');
            Route::get('/create/{id}', 'WorkerToolController@create')->name('get.admin.worker.tool.create');
            Route::post('/create/{id}', 'WorkerToolController@store')->name('post.admin.worker.tool.create');
            Route::get('/edit/{id}', 'WorkerToolController@edit')->name('get.admin.worker.tool.edit');
            Route::post('/edit/{id}', 'WorkerToolController@update')->name('post.admin.worker.tool.edit');
            Route::get('/delete/{id}', 'WorkerToolController@destroy')->name('get.admin.worker.tool.delete');
        });
        ##############################department##############################################
        Route::group(['prefix' => 'department'], function () {
            Route::get('/edit/{id}', 'DepartmentController@edit')->name('get.admin.department.edit');
            Route::post('/edit/{id}', 'DepartmentController@update')->name('post.admin.department.edit');
            Route::get('/delete/{id}', 'DepartmentController@destroy')->name('get.admin.department.delete');
        });

        ##############################jop##############################################
        Route::group(['prefix' => 'jop'], function () {
            Route::get('/', 'JopController@index')->name('get.admin.jop');
            Route::get('/create', 'JopController@create')->name('get.admin.jop.create');
            Route::post('/create', 'JopController@store')->name('post.admin.jop.create');
            Route::post('/import', 'JopController@import')->name('import');
            Route::post('/sendjop', 'JopController@sendJop')->name('post.admin.jop.sendjop');
            Route::get('/delete/{id}', 'JopController@destroy')->name('get.admin.jop.delete');
            Route::get('return/{id}', 'JopController@return')->name('get.admin.jop.return');
            Route::get('/submited', 'JopController@submited')->name('get.admin.jop.submited');
        });
    });
});