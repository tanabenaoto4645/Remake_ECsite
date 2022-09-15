<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;


class ProductController extends Controller
{
    //一覧表示
    public function index(Product $product)
    {
        return view('index')->with(['products' => $product->getPaginateByLimit(), 'admin' => Auth::user()->admin]);
    }
    
    //商品詳細ページ
    public function show(Product $product)
    {
        return view('show')->with(['product' => $product]);
    }
    
    //商品追加
    public function add(Category $category)
    {
        return view('/addProduct')->with(['categories' => $category->get()]);
    }
    
    //商品保存
    public function store(Product $product, Request $request)
    {
        $input = $request['product'];
        $product->fill($input);

        //s3アップロード開始
        $images = $request->file('image');
        
        $disk = Storage::disk('s3');
        $i = 1;
        foreach ( $images as $image) {
            $path = $disk->putFile('products', $image, 'public');
            $product->{"image_path_"."$i"} = $disk->url($path);
            $i++;
        }
        
        // //s3アップロード開始
        // $image = $request->file('image');
        // // バケットの`products`フォルダへアップロード
        // $path = Storage::disk('s3')->putFile('products', $image, 'public');
        // // アップロードした画像のフルパスを取得
        // $i=1;
        // $product->{"image_path_"."$i"} = Storage::disk('s3')->url($path);

        
        $product->save();
        
        return redirect('/products/'.$product->id);
    }
    
    //商品編集
    public function edit(Product $product, Category $category)
    {
        return view('edit')->with(['product' => $product, 'categories' => $category->get()]);
    }
    //商品更新
    public function update(Request $request, Product $product)
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

        return redirect('/products/'.$product->id);
    }
    
}
