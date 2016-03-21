<?php

Route::get('/', array('as' => "index", 'uses' => "HomeController@showHomepage"));

//Auth Routes
//Logged in users cannot access these routes
Route::group(array('prefix' => 'auth', 'before' => 'guest'), function()
{
    Route::get('login', array('as' => "login", 'uses' => "LoginController@showLoginPage"));
    Route::post('login', array('as' => "login-submit", 'before' => 'csrf', 'uses' => "LoginController@postLogin"));

    Route::get('signup', array('as' => "signup", 'uses' => "SignupController@showSignupPage"));
    Route::post('signup', array('as' => "signup-submit", 'before' => 'csrf', 'uses' => "SignupController@postSignup"));

    Route::get('forgotpassword', array('as' => "forgotpassword", 'uses' => "ForgotPasswordController@showForgotPasswordPage"));

});

Route::get('logout', array('as' => "logout", 'uses' => "LoginController@logoutUser"));