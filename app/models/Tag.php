<?php
class Tag extends Eloquent {
    protected $table='tags';
    protected $fillable=array('name');

    public function posts()
    {
        return $this->belongsToMany('Post', 'posts', 'tag_id', 'post_id');
    }
}