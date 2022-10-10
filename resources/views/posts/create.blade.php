@extends('layouts.app')

@section('content')
   <h1>投稿作成画面</h1>
    <form action="/posts" method="POST">
        @csrf
        <div class="title">
            <h2>タイトル</h2>
            <input type="text" name="post[title]" placeholder="タイトル"/>
            <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
        </div>
        </div>
        <div class="body">
            <h2>本文</h2>
            <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。"></textarea>
            <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
        </div>
        <div class="category">
            <h2>カテゴリー</h2>
            <select name="post[category_id]">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>  
        <p></p>
        <input type="submit" value="保存"/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
    <p></p>
    <div class="back">[<a href="/">戻る</a>]</div>
@endsection