<nav class="navbar navbar-default navbar-fixed-top navbar-inverse navbar-main">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="{{route('admin')}}" class="navbar-logo">
        <img alt="Brand" src="{{asset('images/spark-logo.png')}}">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Select Blog
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            @foreach(Auth::user()->blogs as $blog)
            <li class="{{HTML::activeState('manage-blog', [$blog->id], true)}}">
              <a href="{{route('manage-blog', array($blog->id))}}">{{$blog->title}}</a>
            </li>
            @endforeach
            <li role="separator" class="divider"></li>
            <li class="active active-success"><a href="{{route('create-blog')}}"><i class="glyphicon glyphicon-plus"></i> New Blog</a></li>
          </ul>
        </li>
      </ul>
      @include('partials.navbar-searchform')
      <ul class="nav navbar-nav">
        <li><a href="{{route('explore')}}"><i class="glyphicon glyphicon-fire"></i> Explore</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="glyphicon glyphicon-bell"></i> Notifications <span class="badge notification-count unread">3</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img class="user-pro-img img-circle" src="{{profileImage($user->picture)}}"> {{Auth::user()->name}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{route('profile')}}">Profile</a></li>
            <li><a href="{{route('profile-settings')}}">Settings</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{route('logout')}}">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>