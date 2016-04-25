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

        Route::get('{id}/posts', array('as' => 'manage-blog-posts', 'uses' => 'ManageBlogController@posts'));

        //create post
        Route::get('{id}/posts/create', array('as' => 'create-blog-post', 'uses' => 'ManageBlogController@createPost'));
        Route::post('{id}/posts/create', array('as' => 'create-blog-post-submit', 'uses' => 'ManageBlogController@createPostSubmit'));

        //edit post
        Route::get('{id}/posts/{post_id}/edit', array('as' => 'edit-blog-post', 'uses' => 'ManageBlogController@editPost'));
        Route::post('{id}/posts/{post_id}/edit', array('as' => 'edit-blog-post-submit', 'uses' => 'ManageBlogController@editPostSubmit'));
        Route::post('{id}/posts/{post_id}/delete', array('as' => 'delete-blog-post', 'uses' => 'ManageBlogController@deletePost'));

        Route::get('{id}/comments', array('as' => 'manage-blog-comments', 'uses' => 'ManageBlogController@comments'));
        Route::post('{id}/comments/{comment_id}/delete', array('as' => 'delete-blog-comment', 'uses' => 'ManageBlogController@deleteComment'));

    });


});

Route::get('explore', array('as' => 'explore', 'uses' => 'ExploreController@explorePage'));
Route::get('search', array('as' => 'search', 'uses' => 'ExploreController@searchPage'));
