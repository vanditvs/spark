@extends('layouts.global')

@section('site')
<div class="container">
    <h1 class="page-header">Explore</h1>
    <div class="row">
        <div class="col-lg-9">
            @include('explore.blogs')
        </div>
        <div class="col-lg-3">
            @include('explore.sidebar')
        </div>
    </div>
</div>
@stop