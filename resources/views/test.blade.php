@extends('layouts.app')

@section('content')
    <h1>入力画面</h1>
    <form action="/test" method="POST">
        @csrf
        <div class="user_id">
            <input type="hidden" name="location[user_id]" value="{{Auth::user()->id}}">
        </div>
        <div class="name">
            <h2>タイトル</h2>
            <input type="text" name="location[name]" placeholder="タイトル" />
            <p class="name__error" style="color:red">{{ $errors->first('location.name') }}</p>
        </div>
        <div class="time_zone">
        <h2>時間帯</h2>
            <select name="location[time_zone_id]">
                @foreach($time_zones as $time_zone)
                    <option value="{{ $time_zone->id }}">{{ $time_zone->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="place">
            <h2>場所</h2>
        <textarea name="location[place]" placeholder="場所を入力して下さい。"></textarea>
        <p class="place__error" style="color:red">{{ $errors->first('location.place') }}</p>
        </div>
        <div class="season">
        <h2>季節</h2>
            <select name="season[season_id]">
                @foreach($seasons as $season)
                    <option value="{{ $season->id }}">{{ $season->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="text">
            <h2>コメント</h2>
        <textarea name="location[text]" placeholder="コメントを入力して下さい。"></textarea>
        <p class="text__error" style="color:red">{{ $errors->first('location.text') }}</p>
        </div>
        <input type="submit" value="保存"/>
    </form>
    <div class="back">[<a href="/">back</a>]</div>
@endsection