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
                <div class="post-tags pull-right">
                    @foreach ($post->tags as $tag)
                    <a href="{{route('explore-tags', $tag->id)}}" class="label label-default">#{{$tag->name}}</a>
                    <br>
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
                <div class="share-buttons clearfix">
                    {{getShareButtons()}}
                </div>
                <div class="post-comment-area">
                    {{$commentForm}}

                    <div class="post-comments">
                        @if($post->comments()->count())
                        @foreach($post->comments as $comment)
                        <div class="media">
                            <div class="media-left">
                                <img height="32px" width="32px" class="media-object comment-avatar" src="{{profileImage($comment->user->picture)}}" alt="...">
                            </div>
                            <div class="media-body">
                                @if(Auth::user()->id === $comment->user_id)
                                <div class="btn pull-right">
                                    {{Form::open(array('route' => ['delete-blog-comment', $blog->id, $comment->id], 'class' => 'form form-inline', 'onSubmit' => "return confirm('Delete comment?');"))}}
                                    <button type="submit" class="btn btn-sm"> Delete</button>
                                    {{Form::close()}}
                                </div>
                                @endif
                                <a href="{{route('profile', $comment->user->id)}}">
                                    <h4 class="media-heading">{{$comment->user->name}}</h4>
                                </a>
                                <p>
                                    {{$comment->message}}
                                </p>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p>No comments!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop