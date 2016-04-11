@extends('layouts.dashboard')
@section('site')
<div class="main">
    <div class="main-wrapper col-lg-10 col-md-9 col-sm-9 col-xs-12 pull-right">
        <div class="dashboard-content">
            <div class="page-header clearfix">
                <h1 class="pull-left">{{$blog->title}} <small>Comments</small></h1>
            </div>
            <div class="row">
                @if(!count($comments))
                <div class="alert alert-info">
                    No comments found.
                </div>
                @endif
                @foreach($comments as $comment)
                <div class="col-sm-6 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="https://randomuser.me/api/portraits/men/{{$comment->id}}.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <b>
                                        <a href="#" class="">
                                            {{$comment->user->name}}
                                        </a>
                                    </b>
                                    <p>
                                        <b>{{$comment->message}}</b>
                                    </p>
                                    <p class="small">
                                        Commented on: {{$comment->created_at}}
                                    </p>
                                    <p>
                                        <a href="#" class="btn btn-danger btn-sm" role="button">Delete</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop