@extends('layouts.app')

@section('content')
    <h1>カテゴリー 一覧</h1>
    <p class='create'><button onclick="location.href='/categories/create'">カテゴリー作成</button></p>
    <hr>
    <div class='posts'>
        @foreach ($categories as $category)
            <div class='post'>
                <p class='name'>{{ $category->name }}</p>
            </div>
            <hr>
        @endforeach
    </div>
    <div class='paginate'>
        {{ $categories->links() }}
    </div>
     <div class="footer">
        <a href="/">戻る</a>
    </div>
@endsection