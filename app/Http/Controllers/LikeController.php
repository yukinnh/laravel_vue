<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use Auth;

class LikeController extends Controller
{
    
    public function store(Post $post, Like $like)
    {
        $login_user_id = Auth::id();
       if ($post->isLiked($login_user_id)) {
            // 対象のレコードを取得して、削除する。
            $delete_record = $post->getLike($login_user_id);
            \Log::debug($delete_record);
            $like->destroy($delete_record[0]->id);
        } else {
            $like = $like->firstOrCreate(
                array(
                    'user_id' => $login_user_id,
                    'post_id' => $post->id
                )
           );
       }
    }
    
    public function check(Post $post)
    {
        $check_result_arr = array(
            'result' => $post->isLiked(Auth::id())
        );
        
        // 返却は「文字列 or オブジェクト」のみ
        return response()->json($check_result_arr);
    }
    
    public function counts(Post $post)
    {
        $check_result_arr = array(
            'result' => $post->likes->count()
        );
        
        // 返却は「文字列 or オブジェクト」のみ
        return response()->json($check_result_arr);
    }
}
