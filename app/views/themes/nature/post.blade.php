@extends('layouts.theme')

@section('site')
<div class="container">
    <h1 class="blog-title clearfix">
        <a href="{{route('view-blog', [$blog->slug])}}">{{$blog->title}}</a>
        <a href="#" class="blog-author">By <b>{{$blog->user->name}}</b></a>
    </h1>

    <div class="blog-posts">
        <div class="media blog-post">
            <div class="media-left">
                <a href="{{route('view-blog-post', [$blog->slug, $post->slug])}}">
                    <img class="media-object" src="{{featuredImage($post->featured_image)}}" >
                </a>
                <div class="post-tags">
                    @foreach ($post->tags as $tag)
                    <a href="{{route('explore-tags', $tag->id)}}" class="label label-default">#{{$tag->name}}</a>
                    @endforeach
                </div>
            </div>
            <div class="media-body">
                <b>
                    <h3>
                        <a class="blog-post-title" href="{{route('view-blog-post', [$blog->slug, $post->slug])}}">{{$post->title}}</a>
                    </h3>
                </b>
                <p>
                    {{$post->content}}
                </p>
            </div>
        </div>
    </div>
</div>
@stop