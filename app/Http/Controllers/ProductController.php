<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Storage;


class ProductController extends Controller
{
    //一覧表示
    public function index(Product $product)
    {
        return view('index')->with(['products' => $product->getPaginateByLimit()]);
    }
    
    //商品追加
    public function add(Product $product)
    {
        return view('/addProduct');
    }
    
    //商品保存
    public function store(Product $product, Request $request)
    {
        $input = $request['product'];
        $product->fill($input);

        //s3アップロード開始
        $image = $request->file('image');
        // バケットの`product`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('products', $image, 'public');
        // アップロードした画像のフルパスを取得
        $product->image_path = Storage::disk('s3')->url($path);
        
        $product->save();
        
        return redirect('/');
    }
}
