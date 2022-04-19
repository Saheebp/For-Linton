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
Auth::routes();

Route::middleware('auth')->group(function() {
    
    //frontend
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/welcome', 'HomeController@index')->name('welcome');
    Route::get('/contractor/documents', 'HomeController@documents')->name('documents');

    //backend
    Route::get('/home', 'HomeController@dashboard')->name('admin.home');

    //print
    Route::get('print/project/tasks/{project}', 'PrintController@printTask')->name('projects.tasks.print');
    Route::get('print/project/budget/{project}', 'PrintController@printBudget')->name('projects.budget.print');
    Route::get('print/project/team/{project}', 'PrintController@printTeam')->name('projects.team.print');
    Route::get('print/project/activity/{project}', 'PrintController@printActivity')->name('projects.activity.print');
    Route::get('print/project/comments/{project}', 'PrintController@printComments')->name('projects.comments.print');
    Route::get('print/project/timeline/{project}', 'PrintController@printTimeline')->name('projects.timeline.print');
    Route::get('print/project/resources/{project}', 'PrintController@printResources')->name('projects.resources.print');
    Route::get('print/project/inventory/{project}', 'PrintController@printInventory')->name('projects.inventory.print');
    Route::get('print/project/notification/{project}', 'PrintController@printNotification')->name('projects.notification.print');
    
    //users
    Route::resource('users', 'UserController')->except('edit');
    Route::name('users.')->group(function() {
        Route::prefix('users')->group(function() {
            Route::get('/', 'UserController@index')->name('index');
            Route::post('/search', 'UserController@search')->name('search');
            //Route::get('/delete/{user}', 'UserController@delete')->name('destroy');
            Route::post('/update/password', 'UserController@passwordupdate')->name('passwordupdate');
            Route::post('/update/bio', 'UserController@bioupdate')->name('bioupdate');
            Route::post('/update/code', 'UserController@codeupdate')->name('codeupdate');
            Route::post('/update/role', 'UserController@roleupdate')->name('roleupdate');

            Route::post('/user/upload', 'UserController@uploadResource')->name('upload');
            Route::get('download/resource/{id}', 'UserController@download')->name('download');

            Route::post('/disable', 'UserController@delete')->name('disable');
            Route::post('bioupdate', 'UserController@bioupdate')->name('bioupdate');
        
            Route::post('/permissionadd', 'PermissionController@addPermissionToUser')->name('permission.add');
            Route::post('/permissionremove', 'PermissionController@removePermissionToUser')->name('permission.remove');
            
            Route::post('/codeupdate', 'UserController@codeupdate')->name('codeupdate');
            Route::post('/adminpasswordupdate', 'UserController@adminPasswordUpdate')->name('adminpasswordupdate');
            
            Route::get('/logs/{id}', 'UserController@userLogs')->name('logs');
        });
    });

    //contractors
    Route::resource('contractors', 'ContractorController')->except('edit');
    Route::name('contractors.')->group(function() {
        Route::prefix('contractors')->group(function() {
            Route::get('/', 'ContractorController@index')->name('index');
            Route::post('/search', 'ContractorController@search')->name('search');
            //Route::get('/delete/{contractor}', 'ContractorController@delete')->name('destroy');
            Route::post('/update/password', 'ContractorController@passwordupdate')->name('passwordupdate');
            Route::post('/update/bio', 'ContractorController@bioupdate')->name('bioupdate');
            // Route::post('/update/code', 'ContractorController@codeupdate')->name('codeupdate');
            // Route::post('/update/role', 'ContractorController@roleupdate')->name('roleupdate');
        });
    });

    //messages
    // Route::resource('messages', 'MessageController');
    // Route::name('messages.')->group(function() {
    //     Route::prefix('messages')->group(function() {
    //         Route::get('/', 'MessageController@index')->name('index');
    //         //Route::post('update', 'MessageController@update')->name('update');

    //     });
    // });
    
    //logs
    Route::resource('logs', 'LogsController');
    Route::name('logs.')->group(function() {
        Route::prefix('logs')->group(function() {

            Route::post('/search', 'LogsController@search')->name('search');

            Route::get('/errors', 'LogsController@index')->name('errors');
            Route::get('/errors', 'LogsController@index')->name('errors');
        });
    });

    Route::post('reports/search', 'ReportController@searchFeedback')->name('feedbacks.search');
    Route::post('reports/filter', 'ReportController@datefilter')->name('feedbacks.datefilter');
    Route::get('reports/feedback', 'ReportController@feedbacks')->name('reports.feedbacks');

    
    //system settings
    Route::resource('settings', 'SettingsController');
    Route::name('settings.')->group(function() {
        Route::prefix('settings')->group(function() {
            Route::get('/', 'SettingsController@index')->name('index');
            //Route::post('update', 'SettingsController@update')->name('update');

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
            Route::post('upload/items', 'InventoryController@uploadItems')->name('uploadItems');
        });
    });

    //inventory
    Route::resource('items', 'InventoryItemController');
    Route::name('items.')->group(function() {
        Route::prefix('items')->group(function() {
            Route::get('/', 'InventoryItemController@index')->name('index');
            Route::post('filter', 'InventoryItemController@filter')->name('filter');
            Route::post('search', 'InventoryItemController@search')->name('search');
            Route::post('disburse', 'InventoryItemController@disburse')->name('disburse');
            Route::post('request', 'InventoryItemController@itemRequest')->name('requests');
            Route::post('return', 'InventoryItemController@return')->name('return');
            Route::post('warehouse/return', 'InventoryItemController@returnToWareHouse')->name('warehousereturn');
            Route::post('upload/resource', 'InventoryItemController@uploadResource')->name('upload');
        });
    });

    //projects
    Route::resource('projects', 'ProjectController');
    Route::name('projects.')->group(function() {
        Route::prefix('projects')->group(function() {
            Route::get('/', 'ProjectController@index')->name('index');
            Route::post('filter', 'ProjectController@filter')->name('filter');
            Route::post('search', 'ProjectController@search')->name('search');
            
            Route::post('status/update/{project}', 'ProjectController@updateStatus')->name('updateStatus');
            Route::post('upload/resource/{project}', 'ProjectController@uploadResource')->name('upload');
            Route::get('download/resource/{id}', 'ProjectController@download')->name('download');

            Route::post('comment', 'ProjectController@comment')->name('comment');

            Route::post('member/add/{project}', 'ProjectController@addMember')->name('addMember');
            Route::post('member/remove', 'ProjectController@removeMember')->name('removeMember');
            Route::post('member/updaterole', 'ProjectController@updateRole')->name('updateRole');
            Route::post('time/update/{project}', 'ProjectController@updateTime')->name('updateTime');

            Route::post('member/updatebudget', 'ProjectController@updateBudget')->name('updateBudget');
            Route::post('member/updateInfo', 'ProjectController@updateInfo')->name('updateInfo');
            
            Route::get('team/{project}', 'ProjectController@team')->name('team');
            Route::get('tasks/{project}', 'ProjectController@tasks')->name('tasks');
            Route::get('activity/{project}', 'ProjectController@activity')->name('activity');
            Route::get('timeline/{project}', 'ProjectController@timeline')->name('timeline');
            Route::get('resources/{project}', 'ProjectController@resources')->name('resources');
            Route::get('budget/{project}', 'ProjectController@budget')->name('budget');
            Route::get('inventory/{project}', 'ProjectController@inventory')->name('inventory');
            Route::get('comments/{project}', 'ProjectController@comments')->name('comments');
            Route::get('notification/{project}', 'ProjectController@notifications')->name('notifications');
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
            Route::get('download/resource/{id}', 'TaskController@download')->name('download');
            
            Route::post('status/update/{task}', 'TaskController@updateStatus')->name('updateStatus');
            Route::post('cost/update/{task}', 'TaskController@updateCost')->name('updateCost');
            Route::post('time/update/{task}', 'TaskController@updateTime')->name('updateTime');

            Route::post('comment', 'TaskController@comment')->name('comment');
            Route::post('comment/delete', 'TaskController@deleteComment')->name('deleteComment');

            Route::post('member/add/{task}', 'TaskController@addMember')->name('addMember');
            Route::post('member/remove/{task}', 'TaskController@removeMember')->name('removeMember');

            Route::post('upload/details/{project}', 'TaskController@uploadDetails')->name('uploadDetails');
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
            Route::get('download/resource/{id}', 'SubTaskController@download')->name('download');

            Route::post('executor/update/{subtask}', 'SubTaskController@updateExecutor')->name('updateExecutor');
            Route::post('status/update/{subtask}', 'SubTaskController@updateStatus')->name('updateStatus');
            Route::post('cost/update/{subtask}', 'SubTaskController@updateCost')->name('updateCost');
            Route::post('time/update/{subtask}', 'SubTaskController@updateTime')->name('updateTime');
            Route::post('comment', 'SubTaskController@comment')->name('comment');

            Route::post('member/add/{subtask}', 'SubTaskController@addMember')->name('addMember');
            Route::post('member/remove/{subtask}', 'SubTaskController@removeMember')->name('removeMember');
        });
    });

    //Grand tasks
    Route::resource('grandtasks', 'GrandTaskController');
    Route::name('grandtasks.')->group(function() {
        Route::prefix('grandtasks')->group(function() {
            Route::get('/', 'GrandTaskController@index')->name('index');
            Route::post('filter', 'GrandTaskController@filter')->name('filter');
            Route::post('search', 'GrandTaskController@search')->name('search');

            Route::post('upload/resource/{grandtask}', 'GrandTaskController@uploadResource')->name('upload');
            Route::get('download/resource/{id}', 'GrandTaskController@download')->name('download');

            Route::post('executor/update/{grandtask}', 'GrandTaskController@updateExecutor')->name('updateExecutor');
            Route::post('status/update/{grandtask}', 'GrandTaskController@updateStatus')->name('updateStatus');
            Route::post('cost/update/{grandtask}', 'GrandTaskController@updateCost')->name('updateCost');
            Route::post('time/update/{grandtask}', 'GrandTaskController@updateTime')->name('updateTime');
            Route::post('comment', 'GrandTaskController@comment')->name('comment');

            Route::post('member/add/{subtask}', 'GrandTaskController@addMember')->name('addMember');
            Route::post('member/remove/{subtask}', 'GrandTaskController@removeMember')->name('removeMember');
        });
    });

    //Great tasks
    Route::resource('greattasks', 'GreatTaskController');
    Route::name('greattasks.')->group(function() {
        Route::prefix('greattasks')->group(function() {
            Route::get('/', 'GreatTaskController@index')->name('index');
            Route::post('filter', 'GreatTaskController@filter')->name('filter');
            Route::post('search', 'GreatTaskController@search')->name('search');

            Route::post('upload/resource/{greattask}', 'GreatTaskController@uploadResource')->name('upload');
            Route::get('download/resource/{id}', 'GreatTaskController@download')->name('download');

            Route::post('executor/update/{greattask}', 'GreatTaskController@updateExecutor')->name('updateExecutor');
            Route::post('status/update/{greattask}', 'GreatTaskController@updateStatus')->name('updateStatus');
            Route::post('cost/update/{greattask}', 'GreatTaskController@updateCost')->name('updateCost');
            Route::post('time/update/{greattask}', 'GreatTaskController@updateTime')->name('updateTime');
            Route::post('comment', 'GreatTaskController@comment')->name('comment');

            Route::post('member/add/{greattask}', 'GreatTaskController@addMember')->name('addMember');
            Route::post('member/remove/{greattask}', 'GreatTaskController@removeMember')->name('removeMember');
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
    Route::resource('requests', 'RequestFqController');
    Route::name('requests.')->group(function() {
        Route::prefix('requests')->group(function() {
            Route::get('/', 'RequestFqController@index')->name('index');
            Route::post('filter', 'RequestFqController@filter')->name('filter');
            Route::post('search', 'RequestFqController@search')->name('search');
            Route::post('upload/resource', 'RequestFqController@uploadResource')->name('upload');
            Route::post('contractor/add', 'RequestFqController@addContractor')->name('addContractor');
            Route::post('contractor/remove', 'RequestFqController@removeContractor')->name('removeContractor');
            Route::post('status/update/{request}', 'RequestFqController@updateStatus')->name('updateStatus');

            Route::get('download/{id}', 'RequestFqController@download')->name('download');
        });
    });

    //procurement quotes
    Route::resource('quotes', 'QuoteController');
    Route::name('quotes.')->group(function() {
        Route::prefix('quotes')->group(function() {
            Route::get('/', 'QuoteController@index')->name('index');
            Route::post('filter', 'QuoteController@filter')->name('filter');
            Route::post('search', 'QuoteController@search')->name('search');
            Route::post('upload/resource/{quotes}', 'QuoteController@uploadResource')->name('upload');
            Route::post('contractor/add/{quotes}', 'QuoteController@addContractor')->name('addContractor');
            Route::post('contractor/remove/', 'QuoteController@removeContractor')->name('removeContractor');
            Route::post('status/update/{quotes}', 'QuoteController@updateStatus')->name('updateStatus');
            
            Route::post('status/update/{quote}', 'QuoteController@updateStatus')->name('updateStatus');
            Route::get('download/{id}', 'QuoteController@download')->name('download');
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

    //messaging
    Route::resource('messages', 'MessageController');
    Route::name('messages.')->group(function() {
        Route::prefix('messages')->group(function() {
            Route::get('/', 'MessageController@index')->name('index');
            Route::post('filter', 'MessageController@filter')->name('filter');
            Route::post('search', 'MessageController@search')->name('search');
        });
    });

    //payments
    Route::resource('reports', 'ReportController');
    Route::name('reports.')->group(function() {
        Route::prefix('reports')->group(function() {
            Route::get('/', 'ReportController@index')->name('index');
            Route::post('filter', 'ReportController@filter')->name('filter');
            Route::post('search', 'ReportController@search')->name('search');
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
    
    //Permissions
    Route::resource('permissions', 'PermissionController');
    Route::name('permissions.')->group(function() {
        Route::prefix('permissions')->group(function() {
            Route::get('/', 'PermissionController@index')->name('index');
            Route::post('/filter', 'PermissionController@filter')->name('filter');
            Route::post('/search', 'PermissionController@search')->name('search');

            Route::get('/roles', 'PermissionController@index')->name('home');
            Route::post('/role/add', 'PermissionController@addToRole')->name('addtoroles');
            Route::get('/role/show/{role_id}', 'PermissionController@showPermission')->name('showpermission');
            Route::post('/role/sync', 'PermissionController@syncRolePermissions')->name('syncrolepermissions');
            Route::post('/user/sync', 'PermissionController@syncUserPermissions')->name('syncuserpermissions');
     
        });
    });

    //accounts
    // Route::resource('accounts', 'AccountController');
    // Route::name('accounts.')->group(function() {
    //     Route::prefix('accounts.')->group(function() {

    //         //Route::get('/', 'AccountController@index')->name('index');
    //         Route::get('/summary', 'AccountController@index')->name('summary');
    //         Route::get('/payments', 'AccountController@index')->name('payments');
    //         Route::get('/expenditure', 'AccountController@index')->name('expenditure');

    //         Route::post('filter', 'AccountController@filter')->name('filter');
    //         Route::post('search', 'AccountController@search')->name('search');
    //     });
    // });    
});