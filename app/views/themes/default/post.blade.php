@extends('layouts.theme')

@section('site')
<div class="container">
    <h1 class="page-header blog-title">
        <a href="{{route('view-blog', [$blog->slug])}}">{{$blog->title}}</a>
        <a href="#" class="blog-author">By <b>{{$blog->user->name}}</b></a>
    </h1>

    <div class="thumbnail blog-post">
        <img src="{{featuredImage($post->featured_image)}}" class="featured-image">
        <div class="caption">
            <h3>
                <a href="{{route('view-blog-post', [$blog->slug, $post->slug])}}">{{$post->title}}</a>
            </h3>
            <p>
                {{substr($post->content, 0, 200)}}
            </p>
        </div>
    </div>
</div>
@stop