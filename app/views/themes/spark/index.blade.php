@extends('layouts.theme')

@section('site')
<div class="container">
    <h1 class="page-header blog-title">
        <a href="{{route('view-blog', [$blog->slug])}}">{{$blog->title}}</a>
        <a href="#" class="blog-author">By <b>{{$blog->user->name}}</b></a>
    </h1>

    <div class="blog-posts">
        @if($posts->count() < 1)
        <div class="alert">
            No posts!
        </div>
        @endif
        @foreach($posts as $post)
        <div class="thumbnail blog-post">
            <img src="{{featuredImage($post->featured_image)}}" class="featured-image">
            <div class="caption">
                <h3>
                    <a href="{{route('view-blog-post', [$blog->slug, $post->slug])}}">{{$post->title}}</a>
                </h3>
                <p>
                    {{$post->content}}
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
        @endforeach
    </div>
</div>
@stop