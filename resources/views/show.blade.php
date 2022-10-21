<!DOCTYPE html>
@extends('layouts.app2')

@section('content')
            <div class='product'>
                @auth
                @if (auth()->user()->admin == 7)
                <p class="edit">[<a href="/products/{{ $product->id }}/edit">商品編集</a>]</p>
                @endif
                @endauth
                <div uk-slideshow="slide">
                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                       <ul class="uk-slideshow-items">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($product->{"image_path_"."$i"})
                                    <!-- 画像を表示 -->
                                    <li>
                                        <img src="{{ $product->{"image_path_"."$i"} }}" alt="" />
                                    </li>
                                @endif
                            @endfor
                        </ul>
                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                    </div>
                    <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
                </div>
                <h3 class='name'>
                    <a href="/products/{{$product->id}}">{{$product->name}}</a>
                </h3>
                <p class ='price'>{{$product->price}}</p>
                <p class='detail'>{{$product->detail}}</p>
                <p class='size'>{{$product->size}}</p>
                <a href="/categories/{{$product->category_id}}/" class="category">{{$product->category->name}}</a>
                <div id="like">
                <p class='likes'>お気に入り数[{{$product->likes}}]</p><br/>
                <div >
                    <button v-bind:class="{'liked': toggled === true, 'unliked': toggled === false}" v-on:click="addLike">お気に入りに追加</button>
                </div>
                </div>
                <a href="/products/addCart/{{$product->id}}">カートに追加</a>
            </div>
        <div class='footer'>
            <a href="/products">戻る</a>
        </div>
        
        <style>
            .liked{
                color:red;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script>
            const API_GET_DATA = '/products/addLike/{{$product->id}}'; // ①
            const API_GET_DATA_2 = '/products/getLikedByUserAttribute/{{$product->id}}'; // ①
            if('{{$product->getLikedByUserAttribute()}}'==''){
                var par_liked = false;
            }else{
                var par_liked = true;
            }

            new Vue({
                el:'#like',
                data: {
                        myclass: '',
                        toggled: par_liked,
                },
                
                methods: {
                    addLike:function(){
                        axios.get(API_GET_DATA)
                        .then(res => {
                            this.toggled = !this.toggled;
                        });
                    }
                }
            })
            
            
            
        </script>

@endsection
