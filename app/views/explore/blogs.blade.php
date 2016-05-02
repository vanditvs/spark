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
                        <a target="_blank" href="{{route('view-blog', $blog->slug)}}" class="">
                            {{$blog->title}}
                        </a>
                    </h4>
                    <p><b>{{"@" . $blog->user->username}}</b></p>
                    <p>
                        <b>Followers: {{$blog->followers()->count()}}</b>
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