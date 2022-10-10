<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function test() {
        return view('tests/test');
    }
    
    /**
     * Post一覧を表示する
     * 
     * @param Post Postモデル
     * @return array Postモデルリスト
     */
    public function index(Post $post)
    {
        //  Log::debug($post->getPaginateByLimit());
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    /**
     * 特定IDのpostを表示する
     *
     * @params Object Post // 引数の$postはid=1のPostインスタンス
     * @return Reposnse post view
     */
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post, 'login_user_id' => Auth::id()]);

    }
    
    // 作成画面 遷移
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);;
    }
    
    // 投稿作成
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $input['user_id'] = Auth::id();
        $post->fill($input)->save();
        
        return redirect('/');
    }
    
    // 編集画面遷移
    public function edit(Post $post, Category $category)
    {
        return view('posts/edit')->with([
            'post' => $post,
            'categories' => $category->get()
        ] );
    }
    
    // 編集画面 更新処理
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    //　削除処理
    public function delete(Post $post) {
        $post->delete();
        return redirect('/');
    }
}
