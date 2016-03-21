<?php

class LoginController extends BaseController {

    public function showLoginPage()
    {
        $data = array('bodyClass' => "splash-page");
        return View::make('login')->with($data);
    }
}
