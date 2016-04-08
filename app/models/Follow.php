<?php
class Follow extends Eloquent {
    protected $table='follows';
    protected $fillable=array('blog_id', 'user_id');

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function blog()
    {
        return $this->belongsTo('Blog', 'blog_id');
    }
}