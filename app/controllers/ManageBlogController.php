<?php

class ManageBlogController extends BaseController{

    public function dashboard($id)
    {
        $user = Auth::user();
        $blog = $user->blogs()->findOrFail($id);
        $latestPost = $blog->posts()->latest()->first();
        $data = array('blog' => $blog, 'latestPost' => $latestPost);
        return View::make('admin.blog.manage')->with($data);
    }

    public function posts($id)
    {
        $user = Auth::user();
        $blog = $user->blogs()->findOrFail($id);
        $data = array('blog' => $blog);
        return View::make('admin.blog.post.index')->with($data);
    }

    public function createPost($id)
    {
        $user = Auth::user();
        $blog = $user->blogs()->findOrFail($id);
        $data = array('blog' => $blog);
        return View::make('admin.blog.post.create')->with($data);
    }

    public function createPostSubmit($id)
    {
        $user = Auth::user();
        $blog = $user->blogs()->findOrFail($id);

        //Fetch User Input
        $input = Input::only("title", "content");

        //Validation Rules
        $rules = array(
            'title' => 'required|string',
            'content' => 'required|string'
            );

        //Validate user input with rules
        $validator = Validator::make($input, $rules);

        //Check if validation failed
        if($validator->fails()){
            //Redirect to sign up page with errors and user input
            return Redirect::route('create-blog-post', [$blog->id])->withErrors($validator)->withInput($input);
        }

        $input['slug'] = Str::slug($input['title']) . "-" . str_random();

        $post = $blog->posts()->create([
            'title' => $input['title'],
            'content' => $input['content'],
            'slug' => $input['slug'],
            'user_id' => $user->id,
            ]);

        //Check if blog created
        if($post){
            //Blog created, redirect to login page
            return Redirect::route('manage-blog-posts', $blog->id);
        }

        //Blog not created, redirect to signup page with error message and user input
        return Redirect::route('create-blog-post', $blog->id)->withErrors(array('error_message' => "Something went wrong! Try again!"))->withInput($input);
    }

    public function editPost($id, $post_id)
    {
        $user = Auth::user();
        $blog = $user->blogs()->findOrFail($id);
        $post = $blog->posts()->findOrFail($post_id);
        $data = array('blog' => $blog, 'post' => $post);
        return View::make('admin.blog.post.edit')->with($data);
    }

    public function editPostSubmit($id, $post_id)
    {
        $user = Auth::user();
        $blog = $user->blogs()->findOrFail($id);
        $post = $blog->posts()->findOrFail($post_id);

        //Fetch User Input
        $input = Input::only("title", "content");

        //Validation Rules
        $rules = array(
            'title' => 'required|string',
            'content' => 'required|string'
            );

        //Validate user input with rules
        $validator = Validator::make($input, $rules);

        //Check if validation failed
        if($validator->fails()){
            //Redirect to sign up page with errors and user input
            return Redirect::route('edit-blog-post', [$blog->id, $post->id])->withErrors($validator)->withInput($input);
        }

        $updatePost = $post->update([
            'title' => $input['title'],
            'content' => $input['content']
            ]);

        //Check if blog created
        if($updatePost){
            //Blog created, redirect to login page
            return Redirect::route('edit-blog-post', [$blog->id, $post->id])->with(['message' => 'Post was updated.']);
        }

        //Blog not created, redirect to signup page with error message and user input
        return Redirect::route('edit-blog-post', [$blog->id, $post->id])->withErrors(array('error_message' => "Something went wrong! Try again!"))->withInput($input);
    }

    public function comments($id)
    {
        $user = Auth::user();
        $blog = $user->blogs()->findOrFail($id);

        $comments = Comment::whereIn('post_id', function($query) use($blog){
            $query->select('id')->from('posts')->where('blog_id', $blog->id);
        })->get();
        $data = array('blog' => $blog, 'comments' => $comments);

        return View::make('admin.blog.comments')->with($data);
    }
}