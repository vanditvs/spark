<?php

class BlogsController extends BaseController {

    public function viewBlog($slug)
    {
        $blog = Blog::where('slug', '=', $slug)->first();

        if(!$blog){
            App::abort(404, "Blog not found!");
        }

        $posts = $blog->posts()->orderBy('id', 'DESC')->get();

        $theme = $blog->theme;
        $data = ['blog' => $blog, 'posts' => $posts];
        $view = "themes.{$theme}.index";
        return View::make($view)->with($data);
    }

    public function viewBlogPost($slug, $post_slug)
    {
        $blog = Blog::where('slug', '=', $slug)->first();

        if(!$blog){
            App::abort(404, "Blog not found!");
        }

        $post = $blog->posts()->where('slug', '=', $post_slug)->first();

        if(!$post){
            App::abort(404, "Post not found!");
        }

        $theme = $blog->theme;
        $data = ['blog' => $blog, 'post' => $post];
        $view = "themes.{$theme}.post";

        return View::make($view)->with($data)->nest('commentForm', 'partials.comment-form', ['slug' => $slug, 'post_slug' => $post_slug]);
    }

    public function commentBlogPost($slug, $post_slug)
    {
        $blog = Blog::where('slug', '=', $slug)->first();

        if(!$blog){
            App::abort(404, "Blog not found!");
        }

        $post = $blog->posts()->where('slug', '=', $post_slug)->first();

        if(!$post){
            App::abort(404, "Post not found!");
        }

        //Fetch User Input
        $input = Input::only("message");

        //Validation Rules
        $rules = array(
            'message' => 'required|string|min:1|max:500',
            );

        //Validate user input with rules
        $validator = Validator::make($input, $rules);

        if($validator->fails()){
            //Check if validation failed
            //Redirect to post page with errors and user input
            return Redirect::back()->withErrors($validator)->withInput($input);
        }

        //Add comment to post
        $comment = $post->comments()->create([
            'message' => $input['message'],
            'user_id' => Auth::user()->id
            ]);

        //Comment added
        if($comment) {
            return Redirect::back()->with('comment_added', true);
        }

        //Comment not added
        return Redirect::back()->withErrors(array('error_message' => "Something went wrong! Try again!"))->withInput($input);
    }

}