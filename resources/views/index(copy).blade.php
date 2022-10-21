<!DOCTYPE html>
@extends('layouts.app2')　　　　　　　　　　　　　　　　　　

@section('content')
        <h1>n rebuilding</h1>
        <div class="instagram-list swiper-container">
            <h2>最新投稿</h2>
            <div class="swiper-wrapper">
                <!--@foreach ($instagramItems as $instagramItem)-->
                <!--    <a href="{{ $instagramItem['link'] }}" target="_blank" class="instagram-list__item swiper-slide">-->
                <!--        <img src="{{ $instagramItem['img'] }}" alt="{{ $instagramItem['caption'] }}"/>-->
                <!--    </a>-->
                <!--@endforeach-->
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
        <div  id="sort">
        <div class="facility__sort">
            <p class="facility__sortHeader">並び替え：</p>
            <div class="selectbox">
                <select v-model="order" class="selectbox__input">
                    <option v-for="(item, index) in orderItems" :value="item.value">@{{ item.name }}</option>
                </select><i class="selectbox__icon"></i>
            </div>
        </div>
        
        <h2>普通</h2>
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
        
        <h2>API</h2>
        @{{order}}
        </div>

        
        <div class='paginate'>
            {{ $products->links() }}
        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script>
            const API_GET_DATA = '/products/sort'; // ①

            new Vue({
                el:'#sort',
                data(){
                    
                    return {
                        order: '',
                        orderItems: [ // ②
                            {name: '更新順（降順）', value: '1'},
                            {name: '更新順（昇順）', value: '2'},
                            {name: '新着順（降順）', value: '3'},
                            {name: '新着順（昇順）', value: '4'},
                            {name: '価格順（降順）', value: '5'},
                            {name: '価格順（昇順）', value: '6'},
                        ]
                    }
                },
                watch: {
    /**
    * 一覧の初期値取得
    * 初期表示はオススメ順でソート
    */
                    order() {
                        axios.post(API_GET_DATA, {
                            order: this.order // ③
                        })
                        .then(res => {
                            this.datas = res.data;
                            console.log(this.datas);
                        });
                    }
                }
            });
        </script>
@endsection
