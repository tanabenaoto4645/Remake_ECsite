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
        <p>カート</p>
        @if(isset($carts))
            <table class="uk-table uk-table-hover uk-table-divider">
                <thead>
                    <th>購入商品</th>
                    <th></th>
                    <th>小計</th>
                </thead>
                <tbody>
                <div class='products'>
                    <?php $total = 0 ?>
                    @foreach($carts as $cart)
                        <tr>
                            <td><img src="{{$cart->options->image_path}}" width="50" height="50"></td>
                            <td>{{$cart->name}}</td>
                            <td>{{$cart->price}}円</td>
                            <td><a href="/user/cart/remove/{{$cart->rowId}}"><button class="uk-button uk-button-danger uk-button">削除</button></a></td>
                        </tr>
                        <?php $total +=  $cart->price ?>
                    @endforeach
                </div>
                <div>
                    <tr>
                        <td></td>
                        <td class="uk-text-large" style="text-align:right;">合計</td>
                        <td class="uk-text-large">{{$total}}円</td>
                        <td><a href="/payment">決済</a></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><td><a href="/user/cart/reset"><button class="uk-button uk-button-danger uk-button">カート全削除</button></a></td></td>
                    </tr>
                </div>
            </table>
        @else
            カートの中身はありません。
        @endif
    </body>
</html>

@endsection