@extends('layouts.dashboard')
@section('site')
<div class="main-wrapper col-lg-10 col-md-9 col-sm-9 col-xs-12 pull-right">
    <div class="dashboard-content">
        <div class="page-header">
            <h1>Create Blog</h1>
        </div>
        <div class="dashboard-form">
          {{$errors->first('error_message', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
          {{Form::open(array('route' => 'create-blog-submit'))}}
          <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <input type="text" name="title" value="{{Input::old('title')}}" placeholder="Title" required class="form-control input-lg">
                </div>
                {{$errors->first('title', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <input type="text" name="theme" value="{{Input::old('theme')}}" placeholder="Theme" required class="form-control input-lg">
                </div>
                {{$errors->first('theme', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
            </div>
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-success btn-block btn-lg">Create Blog</button>
        </div>
        {{Form::close()}}
    </div>
</div>
</div>
@stop