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