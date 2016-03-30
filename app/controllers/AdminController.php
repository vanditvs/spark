<?php

class AdminController extends BaseController{
    public function index()
    {
        $blogs = Auth::user()->blogs;
        $data = array('allblogs' => $blogs, 'pageTitle' => 'Dashboard');
        return View::make('dashboard')->with($data);
    }
    public function createBlog()
    {
        $data = array('pageTitle' => 'Dashboard');
        return View::make('create-blog')->with($data);
    }
    public function createBlogSubmit()
    {
        //Fetch User Input
        $input = Input::only("title", "theme");

        //Validation Rules
        $rules = array(
            'title' => 'required|string',
            'theme' => 'required|string'
            );

        //Validate user input with rules
        $validator = Validator::make($input, $rules);

        //Check if validation failed
        if($validator->fails()){
            //Redirect to sign up page with errors and user input
            return Redirect::route('create-blog')->withErrors($validator)->withInput($input);
        }

        $input['slug'] = Str::slug($input['title']) . "-" . str_random();

        $user = Auth::user();

        $blog = $user->blogs()->create($input);

        //Check if blog created
        if($blog){
            //Blog created, redirect to login page
            return Redirect::route('admin');
        }

        //Blog not created, redirect to signup page with error message and user input
        return Redirect::route('create-blog')->withErrors(array('error_message' => "Something went wrong! Try again!"))->withInput($input);
    }


}