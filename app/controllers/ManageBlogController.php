<?php

class ManageBlogController extends BaseController{

    public function dashboard($id)
    {
        $blog = Blog::find($id);
        $data = array('blog' => $blog);
        return View::make('admin.blog.manage')->with($data);
    }
}