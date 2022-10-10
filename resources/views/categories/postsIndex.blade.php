@extends('layouts.app')

@section('content')
    <h1>投稿一覧（{{ $posts[0]->category->name }}）</h1>
    <button onclick="location.href='/posts/create'">投稿作成</button>
    <hr>
    <div class='posts'>
        @foreach ($posts as $post)
            <div class='post'>
                <h3>{{ $post->title }}</h3>
                <p class='body'>{{ $post->body }}</p>
                <button onclick="location.href='/posts/{{ $post->id }}'">詳細</button>
            </div>
            <hr>
        @endforeach
    </div>
    <div class='paginate'>
        {{ $posts->links() }}
    </div>
     <div class="footer">
        <a href="/">戻る</a>
    </div>
@endsection