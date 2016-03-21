<?php

class ForgotPasswordController extends BaseController {

    public function showForgotPasswordPage()
    {
        $data = array('bodyClass' => "splash-page");
        return View::make('forgotpassword')->with($data);
    }
}
