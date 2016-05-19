<div class="row">
    @if(Session::has('user_followed'))
    <div class="alert alert-success alert-blog well-sm text-center">User Followed!</div>
    @endif

    @if(Session::has('user_unfollowed'))
    <div class="alert alert-success alert-blog well-sm text-center">User Unfollowed!</div>
    @endif
    @foreach ($allblogs as $blog)
    <div class="col-sm-6 col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">

                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="{{profileImage($blog->user->picture)}}" width="120px" height="120px">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <a target="_blank" href="{{route('view-blog', $blog->slug)}}">
                                {{$blog->title}}
                            </a>
                        </h4>
                        <a href="{{route('profile', $blog->user->id)}}">
                            <p><b>{{"@" . $blog->user->username}}</b></p>
                        </a>
                        <p>
                            <b>Followers: {{$blog->followers()->count()}}</b>
                        </p>
                        <p>
                            @if(Auth::user()->follows()->find($blog->id))
                            <a href="{{route('unfollow', $blog->id)}}" class="btn btn-primary" role="button">Following</a>
                            @else
                            <a href="{{route('follow', $blog->id)}}" class="btn btn-default" role="button">Follow</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>