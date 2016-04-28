<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$pageTitle or 'Spark'}}</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/animation.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

    @if(File::exists(public_path("themes/{$blog->theme}/style.css")))
    <link rel="stylesheet" type="text/css" href='{{asset("themes/{$blog->theme}/style.css")}}'>
    @endif

</head>
<body class="has-navbar">
    <div class="site">
        @if(Auth::check())
        @include('partials.loggedin-nav')
        @else
        @include('partials.global-nav')
        @endif

        <div class="theme-content">
            @yield('site')
        </div>

        <div class="container">
            <div class="spark-notice">
                This blog is powered by <a href="{{url('/')}}">Spark</a>. Theme: <b><u>{{themeName($blog->theme)}}</u></b>
            </div>
        </div>
    </div>
    @include('partials.footer')
    @yield('theme-javascript')
</body>
</html>