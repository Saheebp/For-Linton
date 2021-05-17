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
            Route::post('upload/resource/{project}', 'ProjectController@uploadResource')->name('upload');
        });
    });

    //inventory
    Route::resource('inventory', 'InventoryController');
    Route::name('inventory.')->group(function() {
        Route::prefix('inventory')->group(function() {
            Route::get('/', 'InventoryController@index')->name('index');
            Route::post('filter', 'InventoryController@filter')->name('filter');
            Route::post('search', 'InventoryController@search')->name('search');
            Route::post('upload/resource', 'InventoryController@uploadResource')->name('upload');
        });
    });

    //inventory
    Route::resource('items', 'ItemController');
    Route::name('items.')->group(function() {
        Route::prefix('items')->group(function() {
            Route::get('/', 'ItemController@index')->name('index');
            Route::post('filter', 'ItemController@filter')->name('filter');
            Route::post('search', 'ItemController@search')->name('search');
            Route::post('upload/resource', 'ItemController@uploadResource')->name('upload');
        });
    });

    //tasks
    Route::resource('tasks', 'TaskController');
    Route::name('tasks.')->group(function() {
        Route::prefix('tasks')->group(function() {
            Route::get('/', 'TaskController@index')->name('index');
            Route::post('filter', 'TaskController@filter')->name('filter');
            Route::post('search', 'TaskController@search')->name('search');
            Route::post('createsubtask', 'TaskController@createSubTask')->name('createsubtask');
            Route::post('upload/resource/{task}', 'TaskController@uploadResource')->name('upload');
            Route::post('member/add/{task}', 'TaskController@addMember')->name('addMember');
            Route::post('member/remove/', 'TaskController@removeMember')->name('removeMember');
            Route::post('status/update/{task}', 'TaskController@updateStatus')->name('updateStatus');
            Route::post('cost/update/{task}', 'TaskController@updateCost')->name('updateCost');
            
        });
    });

    //Sub tasks
    Route::resource('subtasks', 'SubTaskController');
    Route::name('subtasks.')->group(function() {
        Route::prefix('subtasks')->group(function() {
            Route::get('/', 'SubTaskController@index')->name('index');
            Route::post('filter', 'SubTaskController@filter')->name('filter');
            Route::post('search', 'SubTaskController@search')->name('search');
            Route::post('upload/resource/{subtask}', 'SubTaskController@uploadResource')->name('upload');
            Route::post('member/add/{task}', 'SubTaskController@addMember')->name('addMember');
            Route::post('member/remove/', 'SubTaskController@removeMember')->name('removeMember');
            Route::post('status/update/{subtask}', 'SubTaskController@updateStatus')->name('updateStatus');
            Route::post('cost/update/{subtask}', 'SubTaskController@updateCost')->name('updateCost');
        });
    });

    //procurement
    Route::resource('procurement', 'ProcurementController');
    Route::name('procurement.')->group(function() {
        Route::prefix('procurement')->group(function() {
            Route::get('/', 'ProcurementController@index')->name('index');
            // Route::post('filter', 'ProcurementController@filter')->name('filter');
            // Route::post('search', 'ProcurementController@search')->name('search');
            // Route::post('createsubtask', 'ProcurementController@createSubTask')->name('createsubtask');
            // Route::post('upload/resource/{task}', 'ProcurementController@uploadResource')->name('upload');
            // Route::post('status/update/{task}', 'ProcurementController@updateStatus')->name('updateStatus');
            // Route::post('cost/update/{task}', 'ProcurementController@updateCost')->name('updateCost');
            
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