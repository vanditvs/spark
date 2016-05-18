@extends('layouts.global')

@section('site')
<div class="profile-header" style="{{ $user->cover ? 'background-image: url(coverImage($user->cover))' : ''}}">
  <div class="container">
    <div class="profile-info">
      <div class="media">
        <div class="media-left">
          <a href="#">
            <img class="media-object user-img img-circle" src="{{profileImage($user->picture)}}">
          </a>
        </div>
        <div class="media-body">
          <div class="user-info">
            <h4 class="media-heading"><b>{{$user->name}}</b></h4>
            <b>@ {{$user->username}}</b>
            <div class="profile-actions">
              <a href="#" class="btn btn-primary" role="button">Follow</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container buttons-group">
  <div class="btn-group btn-group-justified" role="group">
    <div class="btn-group" role="group">
      <button class="btn btn-default" type="button">
        Blogs <span class="badge">{{$user->blogs()->count()}}</span>
      </button>
    </div>
    <div class="btn-group" role="group">
      <button class="btn btn-default" type="button">
        Following <span class="badge">{{$user->follows()->count()}}</span>
      </button>
    </div>
  </div>
</div>
<div class="container ">
  <div class="row">
    <h1 align="center"> Blogs </h1><hr>
    @if(!$blogs->count())
    <h2>No Blogs Yet !</h2>
    @endif
    @foreach ($blogs as $blog)
    <div class="col-sm-6 col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">

          <div class="media">
            <div class="media-body">
              <h4 class="media-heading">
                <a target="_blank" href="{{route('view-blog', $blog->slug)}}">
                  {{$blog->title}}
                </a>
              </h4>
              <p><b>{{"@" . $blog->user->username}}</b></p>
              <p>
                <b>Followers: {{$blog->followers()->count()}}</b>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
<div class="container">
  <div class="row">
    <h1 align="center"> Following</h1><hr>
    @if(!$following->count())
    <h2>Following No Blog !</h2>
    @endif
    @foreach ($following as $followed_blog)
    <div class="col-sm-6 col-md-6">
      <div class="panel panel-default">
        <div class="panel-body">

          <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="media-object" src="{{profileImage($followed_blog->user->picture)}}" width="120px" height="120px">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">
                <a target="_blank" href="{{route('view-blog', $followed_blog->slug)}}">
                  {{$followed_blog->title}}
                </a>
              </h4>
              <p><b>{{"@" . $followed_blog->user->username}}</b></p>
              <p>
                <b>Followers: {{$followed_blog->followers()->count()}}</b>
              </p>
              <p>
                <a href="#" class="btn btn-default" role="button">Follow</a>
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
