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
</head>
<body class="has-navbar">
    <div class="site">
        @include('partials.dashboard-nav')
        @include('partials.admin-sidebar')
        @yield('site')
    </div>
    @include('partials.footer')
</body>
</html>