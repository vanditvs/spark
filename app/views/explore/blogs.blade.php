<div class="row">
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
                            <a href="#" class="btn btn-default" role="button">Follow</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>