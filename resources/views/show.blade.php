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
                @auth
                @if (auth()->user()->admin == 7)
                <p class="edit">[<a href="/products/{{ $product->id }}/edit">商品編集</a>]</p>
                @endif
                @endauth
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($product->{"image_path_"."$i"})
                            <!-- 画像を表示 -->
                            <div class="swiper-slide">
                                <img src="{{ $product->{"image_path_"."$i"} }}" >
                            </div>
                        @endif
                    @endfor
                    </div>
                    <div class="swiper-pagination"></div><!-- ナビゲーションボタン（※省略可） -->
		            <div class="swiper-button-prev"></div>
		            <div class="swiper-button-next"></div><!-- スクロールバー（※省略可） -->
                </div>
                <h3 class='name'>
                    <a href="/products/{{$product->id}}">{{$product->name}}</a>
                </h3>
                <p class ='price'>{{$product->price}}</p>
                <p class='detail'>{{$product->detail}}</p>
                <p class='size'>{{$product->size}}</p>
                <a href="/categories/{{$product->category_id}}/" class="category">{{$product->category->name}}</a>
                <p class='likes'>お気に入り数[{{$product->likes}}]</p><br/>
                <a href="/products/addLike/{{$product->id}}"><button id="like">お気に入りに追加</button></a>
                <script>
                    
                </script>
                <a href="/products/addCart/{{$product->id}}">カートに追加</a>
                <!--<p class="edit">[<a href="/products/{{ $product->id }}/edit">edit</a>]</p>-->
            </div>
        <div class='footer'>
            <a href="/products">戻る</a>
        </div>
    </body>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
    	var mySwiper = new Swiper(".swiper-container", {
            // オプション設定
            loop: true, // ループ
            speed: 300, // 切り替えスピード(ミリ秒)。
            slidesPerView: 1, // １スライドの表示数
            spaceBetween: 0, // スライドの余白(px)
            direction: "horizontal", // スライド方向
            effect: "fade", // スライド効果 ※ここを変更

            // スライダーの自動再生設定
            autoplay: {
                delay: 3000, // スライドが切り替わるまでの時間(ミリ秒)
                stopOnLast: false, // 自動再生の停止なし
                disableOnInteraction: true, // ユーザー操作後の自動再生停止
            },

            // ページネーションを有効化
            pagination: {
                el: ".swiper-pagination",
            },

            // ナビゲーションを有効化
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
	</script>
</html>
@endsection