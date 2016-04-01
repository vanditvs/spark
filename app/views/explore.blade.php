@extends('layouts.loggedin')

@section('site')
<div class="container">
    <h1 class="page-header">Explore</h1>
    <div class="row">
     @foreach ($allblogs as $blog)
     <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="https://randomuser.me/api/portraits/men/{{$blog->id}}.jpg" alt="#">
            <div class="caption">
                <h2>{{$blog->id . " | " . $blog->title}}</h2>
                <p>{{$blog->user->name}}</p>
                <p>{{$blog->created_at}}</p>
                <p><a href="#" class="btn btn-primary" role="button">Like</a> <a href="#" class="btn btn-default" role="button">View</a></p>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>

@stop