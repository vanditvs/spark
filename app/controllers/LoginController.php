<?php

class LoginController extends BaseController {

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
            return Redirect::route('index');
        }

        //Unable to log in user
        return Redirect::route('login')->withErrors(array('error_message' => "Please check your email and password combo."))->withInput(Input::except('password'));
    }

    public function logoutUser()
    {
        Auth::logout();
        return Redirect::route('index');
    }


}
