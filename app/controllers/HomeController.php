<?php

class HomeController extends BaseController {

	public function showHomepage()
	{
		$data = array('bodyClass' => "splash-page");
		return View::make('homepage')->with($data);
	}
}
