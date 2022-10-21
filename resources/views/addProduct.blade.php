<!DOCTYPE html>
@extends('layouts.app')　　　　　　　　　　　　

@section('content')

    <body>
        <h1>n rebuilding</h1>
        <form action="/addProduct" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>商品名</h2>
                <input type="text" name="product[name]" placeholder="商品名" value="{{old('product.name')}}"/>
                <p class="name_error" style="color:red">{{$errors->first('product.name')}}</p>
            </div>
            
            <div class="title">
                <h2>写真</h2>
                <div>
                    <input type="file" name="image[]" multiple >
                </div>
                @if ($errors->has('image') || $errors->has('image.*') )
                    <div class="alert alert-danger">{{ $errors->first('image') . $errors->first('image.*') }}</div>
                @endif
            </div>
            
            <div class="category">
                <h2>カテゴリー</h2>
                <select name="product[category_id]">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="detail">
                <h2>商品説明</h2>
                <textarea name="product[detail]" placeholder="特徴、カラー、素材、状態等。" value="{{old('product.detail')}}"></textarea>
                <p class="detail_error" style="color:red">{{$errors->first('product.detail')}}</p>
            </div>
            
            <div class="size">
                <h2>サイズ</h2>
                <input type="text" name="product[size]" placeholder="サイズ" value="{{old('product.size')}}"/>
                <p class="size_error" style="color:red">{{$errors->first('product.size')}}</p>
            </div>
            
            <div class="price">
                <h2>販売金額</h2>
                <input type="text" name="product[price]" placeholder="値段" value="{{old('product.price')}}">円</input>
                <p class="price_error" style="color:red">{{$errors->first('product.price')}}</p>
            </div>
            
            <input type="submit" value="出品"/>
        </form>
    </body>
    <footer>
        <a href="/">戻る</a>
    </footer>
</html>
@endsection