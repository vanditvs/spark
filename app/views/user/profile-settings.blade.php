@extends('layouts.global')

@section('site')
<div class="container">
    <b><h1>Profile Settings</h1></b>
    <hr>
    <div class="dashboard-form">
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
        @endif
        {{$errors->first('error_message', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
        {{Form::open(array('route' => 'profile-settings-submit', 'files' => true))}}
        <div class="row">
          <div class="col-lg-3 col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Profile Image</div>
                <div class="panel-body">
                    <img src="{{profileImage($user->picture)}}" class="user-image img-responsive" alt="profile_image">
                </div>
                <div class="panel-footer">
                    <div class="form-group">
                        <input type="file" name="profile-image" class="form-control">
                    </div>
                    {{$errors->first('profile-image', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Name" value="{{Input::old('name') ? Input::old('name') : $user->name}}" required class="form-control input-lg">
                    </div>
                    {{$errors->first('name', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
                    <div class="form-group">
                        <input type="text" name="username" placeholder="UserName" value="{{Input::old('username') ? Input::old('username') : $user->username}}" required class="form-control input-lg">
                    </div>
                    {{$errors->first('username', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" value="{{Input::old('email') ? Input::old('email') : $user->email}}" required class="form-control input-lg">
                    </div>
                    {{$errors->first('email', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="password" placeholder="New Password" class="form-control input-lg">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" placeholder="Password (Confirm)" class="form-control input-lg">
                    </div>
                    {{$errors->first('password', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>
</div>
@stop