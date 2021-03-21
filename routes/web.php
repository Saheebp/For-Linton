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

Route::post('/password/otp','Auth\ResetPasswordController@sendOtp')->name('password.phone');
Route::post('/password/change','Auth\ResetPasswordController@changePassword')->name('password.change');
Route::get('/password/verify','Auth\ResetPasswordController@verifyForm')->name('password.reset.form');

Route::post('/register', 'Auth\AuthController@store')->name('store');

Route::get('/', 'HomeController@home')->name('home');
Route::get('/', 'HomeController@home')->name('landing');
Route::get('about', 'HomeController@about')->name('about');
Route::get('terms', 'HomeController@terms')->name('terms');
Route::get('shop', 'HomeController@shop')->name('shop');
Route::get('contact', 'HomeController@contact')->name('contact');
Route::get('wishlist', 'HomeController@wishlist')->name('wishlist');
Route::get('account', 'HomeController@account')->name('account');
Route::get('checkout', 'HomeController@checkout')->name('checkout');
Route::get('cart', 'HomeController@cart')->name('cart');
Route::get('track', 'HomeController@track')->name('track');
Route::get('faqs', 'HomeController@faqs')->name('faqs');
Route::get('locations', 'HomeController@locations')->name('locations');

Route::get('product/detail/{id}', 'HomeController@detail')->name('product.detail');

Route::resource('customer', 'CustomerController');
Route::get('customer/history', ['middleware' => 'auth', 'uses' => 'CustomerController@history'])->name('account.history');

Route::resource('messages', 'MessageController');
    
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback/{txref?}', 'PaymentController@handleGatewayCallback')->name('callback');

Auth::routes();

Route::middleware('auth')->group(function() {
    
    Route::get('/admin/home', 'HomeController@dashboard')->name('admin.home');

    Route::resource('customers', 'CustomerController')->except('edit');
    Route::name('customers.')->group(function() {
        Route::prefix('customers')->group(function() {
            Route::get('/delete/{customer}', 'CustomerController@delete')->name('destroy');
            Route::post('/search', 'CustomerController@search')->name('search');
        });
    });

    //users
    Route::resource('users', 'UserController')->except('edit');
    Route::name('users.')->group(function() {
        Route::prefix('users')->group(function() {
            Route::get('/', 'UserController@index')->name('index');
            Route::post('/search', 'UserController@search')->name('search');
            Route::get('/delete/{user}', 'UserController@delete')->name('destroy');
        });
    });
    
    //products
    Route::resource('products', 'ProductController');
    Route::name('products.')->group(function() {
        Route::prefix('products')->group(function() {

            Route::post('/destroy', 'ProductController@destroy')->name('destroy');
            Route::post('/search', 'ProductController@search')->name('search');
            Route::get('/toggle/{product}', 'ProductController@toggleProduct')->name('toggle');
        });
    });

    //categories
    Route::resource('categories', 'CategoryController');
    Route::name('categories.')->group(function() {

    });

    //brands
    Route::resource('brands', 'BrandController');
    
    //orders
    Route::resource('orders', 'OrderController');
    Route::name('orders.')->group(function() {
        Route::prefix('orders')->group(function() {

            Route::post('/search', 'OrderController@search')->name('search');
            Route::post('/filter', 'OrderController@filter')->name('filter');
            Route::post('updateStatus/{order}', 'OrderController@updateStatus')->name('updateStatus');
        });
    });
    
    //logs
    Route::resource('logs', 'LogController');
    Route::name('logs.')->group(function() {
        Route::prefix('logs')->group(function() {
            Route::get('/errors', 'LogController@index')->name('errors');
        });
    });
    
    //news
    Route::resource('news', 'NewsController');
    Route::name('news.')->group(function() {
        Route::prefix('news')->group(function() {
            Route::get('/', 'NewsController@index')->name('index');
            Route::post('filter', 'NewsController@filter')->name('filter');
            Route::post('search', 'NewsController@search')->name('search');
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

    //delivery methods
    Route::resource('delivery', 'DeliveryController');
    Route::name('delivery.')->group(function() {
        Route::prefix('delivery')->group(function() {
            Route::get('/', 'DeliveryController@index')->name('index');
            Route::post('update', 'DeliveryController@update')->name('update');
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
        






















































    // Route::post('admin/bookings/select/vehicles', 'AdminBookingController@selectVehicle')->name('admin.booking.vehicles');
    // Route::get('admin/bookings/details/{trip_id}/{noofseats}', 'AdminBookingController@collectDetails')->name('admin.booking.details');
    // Route::post('admin/bookings/select/seats', 'AdminBookingController@selectSeats')->name('admin.booking.seats');
    // Route::post('admin/bookings/preview', 'AdminBookingController@preview')->name('admin.booking.preview');
    // Route::post('admin/bookings/pay', 'AdminBookingController@postPay')->name('admin.booking.pay');

    // Route::post('bookings/markpaid', 'AdminBookingController@markPaid')->name('admin.booking.markpaid');
    // Route::post('bookings/cancel', 'AdminBookingController@cancelBooking')->name('admin.booking.cancelbooking');
    // Route::post('bookings/delete', 'AdminBookingController@deleteBooking')->name('admin.booking.deletebooking');
    // Route::get('bookings/receipt/{booking}', 'AdminBookingController@receipt')->name('admin.booking.receipt');
    // Route::post('bookings/search', 'AdminBookingController@bookingSearchFilter')->name('admin.booking.search');
    
    // Route::post('bookings/reschedule', 'RescheduleController@reschedule')->name('admin.booking.reschedule');
    // Route::get('bookings/reschedule/select/seats/{trip_id}/{booking_id}', 'RescheduleController@rescheduleSeats')->name('admin.booking.reschedule.seats');
    // Route::post('bookings/reschedule/finalize', 'RescheduleController@rescheduleFinalize')->name('admin.booking.reschedule.finalize');

    // Route::resource('bookings', 'AdminBookingController');

    // Route::post('vehicle/status', 'VehicleController@updateStatus')->name('vehicles.updatestatus');
    // Route::resource('vehicles', 'VehicleController');

    // Route::post('accounts/filter', 'AccountController@index')->name('accounts.datefilter');
    
    // Route::get('accounts/summary', 'AccountController@index')->name('accounts.index');
    // Route::get('accounts/expenditure', 'AccountController@expenditure')->name('accounts.expenditure');
    // Route::get('accounts/payments/{status_id?}', 'AccountController@payments')->name('accounts.payments');
    // Route::resource('accounts', 'AccountController');

    // Route::post('payments/search', 'PaymentController@search')->name('payment.search');
    // Route::post('payments/update', 'PaymentController@adminPaymentUpdate')->name('payment.update');
    // Route::post('payments/status', 'PaymentController@updateStatus')->name('payment.updatestatus');
    // Route::post('payments/filter', 'PaymentController@paymentDateFilter')->name('payment.datefilter');
    // Route::resource('payments', 'PaymentController');

    // Route::post('wallet/credit', 'WalletController@credit')->name('wallet.credit');
    // Route::post('wallet/debit', 'WalletController@debit')->name('wallet.debit');
    // Route::resource('wallets', 'WalletController');

    // Route::post('routes/status', 'RouteController@updateStatus')->name('route.updatestatus');
    // Route::resource('routes', 'RouteController');

    // Route::post('trips/filter', 'TripController@datefilter')->name('trip.datefilter');
    // Route::post('trips/start/{trip}', 'TripController@startTrip')->name('trip.starttrip');
    // Route::post('trips/end/{trip}', 'TripController@endTrip')->name('trip.endtrip');
    // Route::get('trips/manifest/{trip}', 'TripController@manifest')->name('trip.manifest');
    // Route::post('trips/updatestatus', 'TripController@updateStatus')->name('trip.updatestatus');

    // Route::resource('trips', 'TripController');

    // Route::get('/callback/{txref?}', 'WalletController@processPayment')->name('wallet.callback');
    // Route::resource('wallets', 'WalletController');

    // Route::post('customers/search', 'CustomerController@search')->name('customers.search');
    // Route::post('customers/bioupdate', 'CustomerController@bioupdate')->name('customer.bioupdate');
    // Route::get('customers/show/{customer}', 'CustomerController@show')->name('customer.show');
    // Route::get('customers/password/reset/{customer}', 'CustomerController@passwordreset')->name('customer.passwordreset');
    // Route::resource('customers', 'CustomerController');

    // Route::resource('drivers', 'DriverController');

    // Route::get('log/errors', 'LogsController@errors')->name('log.errors');
    // Route::post('logs/search', 'LogsController@searchLogs')->name('logs.search');
    // Route::post('errors/search', 'LogsController@searchErrors')->name('errors.search');
    // Route::resource('logs', 'LogsController');

    // Route::resource('settings', 'SettingController');

    // Route::post('users/search', 'UserController@search')->name('users.search');
    // Route::post('users/bioupdate', 'UserController@bioupdate')->name('users.bioupdate');
    // Route::post('users/roleupdate', 'UserController@roleupdate')->name('users.roleupdate');
    // Route::post('users/codeupdate', 'UserController@codeupdate')->name('users.codeupdate');
    // Route::post('users/passwordupdate', 'UserController@passwordupdate')->name('users.passwordupdate');
    // Route::resource('users', 'UserController');
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
