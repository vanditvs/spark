<?php
class Tag extends Eloquent {
    protected $table='tags';
    protected $fillable=array('name');

    public $timestamps = false;

    public function posts()
    {
        return $this->belongsToMany('Post', 'posts_tags', 'tag_id', 'post_id');
    }
}