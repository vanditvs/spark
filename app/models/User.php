<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * Mass Assignment
	 * @var array
	 */
	protected $fillable = array('name', 'username', 'email', 'password');

	public function blogs()
	{
		return $this->hasMany('Blog');
	}

	public function posts()
	{
		return $this->hasMany('Post');
	}

	public function comments()
	{
		return $this->hasMany('Comment');
	}

	public function likes()
	{
		return $this->belongsToMany('Post', 'likes', 'user_id', 'post_id');
	}

	public function follows()
	{
		return $this->belongsToMany('Blog', 'follows', 'user_id', 'blog_id');
	}
}
