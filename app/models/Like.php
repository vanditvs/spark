<?php
class Like extends Eloquent {
    protected $table='likes';
    protected $fillable=array('post_id', 'user_id');

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function post()
    {
        return $this->belongsTo('Post', 'post_id');
    }
}