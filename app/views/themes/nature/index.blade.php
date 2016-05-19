@extends('layouts.theme')

@section('site')
<div class="container">
    <h1 class="blog-title clearfix">
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
        <div class="media blog-post">
            <div class="media-left">
                <a href="{{route('view-blog-post', [$blog->slug, $post->slug])}}">
                    <img class="media-object" src="{{featuredImage($post->featured_image)}}" >
                </a>
            </div>
            <div class="media-body">
                <b>
                    <h3>
                        <a class="blog-post-title" href="{{route('view-blog-post', [$blog->slug, $post->slug])}}">{{$post->title}}</a>
                    </h3>
                </b>
                <p>
                    {{substr($post->content, 0, 300)}}....
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