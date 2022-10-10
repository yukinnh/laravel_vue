@extends('layouts.app')

@section('content')
    <h1>ブログ 一覧</h1>
    <button onclick="location.href='/categories'">カテゴリー一覧</button>
    <button onclick="location.href='/posts/create'">投稿作成</button>
    <hr>
    <div class='posts'>
        @foreach ($posts as $post)
            <div class='post'>
                <h3>{{ $post->title }}</h3>
                <p class='body'>{{ $post->body }}</p>
                <a href="/categories/{{ $post->category->id }}/posts">{{ $post->category->name }}</a>
                <p></p>
                <p><button onclick="location.href='/posts/{{ $post->id }}'">詳細</button></p>
                <hr>
            </div>
        @endforeach
    </div>
    <div class='paginate'>
        {{ $posts->links() }}
    </div>
@endsection
