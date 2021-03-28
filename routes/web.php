<?php

use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', 'HomeController@home')->name('home')->middleware('auth');

Auth::routes();

Route::middleware('auth')->group(function() {
    
    Route::get('/home', 'HomeController@dashboard')->name('admin.home');

    //users
    Route::resource('users', 'UserController')->except('edit');
    Route::name('users.')->group(function() {
        Route::prefix('users')->group(function() {
            Route::get('/', 'UserController@index')->name('index');
            Route::post('/search', 'UserController@search')->name('search');
            Route::get('/delete/{user}', 'UserController@delete')->name('destroy');
            Route::post('/update/password', 'UserController@passwordupdate')->name('passwordupdate');
            Route::post('/update/bio', 'UserController@bioupdate')->name('bioupdate');
            Route::post('/update/code', 'UserController@codeupdate')->name('codeupdate');
            Route::post('/update/role', 'UserController@roleupdate')->name('roleupdate');
        });
    });
    
    //logs
    Route::resource('logs', 'LogController');
    Route::name('logs.')->group(function() {
        Route::prefix('logs')->group(function() {
            Route::get('/errors', 'LogController@index')->name('errors');
        });
    });
    
    //system settings
    Route::resource('settings', 'SettingsController');
    Route::name('settings.')->group(function() {
        Route::prefix('settings')->group(function() {
            Route::get('/', 'SettingsController@index')->name('index');
            Route::post('update', 'SettingsController@update')->name('update');

        });
    });

    //roles and permissions
    Route::resource('roles', 'RoleController');
    Route::name('roles.')->group(function() {
        Route::prefix('roles')->group(function() {
            Route::post('roles/permission/give', 'RoleController@givePermission')->name('roles.give');
            Route::post('roles/permission/revoke', 'RoleController@revokePermission')->name('roles.revoke');
            //Route::get('roles_/allAdmins', 'RoleController@allAdmins')->name('roles.allAdmins');
        });
    });

    //projects
    Route::resource('projects', 'ProjectController');
    Route::name('projects.')->group(function() {
        Route::prefix('projects')->group(function() {
            Route::get('/', 'ProjectController@index')->name('index');
            Route::post('filter', 'ProjectController@filter')->name('filter');
            Route::post('search', 'ProjectController@search')->name('search');
            Route::post('upload/resource', 'ProjectController@uploadResource')->name('upload');
        });
    });

    //projects
    Route::resource('tasks', 'TaskController');
    Route::name('tasks.')->group(function() {
        Route::prefix('tasks')->group(function() {
            Route::get('/', 'TaskController@index')->name('index');
            Route::post('filter', 'TaskController@filter')->name('filter');
            Route::post('search', 'TaskController@search')->name('search');
            Route::post('createsubtask', 'TaskController@createSubTask')->name('createsubtask');
            Route::post('upload/resource/{task}', 'TaskController@uploadResource')->name('upload');
            Route::post('member/add/{task}', 'TaskController@addMember')->name('addMember');


            
        });
    });
    
    //payments
    Route::resource('payments', 'PaymentController');
    Route::name('payments.')->group(function() {
        Route::prefix('payments')->group(function() {
            Route::get('/', 'PaymentController@index')->name('index');
            Route::post('filter', 'PaymentController@filter')->name('filter');
            Route::post('search', 'PaymentController@search')->name('search');
        });
    });

    //tickets
    Route::resource('tickets', 'TicketController');
    Route::name('tickets.')->group(function() {
        Route::prefix('tickets')->group(function() {
            Route::get('/', 'TicketController@index')->name('index');
            Route::post('/filter', 'TicketController@filter')->name('filter');
            Route::post('/search', 'TicketController@search')->name('search');
        });
    });

    //accounts
    Route::resource('accounts', 'AccountController');
    Route::name('accounts.')->group(function() {
        Route::prefix('accounts.')->group(function() {

            Route::get('/', 'AccountController@index')->name('index');
            Route::get('/summary', 'AccountController@index')->name('summary');
            Route::get('/payments', 'AccountController@index')->name('payments');
            Route::get('/expenditure', 'AccountController@index')->name('expenditure');

            Route::post('filter', 'AccountController@filter')->name('filter');
            Route::post('search', 'AccountController@search')->name('search');
        });
    });    
});