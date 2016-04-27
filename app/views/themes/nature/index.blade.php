@extends('layouts.theme')

@section('site')
<h1 class="page-header blog-title align="center" ">
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
    <div class="media">
        <div class="media-left">
            <a href="{{route('view-blog-post', [$blog->slug, $post->slug])}}">
                <img class="media-object" src="{{featuredImage($post->featured_image)}}" >
            </a>
        </div>
        <div class="media-body">
            <b>
                <h3>
                    <a href="{{route('view-blog-post', [$blog->slug, $post->slug])}}">{{$post->title}}</a>
                </h3>
            </b>
            <p>
                {{substr($post->content, 0, 300)}}....
            </p>
        </div>
    </div>
    @endforeach
</div>
@stop