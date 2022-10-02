<!DOCTYPE html>
@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

    <body>
        <h1>n rebuilding</h1>
        <div>
            @auth
            @if (auth()->user()->admin === 7)
            <a href="/addProduct">商品追加</a>
            <a href="/orders">オーダー</a>
            @endif
            @endauth
            <a href="/user/like">お気に入り</a>
            <a href="/user/cart">カート</a>
            @auth
            <a href="/user/{{auth()->user()->id}}">マイページ</a>
            @endauth

        </div>
        
        <div>
            <form action="/products/sort" method="GET">
                <select name="condition">
                    <option value="1">更新順（降順）</option>
                    <option value="2">更新順（昇順）</option>
                    <option value="3">新着順（降順）</option>
                    <option value="4">新着順（昇順）</option>
                    <option value="5">価格順（降順）</option>
                    <option value="6">価格順（昇順）</option>
                </select>
                <input type="submit" value="並べ替え"/>
            </form>
        </div>
        <div class='products'>
            @foreach($products as $product)
            <div class='product'>
                <h2 class='image'>
                    @if ($product->image_path_1)
                        <!-- 画像を表示 -->
                        <img src="{{ $product->image_path_1 }}" width="50" height="50">
                    @endif
                </h2>
                <h3 class='name'>
                    <a href="/products/{{$product->id}}">{{$product->name}}</a>
                </h3>
                <p class ='price'>{{$product->price}}</p>
                <a href="/categories/{{$product->category_id}}/" class="category">{{$product->category->name}}</a>
                <!--<p class="edit">[<a href="/products/{{ $product->id }}/edit">edit</a>]</p>-->
            </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $products->links() }}
        </div>
    </body>
</html>
@endsection