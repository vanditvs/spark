<?php

class SignupController extends BaseController {

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
            return Redirect::route('signup')->withErrors($validator)->withInput(Input::except('password'));;
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
}
