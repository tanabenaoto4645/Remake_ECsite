<!DOCTYPE html>
@extends('layouts.app2')　　　　　　　　　　　　　　　　　　

@section('content')
    <div id="main_image"></div>
    <section id="info" class="new-item uk-background-muted" style="padding-bottom:100px;">
        <div class="instagram-list swiper-container">
            @if($instagramItems != null)
            <div class="uk-card uk-card-default uk-card-body" style="z-index: 980;text-align:center;" uk-sticky><h2>最新投稿</h2></div>
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow>
                <ul class="uk-slideshow-items" style="height:1000px;">
                    <li>
                        <div class="uk-child-width-1-3@s uk-grid-match" uk-grid>
                            @foreach($instagramItems as $instagramItem)
                                <div>
                                    <div  class="uk-card uk-card-default">
                                        <a href="{{ $instagramItem['link'] }}">
                                            <div class="uk-card-media-top"><img src="{{ $instagramItem['img'] }}" alt="insta_image"></div>
                                            <div class="uk-card uk-card-default uk-card-body uk-grid-margin">
                                                <p style="overflow: hidden;text-overflow: ellipsis;height: 100x;">{{ $instagramItem['caption'] }}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </li>
                </ul>
                <a class="uk-slidenav-large uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                <a class="uk-slidenav-large uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
            </div>
		    @endif
        </div>
        
        
    </section>
    <section id="administer-contents" class="new-item uk-background-muted" style="padding-bottom:100px;">
            @auth
            @if (auth()->user()->admin === 7)
            <a href="/addProduct">商品追加</a>
            <a href="/orders">オーダー</a>
            @endif
            @endauth
        </div>
    </section>
    <section id="products" class="uk-background-muted">
        <div class="uk-card uk-card-default uk-card-body" style="z-index: 980;text-align:center;" uk-sticky><h2>商品</h2></div>
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
        
        
        <div class="uk-child-width-1-3@s uk-grid-match" uk-grid="masonry: true">
        @foreach($products as $product)
            <div>
            <div  class="uk-card uk-card-default">
                <a href="/products/{{$product->id}}">
                    <div class="uk-card-media-top">
                        <img src="{{ $product->image_path_1 }}" alt="product_image" width="100%" height="100px" style="object-fit:cover;">
                    </div>
                    <div class="uk-card uk-card-default uk-card-body uk-grid-margin">
                        <h3 class="uk-card-title">{{$product->name}}</h3>
                        <p style="overflow: hidden;text-overflow: ellipsis;height: 100x;">￥{{$product->price}}</p>
                    </div>
                </a>
            </div>
            </div>
        @endforeach
        </div>
        
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
