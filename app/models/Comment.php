<?php
class Comment extends Eloquent {
    protected $table='comments';
    protected $fillable=array('message', 'post_id', 'user_id');

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function post()
    {
        return $this->belongsTo('Post', 'post_id');
    }
}