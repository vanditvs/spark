@extends('layouts.admin')
@section('site')
<div class="main-wrapper col-lg-10 col-md-9 col-sm-9 col-xs-12 pull-right">
    <div class="dashboard-content">
        <div class="page-header clearfix">
            <h1 class="pull-left">Dashboard <small>{{count($allblogs)}} Blogs</small></h1>
            <a href="{{route('create-blog')}}" class="btn btn-success btn-sm pull-right"> Create Blog</a>
        </div>
        <div class="row">
            @foreach($allblogs as $blog)
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$blog->title}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <h4><span class="label label-default">{{$blog->posts->count()}}</span> Posts</h4>
                                <h4><span class="label label-default">{{$blog->followers->count()}}</span> Followers</h4>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
                                <p>
                                    <a href="{{route('manage-blog', array($blog->id))}}" class="btn btn-primary btn-sm">Manage</a>
                                    <a href="#" class="btn btn-default btn-sm">View</a>
                                </p>
                                <small class="text-muted">Created <b>{{$blog->created_at}}</b></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop