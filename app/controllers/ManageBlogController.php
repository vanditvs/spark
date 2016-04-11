<?php

class ManageBlogController extends BaseController{

    public function dashboard($id)
    {
        $blog = Blog::findOrFail($id);
        $latestPost = $blog->posts()->latest()->first();
        $data = array('blog' => $blog, 'latestPost' => $latestPost);
        return View::make('admin.blog.manage')->with($data);
    }

    public function posts($id)
    {
        $blog = Blog::findOrFail($id);
        $data = array('blog' => $blog);
        return View::make('admin.blog.posts')->with($data);
    }
}