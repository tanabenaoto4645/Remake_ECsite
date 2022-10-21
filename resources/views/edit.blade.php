<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <title>blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    </head>
    <body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="title">
                <h2>商品名</h2>
                <input type="text" name="product[name]" placeholder="商品名" value="{{$product->name}}"/>
                <p class="name_error" style="color:red">{{$errors->first('product.name')}}</p>
            </div>
            
            <div class="title">
                <!--<table>-->
                <!--    <thead><th colspan="5">写真</th></thead>-->
                <!--    <tbody>-->
                <!--        <tr>-->
                <!--            @for ($i = 1; $i <= 5; $i++)-->
                <!--                @if ($product->{"image_path_"."$i"})-->
                <!--                    <td><img src="{{ $product->{"image_path_"."$i"} }}" width=50, height=50></td>-->
                <!--                @endif-->
                <!--            @endfor-->
                <!--        </tr>-->
                <!--        <tr>-->
                <!--            @for ($i = 1; $i <= 5; $i++)-->
                <!--                    <td><input type="file" name="image[]" ></td>-->
                <!--            @endfor-->
                <!--        </tr>-->
                <!--    </tbody>-->
                <!--</table>-->
                <h2>写真</h2>
                @for ($i = 1; $i <= 5; $i++)
                    @if ($product->{"image_path_"."$i"})
                        <a href=""><img src="{{ $product->{"image_path_"."$i"} }}" width=50, height=50></a>
                    @endif
                @endfor
                <br/>
                <input type="file" name="image[]" multiple>
                {{ csrf_field() }}
            </div>
            
            <div class="category">
                <h2>カテゴリー</h2>
                <select name="product[category_id]">
                    @foreach($categories as $category)
                        @if($category->id == $product->category_id)
                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                        @else
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            
            <div class="detail">
                <h2>商品説明</h2>
                <textarea name="product[detail]" placeholder="特徴、カラー、素材、状態等。">{{$product->detail}}</textarea>
                <p class="detail_error" style="color:red">{{$errors->first('product.detail')}}</p>
            </div>
            
            <div class="size">
                <h2>サイズ</h2>
                <input type="text" name="product[size]" placeholder="サイズ" value="{{$product->size}}"/>
                <p class="size_error" style="color:red">{{$errors->first('product.size')}}</p>
            </div>
            
            <div class="price">
                <h2>販売金額</h2>
                <input type="text" name="product[price]" placeholder="値段" value="{{$product->price}}">円</input>
                <p class="price_error" style="color:red">{{$errors->first('product.price')}}</p>
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
    </body>
    <footer>
        <a href="/products">戻る</a>
    </footer>
</html>