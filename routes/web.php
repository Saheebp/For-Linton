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

    //contractors
    Route::resource('contractors', 'ContractorController')->except('edit');
    Route::name('contractors.')->group(function() {
        Route::prefix('contractors')->group(function() {
            Route::get('/', 'ContractorController@index')->name('index');
            Route::post('/search', 'ContractorController@search')->name('search');
            Route::get('/delete/{user}', 'ContractorController@delete')->name('destroy');
            Route::post('/update/password', 'ContractorController@passwordupdate')->name('passwordupdate');
            Route::post('/update/bio', 'ContractorController@bioupdate')->name('bioupdate');
            // Route::post('/update/code', 'ContractorController@codeupdate')->name('codeupdate');
            // Route::post('/update/role', 'ContractorController@roleupdate')->name('roleupdate');
        });
    });

    //messages
    Route::resource('messages', 'MessageController');
    Route::name('messages.')->group(function() {
        Route::prefix('messages')->group(function() {
            Route::get('/', 'MessageController@index')->name('index');
            Route::post('update', 'MessageController@update')->name('update');

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

    //category
    Route::resource('categories', 'CategoryController');
    Route::name('categories.')->group(function() {
        Route::prefix('categories')->group(function() {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::post('filter', 'CategoryController@filter')->name('filter');
            Route::post('search', 'CategoryController@search')->name('search');
        });
    });

    //batch
    Route::resource('batches', 'BatchController');
    Route::name('batches.')->group(function() {
        Route::prefix('batches')->group(function() {
            Route::get('/', 'BatchController@index')->name('index');
            Route::post('filter', 'BatchController@filter')->name('filter');
            Route::post('search', 'BatchController@search')->name('search');
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
            Route::post('comment', 'ProjectController@comment')->name('comment');
        });
    });

    //warehouse
    Route::resource('warehouse', 'WarehouseController');
    Route::name('warehouse.')->group(function() {
        Route::prefix('warehouse')->group(function() {
            Route::get('/', 'WarehouseController@index')->name('index');
            Route::post('filter', 'WarehouseController@filter')->name('filter');
            Route::post('search', 'WarehouseController@search')->name('search');
            Route::post('upload/resource', 'WarehouseController@uploadResource')->name('upload');
        });
    });

    //warehouse item
    Route::resource('warehouseitem', 'WarehouseItemController');
    Route::name('warehouseitem.')->group(function() {
        Route::prefix('warehouseitem')->group(function() {
            Route::get('/', 'WarehouseItemController@index')->name('index');
            Route::post('filter', 'WarehouseItemController@filter')->name('filter');
            Route::post('search', 'WarehouseItemController@search')->name('search');
            Route::post('upload/resource', 'WarehouseItemController@uploadResource')->name('upload');
            Route::post('allocate/preview', 'WarehouseItemController@allocatePreview')->name('allocate.preview');
            Route::post('allocate', 'WarehouseItemController@allocate')->name('allocate.save');
        });
    });

    Route::resource('inventories', 'InventoryController');
    Route::name('inventories.')->group(function() {
        Route::prefix('inventories')->group(function() {
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
            Route::post('comment', 'TaskController@comment')->name('comment');
            
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
            Route::post('comment', 'SubTaskController@comment')->name('comment');
        });
    });

    //procurement
    Route::resource('procurement', 'ProcurementController');
    Route::name('procurement.')->group(function() {
        Route::prefix('procurement')->group(function() {
            Route::get('/', 'ProcurementController@index')->name('index');
        });
    });

    //procurement request
    Route::resource('requests', 'ProcRequestController');
    Route::name('requests.')->group(function() {
        Route::prefix('requests')->group(function() {
            Route::get('/', 'ProcRequestController@index')->name('index');
            Route::post('filter', 'ProcRequestController@filter')->name('filter');
            Route::post('search', 'ProcRequestController@search')->name('search');
            Route::post('upload/resource/{request}', 'ProcRequestController@uploadResource')->name('upload');
            Route::post('contractor/add/{request}', 'ProcRequestController@addContractor')->name('addContractor');
            Route::post('contractor/remove/', 'ProcRequestController@removeContractor')->name('removeContractor');
            Route::post('status/update/{request}', 'ProcRequestController@updateStatus')->name('updateStatus');
        });
    });

    //procurement quotes
    Route::resource('quotes', 'ProcQuoteController');
    Route::name('quotes.')->group(function() {
        Route::prefix('quotes')->group(function() {
            Route::get('/', 'ProcQuoteController@index')->name('index');
            Route::post('filter', 'ProcQuoteController@filter')->name('filter');
            Route::post('search', 'ProcQuoteController@search')->name('search');
            Route::post('upload/resource/{quotes}', 'ProcQuoteController@uploadResource')->name('upload');
            Route::post('contractor/add/{quotes}', 'ProcQuoteController@addContractor')->name('addContractor');
            Route::post('contractor/remove/', 'ProcQuoteController@removeContractor')->name('removeContractor');
            Route::post('status/update/{quotes}', 'ProcQuoteController@updateStatus')->name('updateStatus');
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