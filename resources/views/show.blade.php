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
            <div class='product'>
                <p class="edit">[<a href="/products/{{ $product->id }}/edit">商品編集</a>]</p>
                <h2 class='image'>
                    @if ($product->image_path)
                        <!-- 画像を表示 -->
                        <img src="{{ $product->image_path }}">
                    @endif
                </h2>
                <h3 class='name'>
                    <a href="/product/{{$product->id}}">{{$product->name}}</a>
                </h3>
                <p class ='price'>{{$product->price}}</p>
                <p class='detail'>{{$product->detail}}</p>
                <p class='size'>{{$product->size}}</p>
                <a href="/categories/{{$product->category_id}}/" class="category">{{$product->category->name}}</a><br/>
                <a href="/products/addLike/{{$product->id}}">お気に入りに追加</a>
                <a href="/products/addCart/{{$product->id}}">カートに追加</a>
                <!--<p class="edit">[<a href="/products/{{ $product->id }}/edit">edit</a>]</p>-->
            </div>
        <div class='footer'>
            <a href="/products">戻る</a>
        </div>
    </body>
</html>
@endsection