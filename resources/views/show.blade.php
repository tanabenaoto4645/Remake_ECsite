<!DOCTYPE html>
@extends('layouts.app2')

@section('content')
    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
        <div class="uk-card-media-left uk-cover-container " uk-slideshow="slide" >
                    <div class="uk-position-relative uk-visible-toggle uk-dark " tabindex="-1" >
                        <ul class="uk-slideshow-items uk-height-large">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($product->{"image_path_"."$i"})
                                    <!-- 画像を表示 -->
                                    <li>
                                        <img src="{{ $product->{"image_path_"."$i"} }}" alt="product_image" class="uk-height-1-1 uk-align-center"/>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                        <a class="uk-position-center-left uk-position-small uk-hidden-hover uk-background-muted" href="#" uk-slidenav-previous uk-slideshow-item="previous" ></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover uk-background-muted" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                    </div>
                    <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
        </div>
        <!--商品情報-->
        <div>
            <div style="margin-left:50px;">
                <div class="uk-text-large">
                <p>{{$product->name}}</p>
                </div>
                <table class="uk-table uk-table-hover uk-table-divider">
                    <tbody>
                        <tr>
                            <td class="uk-width-small">金額</td>
                            <td>{{$product->price}}円</td>
                        </tr>
                        <tr>
                            <td class="uk-width-small">サイズ</td>
                            <td>{{$product->size}}</td>
                        </tr>
                        <tr>
                            <td class="uk-width-small">商品説明</td>
                            <td>{{$product->detail}}</td>
                        </tr>
                        <tr>
                            <td class="uk-width-small">カテゴリ</td>
                            <td><a href="/products/category/{{$product->category_id}}/" class="category">{{$product->category->name}}</a></td>
                        </tr>
                        <tr>
                            <td class="uk-width-small">お気に入り数[{{$product->likes}}]</td>
                            <td><div id="like"><button class="uk-button uk-button-small" v-on:click="addLike"><div v-bind:class="{'liked': toggled === true, 'unliked': toggled === false}">♥</div></button></div></td>
                        </tr>
                        <tr>
                            <td class="uk-width-small">カート</td>
                            <td>
                                <div>
                                    <a href="/products/addCart/{{$product->id}}"><button class="uk-button uk-button-primary">カートに追加</button></a>
                                </div>
                            </td>
                        </tr>
                        @auth
                            @if (auth()->user()->admin == 7)
                                <tr>
                                    <td class="uk-width-small"></td>
                                    <td class="edit"><a href="/products/{{ $product->id }}/edit"><button class="uk-button">商品編集</button></a></td>
                                </tr>
                            @endif
                        @endauth
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
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
