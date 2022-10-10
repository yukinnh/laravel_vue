@extends('layouts.app')

@section('content')
    <h1>カテゴリ- 作成</h1>
        <form action="/categories" method="POST">
            @csrf
            <div class="title">
                <h2>カテゴリー名</h2>
                <input type="text" name="category[name]" />
                <p class="category__error" style="color:red">{{ $errors->first('category.name') }}</p>
            </div>
            </div>
            
            <p></p>
            <input type="submit" value="保存"/>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>
        <p></p>
        <div class="back">[<a href="/categories">戻る</a>]</div>
@endsection