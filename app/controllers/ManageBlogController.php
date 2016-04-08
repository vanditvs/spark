<?php

class ManageBlogController extends BaseController{

    public function dashboard($id)
    {
        $blog = Blog::find($id);
        $latestPost = $blog->posts()->latest()->first();
        $data = array('blog' => $blog, 'latestPost' => $latestPost);
        return View::make('admin.blog.manage')->with($data);
    }

    public function viewPost($id)
    {
        $blog = Blog::find($id);
        $data = array('posts' => $post);
        return View::make('admin.blog.view')->with($data);
    }
}