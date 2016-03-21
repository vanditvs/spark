@extends('layouts.main')
@section('site')
<div class="background-overlay">
    <div class="container">
        <div class="container-sm">
            <div class="form-header">
                <a href="#" class="logo text-center">
                    <img src="{{asset('images/spark-logo.png')}}">
                    <span>Spark</span>
                </a>
            </div>
            <div class="signup-container fadeInUp">
              <h1>Log in</h1>
              <div class="signup-form">
                {{$errors->first('error_message', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
                {{Form::open(array('route' => 'login-submit'))}}
                <div class="form-group">
                    <input type="text" name="email" value="{{Input::old('email')}}" placeholder="Email" required class="form-control input-lg">
                </div>
                {{$errors->first('email', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required class="form-control input-lg">
                </div>
                {{$errors->first('password', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember me.
                        </label>
                        <a href="{{route('forgotpassword')}}" class="pull-right">Forgot password?</a>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Log In</button>
                </div>
                {{Form::close()}}
            </div>
            <div class="form-footer">
                <p>If don't have an account?</p>
                <a class="btn btn-transparent" href="{{route('signup')}}">Sign Up</a>
            </div>
        </div>
    </div>
</div>
</div>
@stop