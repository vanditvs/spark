@extends('layouts.main')

@section('site')
<div class="background-overlay">
    <div class="container">
        <div class="container-sm">
            <div class="form-header">
                <a href="{{route('index')}}" class="logo text-center">
                    <img src="{{asset('images/spark-logo.png')}}">
                    <span>Spark</span>
                </a>
            </div>
            <div class="signup-container fadeInUp">
              <h1>Reset password.</h1>
              <div class="signup-form">
                <form action="{{ action('RemindersController@postReset') }}" method="post">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" required class="form-control input-lg">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" required class="form-control input-lg">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" placeholder="Password (Confirm)" required class="form-control input-lg">
                    </div>
                    <input type="hidden" name="token" value="{{$token}}">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Reset</button>
                </form>
            </div>
            <div class="form-footer">
                <a class="btn btn-transparent pull-left" href="{{route('login')}}">
                    <i class="glyphicon glyphicon-chevron-left"></i> Log In
                </a>
                <a class="btn btn-transparent pull-right" href="{{route('signup')}}">
                    Sign Up <i class="glyphicon glyphicon-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>
    @stop