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
        return View::make($view)->with($data);
    }

}