<!DOCTYPE html>
@extends('layouts.app2')
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
                        <td>
                            <form action="/paymentComplete">
                            <!--<form action="{{ asset('charge') }}" method="POST">-->
                                {{ csrf_field() }}
                                    <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="{{ env('STRIPE_KEY') }}"
                                        data-amount="{{$total}}"
                                        data-name="nrebuilding"
                                        data-billingAddress=true
                                        data-shippingAddress=true
                                        data-label="決済をする"
                                        data-description="決済情報を入力してください。"
                                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                        data-locale="auto"
                                        data-currency="JPY">
                                    </script>
                                    <input type="hidden" name="amount" value="{{$total}}">
                                    @foreach($carts as $cart)
                                    <input type="hidden" name="id[]" value="{{$cart->id}}">
                                    <input type="hidden" name="row_id[]" value="{{$cart->rowId}}">
                                    @endforeach
                            </form>
                        </td>
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