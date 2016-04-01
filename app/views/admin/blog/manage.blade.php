@extends('layouts.dashboard')
@section('site')
<div class="main">
    <div class="main-wrapper col-lg-10 col-md-9 col-sm-9 col-xs-12 pull-right">
        <div class="dashboard-content">
            <div class="page-header">
                <h1>{{$blog->title}} <small>Posts</small></h1>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Basic Info</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                                    <h4><span class="label label-default">4</span> Posts</h4>
                                        <h4><span class="label label-default">7</span> Comments</h4>
                                        <h4><span class="label label-default"><i class="glyphicon glyphicon-bookmark"></i></span> Current Theme : {{$blog->theme}}</h4>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-right">
                                        <p>
                                            <a href="#" class="btn btn-primary btn-sm">Manage</a>
                                            <a href="#" class="btn btn-default btn-sm">View</a>
                                        </p>
                                        <small class="text-muted"> Created <b>{{$blog->created_at}}</b></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop