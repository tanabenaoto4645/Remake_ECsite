<!DOCTYPE html>
@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

    <body>
        <h1>マイページ</h1>
        <ul>
            <li><a href="/user/{{auth()->user()->id}}/edit">ユーザー情報編集</a></li>
            <li><a href="/user/like">お気に入り</a></li>
            <li><a href="/user/{{auth()->user()->id}}/orders">注文履歴</a></li>
            <li><a href="/user/{{auth()->user()->id}}/postReview">レビュー投稿</a></li>
        </ul>
    </body>
</html>
@endsection