<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar">
    <ul class="nav nav-sidebar text-right">
        <li class="{{HTML::activeState('manage-blog', [$blog->id])}}">
            <a href="{{route('manage-blog', $blog->id)}}"><i class="glyphicon glyphicon-th-large"></i> Dashboard</a>
        </li>
        <li class="{{HTML::activeState('manage-blog-posts', [$blog->id], true)}}">
            <a href="{{route('manage-blog-posts', $blog->id)}}"><i class="glyphicon glyphicon-file"></i> Posts</a>
        </li>
        <li class="{{HTML::activeState('manage-blog-comments', [$blog->id], true)}}">
            <a href="{{route('manage-blog-comments', $blog->id)}}"><i class="glyphicon glyphicon-comment"></i> Comments</a>
        </li>
        <li class="{{ isActiveRoute('home') }}">
            <a href="customize.php"><i class="glyphicon glyphicon-tint"></i> Customize</a>
        </li>
    </ul>
</div>