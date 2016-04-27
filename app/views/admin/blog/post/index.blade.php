@extends('layouts.dashboard')
@section('site')
<div class="main">
    <div class="main-wrapper col-lg-10 col-md-9 col-sm-9 col-xs-12 pull-right">
        <div class="dashboard-content">
            <div class="page-header clearfix">
                <h1 class="pull-left">{{$blog->title}} <small>Posts</small></h1>
                <a href="{{route('create-blog-post', $blog->id)}}" class="btn btn-primary btn-sm pull-right"> Create post</a>
            </div>
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="row">
                @if(!$blog->posts()->count())
                <div class="alert alert-info">
                    No posts found.
                </div>
                @endif
                @foreach($posts as $post)
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>
                                <img class="img-rounded img-responsive admin-post-image" src="{{featuredImage($post->featured_image)}}" alt="post-image">
                            </p>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="post-content">
                                        <p>
                                            <h4 class="media-heading">{{$post->title}}</h4>
                                        </p>
                                        <small>
                                            <span class="text-primary"><i class="glyphicon glyphicon-thumbs-up"></i> {{$post->likers()->count()}}</span> Likes
                                        </small>
                                        <span class="text-muted">|</span>
                                        <small>
                                            <span class="text-primary"><i class="glyphicon glyphicon-comment"></i> {{$post->comments()->count()}}</span> Comments
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
                                    <p>
                                        <a href="{{route('edit-blog-post', [$blog->id, $post->id])}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{route('view-blog-post', [$blog->slug, $post->slug])}}" class="btn btn-default btn-sm">View</a>
                                    </p>
                                    <small class="text-muted">Posted <b>{{$post->created_at}}</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
</div>
@stop