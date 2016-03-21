<?php

class SignupController extends BaseController {

    public function showSignupPage()
    {
        $data = array('bodyClass' => "splash-page");
        return View::make('signup')->with($data);
    }
}
