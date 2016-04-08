<?php

Route::get('/', array('as' => "index", 'uses' => "HomeController@showHomepage"));

//Auth Routes
//Logged in users cannot access these routes
Route::group(array('prefix' => 'auth', 'before' => 'guest'), function()
{
    //Login
    Route::get('login', array('as' => "login", 'uses' => "AuthController@showLoginPage"));
    Route::post('login', array('as' => "login-submit", 'before' => 'csrf', 'uses' => "AuthController@postLogin"));

    //Signup
    Route::get('signup', array('as' => "signup", 'uses' => "AuthController@showSignupPage"));
    Route::post('signup', array('as' => "signup-submit", 'before' => 'csrf', 'uses' => "AuthController@postSignup"));

    //Forgot Password
    Route::get('forgotpassword', array('as' => "forgotpassword", 'uses' => "AuthController@showForgotPasswordPage"));

});
//Logout
Route::get('logout', array('as' => "logout", 'uses' => "AuthController@logoutUser"));

//Admin Routes
//Users need to be logged in to access these routes
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
    //Admin Page
    Route::get('/', array('as' => 'admin', 'uses' => 'AdminController@index'));

    //Blog Admin Routes
    Route::group(array('prefix' => 'blog'), function(){
        //Create Blog
        Route::get('create', array('as' => 'create-blog', 'uses' => 'AdminController@createBlog'));
        Route::post('create', array('as' => 'create-blog-submit', 'uses' => 'AdminController@createBlogSubmit'));

        Route::get('{id}', array('as' => 'manage-blog', 'uses' => 'ManageBlogController@dashboard'));

        Route::get('view', array('as' => 'view', 'uses' => 'ManageBlogController@viewPost'));
    });


});

Route::get('explore', array('as' => 'explore', 'uses' => 'ExploreController@explorePage'));
