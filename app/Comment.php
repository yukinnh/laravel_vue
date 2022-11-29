<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text', 
        'user_id', 
        'post_id'
    ];

   public function user()
   {
       return $this->belongsTo('App\User');
   }

   public function post()
   {
       return $this->belongsTo('App\Post');
   }
   
   // コメント詳細
   public function commentdetails() {
       return $this->hasMany('App\Commentdetail');
   }
}
