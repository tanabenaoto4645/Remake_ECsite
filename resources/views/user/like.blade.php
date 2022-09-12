<!DOCTYPE html>
@extends('layouts.app')
@section('content')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <title>n rebuilding</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    </head>
    <body>
        <h1>n rebuilding</h1>
        <p>お気に入り</p>
        @if(isset($likes))
            <table class="uk-table uk-table-hover uk-table-divider">
                <thead>
                    <th>お気に入り商品</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                <div class='products'>
                    @foreach($likes as $like)
                        <tr>
                            <td><img src="{{$like->options->image_path}}" width="50" height="50"></td>
                            <td>{{$like->name}}</td>
                            <td>{{$like->price}}円</td>
                            <td><a href="/products/addCart/{{$like->id}}"><button class="uk-button uk-button-danger uk-button">カートに追加</button></a></td>
                            <td><a href="/user/like/remove/{{$like->rowId}}"><button class="uk-button uk-button-danger uk-button">削除</button></a></td>
                        </tr>
                    @endforeach
                </div>
                <div>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><td><a href="/user/like/reset"><button class="uk-button uk-button-danger uk-button">お気に入り全削除</button></a></td></td>
                    </tr>
                </div>
            </table>
        @else
            お気に入りの中身はありません。
        @endif
    </body>
</html>

@endsection