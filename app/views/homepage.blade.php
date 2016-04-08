@extends('layouts.main')

@section('site')
<div class="background-overlay">
    <div class="container main-header">
        <div class="col-lg-2">
            <a href="{{route('index')}}" class="logo">
                <img src="{{asset('images/spark-logo.png')}}">
                <span>Spark</span>
            </a>
        </div>
        <div class="col-lg-5 pull-right">
          <div class="pull-right main-nav">
            <a class="btn btn-default" href="{{route('login')}}">Log In</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="intro fadeInUp">
        <h1>Share your stories.</h1>
        <p class="tagline">Create your own blog, free.</p>
        <p>
            <a href="{{route('signup')}}" class="btn btn-success btn-lg main-signup-btn">
                <i class="glyphicon glyphicon-pencil"></i> <span>Get Started</span>
            </a>
            <a href="{{route('explore')}}" class="btn btn-default btn-lg explore-btn">
                Explore
            </a>
        </p>
        <br>
    </div>
</div>
</div>
@stop