@extends('layouts.dashboard')
@section('site')
<div class="main">
    <div class="main-wrapper col-lg-10 col-md-9 col-sm-9 col-xs-12 pull-right">
        <div class="dashboard-content">
            <div class="page-header">
                <h1> <small>Posts</small></h1>
            </div>
            <div class="row">
            @if(!$blog->posts()->count())
            <div class="alert alert-info">
                No posts found.
            </div>
            @endif
                @foreach($blog->posts as $post)
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>
                                <img class="img-rounded img-responsive" src="https://unsplash.it/600/300/?image=20" alt="post-image">
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
                                            <span class="text-primary"><i class="glyphicon glyphicon-comment"></i></span> Comments
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
                                    <p>
                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="#" class="btn btn-default btn-sm">View</a>
                                    </p>
                                    <small class="text-muted">Posted <b>5 hours ago</b></small>
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