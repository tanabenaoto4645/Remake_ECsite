<!DOCTYPE html>
@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

    <body>
        <h1>n rebuilding</h1>
        <div class="instagram-list swiper-container">
            <h2>最新投稿</h2>
            <div class="swiper-wrapper">
                @foreach ($instagramItems as $instagramItem)
                    <a href="{{ $instagramItem['link'] }}" target="_blank" class="instagram-list__item swiper-slide">
                        <img src="{{ $instagramItem['img'] }}" alt="{{ $instagramItem['caption'] }}"/>
                    </a>
                @endforeach
            </div>
            <div class="swiper-pagination"></div><!-- ナビゲーションボタン（※省略可） -->
		    <div class="swiper-button-prev"></div>
		    <div class="swiper-button-next"></div><!-- スクロールバー（※省略可） -->
        </div>
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