<?php
class Post extends Eloquent {
    protected $table='posts';
    protected $fillable=array('title', 'slug', 'content', 'blog_id', 'user_id', 'featured_image');

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function blog()
    {
        return $this->belongsTo('Blog', 'blog_id');
    }

    public function comments()
    {
        return $this->hasMany('Comment');
    }

    public function likers()
    {
        return $this->belongsToMany('User', 'likes', 'post_id', 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany('Tag', 'posts_tags', 'post_id', 'tag_id');
    }
}