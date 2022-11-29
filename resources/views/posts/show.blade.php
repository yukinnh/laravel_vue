@extends('layouts.app')

@section('content')
    <h1 class="title">
        {{ $post->title }}
    </h1>
    <form action="/posts/{{ $post->id }}" id="form_delete" method="POST">
        @csrf
        @method("DELETE")
        <input type="submit" style="display:none">
        <button type=button onclick="location.href='/posts/{{ $post->id }}/edit'">編集</button>
        <button type="button" id="test">削除</button>
        <p id="p"></p>
    </form>
    <hr>
    <div class="content">
        <div class="content__post">
            <p>{{ $post->body }}</p>    
            <p>{{ $post->category->name }}</p>
        </div>
    </div>
    <p></p>
    <hr>
    <like-component :post="{{$post}}"></like-component>
    <comment-component :post="{{$post}}" :login_user_id="{{$login_user_id}}" class="mt-5"></comment-component>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
@endsection