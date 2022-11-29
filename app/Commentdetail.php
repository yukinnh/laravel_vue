<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentdetail extends Model
{
    protected $fillable = [
        'text', 
        'user_id', 
        'post_id',
        'comment_id',
    ];
    
    public function post() {
        return $this->belongsTo('App\Post');
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function comment() {
        return $this->belongsTo('App\Comment');
    }
}
