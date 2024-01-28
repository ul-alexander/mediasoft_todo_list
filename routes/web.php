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


Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('pages.home');
    });


    /*Check list Jobs*/
    Route::get('/job/{id}', 'CheckListJobsController@addJob')->name('add.job');
    Route::post('/job/store', 'CheckListJobsController@storeJob')->name('store.job');
    Route::put('/job/{id}', 'CheckListJobsController@statusJob')->name('status.job');
    Route::delete('/job/{id}', 'CheckListJobsController@destroyJob')->name('destroy.job');

    /*Users*/
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('/users/{user}', 'UserController@update')->name('users.update');
    Route::put('/users/status/{user}', 'UserController@status')->name('users.status');

    Route::resource('/roles', 'RoleController');
    Route::resource('/permissions', 'PermissionController')->only([
        'create', 'store', 'destroy'
    ]);

    /*Check lists*/
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/lists', 'CheckListController');

});


Auth::routes([
    'register' => true,
    'verify' => false,
    'confirm' => false,
    'reset' => false
]);

