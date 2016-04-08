<?php
class Blog extends Eloquent {
    protected $table='blogs';
    protected $fillable=array('title', 'slug', 'theme', 'user_id');

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany('Post');
    }
}