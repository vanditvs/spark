<?php

class ExploreController extends BaseController{

    public function explorePage()
    {
       $blogs = Blog::with(['user'])->get(); //Select * from blogs;
       $data = array('allblogs' => $blogs, 'title' => "Blogs");
       return View::make('explore')->with($data);
   }
}
