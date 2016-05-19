@extends('layouts.global')

@section('site')
<div class="container">
    <h1 class="page-header">Search - {{Input::get('query')}}</h1>
    <div class="row">
        @foreach ($allposts as $post)
        <div class="col-sm-6 col-md-6">
            <div class="panel panel-default">
              <div class="panel-body">

                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="{{profileImage($post->user->picture)}}" width="120px" height="110px">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <a href="#" class="">
                                {{$post->title}}
                            </a>
                        </h4>
                        <p><b>{{"@" . $post->user->username}}</b></p>
                        <p>
                            <b>Likes: {{$post->likers()->count()}}</b>
                        </p>
                        <p>
                            <a href="#" class="btn btn-default" role="button">Like</a>
                            <a href="#" class="btn btn-link" role="button">View <i class="glyphicon glyphicon-sunglasses"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>

@stop