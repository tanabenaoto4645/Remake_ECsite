<!DOCTYPE html>
@extends('layouts.app2')　　　　　　　　　　　　　　　　　　

@section('content')
    <div id="main_image"></div>
    <section id="info" class="new-item uk-background-muted" style="padding-bottom:100px;">
        <div class="instagram-list swiper-container">
            @if($instagramItems != null)
            <div class="uk-card uk-card-default uk-card-body" style="z-index: 980;text-align:center;" uk-sticky><h2>最新投稿</h2></div>
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
		    @endif
        </div>
    </section>
    <section id="administer-contents" class="new-item uk-background-muted" style="padding-bottom:100px;">
        <div class="uk-card uk-card-default uk-card-body" style="z-index: 980;text-align:center;" uk-sticky><h2>商品</h2></div>
        <div>
            @auth
            @if (auth()->user()->admin === 7)
            <a href="/addProduct">商品追加</a>
            <a href="/orders">オーダー</a>
            @endif
            @endauth
        </div>
    </section>
    <section id="products">
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
        
        @foreach($products as $product)
        <div class="uk-child-width-1-2@m" uk-grid>
            <div>
                <a href="/products/{{$product->id}}" class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <img src="{{ $product->image_path_1 }}" width="1800" height="1200" alt="product_image">
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">{{$product->name}}</h3>
                        <p>￥{{$product->price}}</p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        
    </section>
        <div class='paginate'>
            {{ $products->links() }}
        </div>
        
        <style>
            #main_image {
  width: 100%;
  height: 50vh;
  background-image: url(https://ec-products-bucket.s3.ap-northeast-1.amazonaws.com/icons/S__5095427.jpg);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
}
        </style>
@endsection
