@extends('layouts.admin')
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
        <div class="col-lg-12 col-md-12">
          <div class="form-group">
            <input type="text" name="title" value="{{Input::old('title')}}" placeholder="Title" required class="form-control input-lg">
          </div>
          {{$errors->first('title', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
        </div>
        <div class="col-lg-12 col-md-12">
        <h3>Select Theme</h3><br>
          <div class="form-group">
            <div class="row">
              @foreach($availableThemes as $alias => $theme)
              <div class="col-lg-4">
                <div class="thumbnail">
                  <img src="{{themePreview($alias)}}" class="featured-image">
                  <div class="caption">
                    <h3>
                      {{$theme['name']}}
                    </h3>
                    <p>
                      <label class="btn btn-primary btn-block">
                        <input type="radio" name="theme" value="{{$alias}}"> Select
                      </label>
                    </p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
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