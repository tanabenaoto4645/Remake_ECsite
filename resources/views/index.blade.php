<!DOCTYPE html>
@extends('layouts.app2')　　　　　　　　　　　　　　　　　　

@section('content')
    <div id="main_image">
        <div class="brand_intro">
        <h1 class="main_title">n rebuilding Online Shop</h1>
        <h2>【再構築】</h2>
        <p>古着を解体し、別のフィルターを通し再構築する事で、そこに新たな価値や魅力を創生し、古着や衣服自体の概念を再構築していく事がコンセプト。<br/>古着だけど新しい。新しいけど古着。そんな服作り。</p>
        </div>
    </div>
    <section id="info" class="new-item uk-background-muted" style="padding-bottom:100px;">
        <div class="instagram-list">
            @if($instagramItems != null)
            <div class="uk-card uk-card-default uk-card-body" style="z-index: 980;text-align:center;" uk-sticky><h2>Instagram最新投稿</h2></div>
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
                <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-6@m uk-grid" >
                            @foreach($instagramItems as $instagramItem)
                            <li>
                                    <div  class="uk-panel">
                                        <a href="{{ $instagramItem['link'] }}"><img src="{{ $instagramItem['img'] }}" alt="insta_image" height="100"></a>
                                    </div>
                            </li>
                            @endforeach
                </ul>
                <a class="uk-slidenav-large uk-position-center-left uk-position-small uk-hidden-hover " href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-slidenav-large uk-position-center-right uk-position-small uk-hidden-hover " href="#" uk-slidenav-next uk-slider-item="next"></a>
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
        
        <div uk-filter="target: .js-filter">
        <ul class="uk-subnav uk-subnav-pill">
            <li class="uk-active" uk-filter-control><a href="#">All</a></li>
            <li uk-filter-control="[data-color='onsale']"><a href="#">販売中</a></li>
            <li uk-filter-control="[data-color='sold']"><a href="#">売り切れ</a></li>
        </ul>
        <ul class="js-filter uk-child-width-1-3@s uk-grid-match uk-flex" uk-grid="masonry: true" >
        @foreach($products as $product)
            @if($product->status == true)
                <li data-color="onsale">
            @else
                <li data-color="sold">
            @endif
            <div>
            <div  class="uk-card uk-card-default">
                <a href="/products/{{$product->id}}">
                    <div class="uk-card-media-top">
                        <img src="{{ $product->image_path_1 }}" alt="product_image" width="100%" height="100px" style="object-fit:cover;">
                    </div>
                    <div class="uk-card uk-card-default uk-card-body uk-grid-margin">
                        <h3 class="uk-card-title">{{$product->name}}</h3>
                        @if($product->status == true)
                            <p style="overflow: hidden;text-overflow: ellipsis;height: 100x;">￥{{$product->price}}</p>
                        @else
                            <p style="overflow: hidden;text-overflow: ellipsis;height: 100x;"><span class="uk-label uk-label-danger">売り切れ</span></p>
                        @endif
                    </div>
                </a>
            </div>
            </div>
            </li>
        @endforeach
        </ul>
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
