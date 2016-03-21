<?php

Route::get('/', array('as' => "index", 'uses' => "HomeController@showHomepage"));