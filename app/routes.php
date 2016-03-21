<?php

Route::get('/', array('as' => "index", 'uses' => "HomeController@showHomepage"));

Route::group(array('prefix' => 'auth'), function()
{
    Route::get('login', array('as' => "login", 'uses' => "LoginController@showLoginPage"));

    Route::get('signup', array('as' => "signup", 'uses' => "SignupController@showSignupPage"));

    Route::get('forgotpassword', array('as' => "forgotpassword", 'uses' => "ForgotPasswordController@showForgotPasswordPage"));

});