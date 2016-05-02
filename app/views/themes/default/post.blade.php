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
                {{$post->content}}
            </p>
            <div class="post-tags">
                @foreach ($post->tags as $tag)
                <a href="{{route('explore-tags', $tag->id)}}" class="label label-default">#{{$tag->name}}</a>
                @endforeach
            </div>
            <div class="share-buttons clearfix">
                {{getShareButtons()}}
            </div>
        </div>
    </div>
</div>
@stop