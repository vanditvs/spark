@extends('layouts.global')

@section('site')
<div class="container">
    <h1 class="page-header">#{{$tag->name}}</h1>
    <div class="row">
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
                                <div class="post-content">
                                    <small>
                                        @if(Auth::user()->likes()->find($post->id))
                                        <span class="text-primary"><i class="glyphicon glyphicon-thumbs-up"></i> {{$post->likers()->count()}}</span> <a href="{{route('unlike', $post->id)}}"><b>Liked</b></a>
                                        @else
                                        <span class="text-primary"><i class="glyphicon glyphicon-thumbs-up"></i> {{$post->likers()->count()}}</span> <a href="{{route('like', $post->id)}}">Like</a>
                                        @endif
                                    </small>
                                    <span class="text-muted">|</span>
                                    <small>
                                        <span class="text-primary"><i class="glyphicon glyphicon-comment"></i> {{$post->comments()->count()}}</span> Comments
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
                            <p>
                                <a target="_blank" href="{{route('view-blog-post', [$post->blog->slug, $post->slug])}}" class="btn btn-default btn-sm">View</a>
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
@stop