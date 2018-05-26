<?php

Route::namespace('Front')->name('front.')->group(function () {
    Route::get('/', 'PagesController@home')->name('home');
    Route::get('/about', 'PagesController@about')->name('about');
    Route::get('/contact', 'PagesController@contact')->name('contact');
    Route::get('/faqs', 'PagesController@faqs')->name('faqs');
    Route::get('/sellaura', 'PagesController@sellaura')->name('sellaura');
    Route::get('/newsletter', 'PagesController@newsletter')->name('newsletter');
    Route::get('/getstarted', 'PagesController@getstarted')->name('getstarted');
    Route::get('/system', 'PagesController@system')->name('system');
    Route::get('/howitworks', 'PagesController@howitworks')->name('howitworks');
    Route::get('/distributorpromotion', 'PagesController@distributorpromotion')->name('distributorpromotion');
    Route::get('/deals', 'PagesController@deals')->name('deals');
    Route::get('/news', 'PagesController@news')->name('news');
    Route::get('/distributors', 'PagesController@distributors')->name('distributors');
    Route::get('/reviews', 'PagesController@reviews')->name('reviews');

    Route::prefix('products')->name('products.')->group(function() {
        Route::get('/', 'ProductsController@index')->name('index');
        Route::get('/{product}', 'ProductsController@show')->name('show');
    });

    Route::prefix('tutorials')->name('tutorials.')->group(function() {
        Route::get('/', 'TutorialsController@index')->name('index');
        Route::get('/{tutorial}', 'TutorialsController@show')->name('show');
    });

    Route::prefix('tutorials/{tutorial}/episodes')->name('episodes.')->group(function() {
        Route::get('/{number}', 'EpisodesController@show')->name('show');
    });

    Route::namespace('Auth')->group(function() {
        Route::post('subscribe', 'NewsletterController@subscribe')->name('subscribe');

        Route::middleware('front.guest')->group(function() {
            Route::get('register', 'RegisterController@showRegisterForm')->name('register');
            Route::post('register', 'RegisterController@register');
            Route::get('register/{token}', 'RegisterController@verify')->name('verify');

            Route::get('login', 'LoginController@showLoginForm')->name('login');
            Route::post('login', 'LoginController@login');
        });

        Route::get('logout', 'LoginController@logout')->middleware('front.auth')->name('logout');

        Route::prefix('password')->name('password.')->group(function() {
            Route::get('reset', 'ForgotPasswordController@showLinkRequestForm')->name('request');
            Route::post('email', 'ForgotPasswordController@sendResetLinkEmail')->name('email');
            Route::get('reset/{token}', 'ResetPasswordController@showResetForm')->name('reset');
            Route::post('reset/{token}', 'ResetPasswordController@reset');
        });
    });

    Route::middleware('front.auth')->prefix('user')->group(function() {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::prefix('account')->name('account.')->group(function() {
            Route::get('profile', 'AccountController@profile')->name('profile');
            Route::patch('profile', 'AccountController@updateProfile');
            Route::get('password', 'AccountController@password')->name('password');
            Route::patch('password', 'AccountController@updatePassword');
        });
    });

    Route::get('/addressess', function() {
        $address = new App\Acme\Repositories\AddressRepository;
        $level = request('level');
        $code = request('code');

        if (($level != null) && ($code != null)) {
            return $address->$level($code)->get();
        }

        return response()->json($address->provinces);
    });
});