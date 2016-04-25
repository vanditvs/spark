@extends('layouts.dashboard')
@section('site')
<div class="main-wrapper col-lg-10 col-md-9 col-sm-9 col-xs-12 pull-right">
    <div class="dashboard-content">
        <div class="page-header">
            <h1>Edit post</h1>
        </div>
        <div class="dashboard-form">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            {{$errors->first('error_message', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
            {{Form::open(array('route' => ['edit-blog-post-submit', $blog->id, $post->id], 'files' => true))}}
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <div class="form-group">
                        <input type="text" name="title" value="{{Input::old('title') ? Input::old('title') : $post->title}}" placeholder="Title" required class="form-control input-lg">
                    </div>
                    {{$errors->first('title', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}

                    <div class="form-group">
                        <textarea name="content" rows="10" placeholder="Content" required class="form-control input-lg">{{Input::old('content') ? Input::old('content') : $post->content}}</textarea>
                    </div>
                    {{$errors->first('content', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block btn-lg"> Update Post</button>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">Featured Image</div>
                        <div class="panel-body">
                            <img src="{{featuredImage($post->featured_image)}}" class="admin-post-image img-responsive" alt="featured_image">
                        </div>
                        <div class="panel-footer">
                            <div class="form-group">
                                <input type="file" name="featured-image" required class="form-control">
                            </div>
                            {{$errors->first('featured-image', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
                        </div>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    @stop