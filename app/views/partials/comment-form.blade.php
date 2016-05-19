<div class="post-comment-form">
    @if(Session::has('comment_added'))
    <div class="alert alert-success alert-blog well-sm text-center">Comment Added!</div>
    @endif
    {{$errors->first('error_message', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
    {{ Form::open( ['route' => [ 'comment-blog-post', $slug, $post_slug ] ] ) }}
    <div class="form-group">
        <label>Comment:</label>
        {{Form::text('message', '', ['class' => 'form-control', 'required', 'placeholder' => "Enter your comment..."])}}
        {{$errors->first('message', '<div class="alert alert-block alert-danger well-sm text-center">:message</div>')}}
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Comment">
    </div>
    {{ Form::close() }}

</div>