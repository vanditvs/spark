@extends('layouts.dashboard')
@section('site')
<div class="main-wrapper col-lg-10 col-md-9 col-sm-9 col-xs-12 pull-right">
    <div class="dashboard-content">
        <div class="page-header">
            <h1>Customize Blog
                {{Form::open(array('route' => ['delete-blog', $blog->id], 'class' => 'pull-right form form-inline', 'onSubmit' => "return confirm('Delete blog?');"))}}
                <button type="submit" class="btn btn-danger btn-sm pull-right"> Delete blog</button>
                {{Form::close()}}
            </h1>
        </div>
        <div class="dashboard-form">

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif

            @if(Session::has('error_message'))
            <div class="alert alert-danger">
                {{Session::get('error_message')}}
            </div>
            @endif
            {{Form::open(array('route' => ['manage-blog-submitcustomize', $blog->id]))}}
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <input type="text" name="title" value="{{Input::old('title') ? Input::old('title') : $blog->title}}" placeholder="Title" required class="form-control input-lg">
                    </div>
                    {{$errors->first('title', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <h3>Select Theme</h3><br>
                        @foreach($availableThemes as $alias => $theme)
                        <div class="col-lg-4">
                            <div class="thumbnail">
                                <img src="{{themePreview($alias)}}" class="featured-image">
                                <div class="caption">
                                    <h3>
                                        {{$theme['name']}}
                                    </h3>
                                    <p>
                                        @if($alias === $blog->theme)
                                        <label class="btn btn-primary btn-block">
                                            <input type="radio" checked name="theme" value="{{$alias}}"> Select
                                        </label>
                                        @else
                                        <label class="btn btn-primary btn-block">
                                            <input type="radio" name="theme" value="{{$alias}}"> Select
                                        </label>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
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