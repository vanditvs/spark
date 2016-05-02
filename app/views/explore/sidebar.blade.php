<div class="panel panel-default">
    <div class="panel-heading">
        Popular Tags
    </div>
    <div class="panel-body">
        @foreach ($alltags as $tag)
        <a href="{{route('explore-tags', $tag->id)}}" class="label label-primary">#{{$tag->name}}</a>
        @endforeach
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        Popular Blogs
    </div>
    <div class="panel-body panel-body-fixed">
    @foreach ($popularBlogs as $blog)
        <div class="media">
            <div class="media-left">
                <a href="#">
                    <img class="media-object" src="{{profileImage($blog->user->picture)}}" width="60px" height="60px">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">
                    <a target="_blank" href="{{route('view-blog', $blog->slug)}}" class="">
                        {{$blog->title}}
                    </a>
                </h4>
                <p><b>{{"@" . $blog->user->username}}</b></p>
            </div>
        </div>
        @endforeach
    </div>
</div>