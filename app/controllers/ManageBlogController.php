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
        $posts = $blog->posts()->orderBy('id', 'DESC')->get();
        $data = array('blog' => $blog, 'posts' => $posts);
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
        $input = Input::only("title", "content", "featured-image");

//Validation Rules
        $rules = array(
            'title' => 'required|string',
            'content' => 'required|string',
            'featured-image' => 'image|max:1000'
            );

        $messages = array(
            'featured-image.max' => 'Image must be less than 1MB.'
            );

//Validate user input with rules
        $validator = Validator::make($input, $rules, $messages);

//Check if validation failed
        if($validator->fails()){
//Redirect to sign up page with errors and user input
            return Redirect::route('create-blog-post', [$blog->id])->withErrors($validator)->withInput($input);
        }

        $imageName = null;
        if(Input::hasFile('featured-image')){
            $featured_image = Input::file('featured-image');
            $extension = $featured_image->getClientOriginalExtension();
            $path = public_path('uploads/posts');

            $imageName = time().str_random(). '.' .$extension;
            $featured_image->move($path, $imageName);
        }
        $input['slug'] = Str::slug($input['title']) . "-" . str_random();

        $post = $blog->posts()->create([
            'title' => $input['title'],
            'content' => $input['content'],
            'featured_image' => $imageName,
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
        $input = Input::only("title", "content", "featured-image");

//Validation Rules
        $rules = array(
            'title' => 'required|string',
            'content' => 'required|string',
            'featured-image' => 'image|max:1000'
            );

        $messages = array(
            'featured-image.max' => 'Image must be less than 1MB.'
            );

//Validate user input with rules
        $validator = Validator::make($input, $rules, $messages);

//Check if validation failed
        if($validator->fails()){
//Redirect to sign up page with errors and user input
            return Redirect::route('edit-blog-post', [$blog->id, $post->id])->withErrors($validator)->withInput($input);
        }

        $imageName = $post->featured_image;

        if(Input::hasFile('featured-image')){
            $path = public_path('uploads/posts');

            $featured_image = Input::file('featured-image');
            $extension = $featured_image->getClientOriginalExtension();

            $imageName = time().str_random().'.'.$extension;
            $featured_image->move($path, $imageName);

            $oldImage = $path.'/'.$post->featured_image;

            if(File::exists($oldImage)){
                File::delete($oldImage);
            }
        }

        $updatePost = $post->update([
            'title' => $input['title'],
            'content' => $input['content'],
            'featured_image' => $imageName
            ]);

//Check if blog created
        if($updatePost){
//Blog created, redirect to login page
            return Redirect::route('edit-blog-post', [$blog->id, $post->id])->with(['message' => 'Post was updated.']);
        }

//Blog not created, redirect to signup page with error message and user input
        return Redirect::route('edit-blog-post', [$blog->id, $post->id])->withErrors(array('error_message' => "Something went wrong! Try again!"))->withInput($input);
    }

    public function deletePost($id, $post_id)
    {
        $user = Auth::user();
        $blog = $user->blogs()->findOrFail($id);
        $post = $blog->posts()->findOrFail($post_id);

        $post->delete();

        return Redirect::route('manage-blog-posts', $blog->id)->with(['message' => 'Post was deleted.']);
    }

    public function comments($id)
    {
        $user = Auth::user();
        $blog = $user->blogs()->findOrFail($id);

        $comments = Comment::whereIn('post_id', function($query) use($blog){
            $query->select('id')->from('posts')->where('blog_id', $blog->id);
        })->orderBy('id', 'DESC')->get();
        $data = array('blog' => $blog, 'comments' => $comments);

        return View::make('admin.blog.comments')->with($data);
    }

    public function deleteComment($id, $comment_id)
    {
        $user = Auth::user();
        $blog = $user->blogs()->findOrFail($id);

        $comment = Comment::whereIn('post_id', function($query) use($blog){
            $query->select('id')->from('posts')->where('blog_id', $blog->id);
        })->orderBy('id', 'DESC')->find($comment_id);

        if(!$comment){
            return Redirect::route('manage-blog-comments', $blog->id)->with(['message' => 'Comment not found.']);
        }

        $comment->delete();

        return Redirect::route('manage-blog-comments', $blog->id)->with(['message' => 'Comment was deleted.']);
    }

    public function customize($id)
    {
       $user = Auth::user();
       $blog = $user->blogs()->findOrFail($id);
       $Post = $blog->posts();
       $data = array('blog' => $blog);
       return View::make('admin.blog.customize')->with($data);
   }

   public function submitCustomize($id)
   {
        $user = Auth::user();
        $blog = $user->blogs()->findOrFail($id);

        //Fetch User Input
        $input = Input::only("title", "theme");

        //Validation Rules
        $rules = array(
            'title' => 'required|string',
            'theme' => 'required|string'
            );

        //Validate user input with rules
        $validator = Validator::make($input, $rules);

        //Check if validation failed
        if($validator->fails()){
            //Redirect to sign up page with errors and user input
            return Redirect::route('manage-blog-customize', [$blog->id])->withErrors($validator)->withInput($input);
        }

        $updated = $blog->update([
            'title' => $input['title'],
            'theme' => $input['theme']
            ]);

        //Check if blog updated
        if($updated){
            //Blog updated, redirect to customize page
            return Redirect::route('manage-blog-customize', $blog->id)->with(['message' => "Blog updated!"]);
        }

        //Blog not updated, redirect to signup page with error message and user input
        return Redirect::route('manage-blog-customize', $blog->id)->withErrors(array('error_message' => "Something went wrong! Try again!"))->withInput($input);
    }
}