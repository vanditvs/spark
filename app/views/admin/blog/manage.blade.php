@extends('layouts.dashboard')
@section('site')
<div class="main">
    <div class="main-wrapper col-lg-10 col-md-9 col-sm-9 col-xs-12 pull-right">
        <div class="dashboard-content">
            <div class="page-header">
                <h1>{{$blog->title}} <small>Manage</small>
                    <a target="_blank" href="{{route('view-blog', $blog->slug)}}" class="btn btn-success btn-sm pull-right"> View Blog</a>
                </h1>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Basic Info</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-9 col-md-8 col-sm-6 col-xs-12">
                                    <h4><span class="label label-default">{{$blog->posts->count()}}</span> Posts</h4>
                                    <h4><span class="label label-default">{{$blog->followers->count()}}</span> Followers</h4>
                                    <h4><span class="label label-default"><i class="glyphicon glyphicon-bookmark"></i></span> Current Theme : {{themeName($blog->theme)}}</h4>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 text-right">
                                    <small class="text-muted"> Created <b>{{$blog->created_at}}</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Recent post</h3>
                        </div>
                        <div class="panel-body">
                            @if(!$latestPost)
                            <p>
                                No post created.
                            </p>
                            <p>
                                <a href="{{route('create-blog-post', $blog->id)}}" class="btn btn-success"> Create new post</a>
                            </p>
                            @else
                            <p>
                                <img class="img-rounded img-responsive admin-post-image" src="{{featuredImage($latestPost->featured_image)}}" alt="post-image">
                            </p>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="post-content">
                                        <p>
                                        </p><h4 class="media-heading">{{$latestPost->title}}</h4>
                                        <p></p>
                                        <small>
                                            <span class="text-primary"><i class="glyphicon glyphicon-thumbs-up"></i></span> {{$latestPost->likers->count()}} Likes
                                        </small>
                                        <span class="text-muted">|</span>
                                        <small>
                                            <span class="text-primary"><i class="glyphicon glyphicon-comment"></i></span> {{$latestPost->comments->count()}} Comments
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
                                    <p>
                                        <a href="{{route('edit-blog-post', [$blog->id, $latestPost->id])}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a target="_blank" href="{{route('view-blog-post', [$blog->slug, $latestPost->slug])}}" class="btn btn-default btn-sm">View</a>
                                    </p>
                                    <small class="text-muted">Posted <b>{{$latestPost->created_at}}</b></small>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop