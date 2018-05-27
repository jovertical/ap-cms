<?php

Route::namespace('Root')->prefix('su')->name('root.')->group(function () {
    Route::namespace('Auth')->group(function() {
        Route::prefix('login')->middleware('root.guest')->group(function() {
            Route::get('/', 'LoginController@showLoginForm')->name('login');
            Route::post('/', 'LoginController@login');
        });
        Route::post('logout', 'LoginController@logout')->middleware('root.auth')->name('logout');

        Route::prefix('password')->name('password.')->middleware('root.guest')->group(function() {
            Route::get('reset', 'ForgotPasswordController@showLinkRequestForm')->name('request');
            Route::post('email', 'ForgotPasswordController@sendResetLinkEmail')->name('email');
            Route::get('reset/{token}', 'ResetPasswordController@showResetForm')->name('reset');
            Route::post('reset/{token}', 'ResetPasswordController@reset');
        });
    });

    Route::middleware('root.auth')->group(function() {
        Route::get('/', 'HomeController@index')->name('home');
        Route::prefix('account')->name('account.')->group(function() {
            Route::get('profile', 'AccountController@profile')->name('profile');
            Route::patch('profile', 'AccountController@updateProfile');
            Route::get('password', 'AccountController@password')->name('password');
            Route::patch('password', 'AccountController@updatePassword');
        });

        Route::resource('superusers', 'SuperusersController');
        Route::prefix('superusers')->name('superusers.')->group(function() {
            Route::get('datatables/index', 'SuperusersController@datatables')->name('datatables.index');
            Route::patch('/{superuser}/toggle', 'SuperusersController@toggle')->name('toggle');
            Route::prefix('images')->name('images.')->group(function() {
                Route::get('/{superuser}', 'SuperusersController@imageIndex')->name('index');
                Route::get('/{superuser}/create', 'SuperusersController@imageCreate')->name('create');
                Route::post('/{superuser}', 'SuperusersController@imageStore')->name('store');
                Route::delete('/{superuser}', 'SuperusersController@imageDestroy')->name('destroy');
            });
        });

        Route::resource('users', 'UsersController');
        Route::prefix('users')->name('users.')->group(function() {
            Route::get('datatables/index', 'UsersController@datatables')->name('datatables.index');
            Route::patch('/{user}/toggle', 'UsersController@toggle')->name('toggle');
            Route::prefix('images')->name('images.')->group(function() {
                Route::get('/{user}', 'UsersController@imageIndex')->name('index');
                Route::get('/{user}/create', 'UsersController@imageCreate')->name('create');
                Route::post('/{user}', 'UsersController@imageStore')->name('store');
                Route::delete('/{user}', 'UsersController@imageDestroy')->name('destroy');
            });
        });

        Route::resource('categories', 'CategoriesController');
        Route::prefix('categories')->name('categories.')->group(function() {
            Route::get('datatables/index', 'CategoriesController@datatables')->name('datatables.index');
            Route::patch('/{category}/toggle', 'CategoriesController@toggle')->name('toggle');
            Route::prefix('images')->name('images.')->group(function() {
                Route::get('/{category}', 'CategoriesController@imageIndex')->name('index');
                Route::get('/{category}/create', 'CategoriesController@imageCreate')->name('create');
                Route::post('/{category}', 'CategoriesController@imageStore')->name('store');
                Route::delete('/{category}', 'CategoriesController@imageDestroy')->name('destroy');
            });
        });

        Route::resource('products', 'ProductsController');
        Route::prefix('products')->name('products.')->group(function() {
            Route::get('datatables/index', 'ProductsController@datatables')->name('datatables.index');
            Route::patch('/{product}/toggle', 'ProductsController@toggle')->name('toggle');
            Route::prefix('images')->name('images.')->group(function() {
                Route::get('/{product}', 'ProductsController@imageIndex')->name('index');
                Route::get('/{product}/create', 'ProductsController@imageCreate')->name('create');
                Route::post('/{product}', 'ProductsController@imageStore')->name('store');
                Route::delete('/{product}', 'ProductsController@imageDestroy')->name('destroy');
            });
        });

        Route::resource('deals', 'DealsController');
        Route::prefix('deals')->name('deals.')->group(function() {
            Route::get('datatables/index', 'DealsController@datatables')->name('datatables.index');
            Route::patch('/{deal}/toggle', 'DealsController@toggle')->name('toggle');
            Route::prefix('images')->name('images.')->group(function() {
                Route::get('/{deal}', 'DealsController@imageIndex')->name('index');
                Route::get('/{deal}/create', 'DealsController@imageCreate')->name('create');
                Route::post('/{deal}', 'DealsController@imageStore')->name('store');
                Route::delete('/{deal}', 'DealsController@imageDestroy')->name('destroy');
            });
        });

        Route::resource('tutorials', 'TutorialsController');
        Route::prefix('tutorials')->name('tutorials.')->group(function() {
            Route::get('datatables/index', 'TutorialsController@datatables')->name('datatables.index');
            Route::patch('/{tutorial}/toggle', 'TutorialsController@toggle')->name('toggle');
        });

        Route::resource('episodes', 'EpisodesController');
        Route::prefix('episodes')->name('episodes.')->group(function() {
            Route::get('datatables/index', 'EpisodesController@datatables')->name('datatables.index');
        });

        Route::resource('newsletters', 'NewslettersController');
        Route::prefix('newsletters')->name('newsletters.')->group(function() {
            Route::get('datatables/index', 'NewslettersController@datatables')->name('datatables.index');
            Route::patch('/{newsletter}/toggle', 'NewslettersController@toggle')->name('toggle');
        });

        Route::resource('news', 'NewsController');
        Route::prefix('news')->name('news.')->group(function() {
            Route::get('datatables/index', 'NewsController@datatables')->name('datatables.index');
            Route::patch('/{news}/toggle', 'NewsController@toggle')->name('toggle');
        });

        Route::prefix('reservations')->name('reservations.')->group(function() {
            Route::get('/', 'ReservationsController@index')->name('index');
            Route::patch('{reservation}', 'ReservationsController@update')->name('update');
            Route::get('{reservation}', 'ReservationsController@show')->name('show');
        });

        Route::prefix('settings')->name('settings.')->group(function() {
            Route::get('/', 'SettingsController@index')->name('index');
            Route::patch('/', 'SettingsController@update')->name('update');
        });

        Route::patch('/notification/{user}', function(\App\User $user) {
            $user->unreadNotifications->find(request('id'))->markAsRead();
        })->name('notification.read');

        Route::patch('/notifications/{user}', function(\App\User $user) {
            $user->unreadNotifications->markAsRead();

            return back();
        })->name('notifications.read');
    });
});