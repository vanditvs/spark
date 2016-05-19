<?php

class ExploreController extends BaseController{

    public function explorePage()
    {
        //SELECT b.*, COUNT(f.user_id) follower_count FROM blogs b LEFT JOIN follows f ON b.id = f.blog_id GROUP BY b.id order by follower_count desc;
        $popularBlogs = Blog::with('user')->leftJoin('follows', 'blogs.id', '=', 'follows.blog_id')->select(DB::raw('blogs.*, count(follows.blog_id) follower_count'))->groupBy('blogs.id')->orderBy('follower_count', 'desc')->limit(4)->get();
        $blogs = Blog::orderBy('id', 'DESC')->get();
        $tags = Tag::has('posts')->get();
        $data = array('allblogs' => $blogs, 'title' => "Blogs", 'alltags' => $tags, 'popularBlogs' => $popularBlogs);
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
