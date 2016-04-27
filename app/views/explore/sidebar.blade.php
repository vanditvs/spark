<div class="panel panel-default">
    <div class="panel-heading">
        Tags
    </div>
    <div class="panel-body">
        @foreach ($alltags as $tag)
        <a class="label label-primary">#{{$tag->name}}</a>
        @endforeach
    </div>
</div>