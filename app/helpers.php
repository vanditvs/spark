<?php

/*
|--------------------------------------------------------------------------
| Detect Active Route
|--------------------------------------------------------------------------
|
| Compare given route with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/
function isActiveRoute($route, $output = "active")
{
    if (Route::currentRouteName() == $route) return $output;
}

/*
|--------------------------------------------------------------------------
| Detect Active Routes
|--------------------------------------------------------------------------
|
| Compare given routes with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/
function areActiveRoutes(Array $routes, $output = "active")
{
    foreach ($routes as $route)
    {
        if (Route::currentRouteName() == $route) return $output;
    }

}

HTML::macro('activeState', function($route, $params = array(), $nested = false, $class = 'active'){
    if(!$nested){
        return Request::url() === route($route, $params) ? $class : '';
    }else{
        return strpos(Request::url(), route($route, $params)) !==false ? $class : '';
    }
});

function featuredImage($name = null)
{
    if($name) {
        return url('/').'/uploads/posts/'.$name;
    }

    return asset('images/featured-image.png');
}

function themePreview($theme)
{
    return url('/').'/themes/'.$theme."/preview.png";
}

function themeName($theme)
{
    $availableThemes = Config::get('themes');

    $theme = isset($availableThemes[$theme]) ? $availableThemes[$theme] : false;

    if(!$theme) {
        return "";
    }

    return $theme['name'];
}

function profileImage($name = null)
{
    if($name) {
        return url('/').'/uploads/users/'.$name;
    }

    return asset('images/profile-image.png');
}