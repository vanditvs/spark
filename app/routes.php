<?php

Route::get('/', array('as' => "index", 'uses' => "HomeController@showHomepage"));

//Auth Routes
//Logged in users cannot access these routes
Route::group(array('prefix' => 'auth', 'before' => 'guest'), function()
{
    Route::get('login', array('as' => "login", 'uses' => "AuthController@showLoginPage"));
    Route::post('login', array('as' => "login-submit", 'before' => 'csrf', 'uses' => "AuthController@postLogin"));

    Route::get('signup', array('as' => "signup", 'uses' => "AuthController@showSignupPage"));
    Route::post('signup', array('as' => "signup-submit", 'before' => 'csrf', 'uses' => "AuthController@postSignup"));

    Route::get('forgotpassword', array('as' => "forgotpassword", 'uses' => "AuthController@showForgotPasswordPage"));

});

Route::get('logout', array('as' => "logout", 'uses' => "AuthController@logoutUser"));


Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
    Route::get('/', array('as' => 'admin', 'uses' => 'AdminController@index'));
    Route::group(array('prefix' => 'blog'), function(){
        Route::get('create', array('as' => 'create-blog', 'uses' => 'AdminController@createBlog'));
        Route::post('create', array('as' => 'create-blog-submit', 'uses' => 'AdminController@createBlogSubmit'));
    });
});
