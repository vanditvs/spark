@extends('layouts.main')

@section('site')
<div class="background-overlay">
    <div class="container">
        <div class="container-md">
            <div class="form-header">
                <a href="#" class="logo text-center">
                    <img src="{{asset('images/spark-logo.png')}}">
                    <span>Spark</span>
                </a>
            </div>
            <div class="signup-container fadeInUp">
              <h1>Create your account.</h1>
              <div class="signup-form">
                  {{$errors->first('error_message', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
                  {{Form::open(array('route' => 'signup-submit'))}}
                  <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" value="{{Input::old('name')}}" placeholder="Name" required class="form-control input-lg">
                        </div>
                        {{$errors->first('name', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="username" value="{{Input::old('username')}}" placeholder="Username" required class="form-control input-lg">
                        </div>
                        {{$errors->first('username', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="email" name="email" value="{{Input::old('email')}}" placeholder="Email" required class="form-control input-lg">
                        </div>
                        {{$errors->first('email', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" required class="form-control input-lg">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="password" name="password_confirmation" placeholder="Password (Confirm)" required class="form-control input-lg">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        {{$errors->first('password', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Sign Up</button>
                </div>
                {{Form::close()}}
            </div>
            <div class="form-footer">
                <p>Already have an account?</p>
                <a class="btn btn-transparent" href="{{route('login')}}">Log in</a>
            </div>
        </div>
    </div>
</div>

@stop

