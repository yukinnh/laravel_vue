@extends('layouts.app')

@section('content')
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class='content__body'>
                <h2>本文</h2>
                <input type='text' name='post[body]' value="{{ $post->body }}">
                <p class="title__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="content__category">
                <h2>カテゴリー</h2>
                 <select name="post[category_id]">
                    @foreach($categories as $category)
                        @if ($category->id === $post->category_id)
                            <option value="{{ $category->id }}" selected="selected">{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>  
            <p></p>
            <input type="submit" value="保存">
            <p></p>
            <div class="footer">
                <a href="/posts/ {{ $post->id }}">戻る</a>
            </div>
        </form>
    </div>
@endsection