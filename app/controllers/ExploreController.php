<?php

class ExploreController extends BaseController{

    public function explorePage()
    {
        $blogs = Blog::all();
        $tags = Tag::has('posts')->get();
        $data = array('allblogs' => $blogs, 'title' => "Blogs", 'alltags' => $tags);
        return View::make('explore.index')->with($data);
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

    public function exploreTags($id)
    {
        $tag = Tag::findOrFail($id);
        $posts = $tag->posts()->orderBy('id', 'DESC')->get();
        $data = array('tag' => $tag, 'posts' => $posts);
        return View::make('explore.tags')->with($data);
    }
}
