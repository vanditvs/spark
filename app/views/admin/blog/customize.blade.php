@extends('layouts.dashboard')
@section('site')
<div class="main-wrapper col-lg-10 col-md-9 col-sm-9 col-xs-12 pull-right">
    <div class="dashboard-content">
        <div class="page-header">
            <h1>Customize Blog</h1>
        </div>
        <div class="dashboard-form">
          {{Form::open() }}
          <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="form-group">
                    <input type="text" name="title" value="{{Input::old('title') ? Input::old('title') : $blog->title}}" placeholder="Title" required class="form-control input-lg">
                </div>
                {{$errors->first('theme', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="form-group">
                    <input type="text" name="theme" value="{{Input::old('theme') ? Input::old('theme') : $blog->theme}}" placeholder="Theme" required class="form-control input-lg">
                </div>
                {{$errors->first('theme', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block btn-lg">Customize Blog</button>
        </div>
        {{Form::close()}}
    </div>
</div>
</div>
@stop