<!DOCTYPE html>
@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

    <body>
        <h1>レビュー</h1>
        
        <!--<div>-->
        <!--    <form action="/products/sort" method="GET">-->
        <!--        <select name="condition">-->
        <!--            <option value="1">更新順（降順）</option>-->
        <!--            <option value="2">更新順（昇順）</option>-->
        <!--            <option value="3">新着順（降順）</option>-->
        <!--            <option value="4">新着順（昇順）</option>-->
        <!--            <option value="5">価格順（降順）</option>-->
        <!--            <option value="6">価格順（昇順）</option>-->
        <!--        </select>-->
        <!--        <input type="submit" value="並べ替え"/>-->
        <!--    </form>-->
        <!--</div>-->
        <div class='reviews'>
            @foreach($reviews as $review)
            <div class='product'>
                <div class='image'>
                    @if ($review->image_path_1)
                        <!-- 画像を表示 -->
                        <img src="{{ $review->image_path_1 }}" width="50" height="50">
                    @endif
                </div>
                <h3 class='title'>
                    <a href="/reviews/{{$review->id}}">{{$review->title}}</a>
                </h3>
                <p class ='like'>{{$review->like}}</p>
                <p class = 'body'>{{$review->body}}</p>
                <a href="/categories/{{$review->category_id}}/" class="category">{{$review->category->name}}</a>
            </div>
            @endforeach
        </div>
        
    </body>
</html>
@endsection