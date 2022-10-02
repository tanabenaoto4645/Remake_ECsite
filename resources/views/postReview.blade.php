<!DOCTYPE html>
@extends('layouts.app')　　　　　　　　　　　　

@section('content')
    <body>
        <h1>レビュー投稿</h1>
        <form action="/user/{{auth()->user()->id}}/postReview" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="product_id">
                <h2>商品選択</h2>
                <select name="review[product_id]">
                    @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="review[title]" placeholder="タイトル" value="{{old('review.title')}}"/>
                <p class="title_error" style="color:red">{{$errors->first('review.title')}}</p>
            </div>
            
            <div class="images">
                <h2>写真</h2>
                <div>
                    <input type="file" name="image[]" multiple >
                </div>
                @if ($errors->has('image') || $errors->has('image.*') )
                    <div class="alert alert-danger">{{ $errors->first('image') . $errors->first('image.*') }}</div>
                @endif
            </div>
            
            <div>
                <h2>評価</h2>
                
                <select name="review[like]">
                    <option value="5">★★★★★</option>
                    <option value="4">★★★★</option>
                    <option value="3">★★★</option>
                    <option value="2">★★</option>
                    <option value="1">★</option>
                </select>
            </div>

            <div class="body">
                <h2>レビュー内容</h2>
                <textarea name="review[body]" placeholder="ご自由にご記入ください。" value="{{old('review.body')}}"></textarea>
                <p class="body_error" style="color:red">{{$errors->first('review.body')}}</p>
            </div>
            
            
            <input type="submit" value="投稿"/>
        </form>
    </body>
    <footer>
        <a href="/">戻る</a>
    </footer>
</html>
@endsection