<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    
    use SoftDeletes;
    
    // 充填可能なフィールド（$fillableに指定したカラムのみ、create()やfill()、update()で値が代入されます。）
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'user_id'
    ];
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順(10,9,8)に並べたあと、limitで件数制限をかける昇順（1,2,3,4,5,6
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    //「1対多」の関係なので単数系に
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    // 1対多
    public function comments()
    {
        return $this->hasmany('App\Comment');
    }
    
    // 1対多
    public function likes()
    {
        return $this->hasmany('App\Like');
    }
    
    // いいね存在チェック
    public function isLiked($user_id)
    {
      return $this->likes()->where('user_id', $user_id)->exists();
    }
    
    // いいね取得
    public function getLike($user_id)
    {
      return $this->likes()->where('user_id', $user_id)->get();
    }
}
