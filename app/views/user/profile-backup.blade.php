@extends('layouts.global')

@section('site')
<div class="profile-body">
  <div class="container">
    <div class="user-img">
      <a href="#">
        <img src="https://randomuser.me/api/portraits/men/10.jpg" class="img-circle">
      </a>
      <h1><b>Vandit Sharma</b></h1>
      <div class="profile-main">
        <div class="btn-group btn-group-justified" role="group">
          <div class="btn-group" role="group">
            <button class="btn btn-primary" type="button">
              Followers <span class="badge">100</span>
            </button>
          </div>
          <div class="btn-group" role="group">
            <button class="btn btn-danger" type="button">
              Following <span class="badge">100</span>
            </button>
          </div>
          <div class="btn-group" role="group">
            <button class="btn btn-success" type="button">
              Blogs <span class="badge">10</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <h1 class="page-header">
    <a href="#"></a>
    <a href="#" class="blog-author">By <b>Vandit </b></a>
  </h1>
</div>
@stop
