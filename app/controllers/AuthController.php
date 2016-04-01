<?php

class AuthController extends BaseController {

    public function showLoginPage()
    {
        $data = array('bodyClass' => "splash-page");
        return View::make('login')->with($data);
    }

    public function postLogin()
    {
       //Fetch User Input
        $input = Input::only('email', 'password', 'remember');

        //Validation Rules
        $rules = array(
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6'
            );

        //Validate user input with rules
        $validator = Validator::make($input, $rules);

        //Check if validation failed
        if($validator->fails()){
            //Redirect to sign up page with errors and user input
            return Redirect::route('login')->withErrors($validator)->withInput(Input::except('password'));
        }

        $remember = is_null($input['remember']) ? false : true;

        //Log in the user
        if(Auth::attempt(array('email' => $input['email'], 'password' => $input['password']), $remember)){
            //User logged in
            return Redirect::route('admin');
        }

        //Unable to log in user
        return Redirect::route('login')->withErrors(array('error_message' => "Please check your email and password combo."))->withInput(Input::except('password'));
    }

    // SignUp.
    public function showSignupPage()
    {
        $data = array('bodyClass' => "splash-page");
        return View::make('signup')->with($data);
    }

    public function postSignup()
    {
        //Fetch User Input
        $input = Input::only("name", "username","email","password","password_confirmation");

        //Validation Rules
        $rules = array(
            'name' => 'required|string',
            'username' => 'required|unique:users|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
            );

        //Validate user input with rules
        $validator = Validator::make($input, $rules);

        //Check if validation failed
        if($validator->fails()){
            //Redirect to sign up page with errors and user input
            return Redirect::route('signup')->withErrors($validator)->withInput(Input::except('password'));
        }

        //Hash password before creating user
        $input['password'] = Hash::make($input['password']);

        //Create User
        $user = User::create($input);

        //Check if user created
        if($user){
            //User created, redirect to login page
            return Redirect::route('login');
        }

        //User not created, redirect to signup page with error message and user input
        return Redirect::route('signup')->withErrors(array('error_message' => "Something went wrong! Try again!"))->withInput(Input::except('password'));
    }

    //Forgot Password.
     public function showForgotPasswordPage()
    {
        $data = array('bodyClass' => "splash-page");
        return View::make('forgotpassword')->with($data);
    }

    //Logout.
    public function logoutUser()
    {
        Auth::logout();
        return Redirect::route('index');
    }
}
