<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content', 'user_id'];

    public function user()
    {
        return $this -> belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this -> hasMany(Comment::class);
    }
    
    public function comments_count()
    {
        return $this -> comments() -> count();
    }
    
    public function favorite_users()
    {
        return $this -> belongsToMany(User::class, 'favorites', 'micropost_id', 'user_id') -> withTimestamps();
    }
    
    public function comment_users()
    {
        return $this -> belongsToMany(User::class, 'comments', 'micropost_id', 'user_id') -> withTimestamps();
    }
}
