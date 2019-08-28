<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //公開するパラムを指定　
     protected $fillable = ['user_id', 'micropost_id', 'content'];
     
     public function user()
     {
         return $this -> belongsTo(User::class);
     }
     
     public function microposts()
     {
         return $this -> belongsTo(Micropost::class);
     }
}
