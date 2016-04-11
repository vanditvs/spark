<?php

class ExploreController extends BaseController{

    public function explorePage()
    {
        $blogs = Blog::all();
        $data = array('allblogs' => $blogs, 'title' => "Blogs");
        return View::make('explore')->with($data);
    }

    public function searchPage()
    {
        if(!Input::has('query')){
            return Redirect::route('explore');
        }

        $query = Input::get('query');
        $posts = Post::where('title', 'like', "%{$query}%")->orWhere('content', 'like', "%{$query}%")->get();
        $data = array('allposts' => $posts, 'title' => "Search");
        return View::make('search')->with($data);
    }
}
