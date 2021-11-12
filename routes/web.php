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

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('payments')->name('payments/')->group(static function() {
            Route::get('/',                                             'PaymentsController@index')->name('index');
            Route::get('/create',                                       'PaymentsController@create')->name('create');
            Route::post('/',                                            'PaymentsController@store')->name('store');
            Route::get('/{payment}/edit',                               'PaymentsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PaymentsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{payment}',                                   'PaymentsController@update')->name('update');
            Route::delete('/{payment}',                                 'PaymentsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('create-payments-tables')->name('create-payments-tables/')->group(static function() {
            Route::get('/',                                             'CreatePaymentsTableController@index')->name('index');
            Route::get('/create',                                       'CreatePaymentsTableController@create')->name('create');
            Route::post('/',                                            'CreatePaymentsTableController@store')->name('store');
            Route::get('/{createPaymentsTable}/edit',                   'CreatePaymentsTableController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CreatePaymentsTableController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{createPaymentsTable}',                       'CreatePaymentsTableController@update')->name('update');
            Route::delete('/{createPaymentsTable}',                     'CreatePaymentsTableController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('payouts')->name('payouts/')->group(static function() {
            Route::get('/',                                             'PayoutsController@index')->name('index');
            Route::get('/create',                                       'PayoutsController@create')->name('create');
            Route::post('/',                                            'PayoutsController@store')->name('store');
            Route::get('/{payout}/edit',                                'PayoutsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PayoutsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{payout}',                                    'PayoutsController@update')->name('update');
            Route::delete('/{payout}',                                  'PayoutsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('users')->name('users/')->group(static function() {
            Route::get('/',                                             'UsersController@index')->name('index');
            Route::get('/create',                                       'UsersController@create')->name('create');
            Route::post('/',                                            'UsersController@store')->name('store');
            Route::get('/{user}/edit',                                  'UsersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'UsersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{user}',                                      'UsersController@update')->name('update');
            Route::delete('/{user}',                                    'UsersController@destroy')->name('destroy');
        });
    });
});