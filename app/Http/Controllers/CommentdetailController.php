<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Comment;
use App\Commentdetail;


class CommentdetailController extends Controller
{
    // 取得
    public function getComments(Post $post, Comment $comment) 
    {
       // コメント詳細
       foreach($comment->commentdetails as $commentdetail) {
           $commentdetail->user = $commentdetail->user;
       }
       return $comment->commentdetails;
    }

    // 追加
    public function store(Post $post, Comment $comment, Commentdetail $commentdetail, Request $request)
    {
      $commentdetail->text = $request->comment;
      $commentdetail->user_id = Auth::id();
      $commentdetail->post_id = $post->id;
       
      $comment->commentdetails()->save($commentdetail);
    }

    // 更新
    public function update(Post $post, Comment $comment, Commentdetail $commentdetail, Request $request)
    {
       \Log::debug($commentdetail);
       if(Auth::id() == $commentdetail->user_id) {
           $commentdetail->text = $request->text;
           $commentdetail->save();
       }
    }

    // 削除
    public function destroy(Post $post, Comment $comment, Commentdetail $commentdetail)
    {
       if(Auth::id() == $commentdetail->user_id || Auth::id() == $post->user_id) {
           $commentdetail->delete();
       }
    }
}
