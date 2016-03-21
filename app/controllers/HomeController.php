<?php

class HomeController extends BaseController {

	public function showHomepage()
	{
        //Check if user is logged in
        if(Auth::check()){
            //Show logged in user
            $html = "Hello, " . Auth::user()->name;
            $logout = route('logout');
            $html .= "<br><a href='$logout'>Logout</a>";
            return $html;
        }
        //User not logged in
        $data = array('bodyClass' => "splash-page");
        return View::make('homepage')->with($data);
    }
}
